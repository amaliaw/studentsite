<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    private $template    =    '/templates/backend';

    // halaman dashboard
    public function index()
    {
        $data['title']    =    'Admin | DHIBS';
        $data['page']    =    '/admin/admin';
        $data['dt_user'] =     $this->db->get('admin');

        $this->load->view($this->template, $data);
    }

    public function editAdmin($id)
    {
        $data['title']    =    'Edit Admin | DHIBS';
        $data['page']    =    '/admin/editAdmin';
        $data['dt_admin'] =     $this->db->get('admin');
        $data['dt'] = $this->AdminModel->read('admin', 'id_user', $id);

        // RULES FORM
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required'    =>    'Nama tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('email', 'alamat', 'required|trim', [
            'required'    =>    'Alamat tidak boleh kosong! '
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required'    =>    'Password tidak boleh kosong! ',
            'matches'    =>    'Password tidak cocok dengan Konfirmasi password'

        ]);
        // END RULES FORM

        if ($this->form_validation->run() == FALSE) {
            $this->load->view($this->template, $data);
        } else {
            /* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */

            $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data = [
                'email'   =>    $this->input->post('email'),
                'password'      =>    $pass,
                'tgl_akses'       =>    date('Y-m-d H:i:s'),
                'nama'    =>    $this->input->post('nama')
            ];
            $this->AdminModel->update('admin', 'id_user', $id, $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success">
					Berhasil Mengubah Data !
                </div>');

            return redirect('admin/Admin');
        }
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('admin');
        $this->session->set_flashdata('admin', '<div class="alert alert-success" role="alert">
					Berhasil Menghapus Data !
                </div>');

        return redirect('admin/Admin');
    }
}
