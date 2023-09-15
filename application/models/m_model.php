<?php 
    class M_model extends CI_Model {
        
        // Fungsi untuk mengambil semua data dari tabel
        function get_data($table) {
            return $this->db->get($table);
        }

        // Fungsi untuk mengambil data siswa beserta informasi kelas yang berelasi
        public function get_siswa() {
            // Memilih kolom yang akan diambil dari tabel siswa
            $this->db->select('siswa.*, kelas.tingkat_kelas, kelas.jurusan_kelas');
            
            // Mengatur sumber data untuk query dari tabel siswa
            $this->db->from('siswa');
            
            // Menggunakan metode join untuk menggabungkan tabel siswa dengan tabel kelas
            // Berdasarkan kolom "id_kelas" yang ada di kedua tabel
            // 'left' mengindikasikan jenis join yang digunakan (left join)
            $this->db->join('kelas', 'siswa.id_kelas = kelas.id', 'left');
            // $this->db->join('sekolah', 'kelas.id_sekolah = sekolah.id', 'left');
            
            // Menjalankan query
            $query = $this->db->get();
            
            // Mengembalikan hasil query dalam bentuk array objek
            return $query->result();
        }
        

        // Fungsi untuk mengambil data dari tabel berdasarkan kondisi tertentu
        function getwhere($table, $data) {
            return $this->db->get_where($table, $data);
        }

        public function delete($table, $field, $id) {
            $data=$this->db->delete($table, array($field => $id));
            return $data;
        }

        public function tambah_data($table, $data) {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
    }
?>
