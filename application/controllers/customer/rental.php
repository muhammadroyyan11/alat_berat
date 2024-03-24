<?php

class Rental extends CI_Controller
{
	public function tambah_rental($id)
	{
		$data['detail'] = $this->Rental_model->ambil_id_alat_berat($id);

		$this->load->view('templates_customer/header');
		$this->load->view('customer/tambah_rental', $data);
		$this->load->view('templates_customer/footer');
	}

	public function tambah_rental_aksi()
	{

		$id_customer		= $this->session->userdata('id_customer');
		$id_alat_berat 		= $this->input->post('id_alat_berat');
		$tanggal_sewa 		= $this->input->post('tanggal_sewa');
		$tanggal_kembali	= $this->input->post('tanggal_kembali');
		$denda				= $this->input->post('denda');
		$harga 				= $this->input->post('harga');
		$stok 				= $this->input->post('stok_sewa');
		$current_stok 		= $this->input->post('sisa_stok');

		$startDate = new DateTime($tanggal_sewa);
		$endDate = new DateTime($tanggal_kembali);
		$interval = $startDate->diff($endDate);
		$days = $interval->days;

		$harga_total_unit   = $harga * $stok;

		$total = $harga_total_unit * $days;

		$data = array(

			'id_customer'			=> $id_customer,
			'id_alat_berat'			=> $id_alat_berat,
			'tanggal_sewa'			=> $tanggal_sewa,
			'tanggal_kembali'		=> $tanggal_kembali,
			'denda'					=> $denda,
			'harga'					=> $total,
			'stok_sewa'				=> $stok,
			'tanggal_pengembalian'	=> '-',
			'status_sewa'			=> 'Belum Selesai',
			'status_pengembalian'	=> 'Belum Kembali',
			'total_denda'		    => '0'
		);

		$this->Rental_model->insert_data($data, 'transaksi');

		$new_stok = $current_stok - $stok;

		if ($new_stok == 0) {
			$status = '0';
		} else {
			$status = '1';
		}

		$params = [
			'stok' 	=> $new_stok,
			'status'	=> $status
		];

		$this->base->edit('alat_berat', $params, ['id_alat_berat' => $id_alat_berat]);

		if ($this->db->affected_rows > 0) {
			$this->Rental_model->update_data('alat_berat', $status, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			transaksi Sewa Berhasil, Silakan checkout!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		}

		// $id = array(
		// 	'id_alat_berat' => $id_alat_berat
		// );


		redirect('customer/data_alat_berat');
	}
}
