<?php
// Mendefinisikan bahwa akses langsung ke file ini tidak diperbolehkan
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Memuat model 'm_model' dan helper 'my_helper'
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');

        // Mengecek apakah pengguna telah login, jika tidak, maka akan diarahkan ke halaman login
        if ($this->session->userData('logged_in') != true) {
            redirect(base_url() . 'auth');
        }
    }

    //dashboard admin
    public function index()
    {
        // Memuat tampilan halaman admin/index
        $this->load->view('admin/index');
        // $this->load->view('admin/index', $data);
    }

    // dashboard keuangan 
    public function dashboard()
    {
        $this->load->view('admin/dashboard');
    }

    //upload gambar siswa 
    public function upload_image($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './images/siswa/';
        $config['allowed_types'] = 'jpg|png|jpeg|webp';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }
    //end upload gambar siswa

    //start siswa
    public function siswa()
    {
        $data['ambil_dari_sini'] = $this->m_model->get_siswa();
        $this->load->view('admin/siswa', $data);
    }

    public function hapus_siswa($id)
    {
        $this->m_model->delete('siswa', 'id_siswa', $id);
        redirect(base_url('admin/siswa'));
    }

    public function tambah_siswa()
    {
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/tambah_siswa', $data);
    }

    public function aksi_tambah_siswa()
    {
        $foto = $this->upload_image('foto');
        if ($foto[0] == false) {
            $data = [
                'foto' => 'user.webp',
                'nama_siswa' => $this->input->post('nama'),
                'nisn' => $this->input->post('nisn'),
                'gender' => $this->input->post('gender'),
                'id_kelas' => $this->input->post('kelas'),
            ];
            $this->m_model->tambah_data('siswa', $data);
            redirect(base_url('admin/siswa'));
        } else {
            $data = [
                'foto' => $foto[1],
                'nama_siswa' => $this->input->post('nama'),
                'nisn' => $this->input->post('nisn'),
                'gender' => $this->input->post('gender'),
                'id_kelas' => $this->input->post('kelas'),
            ];

            $this->m_model->tambah_data('siswa', $data);
            redirect(base_url('admin/siswa'));
        }
    }


    public function update_siswa($id)
    {
        $data['siswa'] = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/update_siswa', $data);
    }

    public function aksi_ubah_siswa()
    {
        $data = array(
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('kelas'),
        );
        $eksekusi = $this->m_model->ubah_data('siswa', $data, array('id_siswa' => $this->input->post('id_siswa')));
        if ($eksekusi) {
            // $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('admin/siswa'));
        } else {
            // $this->session->set_flashdata('error', 'gagal');
            redirect(base_url('admin/siswa/upate_siswa' . $this->input->post('id_siswa')));
        }
    }
    //end siswa

    //Bagian Admin
    public function akun()
    {
        $data['admin'] = $this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();
        $this->load->view('admin/akun', $data);
    }

    public function upload_image_admin($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './images/admin/';
        $config['allowed_types'] = 'jpg|png|jpeg|webp';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }

    public function aksi_ubah_akun()
    {
        $foto = $this->upload_image_admin('foto');
        $password_baru = $this->input->post('password_baru');
        $konfirmasi_password = $this->input->post('konfirmasi_password');
        $email = $this->input->post('email');
        $username = $this->input->post('username');

        if ($foto[0] == false) {
            $data = [
                'email' => $email,
                'username' => $username,
                'foto' => 'user.webp'
            ];
        } else {
            $data = [
                'email' => $email,
                'username' => $username,
                'foto' => $foto[1]
            ];
        }

        //jika ada password baru
        if (!empty($password_baru)) {
            //pastikan password baru dan konfirmasi sama
            if ($password_baru === $konfirmasi_password) {
                $data['password'] = md5($password_baru);
            } else {
                $this->session->set_flashdata('message', 'Password Baru Dan Konfirmasi Password Sama');
                redirect(base_url('admin/akun'));
            }
        }

        //lakukan pemberuan data
        $this->session->set_userdata($data);
        $update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));
        if ($update_result) {
            redirect(base_url('admin/admin'));
        } else {
            redirect(base_url('admin/akun'));
        }
    }

    public function update_admin($id) {
        $data['update_admin'] = $this->m_model->get_by_id('admin', 'id', $id)->result();
        $this->load->view('admin/akun', $data);
    }

    public function admin()
    {
        $data['adminn'] = $this->m_model->get_all_admin();
        $this->load->view('admin/admin', $data);
    }

    //end Admin
}
?>