<?php

class data_alat_berat extends CI_Controller
{

	public function index()
	{
		$data['alat_berat'] = $this->Rental_model->get_data('alat_berat')->result();
		$data['type'] = $this->Rental_model->get_data('type')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_alat_berat', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_alat_berat()
	{
		$data['type'] = $this->Rental_model->get_data('type')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_alat_berat', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_alat_berat_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_alat_berat();
		} else {
			$kode_type				= $this->input->post('kode_type');
			$merk					= $this->input->post('merk');
			$status					= $this->input->post('status');
			$harga					= $this->input->post('harga');
			$denda					= $this->input->post('denda');
			$operator					= $this->input->post('operator');
			$BBM					= $this->input->post('BBM');
			$gambar					= $_FILES['gambar']['name'];
			if ($gambar = '') {
			} else {
				$config['upload_path']		= './assets/upload/';
				$config['allowed_types']	= 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo "Gambar Alat Berat Gagal Diupload";
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = array(
				'kode_type'			=> $kode_type,
				'merk'					=> $merk,
				'status'				=> $status,
				'harga'					=> $harga,
				'denda'					=> $denda,
				'operator'			=> $operator,
				'BBM'						=> $BBM,
				'gambar'		 		=> $gambar
			);

			$this->Rental_model->insert_data($data, 'alat_berat');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data Alat Berat Berhasil Ditambahkan.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('admin/data_alat_berat');
		}
	}

	public function update_alat_berat($id)
	{
		$where = array('id_alat_berat' => $id);
		// $data['ab'] = $this->db->query("SELECT * FROM alat_berat ab, type tp WHERE ab.kode_type =tp.kode_type AND ab.id_alat_berat='$id'")->row();
		$data['ab'] = $this->base->get_alat_berat(['id_alat_berat' => $id])->row();
		$data['type'] = $this->Rental_model->get_data('type')->result();
		$data['id'] = $id;

		// var_dump($data['alat_berat']);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_alat_berat', $data);
		$this->load->view('templates_admin/footer');
	}
	public function update_alat_berat_aksi($id)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update_alat_berat($id);
		} else {
			$id 						= $id;
			$kode_type			= $this->input->post('kode_type');
			$merk						= $this->input->post('merk');
			$stok					= $this->input->post('stok');
			$harga					= $this->input->post('harga');
			$denda					= $this->input->post('denda');
			$operator				= $this->input->post('operator');
			$BBM						= $this->input->post('BBM');
			$gambar					= $_FILES['gambar']['name'];
			if ($gambar) {
				$config['upload_path']		= './assets/upload/';
				$config['allowed_types']	= 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $gambar);
				} else {
					echo $this->upload->display_error();
				}
			}

			if ($stok != 0) {
				$status = '1';
			} else if ($stok == 0) {
				$status = '0';
			}

			$data = array(
				'kode_type'		=> $kode_type,
				'merk'				=> $merk,
				'stok'			=> $stok,
				'status'			=> $status,
				'harga'					=> $harga,
				'denda'					=> $denda,
				'operator'			=> $operator,
				'BBM'						=> $BBM
			);
			$where = array(
				'id_alat_berat' => $id
			);
			$this->Rental_model->update_data('alat_berat', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Alat Berat Berhasil Diupdate!!.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('admin/data_alat_berat');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_type', 'kode_type', 'required');
		$this->form_validation->set_rules('merk', 'merk', 'required');
		// $this->form_validation->set_rules('status', 'status', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');
		$this->form_validation->set_rules('denda', 'denda', 'required');
		$this->form_validation->set_rules('operator', 'operator', 'required');
		$this->form_validation->set_rules('BBM', 'BBM', 'required');
	}
	public function detail_alat_berat($id)
	{
		$data['detail'] = $this->Rental_model->ambil_id_alat_berat($id);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_alat_berat', $data);
		$this->load->view('templates_admin/footer');
	}

	public function delete_alat_berat($id)
	{
		$where = array('id_alat_berat' => $id);
		$this->Rental_model->delete_data($where, 'alat_berat');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Data Alat Berat Berhasil Dihapus!!.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
		redirect('admin/data_alat_berat');
	}
}
