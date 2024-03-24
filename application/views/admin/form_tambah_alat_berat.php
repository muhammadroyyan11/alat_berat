<div class="main-content">
	<section class= "section">
		<div class="section-header">
			<h1>Form Input Data Alat Berat</h1>
		</div>

		<div class="card">
			<div class="card-body">

				<form method="post" action="<?php echo base_url('admin/data_alat_berat/tambah_alat_berat_aksi') ?>" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Type Alat Berat</label>
							<select name="kode_type" class="form-control">
								<option value="">--Pilih Type Alat Berat--</option>
								<?php foreach($type as $tp) : ?>
									<option value="<?php echo $tp->kode_type ?>"><?php echo $tp->nama_type ?></option>
								<?php endforeach; ?>
							</select>
							<?php 
							echo form_error('kode_type','<div class="text-small text-danger">','</div>') ?>
						</div>

						<div class="form-group">
							<label>Merk</label>
							<input type="text" name="merk" class="form-control">
							<?php 
							echo form_error('merk','<div class="text-small text-danger">','</div>' ) ?>
						</div>


						<div class="form-group">
							<label>Status</label>
							<select name="status" class="form-control">
								<option value="">---Pilih Status--</option>
								<option value="1">Tersedia</option>
								<option value="0"> Tidak Tersedia</option>
							</select>
							<?php 
							echo form_error('status','<div class="text-small text-danger">','</div>' ) ?>
						</div>

						<div class="form-group">
							<label>Operator</label>
							<select name="operator" class="form-control">
								<option value="1">Tersedia</option>
								<option value="0"> Tidak Tersedia</option>
								<?php echo form_error('operator','<div class="text-small text-danger">','</div>' ) ?>
							</select>
							</div>
						</div>

							<div class="col-md-6">

						<div class="form-group">
							<label>Bahan Bakar</label>
							<select name="BBM" class="form-control">
								<option value="1">Tersedia</option>
								<option value="0"> Tidak Tersedia</option>
								<?php echo form_error('BBM','<div class="text-small text-danger">','</div>' ) ?>
							</select>
						</div>

						<div class="form-group">
							<label>Harga Sewa</label>
							<input type="number" name="harga" class="form-control">
							<?php 
							echo form_error('harga','<div class="text-small text-danger">','</div>' ) ?>
						</div>

						<div class="form-group">
							<label>Denda</label>
							<input type="number" name="denda" class="form-control">
							<?php 
							echo form_error('denda','<div class="text-small text-danger">','</div>' ) ?>
						</div>

						<div class="form-group">
							<label>Gambar</label>
							<input type="file" name="gambar" class="form-control">
							<?php 
							echo form_error('gambar','<div class="text-small text-danger">','</div>' ) ?>
						</div>
						<button type="submit" class="btn btn-primary mt-4">Simpan</button>
						<button type="reset" class="btn btn-danger mt-4">Reset</button>
					</div>
				</div>
			</form>   
			</div>
		</div>
</section>
</div>