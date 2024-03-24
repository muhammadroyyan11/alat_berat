<?php 


class About extends CI_Controller {

    public function index()
        
    {  
        
        $this->load->view('templates_customer/header');
        $this->load->view('customer/About');
        $this->load->view('templates_customer/footer');

    }

}


?>
