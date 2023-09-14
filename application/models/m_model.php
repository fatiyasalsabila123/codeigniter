<?php 
    class M_model extends CI_Model {
        function get_data($table) {
            return $this->db->get($table);
        }
       public function get_siswa() {
        $query = $this->db->get("siswa");
        return $query->result();
        }

        function getwhere($table, $data) {
            return $this->db->get_where($table, $data);
        }
    }
?>