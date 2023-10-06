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

    public function login($post)
    {
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

    public function get($id = null)
    {
        $this->db->from('admin');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query; // Tidak perlu row() di sini
    }

    public function get_all_admin()
    {
        // Ambil semua data admin
        return $this->db->get('admin')->result();
    }


    //get guru
    public function get_guru()
    {
        //memilih kolom yang akan diambil dari tabel guru
        $this->db->select('guru.*, mapel.nama_mapel');

        // mengatur submber data untuk query dari tabel guru 
        $this->db->from('guru');

        //menggunkan metode join untuk menggabungkan tabel guru dengn tabel kelas
        // berdasarkan kolom "id_mapel" yang ada di kedua tabel
        // "left" mengidikasikan jenis join yang digunakan (left join)
        $this->db->join('mapel', 'guru.id_mapel = mapel.id', 'left');
        $this->db->join('kelas', 'kelas.id_guru_walikelas = guru.id', 'left');

        //menjalankan query
        $query = $this->db->get();

        //mengembalikan hasil query dalam bentuk objek
        return $query->result();
    }

    // get data pembayaran
    public function get_pembayaran()
    {
        $this->db->select('pembayaran.*, siswa.nama_siswa');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'pembayaran.id_siswa = siswa.id_siswa', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    //get data kelas 
    public function get_kelas()
    {
        $this->db->select('kelas.*, sekolah.nama_sekolah, guru.nama_guru');
        $this->db->from('kelas');
        $this->db->join('sekolah', 'kelas.id_sekolah = sekolah.id', 'left');
        $this->db->join('guru', 'kelas.id_guru_walikelas = guru.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    //get data alokasi mapel 
    public function get_alokasi_mapel()
    {
        $this->db->select('alokasi_mapel.*, mapel.nama_mapel, kelas.tingkat_kelas, kelas.jurusan_kelas');
        $this->db->from('alokasi_mapel');
        $this->db->join('mapel', 'alokasi_mapel.id_mapel = mapel.id', 'left');
        $this->db->join('kelas', 'alokasi_mapel.id_kelas = kelas.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    //get siswa foto by id
    public function get_siswa_foto_by_id($id_siswa)
    {
        $this->db->select('foto');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->foto;
        } else {
            return false;
        }
    }

    public function get_by_nisn($nisn)
    {
        $this->db->select('id_siswa');
        $this->db->from('siswa');
        $this->db->where('nisn', $nisn);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->id_siswa;
        } else {
            return false;
        }
    }

    public function get_by_kelas($tingkat_kelas)
    {
        $this->db->select('id');
        $this->db->from('kelas');
        $this->db->where('tingkat_kelas', $tingkat_kelas);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->id;
        } else {
            return false;
        }
    }

}
?>