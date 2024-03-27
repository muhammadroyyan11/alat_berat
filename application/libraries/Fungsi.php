<?php

class Fungsi
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function count_user()
    {
        $this->ci->load->model('Base_model', 'base');
        return $this->ci->base->get('customer')->num_rows();
    }

    public function count_alat_berat()
    {
        $this->ci->load->model('Base_model', 'base');
        return $this->ci->base->get('alat_berat')->num_rows();
    }

    public function count_trx()
    {
        $this->ci->load->model('Base_model', 'base');
        return $this->ci->base->get('transaksi')->num_rows();
    }
}