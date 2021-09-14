<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListTeacher extends CI_Controller
{
    private $template    =    '/templates/backend';

    // halaman dashboard
    public function index()
    {
        $data['title']    =    'List Guru | DHIBS';
        $data['page']    =    '/admin/list-teacher';
        $data['list_teacher']    =    $this->db->get('list_teacher');
        $this->load->view($this->template, $data);
    }

    public function addNewTeacher()
    {
        $data['title']    =    'Tambah Guru | DHIBS';
        $data['page']    =    '/admin/addnewT';

        // RULES FORM

        $this->form_validation->set_rules('nip', 'nip', 'required', [
            'required'    =>    'NIP tidak boleh kosong! '
        ]);

        // END RULES FORM

        if ($this->form_validation->run() == FALSE) {
            $this->load->view($this->template, $data);
        } else {
            $config['upload_path']          = './upload/guru/';
            $config['allowed_types']        = 'jpg|jpeg';
            $config['file_name']            = $this->input->post('nip');
            $config['overwrite']            = true;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto_guru')) {
                //fotoktp
                $config1['upload_path']          = './upload/guru/foto/';
                $config1['allowed_types']        = 'jpg|jpeg';
                $config1['file_name']            = $this->input->post('nip');
                $config1['overwrite']            = true;

                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                $this->upload->do_upload('foto_ktp_g');

                //kk
                $config2['upload_path']          = './upload/guru/kk/';
                $config2['allowed_types']        = 'gif|jpg|png';
                $config2['file_name']            = $this->input->post('nip');
                $config2['overwrite']            = true;

                $this->load->library('upload', $config2);
                $this->upload->initialize($config2);
                $this->upload->do_upload('KK_g');

                //ijazah
                $config3['upload_path']          = './upload/guru/ijazah/';
                $config3['allowed_types']        = 'gif|jpg|png';
                $config3['file_name']            = $this->input->post('nip');
                $config3['overwrite']            = true;

                $this->load->library('upload', $config3);
                $this->upload->initialize($config3);
                $this->upload->do_upload('ijazah_g');

                /* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */

                $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $data = [
                    'foto_guru' =>    $this->upload->data("file_name"),
                    'nama_guru' =>    $this->input->post('nama_guru'),
                    'jk_g' =>    $this->input->post('jk_g'),
                    'NIP' =>     $this->input->post('nip'),
                    'no_hp_g'     =>    $this->input->post('no_hp_g'),
                    'alamat_guru' =>    $this->input->post('alamat_guru'),
                    'mapel'       =>    $this->input->post('mapel'),
                    'foto_ktp_g'  =>    $this->upload->data("file_name"),
                    'KK_g'      =>    $this->upload->data("file_name"),
                    'sertif_g'  =>    $this->upload->data("file_name"),
                    'ijazah_g'  =>    $this->upload->data("file_name"),
                ];
                $this->AdminModel->create('list_teacher', $data);
            }
            $this->session->set_flashdata('guru', 'Berhasil Menambahkan Data !');
            return redirect('admin/ListTeacher');
        }
    }

    public function editGuru($id)
    {
        $data['title']    =    'Edit Guru | DHIBS';
        $data['page']     =    '/admin/edit-teacher';
        $data['dt']       =    $this->AdminModel->read('list_teacher', 'id_guru', $id);

        // RULES FORM
        $this->form_validation->set_rules('nip', 'nip', 'required|trim', [
            'required'    =>    'NIP tidak boleh kosong! '
        ]);
        // END RULES FORM

        if ($this->form_validation->run() == FALSE) {
            $this->load->view($this->template, $data);
        } else {
            if (!empty($_FILES["fotosantri"]["name"])) {
                $config['upload_path']          = './upload/guru/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = $this->input->post('nip');
                $config['overwrite']            = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('fotoguru')) {
                } else {
                    $this->image = $post["old_image"];
                }
            }

            /* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */

            $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data = [
                'foto_guru' =>    $this->upload->data("file_name"),
                'nama_guru' =>    $this->input->post('nama_guru'),
                'jk_g'        =>    $this->input->post('jk_g'),
                'NIP'       =>    $this->input->post('nip'),
                'no_hp_g'     =>    $this->input->post('no_hp_g'),
                'alamat_guru'    =>    $this->input->post('alamat_guru'),
                'mapel'     =>    $this->input->post('mapel'),
                'foto_ktp_g' =>    $this->upload->data("file_name"),
                'KK_g'      =>    $this->upload->data("file_name"),
                'sertif_g'  =>    $this->upload->data("file_name"),
                'ijazah_g'  =>    $this->upload->data("file_name"),
            ];
            $this->AdminModel->create('list_teacher', 'id_guru', $id, $data);

            $this->session->set_flashdata('guru', 'Berhasil Mengubah Data !');
            return redirect('admin/list-teacher');
        }
    }

    public function delete($id)
    {
        $this->db->where('id_guru', $id);
        $this->db->delete('list_teacher');
        $this->session->set_flashdata('guru', 'Berhasil Menghapus Data !');
        return redirect('admin/list-teacher');
    }

    public function cetak()
    {
        $data['title']    =    'List Guru | DHIBS';
        $data['page']    =    '/admin/cetak-list-teacher';
        $data['list_guru']    =    $this->db->get('list_teacher');
        $this->load->view('/admin/cetak-list-teacher', $data);
    }
}
