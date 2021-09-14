<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListSantriBaru extends CI_Controller
{
    private $template    =    '/templates/backend';

    // halaman dashboard
    public function index()
    {
        $data['title']    =    'List Santri Baru | DHIBS';
        $data['page']    =    '/admin/list-santribaru';
        $data['list_santribaru']    =    $this->db->get('list_santribaru');
        $this->load->view($this->template, $data);
    }

    public function file_baru()
    {
        $data['title']  =   'List Santri Baru | DHIBS';
        $data['page']    =    '/admin/list_santribaru';
        $this->db->where('is_new', '1');
        $data['list_santribaru'] = $this->db->get('list_santribaru');
    }

    public function edit($id)
    {
        $data['title']  =    'Edit Santri Baru| DHIBS';
        $data['page']   =    '/admin/edit-santribaru';
        $data['dt']     =    $this->AdminModel->read('list_santribaru', 'id_santribaru', $id);

        // RULES FORM
        $this->form_validation->set_rules('pendaftaran', 'Jenjang', 'required|trim', [
            'required'    =>    'Pilih salah satu! '
        ]);

        $this->form_validation->set_rules('nisnb', 'NISNb', 'required|trim', [
            'required'    =>    'NISN tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('nama_santrib', 'Nama', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('jkb', 'jk', 'required|trim', [
            'required'    =>    'Pilih salah satu!'
        ]);

        $this->form_validation->set_rules('wali_santri_ayahb', 'ayah', 'required|trim', [
            'required'    =>    'Kolom idak boleh kosong! '
        ]);

        $this->form_validation->set_rules('alamatb', 'alamat', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('no_hpb', 'No Telepon', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('tmp_lahirb', 'tempat lahir', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('tgl_lahirb', 'tgl lahir', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('lulusanb', 'lulusan', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('tmp_lahirb', 'tempat lahir', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('walisantri_ibub', 'ibu', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('pekerjaan_ortub', 'kerja', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('pendidikanb', 'edu', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('anak_keb', 'anak', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('stat_anakb', 'stat', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('penghasilan_ortub', 'hasil', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('bbb', 'bb', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('tbb', 'tb', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);
        $this->form_validation->set_rules('gol_darb', 'goldar', 'required|trim', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);
        // END RULES FORM

        if ($this->form_validation->run() == FALSE) {
            $this->load->view($this->template, $data);
        } else {
            /* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */

            $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data = [
                'pendaftaran'    =>    $this->input->post('pendaftaran'),
                'fotob'          =>    $this->data->data('fotob'),
                'nama_santrib'   =>    $this->input->post('nama_santrib'),
                'kelas'          =>    $this->input->post('kelas'),
                'wali_santri_ayahb'   =>    $this->input->post('wali_santri_ayahb'),
                'walisantri_ibub'   =>    $this->input->post('walisantri_ibub'),
                'no_hpb'         =>    $this->input->post('no_hpb'),
                'jkb'            =>    $this->input->post('jkb'),
                'lulusanb'            =>    $this->input->post('lulusanb'),
                'asal_schoolb'            =>    $this->input->post('asal_schoolb'),
                'penghasilan_ortub' => $this->input->post('penghasilan_ortub'),
                'NISNb'          =>    $this->input->post('nisnb'),
                'alamatb'        =>    $this->input->post('alamatb'),
                'aktakelb'       =>    $this->data->data('aktaKelb'),
                'sertifSisb'     =>    $this->data->data('sertifSisb'),
                'gol_darb'       =>    $this->input->post('gol_darb'),
                'bbb'            =>    $this->input->post('bbb'),
                'tbb'            =>    $this->input->post('tbb'),
                'tmp_lahirb'     =>    $this->input->post('tmp_lahirb'),
                'tgl_lahirb'     =>    $this->input->post('tgl_lahirb'),
                'stat_anakb'     =>    $this->input->post('stat_anakb'),
                'bakat_agamab'     =>    $this->input->post('bakat_agamab'),
                'bakat_senib'     =>    $this->input->post('bakat_senib'),
                'bakat_orb'     =>    $this->input->post('bakat_orb'),
                'anak_keb'       =>    $this->input->post('anak_keb')
            ];
            $this->AdminModel->update('list_santribaru', 'id_santribaru', $id, $data);

            $this->session->set_flashdata('ubah', 'Berhasil Mengubah Data !');
            return redirect('admin/list-santribaru');
        }
    }

    public function delete($id)
    {
        $this->db->where('id_santribaru', $id);
        $this->db->delete('list_santribaru');
        $this->session->set_flashdata('ubah', 'Berhasil Menghapus Data !');
        return redirect('admin/list_santribaru');
    }

    public function cetak()
    {
        $data['title']    =    'List Santri Baru | DHIBS';
        $data['page']    =    '/admin/cetak-list-santri';
        $data['list_santri']    =    $this->db->get('list_santribaru');
        $this->load->view('/admin/cetak-list-santribaru', $data);
    }
}
