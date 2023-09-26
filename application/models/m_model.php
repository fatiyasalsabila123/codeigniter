<?php
class M_model extends CI_Model
{

    // Fungsi untuk mengambil semua data dari tabel
    function get_data($table)
    {
        return $this->db->get($table);
    }

    // Fungsi untuk mengambil data siswa beserta informasi kelas yang berelasi
    public function get_siswa()
    {
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
    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function delete($table, $field, $id)
    {
        $data = $this->db->delete($table, array($field => $id));
        return $data;
    }

    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function get_by_id($table, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($table);
        return $data;
    }

    public function ubah_data($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function getAdminData($id)
    {
        // Mengambil data admin dari database berdasarkan ID admin
        $this->db->where('id', $id);
        $query = $this->db->get('admin');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function login($post) {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password'])); // Menggunakan sha1 untuk password
        $query = $this->db->get();
    
        if ($query->num_rows() == 1) { // Periksa apakah ada hasil yang sesuai
            return $query->row(); // Mengembalikan objek admin
        } else {
            return false; // Jika tidak ada hasil yang sesuai
        }
    }
    
    public function get($id = null) {
        $this->db->from('admin');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query; // Tidak perlu row() di sini
    }
    
    

}
?>