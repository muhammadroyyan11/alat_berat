<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Update Data Alat Berat</h1>
		</div>

		<div class="card">
			<div class="card-body">

					<form method="post" action="<?php echo base_url('admin/data_alat_berat/update_alat_berat_aksi/'.$id) ?>" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Type Alat Berat</label>
									<input type="hidden" name="id_alat_berat" value="<?php echo $id ?>">
									<select name="kode_type" class="form-control">
										<option value="<?php echo $ab->kode_type ?>"><?php echo $ab->kode_type ?></option>
										<?php foreach ($type as $tp) : ?>
											<option value="<?php echo $tp->kode_type ?>"><?php echo $tp->nama_type ?></option>
										<?php endforeach; ?>
									</select>
									<?php
									echo form_error('kode_type', '<div class="text-small text-danger">', '</div>') ?>
								</div>

								<div class="form-group">
									<label>Merk</label>
									<input type="text" name="merk" class="form-control" value="<?= $ab->merk ?>">
									<?php
									echo form_error('merk', '<div class="text-small text-danger">', '</div>') ?>
								</div>

								<div class="form-group">
									<label>Stok</label>
									<!-- <select name="status" class="form-control">
								<option <?php if ($ab->status == "1") {
											echo "selected='selected'";
										}
										echo $ab->status; ?> value="1" >Tersedia</option>
								<option <?php if ($ab->status == "0") {
											echo "selected='selected'";
										}
										echo $ab->status; ?> value="0" >Tidak Tersedia</option>
							</select> -->
									<input type="text" name="stok" class="form-control" value="<?php echo $ab->stok ?>">
									<?php
									echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
								</div>
								<div class="form-group">
									<label>Operator</label>
									<select name="operator" class="form-control">
										<option <?php if ($ab->operator == "1") {
													echo "selected='selected'";
												}
												echo $ab->operator; ?> value="1">Tersedia</option>
										<option <?php if ($ab->operator == "0") {
													echo "selected='selected'";
												}
												echo $ab->operator; ?> value="0">Tidak Tersedia</option>
									</select>
									<?php
									echo form_error('operator', '<div class="text-small text-danger">', '</div>') ?>
								</div>

								<div class="form-group">
									<label>BBM</label>
									<select name="BBM" class="form-control">
										<option <?php if ($ab->BBM == "1") {
													echo "selected='selected'";
												}
												echo $ab->BBM; ?> value="1">Tersedia</option>
										<option <?php if ($ab->BBM == "0") {
													echo "selected='selected'";
												}
												echo $ab->BBM; ?> value="0">Tidak Tersedia</option>
									</select>
									<?php
									echo form_error('BBM', '<div class="text-small text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label>Harga Sewa</label>
									<input type="number" name="harga" class="form-control" value="<?php echo $ab->harga ?>">
									<?php
									echo form_error('harga', '<div class="text-small text-danger">', '</div>') ?>
								</div>

								<div class="form-group">
									<label>Denda</label>
									<input type="number" name="denda" class="form-control" value="<?php echo $ab->denda ?>">
									<?php
									echo form_error('denda', '<div class="text-small text-danger">', '</div>') ?>
								</div>

								<div class="form-group">
									<label>Gambar</label>
									<input type="file" name="gambar" class="form-control">
									<?php
									echo form_error('gambar', '<div class="text-small text-danger">', '</div>') ?>
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