<div class="container">
	
	<div class="card">
		<div class="card-body">
			<?php foreach ($detail as $dt) : ?>
				<div class="row">
					<div class="col-md-7">
						
						<img style="width: 100%;" src="<?php echo base_url('assets/upload/'.$dt->gambar)?>">
						
					</div>
					<div class="col-md-5">
						<table class="table">
							<tr>
								<th>Merk</th>
								<td><?php echo $dt->merk ?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td><?php if ($dt->status == '1') {
									echo "Tersedia";
								}else{
									echo "Tidak Tersedia Atau Sedang Di Sewa";
								} ?></td>
							<tr>
									<td></td>
								<td><?php 

                    if ($dt->status == "0") {
                        echo"<span class='btn btn-danger' disable> Telah di Sewa</span>";
                    }else{
                        echo anchor('customer/rental/tambah_rental'.$dt->id_alat_berat,'<button class="btn btn-success">Sewa</button>');
                    }

                     ?></td>
							</tr>
							</tr>
						</table>
					</div>
				</div>
			<?php endforeach; ?>

			
		</div>
	</div>
</div>