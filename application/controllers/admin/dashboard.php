<?php 

class Dashboard extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }
}

?>