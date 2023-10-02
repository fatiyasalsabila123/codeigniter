<?php
// untuk menampilkan semua data kelas berdasarkan isi data kolom yang ingin di tampilkan
function tampil_full_kelas_byid($id)
{
    $ci = &get_instance();
    $ci->load->database(); //untuk mengelola database
    $result = $ci->db->where('id', $id)->get('kelas'); //mencari di mana kolom id dari tabel kelas
    foreach ($result->result() as $c) {
        $stmt = $c->tingkat_kelas . ' ' . $c->jurusan_kelas;
        return $stmt;
    }
}

//untuk menampilkam data mapel berdasarkan data kolom yang ingin ditampilkan
function get_all_mapel($id)
{
    $sc = &get_instance();
    $sc->load->database(); //untuk mangelola data base
    $result = $sc->db->where('id', $id)->get('mapel'); // mencari di mana kolom id dari tabel mapel
    foreach ($result->result() as $data) {
        $stmt = $data->nama_mapel;
        return $stmt;
    }
}

//untuk menampilkan data siswa berdasarkan data kolom yang ingin di tampilkan
function get_all_siswa($id)
{
    $ci = &get_instance();
    $ci->load->database();//untuk mengelola database
    $result = $ci->db->where('id_siswa', $id)->get('siswa');// mencari dimana kolom id dari data siswa
    foreach ($result->result() as $row) {
        $stmt = $row->nama_siswa;
        return $stmt;
    }
}

//untuk meanmpilkan data sekolah berdasarkan data kolom yang ingin ditalpilkan
function get_all_sekolah($id)
{
    $ci = &get_instance();
    $ci->load->database();// untuk mengelola database
    $result = $ci->db->where('id_sekolah', $id)->get('sekolah');// mencari dimana kolomn id dari tabel sekolah
    foreach ($result->result() as $row) {
        $stmt = $row->nama_sekolah;
        return $stmt;
    }
}

//untuk menampilkan data guru berdasarkan data kolom yang ingin ditampilkan 
function get_all_wali_kelas($id) {
    $ci = &get_instance();
    $ci->load->database();//untuk mengelola database
    $result = $ci->db->where('id_guru_wali_kelas', $id)->get('guru');// mencari dimana kolom id dari tabel guru
    foreach ($result->result as $row) {
        $stmt = $row->nama_guru;
        return $stmt;
    }
} 

// agar menjadi rupiah 
function convRupiah($value)
{
    return 'Rp. ' . number_format($value);
}

?>