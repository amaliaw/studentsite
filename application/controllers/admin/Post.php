<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
    private $template    =    '/templates/backend';

    // halaman dashboard
    public function index()
    {
        $data['title']    =    'List Post | DHIBS';
        $data['page']    =    '/admin/posts';
        $data['posts'] =     $this->db->get('posts');
        $this->load->view($this->template, $data);
    }

    public function addNewPost()
    {
        $data['title']    =    'Tambah Post Baru | DHIBS';
        $data['page']    =    '/admin/addnewPost';

        // RULES FORM
        $this->form_validation->set_rules('title', 'Judul', 'required|trim', [
            'required'    =>    'Judul tidak boleh kosong! '
        ]);
        $this->form_validation->set_rules('body', 'Deskripsi', 'required|trim', [
            'required'    =>    'Deskripsi tidak boleh kosong! '
        ]);
        // END RULES FORM

        if ($this->form_validation->run() == FALSE) {
            $this->load->view($this->template, $data);
        } else {
            /* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */
            $config['upload_path'] = './assets/image';
            $config['allowed_types'] = 'gif|png|jpg|pdf|jpeg';
            $config['max_size'] = 0;
            $new_name = time() . '_' . $_FILES['image']['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('post', 'Gagal mengupload foto silahkan cek file upload!. JPG,GIF,JPEG');
                redirect('admin/add-new-data-post');
            } else {
                $upload    =    $this->upload->data('');
                $title     =    $this->input->post('title');
                $body     =    $this->input->post('body');
                $category     =    $this->input->post('category');

                $data =    [
                    'title' => $title,
                    'body' => $body,
                    'category' => $category,
                    'image' => $new_name,
                ];

                $this->PostModel->create('posts', $data);
                $this->session->set_flashdata('post', 'Berhasil Menambah Data!');
                return redirect('admin/posts');
            }
        }
    }

    public function edit($id)
    {
        $data['title']    =    'Edit Post | DHIBS';
        $data['page']    =    '/admin/edit-post';
        $data['dt'] = $this->PostModel->read('posts', 'id_post', $id);

        // RULES FORM
        $this->form_validation->set_rules('title', 'Judul', 'required|trim', [
            'required'    =>    'Judul tidak boleh kosong! '
        ]);
        $this->form_validation->set_rules('body', 'Deskripsi', 'required|trim', [
            'required'    =>    'Deskripsi tidak boleh kosong! '
        ]);
        // END RULES FORM

        if ($this->form_validation->run() == FALSE) {
            $this->load->view($this->template, $data);
        } else {
            /* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */
            $config['upload_path'] = './assets/image';
            $config['allowed_types'] = 'gif|png|jpg|pdf|jpeg';
            $config['max_size'] = 0;
            $new_name = time() . '_' . $_FILES['image']['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('post', 'Gagal mengupload foto silahkan cek file upload!. JPG,GIF,JPEG');
                redirect('admin/add-new-data-post');
            } else {
                $upload    =    $this->upload->data('');
                $title     =    $this->input->post('title');
                $body     =    $this->input->post('body');
                $category     =    $this->input->post('category');
                $data =    [
                    'title' => $title,
                    'body' => $body,
                    'category' => $category,
                    'image' => $new_name
                ];

                $this->PostModel->update('posts', 'id_post', $id, $data);
                $this->session->set_flashdata('post', 'Berhasil Mengubah Data !');
                return redirect('admin/posts');
            }
        }
    }

    public function delete($id)
    {
        $post = $this->PostModel->read('posts', 'id_post', $id);
        if (unlink(FCPATH . '/assets/image/' . $post['image'])) {
            $this->db->where('id_post', $id);
            $this->db->delete('posts');
        }
        $this->session->set_flashdata('post', 'Berhasil Menghapus Data');
        return redirect('admin/Post');
    }

    public function cetak()
    {
        $data['title']    =    'Daftar Post | DHIBS';
        $data['page']    =    '/admin/cetak_admin';
        $data['dt_admin'] =     $this->db->get('admin');
        $this->load->view($this->template, $data);
    }
}
