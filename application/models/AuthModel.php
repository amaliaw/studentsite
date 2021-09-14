<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_MODEL
{

    public function cekLogin()
    {
        $email     =    $this->input->post('email');
        $username     =    $this->input->post('username');
        $password     =    $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $admin = $this->db->get_where('admin', ['email_admin' => $email])->row_array();

        /* CEK USER ADA ATAU TIDAK*/
        if ($user) {

            $hash = $user['password'];

            /* SELANJUTNYA CEK PASSWORD*/
            if (password_verify($password, $hash)) {
                $data     =    [
                    'username'     =>    $user['username'],
                    'email'     =>    $user['email'],
                    'role'     =>    'user',
                    'level'     =>    '1',
                    'status'    =>      'on',
                    'nama'     =>    $user['nama']
                ];
                /* MEMBUAT SESSION */
                $this->session->set_userdata($data);
                /*  JIKA SEMUA BEHASIL MAKA REDIRECT KE HALAMAN UTAMA */
                redirect('/admin/dashboard');
            } else {
                /* JIKA PASSWORD TIDAK SAMA DENGAN DI DATABASE*/
                /* MAKA REDIRECT KE LOGIN LAGI*/
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					Anda salah memasukan password !
				</div>');
                redirect('login');
            }
        } elseif ($admin) {
            /* SELANJUTNYA CEK PASSWORD*/
            if (password_verify($password, $admin['password'])) {
                $data     =    [
                    'email'     =>    $admin['email_admin'],
                    'role'     =>    'admin',
                    'level'     =>    '2',
                    'status'    =>      'on',
                    'nama'     =>    $admin['nama_admin']
                ];
                /* MEMBUAT SESSION */
                $this->session->set_userdata($data);
                /*  JIKA SEMUA BEHASIL MAKA REDIRECT KE HALAMAN UTAMA */
                redirect('admin/dashboard');
            } else {
                /* JIKA PASSWORD TIDAK SAMA DENGAN DI DATABASE*/
                /* MAKA REDIRECT KE LOGIN LAGI*/
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					<center>Anda salah memasukan password!</center>
				</div>');
                redirect('/login');
            }
        } else {
            /* JIKA USER / ADMIN TIDAK ADA MAKA REDIRECT KE LOGIN LAGI*/
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					<center>Email / User tidak terdaftar!</center>
				</div>');
            redirect('/login');
        }
    }

    // PROSES CREATE
    public function prosesRegister()
    {
        $nama     =    $this->input->post('nama');
        $email     =    $this->input->post('email');
        $password     =    password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $data =    [
            'nama' => $nama,
            'email' => $email,
            'password' => $password
        ];

        return $this->db->insert('user', $data);
    }
}
