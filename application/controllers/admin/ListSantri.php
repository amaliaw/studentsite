<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListSantri extends CI_Controller
{
    private $template    =    '/templates/backend';

    // halaman dashboard
    public function index()
    {
        $data['title']    =    'List Santri | DHIBS';
        $data['page']    =    '/admin/list-santri';
        $data['list_santri']    =    $this->db->get('list_santri');
        $this->load->view($this->template, $data);
    }

    public function addNewSantri()
    {
        $data['title']    =    'Tambah Santri | DHIBS';
        $data['page']    =    '/admin/addnewS';

        // RULES FORM

        $this->form_validation->set_rules('nisn', 'NISN', 'required', [
            'required'    =>    'Pilih salah satu! '
        ]);

        // END RULES FORM

        if ($this->form_validation->run() == FALSE) {
            $this->load->view($this->template, $data);
        } else {
            $config['upload_path']          = './upload/santri/foto/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $this->input->post('nisn');
            $config['overwrite']            = true;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('fotosantri')) {
                //akta
                $config1['upload_path']          = './upload/santri/akta/';
                $config1['allowed_types']        = 'gif|jpg|png';
                $config1['file_name']            = $this->input->post('nisn');
                $config1['overwrite']            = true;

                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                $this->upload->do_upload('aktaKel');

                //sertif
                $config2['upload_path']          = './upload/santri/sertif/';
                $config2['allowed_types']        = 'gif|jpg|png';
                $config2['file_name']            = $this->input->post('nisn');
                $config2['overwrite']            = true;

                $this->load->library('upload', $config2);
                $this->upload->initialize($config2);
                $this->upload->do_upload('sertifSis');

                $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $data = [
                    'foto'          =>    $this->upload->data("file_name"),
                    'nama_santri'   =>    $this->input->post('nama_santri'),
                    'kelas'          =>    $this->input->post('kelas'),
                    'wali_santri_ayah'   =>    $this->input->post('wali_santri_ayah'),
                    'walisantri_ibu'   =>    $this->input->post('walisantri_ibu'),
                    'no_hp'         =>    $this->input->post('no_hp'),
                    'jk'            =>    $this->input->post('jk'),
                    'NISN'          =>    $this->input->post('nisn'),
                    'alamat'        =>    $this->input->post('alamat'),
                    'penghasilan_ortu' => $this->input->post('penghasilan_ortu'),
                    'aktakel'       =>    $this->upload->data("file_name"),
                    'sertifSis'     =>    $this->upload->data("file_name"),
                    'gol_dar'       =>    $this->input->post('gol_dar'),
                    'bb'            =>    $this->input->post('bb'),
                    'tb'            =>    $this->input->post('tb'),
                    'tmp_lahir'     =>    $this->input->post('tmp_lahir'),
                    'tgl_lahir'     =>    $this->input->post('tgl_lahir'),
                    'stat_anak'     =>    $this->input->post('stat_anak'),
                    'penyakit'     =>    $this->input->post('penyakit'),
                    'bakat_agama'     =>    $this->input->post('bakat_agama'),
                    'bakat_seni'     =>    $this->input->post('bakat_seni'),
                    'bakat_or'     =>    $this->input->post('bakat_or'),
                    'anak_ke'       =>    $this->input->post('anak_ke')
                ];
                $this->AdminModel->create('list_santri', $data);
            }
            $this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data Baru !');
            return redirect('admin/ListSantri');
        }
    }

    public function edit($id)
    {
        $data['title']    =    'Edit Santri | DHIBS';
        $data['page']     =    '/admin/edit-santri';
        $data['dt']       =    $this->AdminModel->read('list_santri', 'id_santri', $id);

        // RULES FORM
        $this->form_validation->set_rules('nisn', 'NISN', 'required', [
            'required'    =>    'Pilih salah satu! '
        ]);
        // END RULES FORM
        $fotosantri = 'null';
        $aktakel = 'null';
        $sertif = 'null';

        // dies($fotosantri);/
        // echo var_dump($fotosantri);
        // dd($fotosantri);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view($this->template, $data);
        } else {
            // print_r($fotosantri);
            var_dump($fotosantri);
            if (!empty($_FILES["fotosantri"]["name"])) {
                $config1['upload_path']          = './upload/santri/foto/';
                $config1['allowed_types']        = 'jpg|jpeg';
                $config1['file_name']            = $this->input->post('nisn');
                $config1['overwrite']            = true;

                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                if ($this->upload->do_upload('fotosantri')) {
                    $fotosantri = $this->input->data("file_name");
                }
            } else {
                $fotosantri = $this->input->post('old-image-fotosantri');
            }
            if (!empty($_FILES["aktaKel"]["name"])) {
                $config2['upload_path']          = './upload/santri/akta/';
                $config2['allowed_types']        = 'jpg|jpeg';
                $config2['file_name']            = $this->input->post('nisn');
                $config2['overwrite']            = true;

                $this->load->library('upload', $config2);
                $this->upload->initialize($config2);
                if ($this->upload->do_upload('aktaKel')) {
                    $aktakel = $this->input->data("file_name");
                }
            } else {
                $aktakel = $this->input->post('old-image-aktakel');
            }
            if (!empty($_FILES["sertifSis"]["name"])) {
                $config3['upload_path']          = './upload/santri/sertif/';
                $config3['allowed_types']        = 'gif|jpg|png';
                $config3['file_name']            = $this->input->post('nisn');
                $config3['overwrite']            = true;

                $this->load->library('upload', $config3);
                $this->upload->initialize($config3);
                if ($this->upload->do_upload('sertifSis')) {
                    $sertif = $this->input->data("file_name");
                }
            } else {
                $sertif = $this->input->post('old-image-sertif');
            }
            /* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */
            // echo var_dump($this->foto);
            $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data = [
                'foto' =>    $fotosantri,
                'nama_santri' =>    $this->input->post('nama_santri'),
                'kelas' =>    $this->input->post('kelas'),
                'wali_santri_ayah'   =>    $this->input->post('wali_santri_ayah'),
                'walisantri_ibu'   =>    $this->input->post('walisantri_ibu'),
                'pekerjaan_ortu' =>    $this->input->post('pekerjaan_ortu'),
                'pendidikan' =>    $this->input->post('pendidikan'),
                'no_hp' =>    $this->input->post('no_hp'),
                'jk' =>    $this->input->post('jk'),
                'NISN' =>    $this->input->post('nisn'),
                'alamat' =>    $this->input->post('alamat'),
                'aktaKel' =>    $aktakel,
                'sertifSis' =>    $sertif,
                'lulusan' =>    $this->input->post('lulusan'),
                'asal_school' =>    $this->input->post('asal_school'),
                'penghasilan_ortu' =>    $this->input->post('penghasilan_ortu'),
                'gol_dar' =>    $this->input->post('gol_dar'),
                'bb' =>    $this->input->post('bb'),
                'tb' =>    $this->input->post('tb'),
                'penyakit' =>    $this->input->post('penyakit'),
                'tmp_lahir' =>    $this->input->post('tmp_lahir'),
                'tgl_lahir' =>    $this->input->post('tgl_lahir'),
                'stat_anak' =>    $this->input->post('stat_anak'),
                'dari' =>    $this->input->post('dari'),
                'anak_ke' =>    $this->input->post('anak_ke')
            ];
            $this->AdminModel->update('list_santri', 'id_santri', $id, $data);

            $this->session->set_flashdata('pesan', 'Berhasil Mengubah Data !');
            return redirect('admin/list-santri');
        }
    }

    public function delete($id)
    {
        $this->db->where('id_santri', $id);
        $this->db->delete('list_santri');
        $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data !');
        return redirect('admin/list-santri');
    }

    public function cetak()
    {
        $data['title']    =    'List Santri | DHIBS';
        $data['page']    =    '/admin/cetak-list-santri';
        $data['list_santri']    =    $this->db->get('list_santri');
        $this->load->view('/admin/cetak-list-santri', $data);
    }
}
