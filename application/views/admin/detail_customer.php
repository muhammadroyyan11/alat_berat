<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1> Update Data Customer</h1>
		</div>
	</section>

	<?php foreach ($customer as $cs): ?>

		<div class="form-group">
			<label>Nama</label>
			<input type="hidden" name="id_customer" value="<?php echo $cs->id_customer ?>">
			<input type="text" name="nama" class="form-control" value="<?php echo $cs->nama ?>" readonly>
			<?php echo form_error('nama', '<span class="text-small text-danger">', '</span>') ?>
		</div>

		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" value="<?php echo $cs->username ?>" readonly>
			<?php echo form_error('username', '<span class="text-small text-danger">', '</span>') ?>
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?php echo $cs->alamat ?>" readonly>
			<?php echo form_error('alamat', '<span class="text-small text-danger">', '</span>') ?>
		</div>

		<div class="form-group">
			<label>Gender</label>
			<input type="text" name="no_telpon" class="form-control" value="<?php echo $cs->gender ?>" readonly>
			<?php echo form_error('gender', '<span class="text-small text-danger">', '</span>') ?>
		</div>

		<div class="form-group">
			<label>No. Telpon</label>
			<input type="text" name="no_telpon" class="form-control" value="<?php echo $cs->no_telpon ?>" readonly>
			<?php echo form_error('no_telpon', '<span class="text-small text-danger">', '</span>') ?>
		</div>

		<div class="form-group">
			<label>No. KTP</label>
			<input type="text" name="no_ktp" class="form-control" value="<?php echo $cs->no_ktp ?>" readonly>
			<?php echo form_error('no_ktp', '<span class="text-small text-danger">', '</span>') ?>
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" value="<?php echo $cs->password ?>" readonly>
			<?php echo form_error('password', '<span class="text-small text-danger">', '</span>') ?>
		</div>
		<a href="<?= site_url('admin/data_customer') ?>" type="reset" class="btn btn-sm btn-danger" style="margin-bottom: 100px">Back</a>


	<?php endforeach; ?>
</div>
