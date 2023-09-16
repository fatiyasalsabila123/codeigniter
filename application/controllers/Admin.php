<?php
// Mendefinisikan bahwa akses langsung ke file ini tidak diperbolehkan
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Memuat model 'm_model' dan helper 'my_helper'
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        
        // Mengecek apakah pengguna telah login, jika tidak, maka akan diarahkan ke halaman login
        if ($this->session->userData('logged_in') != true) {
            redirect(base_url().'auth');
        }
    }

    public function index()
    {
        
        // $data['ambil_dari_sini'] = $this->m_model->get_siswa('siswa')->num_rows;
        // Memuat tampilan halaman admin/index
        $this->load->view('admin/index');
        // $this->load->view('admin/index', $data);
    }

    public function siswa() {
        $data['ambil_dari_sini'] = $this->m_model->get_siswa();
        $this->load->view('admin/siswa', $data);
    }

    public function hapus_siswa($id) {
        $this->m_model->delete('siswa', 'id_siswa', $id);
        redirect(base_url('admin/siswa'));
    }

    public function tambah_siswa() {
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/tambah_siswa', $data);
    }

    public function aksi_tambah_siswa() {
        $data=[
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('kelas'),
        ];

        $this->m_model->tambah_data('siswa', $data);
        redirect(base_url('admin/siswa'));
    }

    // public function update_siswa() {
    //     $this->load->view('admin/update_siswa');
    // }

    public function update_siswa($id) {
    $data['siswa'] = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
    $data['kelas'] = $this->m_model->get_data('kelas')->result();
    $this->load->view('admin/update_siswa', $data);
}

public function aksi_ubah_siswa(){
    $data = array (
        'nama_siswa' => $this->input->post('nama'),
        'nisn' => $this->input->post('nisn'),
        'gender' => $this->input->post('gender'),
        'id_kelas' => $this->input->post('kelas'),
    );
    $eksekusi=$this->m_model->ubah_data('siswa', $data, array('id_siswa' =>$this->input->post('id_siswa')));
    if ($eksekusi) {
        // $this->session->set_flashdata('sukses', 'berhasil');
        redirect(base_url('admin/siswa'));
    } else {
        // $this->session->set_flashdata('error', 'gagal');
        redirect(base_url('admin/siswa/upate_siswa'.$this->input->post('id_siswa')));
    }
}

}
?>
    