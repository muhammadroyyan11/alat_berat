<?php 

class Dashboard extends CI_Controller{

    public function index()
    {
        $data = [
            'alat_berat'        => $this->Rental_model->get_data('alat_berat')->result(),
            'notification'     => $this->base->get_notification()->result_array()
        ];

        $this->load->view('templates_customer/header');
        $this->load->view('customer/dashboard',$data);
        $this->load->view('templates_customer/footer');
    }
    public function detail_alat_berat($id)
    {
        $data['detail'] = $this->Rental_model->ambil_id_alat_berat($id);
        $this->load->view('templates_customer/header');
        $this->load->view('customer/detail_alat_berat',$data);
        $this->load->view('templates_customer/footer');
    }
}

?>