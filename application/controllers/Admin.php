<?php
// Mendefinisikan bahwa akses langsung ke file ini tidak diperbolehkan
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        if ($this->session->userData('logged_in') != true && $this->session->userData('role') != 'admin') {
            redirect(base_url() . 'auth');
        }
    }

    // Contoh fungsi autentikasi
    function is_logged_in()
    {
        return $this->session->userdata('id') !== NULL;
    }

    // Contoh fungsi otorisasi
    function is_admin()
    {
        return $this->session->userdata('role') === 'admin';
    }

    //dashboard admin
    public function index()
    {
        // $this->load->view('admin/index', $data);
        if ($this->is_logged_in() && $this->is_admin()) {
            // Pengguna yang masuk dan memiliki peran "admin" diizinkan mengakses
            // Tampilkan dashboard admin di sini
            $data['guru_'] = $this->m_model->get_guru();
            // data siswa
            $data['data_siswa'] = $this->m_model->get_siswa();
            $this->load->view('admin/index', $data);
        } else {
            // Pengguna lain akan diarahkan atau diberikan pesan akses ditolak
            redirect(base_url('auth')); // Ganti dengan halaman lain jika perlu
        }
    }
    //end dahsboard keuangan

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
    //hapus siswa
    public function hapus_siswa($id)
    {
        // $this->m_model->delete('siswa', 'id_siswa', $id);
        // redirect(base_url('admin/siswa'));

        //model siswa get by id
        $siswa = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->row();
        //kondisi jika siswa ada
        if ($siswa) {
            //kondisi foto siswa bukan 'User.webp'
            if ($siswa->foto !== 'User.webp') {
                $file_path = 'images/siswa/' . $siswa->foto;

                if (file_exists($file_path)) {
                    if (unlink($file_path)) {
                        //menghapus file jika berhasil menggunakan model delete
                        $this->m_model->delete('siswa', 'id_siswa', $id);
                        redirect(base_url('admin/siswa'));
                    } else {
                        //jika gagal menghapus data
                        echo "gagal menghapus file";
                    }
                } else {
                    //tanpa menghapus file user.webp
                    $this->m_model->delete('siswa', 'id_siswa', $id);
                    redirect(base_url('admin/siswa'));
                }
            }
        } else {
            //jika siswa tidak ditemukan 
            echo 'siswa tidak ditemukan';
        }
    }
    //tambah siiswa
    public function tambah_siswa()
    {
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/tambah_siswa', $data);
    }
    //aksi tambah data siswa
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
    //update siswa
    public function update_siswa($id)
    {
        $data['siswa'] = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/update_siswa', $data);
    }
    //edit siswa
    public function aksi_ubah_siswa()
    {
        $foto = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];

        // Jika ada foto yang diunggah
        if ($foto) {
            $kode = round(microtime(true) * 1000);
            $file_name = $kode . '_' . $foto;
            $upload_path = './images/siswa/' . $file_name;

            if (move_uploaded_file($foto_temp, $upload_path)) {
                // Hapus foto lama jika ada
                $old_file = $this->m_model->get_siswa_foto_by_id($this->input->post('id_siswa'));
                if ($old_file && file_exists('./images/siswa/' . $old_file)) {
                    unlink('./images/siswa/' . $old_file);
                }

                $data = [
                    'foto' => $file_name,
                    'nama_siswa' => $this->input->post('nama'),
                    'nisn' => $this->input->post('nisn'),
                    'gender' => $this->input->post('gender'),
                    'id_kelas' => $this->input->post('kelas'),
                ];
            } else {
                // Gagal mengunggah foto baru
                redirect(base_url('admin/ubah_siswa/' . $this->input->post('id_siswa')));
            }
        } else {
            // Jika tidak ada foto yang diunggah
            $data = [
                'nama_siswa' => $this->input->post('nama'),
                'nisn' => $this->input->post('nisn'),
                'gender' => $this->input->post('gender'),
                'id_kelas' => $this->input->post('kelas'),
            ];
        }

        // Eksekusi dengan model ubah_data
        $eksekusi = $this->m_model->ubah_data('siswa', $data, array('id_siswa' => $this->input->post('id_siswa')));

        if ($eksekusi) {
            redirect(base_url('admin/siswa'));
        } else {
            redirect(base_url('admin/ubah_siswa/' . $this->input->post('id_siswa')));
        }
    }
    //end siswa

    //Bagian Admin
    //menampilkan halaman admin
    public function admin()
    {
        $data['adminn'] = $this->m_model->get_all_admin();
        $this->load->view('admin/admin', $data);
    }
    //menampilkan get by id akun admin
    public function akun()
    {
        $data['admin'] = $this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();
        $this->load->view('admin/akun', $data);
    }
    //upload image admin
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
    // ubah akun admin
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
    //update admin
    public function update_admin($id)
    {
        $data['update_admin'] = $this->m_model->get_by_id('admin', 'id', $id)->result();
        $this->load->view('admin/akun', $data);
    }

    //start function guru
    //get data guru
    public function data_guru()
    {
        $data['guru'] = $this->m_model->get_guru('guru');
        // $data['mapel'] = $this->m_model->get_data('mapel');
        $this->load->view('admin/guru/data_guru', $data);
    }
    //tambah data guru
    public function tambah_guru()
    {
        $data['mapel'] = $this->m_model->get_data('mapel')->result();
        $this->load->view('admin/guru/tambah_guru', $data);
    }
    //aksi tambah guru
    public function aksi_tambah_guru()
    {
        $data = [
            'nama_guru' => $this->input->post('nama_guru'),
            'nik' => $this->input->post('nik'),
            'gender' => $this->input->post('gender'),
            'id_mapel' => $this->input->post('mapel'),
        ];
        $eksekusi = $this->m_model->tambah_data('guru', $data);
        if ($eksekusi) {
            $this->session->set_flashdata('berhasil', 'Berhasil Menambahkan Data Guru Yeyy');
            redirect(base_url('admin/data_guru'));
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menambahkan Data Huhuu');
            redirect(base_url('admin/guru/tambah_guru'));
        }
    }

    //delete data guru
    public function hapus_guru($id)
    {
        $this->m_model->delete('guru', 'id', $id);
        redirect(base_url('admin/data_guru'));
    }
    //end function guru

    // edit guru 
    public function edit_guru($id)
    {
        $data['guru'] = $this->m_model->get_by_id('guru', 'id', $id)->result();
        $data['mapel'] = $this->m_model->get_data('mapel')->result();
        $this->load->view('admin/guru/edit_guru', $data);
    }

    //aksi edit guru
    public function aksi_ubah_guru()
    {
        $data = [
            'nama_guru' => $this->input->post('nama_guru'),
            'gender' => $this->input->post('gender'),
            'nik' => $this->input->post('nik'),
            'id_mapel' => $this->input->post('nama_mapel')
        ];
        $eksekusi = $this->m_model->ubah_data('guru', $data, array('id' => $this->input->post('id')));
        if ($eksekusi) {
            redirect(base_url('admin/data_guru'));
        } else {
            redirect(base_url('admin/edit_guru/' . $this->input->post('id')));
        }
    }

    //start function mapel
    //get data mapel
    public function data_mapel()
    {
        $data['mapel'] = $this->m_model->get_data('mapel')->result();
        $this->load->view('admin/mapel/data_mapel', $data);
    }

    //tambah data mapel
    public function tambah_mapel()
    {
        $data = [
            'nama_mapel' => $this->input->post('nama_mapel'),
        ];
        $eksekusi = $this->m_model->tambah_data('mapel', $data);
        if ($eksekusi) {
            $this->session->set_flashdata('tambah_mapel', 'Berhasil Menambahkan Data Mapel, Uhuy');
            redirect(base_url('admin/data_mapel'));
        } else {
            $this->session->set_flashdata('gagal_tambah_mapel', "Gagal Menambahkan Data Mapel, Yahhh");
            redirect(base_url('admin/tambah_mapel'));
        }
    }

    // hapus data mapel 
    public function hapus_mapel($id)
    {
        $this->m_model->delete('mapel', 'id', $id);
        redirect(base_url('admin/data_mapel'));
    }
    //end function mapel

    //get data sekolah
    public function data_sekolah()
    {
        $data['sekolah'] = $this->m_model->get_data('sekolah')->result();
        $this->load->view('admin/sekolah/data_sekolah', $data);
    }

    //start function kelas
    //get data kelas
    public function data_kelas()
    {
        $data['kelas'] = $this->m_model->get_kelas('kelas');
        $this->load->view('admin/kelas/data_kelas', $data);
    }

    //tambah kelas
    public function tambah_kelas()
    {
        $data = [
            'tingkat_kelas' => $this->input->post('tingkat_kelas'),
            'jurusan_kelas' => $this->input->post('jurusan_kelas'),
            'id_sekolah' => $this->input->post('nama_sekolah'),
            'id_guru_walikelas' => $this->input->post('wali_kelas'),
        ];
        $eksekusi = $this->m_model->tambah_data('kelas', $data);
        if ($eksekusi) {
            redirect(base_url('admin/data_kelas'));
        } else {
            redirect(base_url('admin/tambah_kelas'));
        }
    }

    // edit_kelas
    public function edit_kelas($id)
    {
        $data['kelas'] = $this->m_model->get_by_id('kelas', 'id', $id)->result();
        $data['sekolah'] = $this->m_model->get_data('sekolah')->result();
        $data['wali_kelas'] = $this->m_model->get_data('guru')->result();
        $this->load->view('admin/kelas/edit_kelas', $data);
    }

    //aksi edit kelas
    public function aksi_edit_kelas()
    {
        $data = [
            'tingkat_kelas' => $this->input->post('tingkat_kelas'),
            'jurusan_kelas' => $this->input->post('jurusan_kelas'),
            'id_guru_walikelas' => $this->input->post('wali_kelas'),
            'id_sekolah' => $this->input->post('nama_sekolah'),
        ];

        $eksekusi = $this->m_model->ubah_data('kelas', $data, array('id' => $this->input->post('id')));
        if ($eksekusi) {
            redirect(base_url('admin/data_kelas'));
        } else {
            redirect(base_url('admin/edit_kelas/' . $this->input->post('id')));
        }
    }

    //hapus kelas
    public function hapus_kelas($id)
    {
        $this->m_model->delete('kelas', 'id', $id);
        redirect(base_url('admin/data_kelas'));
    }

    //end function kelas

    // get data alokasi _mapel
    public function data_alokasi_mapel()
    {
        $data['alokasi_mapel'] = $this->m_model->get_alokasi_mapel('alokasi_mapel');
        $this->load->view('admin/alokasi_mapel/data_alokasi_mapel', $data);
    }

    //function export
    public function export()
    {
        require_once FCPATH . 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
            ]
        ];

        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
            ]
        ];

        $sheet->setCellValue('A1', "DATA SISWA");
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellValue('A3', "NO");
        $sheet->setCellValue('B3', "NAMA SISWA");
        $sheet->setCellValue('C3', "NISN");
        $sheet->setCellValue('D3', "GENDER");
        $sheet->setCellValue('E3', "KELAS");
        $sheet->setCellValue('F3', "FOTO");

        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);

        $data_siswa = $this->m_model->get_siswa();

        $no = 1;
        $numrow = 4;
        foreach ($data_siswa as $data) {
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->nama_siswa);
            $sheet->setCellValue('C' . $numrow, $data->nisn);
            $sheet->setCellValue('D' . $numrow, $data->gender);
            $sheet->setCellValue('E' . $numrow, $data->tingkat_kelas . '' . $data->jurusan_kelas);
            $sheet->setCellValue('F' . $numrow, $data->foto);

            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(30);
        $sheet->getColumnDimension('G')->setWidth(30);
        $sheet->getColumnDimension('H')->setWidth(35);

        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        $sheet->setTitle("LAPORAN DATA SISWA");
        header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="SISWA.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    // function import 
    // import
    public function import()
    {
        require_once FCPATH . 'vendor/autoload.php';
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                // $highestColumn = $worksheet->getHighestColumn();
                for ($row = 4; $row <= $highestRow; $row++) {
                    $foto = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $nama_siswa = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $gender = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $nisn = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $tingkat_kelas = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    // echo $nama_siswa;

                    $get_id_by_kelas = $this->m_model->get_by_kelas($tingkat_kelas);
                    echo $get_id_by_kelas;
                    $data = array(
                        'foto' => $foto,
                        'nama_siswa' => $nama_siswa,
                        'gender' => $gender,
                        'nisn' => $nisn,
                        'id_kelas' => $get_id_by_kelas,
                    );
                    $this->m_model->tambah_data('siswa', $data);
                }
            }
            redirect(base_url('admin/siswa'));
        } else {
            echo 'Invalid File';
        }
    }


    //end Admin
}
?>