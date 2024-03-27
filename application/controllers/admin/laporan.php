<?php

class Laporan extends CI_Controller
{

	public function index()
	{
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		$this->_rules();
		if ($this->form_validation->run() === FALSE) {

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/filter_laporan');
			$this->load->view('templates_admin/footer');
		} else {
			$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, alat_berat ab, customer cs WHERE tr.id_alat_berat=ab.id_alat_berat AND tr.id_customer=cs.id_customer AND date(tanggal_sewa)>= '$dari' AND  date(tanggal_sewa)<= '$sampai'")->result();

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/tampilkan_laporan', $data);
			$this->load->view('templates_admin/footer');
		}
	}

	public function print_laporan()
	{
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');
		$data['title'] = "Print Laporan Transaksi";
		$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, alat_berat ab, customer cs WHERE tr.id_alat_berat=ab.id_alat_berat AND tr.id_customer=cs.id_customer AND date(tanggal_sewa)>= '$dari' AND  date(tanggal_sewa)<= '$sampai'")->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('admin/print_laporan', $data);
	}

	public function _rules()
	{

		$this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
		$this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');
	}


	public function cetak()
	{
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');

		var_dump($dari);

		$input = $this->input->post(null, true);
		// $table = $input['transaksi'];
		$tanggal = $dari . ' - ' . $sampai;
		$pecah = explode(' - ', $tanggal);
		$dateMasuk = new DateTime();
		$dateKeluar = new DateTime();
		$mulai = $dari;
		$akhir = $sampai;

		// $query = '';
		// if ($table == 'pemasukan') {
		// 	// $query = $this->base->getBarangMasuk(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
		// 	$query = $this->base_model->joinCategory2('id', array('mutation' => 'masuk'), ['mulai' => $mulai, 'akhir' => $akhir]);

		// 	$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, alat_berat ab, customer cs WHERE tr.id_alat_berat=ab.id_alat_berat AND tr.id_customer=cs.id_customer AND date(tanggal_sewa)>= '$dari' AND  date(tanggal_sewa)<= '$sampai'")->result();
		// 	//$data['categori'] = $this->base_model->get('categori');
		// } else {
		// 	$query = $this->base_model->joinCategory2('id', array('mutation' => 'keluar'), ['mulai' => $mulai, 'akhir' => $akhir]);
		// }
		$query = $this->db->query("SELECT * FROM transaksi tr, alat_berat ab, customer cs WHERE tr.id_alat_berat=ab.id_alat_berat AND tr.id_customer=cs.id_customer AND date(tanggal_sewa)>= '$dari' AND  date(tanggal_sewa)<= '$sampai'")->result();
		$dateMasuk = new DateTime($mulai);
		$dateKeluar = new DateTime($akhir);
		$newMulai = $dateMasuk->format('d F Y');
		$newKeluar = $dateKeluar->format('d F Y');
		$this->_cetak($query, $tanggal, $newKeluar, $newMulai);

		// print_r($query);
	}

	private function _cetak($data, $tanggal, $newKeluar, $newMulai)
	{


		$this->load->library('CustomPDF');
		// $table = $table_ == 'pemasukan' ? 'Pemasukan' : 'Pengeluaran';
		// $dateMasuk = new DateTime($tanggal);

		error_reporting(0);

		$pdf = new FPDF();
		$pdf->AddPage('P', 'A4');
		$pdf->SetFont('Times', 'B', 16);
		$pdf->Cell(190, 7, 'Laporan Transaksi', 0, 1, 'C');
		$pdf->Ln();

		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(25, 7, 'Tanggal', 0, 0, 'L');
		$pdf->Cell(3, 7, ':', 0, 0, 'L');
		$pdf->Cell(60, 7, $newMulai . ' - ' . $newKeluar, 0, 1, 'L');
		// $pdf->Ln();
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(25, 7, 'Nama User', 0, 0, 'L');
		$pdf->Cell(3, 7, ':', 0, 0, 'L');
		$pdf->Cell(60, 7, userdata('nama'), 0, 0, 'L');
		$pdf->Ln(10);
		$pdf->SetFont('Times', 'B', 11);

		$pdf->Cell(10, 7, 'No.', 1, 0, 'C');
		$pdf->Cell(55, 7, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Kategori', 1, 0, 'C');
		$pdf->Cell(55, 7, 'Tanggal Masuk', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Nominal', 1, 0, 'C');
		$pdf->Ln();

		
		// 	$no = 1;
		// 	foreach ($data as $d) {
		// 		$dateMasuk = new DateTime($d['date']);
		// 		if (userdata('id_user') == $d['id_user']) :
		// 			$pdf->SetFont('Times', '', 11);
		// 			$pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
		// 			$pdf->Cell(55, 7, $d['description'], 1, 0, 'C');
		// 			$pdf->Cell(35, 7, $d['nama_categori'], 1, 0, 'C');
		// 			$pdf->Cell(55, 7, $dateMasuk->format('d F Y'), 1, 0, 'L');
		// 			$pdf->Cell(40, 7, $d['amount'], 1, 0, 'R');
		// 			$pdf->Ln();
		// 		endif;
		// 	}

		$pdf->SetFont('Times', 'B', 11);
		$pdf->Cell(155, 7, 'Total   ', 0, 0, 'R');
		$pdf->Cell(40, 7, 'Rp . ' . number_format($subtotal), 1, 0, 'R');
		$pdf->Ln();

		$file_name = userdata('nama') . ' ' . $table . '-' . $tanggal;
		$pdf->Output('I', $file_name);
	}
}
