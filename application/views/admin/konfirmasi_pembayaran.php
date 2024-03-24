<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Konfirmasi Pembayaran</h1>
		</div>

		<center class="card" style="width: 85%">
			<div class="card-header">
				Konfirmasi Pembayaran
			</div>
			<div class="card-body">
				<form method="post" action="<?php echo base_url('admin/transaksi/cek_pembayaran') ?>">
					<?php foreach ($pembayaran as $pmb) : ?>

						<a class="btn btn-sm btn-success"
						   href="<?php echo base_url('admin/transaksi/download_pembayaran/' . $pmb->id_sewa) ?>"><i
								class="fas fa-download"></i>Download Bukti Pembayaran</a>

						<div class="custom-control custom-switch ml-5">
							<input type="hidden" class="custom-control-input" value="<?php echo $pmb->id_sewa ?>"
								   name="id_sewa">
							<input type="checkbox" class="custom-control-input" id="customSwitch1" value="1"
								   name="status_pembayaran">
							<!--				  <label class="custom-control-label" for="customSwitch1">Terima Pembayaran</label>-->
							<a class="btn btn-sm btn-success mr-2"
							   href="<?php echo base_url('admin/transaksi/terima_transaksi/'.$pmb->id_sewa) ?>"><i
									class="fas fa-check"></i> Terima</a>
							<a class="btn btn-sm btn-danger"
							   href="<?php echo base_url('admin/transaksi/tolak_transaksi/'.$pmb->id_sewa) ?>"><i
									class="fas fa-times"></i> Tolak</a>
						</div>
						<hr>


					<?php endforeach; ?>
			</div>
		</center>
	</section>
</div>
