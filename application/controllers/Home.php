<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
    }

    public function index()
    {
        // Mengambil data admin dari model m_model
        $data['user'] = $this->m_model->get_data('admin')->result();

        $data['siswas'] = $this->m_model->get_data('siswa')->result();

        // Mengatur judul halaman
        $data['title'] = 'Home Page';

        // Memuat tampilan home.php dengan data yang telah diambil
        $this->load->view('home', $data);
    }
}
