<?php 
    function tampil_full_kelas_byid($id) {
        $ci= & get_instance();
        $ci->load->database(); //untuk mengelola database
        $result = $ci->db->where('id', $id)->get('kelas'); //mencari di mana kolom id dari tabel kelas
        foreach ($result->result() as $c) {
            $stmt = $c->tingkat_kelas. ' '.$c->jurusan_kelas;
            return $stmt;
        }
    }
?>