<div class="container">
	
	<div class="card" style="margin-top: 200px; margin-bottom: 50px;">
		<div class="card-header">
			Form Sewa Alat Berat
		</div>
		<div class="card-body">
			<?php foreach($detail as $dt) : ?>


				<form method="post" action="<?php echo base_url('customer/rental/tambah_rental_aksi') ?>">
					
					
					<div class="form-group">
						<label> Harga Sewa/Hari</label>
						<input type="hidden" name="id_alat_berat" value="<?php echo $dt->id_alat_berat ?>">
						<input type="text" name="harga" class="form-control" value="<?php echo $dt->harga ?>"readonly>
					</div>

					<div class="form-group">
						<label> Denda/Hari</label>
						<input type="text" name="denda" class="form-control" value="<?php echo $dt->denda ?>"readonly>
					</div>

					<div class="form-group">
						<label> Stock Tersedia</label>
						<input type="text" name="sisa_stok" class="form-control" value="<?php echo $dt->stok ?>"readonly>
					</div>

					<div class="form-group">
						<label> Stock Disewa</label>
						<input type="number" name="stok_sewa" class="form-control"  min="0" max="<?= $dt->stok?>">
					</div>

					<div class="form-group">
						<label> Tanggal Sewa</label>
						<input type="date" name="tanggal_sewa" class="form-control">
					</div> 

					<div class="form-group">
						<label> Tanggal kembali</label>
						<input type="date" name="tanggal_kembali" class="form-control">
					</div> 

					<button type="submit" class="btn btn-warning">Sewa</button>
				</form>
			<?php endforeach ?>
		</div>
		
	</div>
</div>
