<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private $template    =    '/templates/frontend';

    // halaman login
    public function index()
    {
        if (!$this->session->userdata('role') == 'user' || $this->session->userdata('role') == 'admin') {
        } else {
            redirect('');
        }

        $data['title']    =    'Masuk | DHIBS';
        $data['page']    =    '/pages/login';


        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required'    =>    'Email tidak boleh kosong! ',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required'    =>    'Password tidak boleh kosong! '
        ]);

        /* JIKA FORM BERNILAI FALSE MAKA TAMPILKAN VIEW KEMBALI*/
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/login', $data);
        } else {

            /* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */
            /* PANGGIL FUNCTION CEKLOGIN DARI AUTH MODEL UNTUK VALIDASI LOGIN*/
            $this->cekLogin();
        }
    }

    public function cekLogin()
    {
        $this->AuthModel->cekLogin();
    }

    // halaman register
    public function register()
    {
        $data['title']    =    'Registrasi | DHIBS';
        $data['page']    =    '/pages/register';

        // MENDEKLARASIKAN PERATURAN UNTUK FORM REGISTER
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required'    =>    'Email tidak boleh kosong! ',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required'    =>    'Password tidak boleh kosong! '
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required'    =>    'Nama tidak boleh kosong! '
        ]);

        /* JIKA FORM BERNILAI FALSE MAKA TAMPILKAN VIEW KEMBALI*/
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/register', $data);
        } else {
            /* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */
            /* PANGGIL FUNCTION CEKLOGIN DARI AUTH MODEL UNTUK VALIDASI LOGIN*/
            $this->prosesRegister();
        }
    }

    public function prosesRegister()
    {
        $this->AuthModel->prosesRegister();
        $this->session->set_flashdata("register", "Berhasil melakukan register!");
        redirect('login');
    }

    public function logout()
    {
        session_destroy();
        $this->session->set_flashdata("logout", "Anda Berhasil Logout!");
        redirect('login');
    }
}
