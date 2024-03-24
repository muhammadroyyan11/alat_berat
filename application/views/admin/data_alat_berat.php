<div class="main-content">
	<section class= "section">
		<div class="section-header">
			<h1>Data Alat Berat</h1>
		</div>

		<a href="<?php echo base_url('admin/data_alat_berat/tambah_alat_berat')?>" class="btn btn-primary mb-3">Tambah Data</a>
		
		<?php echo $this->session->flashdata('pesan')?>

		<table class="table table-hover table-striped table-border">
		<thead>
			<tr>
				<th>NO</th>
				<th>Gambar</th>
				<th>Type</th>
				<th>Merk</th>
				<th>Stok</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead> 
		<tbody> 
			<?php
			$no=1;
			foreach ($alat_berat as $ab) :?>
				<tr>
					<td><?php echo $no++ ?></td>
						<td>
							<img width="200px" src="<?php echo base_url().'assets/upload/'.$ab->gambar?> ">
						</td>
						<td><?php echo $ab->kode_type ?></td>
						<td><?php echo $ab->merk ?></td>
						<td><?php echo $ab->stok ?></td>
						<td><?php 
						if ($ab->status =="0"){
							echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
						}else {
							echo "<span class='badge badge-primary'> Tersedia </span>";
						}


						 ?></td>
						 <td>
						 	<a href="<?php echo base_url('admin/data_alat_berat/detail_alat_berat/').$ab->id_alat_berat ?>"class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
						 	<a href="<?php echo base_url('admin/data_alat_berat/delete_alat_berat/').$ab->id_alat_berat ?>"class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
						 	<a href="<?php echo base_url('admin/data_alat_berat/update_alat_berat/').$ab->id_alat_berat ?>"class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
						 </td>
				 </tr>
	  	<?php endforeach; ?>
		</tbody>
		</table>
	</section>
</div>