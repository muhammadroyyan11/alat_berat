<?php 

class Transaksi extends CI_Controller{

	public function index()
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, alat_berat ab, customer cs WHERE tr.id_alat_berat=ab.id_alat_berat AND tr.id_customer=cs.id_customer")->result();
		
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_transaksi', $data);
        $this->load->view('templates_admin/footer');
	}
	public function pembayaran($id)
	{
		$where = array('id_sewa' => $id);
		$data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_sewa='$id'")->result();
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/konfirmasi_pembayaran', $data);
        $this->load->view('templates_admin/footer');
	}

	public function cek_pembayaran()
	{
		$id    				= $this->input->post('id_sewa');
		$status_pembayaran	= $this->input->post('status_pembayaran');

		$data = array(
			'status_pembayaran'  => $status_pembayaran
		);

		$where = array(
			'id_sewa'   => $id
		);

		$this->Rental_model->update_data('transaksi',$data,$where);
		redirect('admin/transaksi');

	}

	public function terima_transaksi($id)
	{
		$params = array(
			'status_pembayaran'		=> 'Pembayaran Diterima'
		);

		$where = array(
			'id_sewa'   => $id
		);

		$this->Rental_model->update_data('transaksi',$params,$where);
		redirect('admin/transaksi');
	}

	public function tolak_transaksi($id)
	{
		$params = array(
			'status_pembayaran'		=> 'Pembayaran Ditolak'
		);

		$where = array(
			'id_sewa'   => $id
		);

		$this->Rental_model->update_data('transaksi',$params,$where);
		redirect('admin/transaksi');
	}

	public function download_pembayaran($id)
	{
		$this->load->helper('download');
		$filePembayaran = $this->Rental_model->downloadPembayaran($id);
		$file = 'assets/upload/'.$filePembayaran['bukti_pembayaran'];
		force_download($file, NULL);
	}

	public function transaksi_selesai($id)
	{
		$where = array('id_sewa' => $id);
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_sewa='$id'")->result();
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaksi_selesai', $data);
        $this->load->view('templates_admin/footer');
	}

	public function transaksi_selesai_aksi()
	{
		$id 							= $this->input->post('id_sewa');
		$tanggal_pengembalian			= $this->input->post('tanggal_pengembalian');
		$status_sewa					= $this->input->post('status_sewa');
		$status_pengembalian 			= $this->input->post('status_pengembalian');
		$tanggal_kembali 				= $this->input->post('tanggal_kembali');
		$denda 							= $this->input->post('denda');

		$x 								= strtotime($tanggal_pengembalian);
		$y 								= strtotime($tanggal_kembali);
		$selisi 						= abs(($x - $y)/(60*60*24));
		$total_denda					= $selisi * $denda;


							 

		$data = array(
			'tanggal_pengembalian' 	=> $tanggal_pengembalian,
			'status_sewa'			=> $status_sewa,
			'status_pengembalian'	=> $status_pengembalian,
			'total_denda'			=> $total_denda
		);
		$where= array(
			'id_sewa'	=> $id
		);
		$this->Rental_model->update_data('transaksi',$data,$where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi Berhasil DiUpdate !!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('admin/transaksi');
	}
	public function batal_transaksi($id)
	{
		$where = array('id_sewa' => $id);
		$data = $this->Rental_model->get_where($where,'transaksi')->row();
		

		$where2 = array('id_alat_berat'=>$data->id_alat_berat);

		$data2 = array('status'=>'1');

		$this->Rental_model->update_data('alat_berat',$data2,$where2);
		$this->Rental_model->delete_data($where,'transaksi');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi Berhasil Di Batalkan !
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('admin/transaksi');
		
	}
}
