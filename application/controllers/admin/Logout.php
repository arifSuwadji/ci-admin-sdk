<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('admin/ModelPengguna');
    }

    public function index(){
        $this->db->where('pengguna', $this->session->userdata['adminManajemen']['pengguna_id']);
        $sess_data = array(
            'pengguna_id' => '',
            'nama_pengguna' => '',
        );
        $this->session->unset_userdata('adminManajemen', $sess_data);
        redirect(base_url().'admin');
    }
}
?>