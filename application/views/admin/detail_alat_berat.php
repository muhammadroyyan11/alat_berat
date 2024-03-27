<div class="main-content mt-10">
	<section class="section">
		<div class="section-header">
			<h1>Detail Alat Berat</h1>
		</div>
	</section>
	<?php foreach ($detail as $dt) : ?>
		<div class="card">
			<div class="card-body">

				<div class="row">
					<div class="col-md-5">
						<img width="400px" src="<?php echo base_url() . 'assets/upload/' . $dt->gambar ?>">
					</div>
					<div class="col-md-7">
						<table class="table">
							<tr>
								<td>Type Alat Berat :</td>
								<td>
									<?= $dt->kode_type ?>
								</td>
							</tr>
							<tr>
								<td>Merk :</td>
								<td><?php echo $dt->merk ?></td>
							</tr>
							<tr>
								<td>Harga :</td>
								<td>Rp. <?php echo number_format($dt->harga, 0, ',', ',') ?></td>
							</tr>
							<tr>
								<td>Denda :</td>
								<td>Rp. <?php echo number_format($dt->denda, 0, ',', ',') ?></td>
							</tr>

							<tr>
								<td>Stok :</td>
								<td>Rp. <?php echo $dt->stok ?></td>
							</tr>
							<tr>
								<td>BBM :</td>
								<td>
									<?php
									if ($dt->BBM == "0") {
										echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
									} else {
										echo "<span class='badge badge-primary'> Tersedia</span>";
									}
									?>
								</td>
							</tr>
							<tr>
								<td>operator :</td>
								<td>
									<?php
									if ($dt->operator == "0") {
										echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
									} else {
										echo "<span class='badge badge-primary'> Tersedia</span>";
									}
									?>
								</td>
							</tr>
							<tr>
								<td>Status :</td>
								<td>
									<?php
									if ($dt->status == "0") {
										echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
									} else {
										echo "<span class='badge badge-primary'> Tersedia</span>";
									}
									?>
								</td>
							</tr>

						</table>
						<a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('admin/data_alat_berat') ?>">Kembali</a>

						<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/data_alat_berat/update_alat_berat/' . $dt->id_alat_berat) ?>">Update</a>
					</div>
				</div>
			</div>
		</div>

	<?php endforeach; ?>
</div>