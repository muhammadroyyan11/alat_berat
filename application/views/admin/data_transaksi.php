<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Transaksi</h1>
		</div>
		<span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan') ?></span>
		<table class="table table-responsive table-bolder table-striped">

			<tr>
				<th>No</th>
				<th>Customer</th>
				<th>Alat Berat</th>
				<th>Tgl. Sewa</th>
				<th>Tgl. Kembali</th>
				<th>Harga/Hari</th>
				<th>Denda/Hari</th>
				<td>Total Denda</td>
				<th>Tgl. Dikembalikan</th>
				<th>Status Pengembalian</th>
				<th>Status Sewa</th>
				<th>Cek Pembayaran</th>
				<th>Action</th>
			</tr>

			<?php $no = 1;
			foreach ($transaksi as $tr) : ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $tr->nama ?></td>
					<td><?php echo $tr->merk ?></td>
					<td><?php echo date('d/m/Y', strtotime($tr->tanggal_sewa));  ?></td>
					<td><?php echo date('d/m/Y', strtotime($tr->tanggal_kembali));  ?></td>
					<td>Rp. <?php echo number_format($tr->harga, 0, ',', '.') ?></td>
					<td>Rp. <?php echo number_format($tr->denda, 0, ',', '.') ?></td>
					<td>Rp. <?php echo number_format($tr->total_denda, 0, ',', '.') ?></td>

					<td>
						<?php
						if ($tr->tanggal_pengembalian == "0000-00-00") {
							echo "-";
						} else {
							echo date('d/m/Y', strtotime($tr->tanggal_pengembalian));
						}
						?>
					</td>

					<td>
						<?php
						echo $tr->status_pengembalian ?>

					</td>

					<td>
						<?php echo $tr->status_sewa ?>

					</td>

					<td>
						<center>
							<?php
							if (empty($tr->bukti_pembayaran)) { ?>
								<button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>.
							<?php } else { ?>
								<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/transaksi/pembayaran/' . $tr->id_sewa) ?>"><i class="fas fa-check-circle"></i></a><br>
								Diterima
							<?php } ?>
						</center>
					</td>

					<td>
						<!-- <?php
						if ($tr->status == "1") {
							echo "-";
						} else { ?>

							<div class="row">
								<a class="btn btn-sm btn-success mr-2" href="<?php echo base_url('admin/transaksi/transaksi_selesai/' . $tr->id_sewa) ?>"><i class="fas fa-check"></i> Terima</a>
								<a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/transaksi/batal_transaksi/' . $tr->id_sewa) ?>"><i class="fas fa-times"></i></a>
							</div>

						<?php } ?> -->

						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							p
						</button>

					</td>

				</tr>

			<?php endforeach; ?>

		</table>
	</section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengembalian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>