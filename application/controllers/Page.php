<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    private $template    =    '/templates/frontend';

    public function index()
    {
        $data['title']    =    'Pendaftaran Santri Baru | DHIBS';
        $data['page']    =    '/pages/home';
        $data['banner']    =    '/templates/banner';
        $this->load->view($this->template, $data);
    }

    public function pendaftaran()
    {
        $data['title']    =    'Pendaftaran | DHIBS';
        $data['page']    =    '/pages/pendaftaran';
        $data['banner']    =    '/templates/banner';
        // $this->load->view($this->template, $data);
        $this->load->view('/pages/pendaftaran', $data);
    }

    public function proses_pendaftaran()
    {
        $data['title']    =    'Proses Pendaftaran | DHIBS';
        $data['page']    =    '/pages/pendaftaran';
        $data['banner']    =    '/templates/banner';

        $this->form_validation->set_rules('nama_santri', 'nama_santri', 'required', [
            'required'    =>    'Kolom tidak boleh kosong! '
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->pendaftaran();

            // var_dump($this->input->post()); die;
        } else {
            /* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */
            $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data = [
                'pendaftaran'       =>    $this->input->post('pendaftaran'),
                'nama_santrib'      =>    $this->input->post('nama_santri'),
                'wali_santri_ayahb' =>    $this->input->post('wali_santri_ayah'),
                'walisantri_ibub'   =>    $this->input->post('walisantri_ibu'),
                'pekerjaan_ortub'   =>    $this->input->post('pekerjaan_ortu'),
                'lain_lainb'        =>    $this->input->post('lain_lainb'),
                'no_hpb'            =>    $this->input->post('no_hp'),
                'jkb'               =>    $this->input->post('jk'),
                'NISNb'             =>    $this->input->post('nisn'),
                'alamatb'           =>    $this->input->post('alamat'),
                'gol_darb'          =>    $this->input->post('gol_dar'),
                'bbb'               =>    $this->input->post('bb'),
                'tbb'               =>    $this->input->post('tb'),
                'penyakitb'         =>    $this->input->post('penyakit'),
                'bakat_orb'         =>    $this->input->post('bakat_or'),
                'bakat_senib'       =>    $this->input->post('bakat_seni'),
                'bakat_agamab'      =>    $this->input->post('bakat_agama'),
                'tmp_lahirb'        =>    $this->input->post('tmp_lahir'),
                'tgl_lahirb'        =>    $this->input->post('tgl_lahir'),
                'stat_anakb'        =>    $this->input->post('stat_anak'),
                'anak_keb'          =>    $this->input->post('anak_ke'),
                'darib'             =>    $this->input->post('dari'),
                'penghasilan_ortub' =>    $this->input->post('penghasilan_ortu'),
                'lulusanb'          =>    $this->input->post('lulusan'),
                'asal_schoolb'      =>    $this->input->post('asal_school'),
                'is_newb'           =>    1,
                'registeredb'       =>    date('Y-m-d H:i:s'),

            ];
            $this->db->insert('list_santribaru', $data);

            $lastid = $this->db->insert_id();
            $this->session->set_flashdata("pesan", "Berhasil Memproses Data !");
            $this->session->set_userdata('lastID', $lastid);

            $this->pendaftaran2();
        }
    }

    public function pendaftaran2()
    {
        $lastID = $this->session->userdata('lastID');
        if ($lastID) {
            $data['title']    =    'Pendaftaran | DHIBS';
            $data['page']    =    '/pages/pendaftaran2';
            $data['banner']    =    '/templates/banner';
            $this->load->view($this->template, $data);
        } else {
            return redirect('z');
        }
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function proses_pendaftaran2()
    {
        $lastID = $this->session->userdata('lastID');
        if ($lastID) {
            $randomString = $this->generateRandomString();
            $config['upload_path'] = './upload/santribaru/';
            $config['allowed_types'] = 'jpg|jpeg';
            $foto = date('Y-m-d-H-i-s') . '_FOTO_' . $randomString . '.jpg';
            $config['file_name'] = $foto;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('fotob')) {
                $this->session->set_flashdata("gagal", "Gagal mengupload foto silahkan cek file upload!");
                //bener
                return redirect('pendaftaran2');
            } else {

                // UPLOAD FILE FOTO
                $upload    =    $this->upload->data('');
                // UPLOAD FILE FOTO

                $randomString = $this->generateRandomString();
                $config['upload_path'] = './upload/santribaru/akta/';
                $config['allowed_types'] = 'jpg|jpeg';
                $aktaKel = date('Y-m-d-H-i-s') . '_AKTAKEL_' . $randomString . '.jpg';
                $config['file_name'] = $aktaKel;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('aktaKelb')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
                        Gagal mengupload foto silahkan cek file upload!
                        </div>');
                    return redirect('pendaftaran2');
                } else {
                    // UPLOAD FILE AKTAKEL
                    $upload    =    $this->upload->data('');
                    // UPLOAD FILE AKTAKEL

                    $randomString = $this->generateRandomString();
                    $config['upload_path'] = './upload/santribaru/sertif/';
                    $config['allowed_types'] = 'jpg|jpeg'; // 
                    $sertifSis = date('Y-m-d-H-i-s') . '_SERTIFSIS_' . $randomString . '.jpg';
                    $config['file_name'] = $sertifSis;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('sertifSisb')) {

                        // DATA UNTUK UPDATE TABLE 
                        $data = array(
                            'fotob' => 'upload/santribaru/' . $foto,
                            'aktaKelb' => 'upload/santribaru/akta/' . $aktaKel,
                            'sertifSisb' => 'upload/santribaru/sertif/' . $sertifSis
                        );

                        $this->db->where('id_santribaru', $lastID);
                        $this->db->update('list_santribaru', $data);

                        $this->success_pendaftaran();
                    } else {
                        // UPLOAD FILE SERTIFSIS
                        $upload    =    $this->upload->data('');
                        // UPLOAD FILE SERTIFSIS

                        // DATA UNTUK UPDATE TABLE 
                        $data = array(
                            'fotob' => 'upload/santribaru/' . $foto,
                            'aktaKelb' => 'upload/santribaru/akta/' . $aktaKel,
                            'sertifSisb' => 'upload/santribaru/sertif/' . $sertifSis
                        );

                        $this->db->where('id_santribaru', $lastID);
                        $this->db->update('list_santribaru', $data);

                        $this->success_pendaftaran();
                    }
                }
            }
        } else {
            return redirect('');
        }
    }

    public function success_pendaftaran()
    {
        $this->session->unset_userdata('lastID');
        $data['title']    =    'Pendaftaran Berhasil | DHIBS';
        $data['page']    =    '/pages/success_pendaftaran';
        $data['banner']    =    '/templates/banner';
        $this->load->view($this->template, $data);
    }


    // halaman about berhasil
    public function bacaselengkapnya()
    {
        $data['title']    =    'Baca Selengkapnya | DHIBS';
        $data['page']    =    '/pages/bacaselengkapnya';
        $data['banner']    =    '/templates/banner';
        // $this->load->view($this->template, $data);
        $this->load->view('/pages/bacaselengkapnya', $data);
    }

    // halaman about berhasil
    public function about()
    {
        $data['title']    =    'About | DHIBS';
        $data['page']    =    '/pages/about';
        $data['banner']    =    '/templates/banner';
        $this->load->view('/pages/about', $data);
    }

    public function berita()
    {
        $data['title']    =    'Berita | DHIBS';
        $data['page']    =    '/pages/berita';
        $data['data'] = $this->db->get_where('posts', ['category' => 'Berita']);
        $data['banner']    =    '/templates/banner';
        $this->load->view('/pages/berita', $data);
    }


    public function detail($id)
    {
        $data['data'] = $this->PostModel->read('posts', 'id_post', $id);
        $data['title']    =    $data['data']['title'] . ' | DHIBS';
        $this->load->view('/pages/detail', $data);
    }

    // halaman login
    public function login()
    {
        $data['title']    =    'Login | DHIBS';
        $data['page']    =    '/pages/login';
        $this->load->view($this->template, $data);
    }
}
