<?php

class Rental_model extends CI_model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function ambil_id_alat_berat($id)
    {
        $hasil = $this->db->where('id_alat_berat', $id)->get('alat_berat');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function cek_login($username,$password,$table)
    {

        $result = $this->db
            ->where('username', $username)
            ->where('password', $password)
            ->limit(1)
            ->get($table);

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function update_password($where, $data, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function caridataalatberat()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('merk', $keyword);

        return $this->db->get('alat_berat')->result_array();
    }

    public function downloadPembayaran($id)
    {
        $query = $this->db->get_where('transaksi', array('id_sewa' => $id));
        return $query->row_array();
    }

    public function get_all()
    {

        $this->db->select('transaksi.*, customer.nama, alat_berat.merk');
        $this->db->join('customer', 'customer.id_customer = transaksi.id_customer');
        $this->db->join('alat_berat', 'alat_berat.id_alat_berat = transaksi.id_alat_berat');
        $query = $this->db->get('transaksi');

        // https://www.codeigniter.com/user_guide/database/results.html
        return $query->result_array();
    }

    public function getalatberat($id = null)
    {
        if ($id == null) {
            return $this->db->get('alat_berat')->result_array();
        } else {
            return $this->db->get_where('alat_berat', ['id_alat_berat' => $id])->result_array();
        }
    }

    public function delete_alat_berat($id)
    {
        $this->db->delete('alat_berat', ['id_alat_berat' => $id]);
        return $this->db->affected_rows();
    }

    public function createalatberat($data)
    {
        $this->db->insert('alat_berat', $data);
        return $this->db->affected_rows();
    }

    public function updateAlatberat($data, $id)
    {
        $this->db->update('alat_berat', $data, ['alat_berat' => $id]);
        return $this->db->affected_rows();
    }


    //batassss////

    public function getType($id = null)
    {
        if ($id == null) {
            return $this->db->get('type')->result_array();
        } else {
            return $this->db->get_where('type', ['id_type' => $id])->result_array();
        }
    }

    public function deleteType($id)
    {
        $this->db->delete('type', ['id_type' => $id]);
        return $this->db->affected_rows();
    }

    public function createType($data)
    {
        $this->db->insert('type', $data);
        return $this->db->affected_rows();
    }

    public function updateType($data, $id)
    {
        $this->db->update('type', $data, ['id_type' => $id]);
        return $this->db->affected_rows();
    }
}
