<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}

	// Fungsi ini akan menampilkan halaman login
	public function index()
	{
		$this->load->view('auth/login'); // Memuat halaman login dengan data judul
	}

	// Fungsi ini akan menangani proses login
	public function aksi_login()
	{
		$email = $this->input->post('email', true); // Mendapatkan nilai input email dari form
		$password = $this->input->post('password', true); // Mendapatkan nilai input password dari form
		$data = ['email' => $email]; // Membuat array asosiatif dengan email dan mengambil isi email yang di inputkan
		$query = $this->m_model->getwhere('admin', $data); // Mengambil data admin dari database berdasarkan email
		$result = $query->row_array(); // Mengubah hasil query menjadi array dan menjalankan querynya

		// Memeriksa apakah hasil query tidak kosong dan password sesuai
		if (!empty($result) && md5($password) === $result['password']) {
			$data = [
				'logged_in' => TRUE,
				// Menandai bahwa pengguna telah login
				'email' => $result['email'],
				// Menyimpan email pengguna ke sesi
				'username' => $result['username'],
				// Menyimpan username pengguna ke sesi
				'role' => $result['role'],
				// Menyimpan peran pengguna ke sesi
				'id' => $result['id'],
				// Menyimpan ID pengguna ke sesi
			];
			$this->session->set_userdata($data); // Menyimpan data ke dalam sesi

			// Memeriksa peran pengguna dan mengarahkannya ke halaman yang sesuai
			if ($this->session->userdata('role') == 'admin') {
				redirect(base_url() . "admin"); // menuju ke halaman admin
			} elseif ($this->session->userdata('role') == 'keuangan') {
				redirect((base_url() . "keuangan/index"));
			} else {
				redirect(base_url() . "auth"); // menuju kembali ke halaman login jika login gagal
			}
		} else {
			redirect(base_url() . "auth"); // menuju kembali ke halaman login jika login gagal
		}
	}

	// Fungsi ini akan menangani proses logout
	function logout()
	{
		$this->session->sess_destroy(); // Menghapus sesi pengguna
		redirect(base_url('auth')); // Redirect kembali ke halaman login
	}
}