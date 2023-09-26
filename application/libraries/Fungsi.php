<?php 
Class Fungsi {
    protected $ci;

    function __construct() {
        $this->ci =& get_instance();
    }
    

    function admin_login() {
        $this->ci->load->model('m_model');
        $admin_id = $this->ci->session->userdata('id');
        $admin_data = $this->ci->m_model->get($admin_id)->row();
        return $admin_data;
    }
}
?>