<table style="width: 40%">
	<h2>Invoice Pembayaran Anda</h2>
	<?php foreach($transaksi as $tr) : ?>
	<tr>
		<td>Nama Penyewa</td>
		<td>:</td>
		<td><?php echo $tr->nama ?></td>
	</tr>
	<tr>
		<td>Merk Alat Berat</td>
		<td>:</td>
		<td><?php echo $tr->merk ?></td>
	</tr>

	<tr>
		<td>Tanggal Sewa</td>
		<td>:</td>
		<td><?php echo $tr->tanggal_sewa ?></td>
	</tr>

	<tr>
		<td>Tanggal Kembali</td>
		<td>:</td>
		<td><?php echo $tr->tanggal_kembali ?></td>
	</tr>

	<tr>
		<td>Biaya Sewa/Hari</td>
		<td>:</td>
		<td>Rp. <?php echo number_format($tr->harga,0,',','.') ?></td>
	</tr>

	<tr>
		<?php
		$x = strtotime($tr->tanggal_kembali);
		$y = strtotime($tr->tanggal_sewa);
		$jmlHari = abs(($x - $y)/(60*60*24)); 

		 ?>
		<td>Jumlah Hari Sewa</td>
		<td>:</td>
		<td><?php echo $jmlHari ?> Hari</td>
	</tr>

	<tr>
		<td>Status Pembayaran</td>
		<td>:</td>
		<td>
			<?php 
				if($tr->status_pembayaran === '0'){ 
					echo "Belum Lunas"; 
				}else{
					echo "Lunas";
				}
			?>
		</td>
	</tr>
	<tr style="font-weight: bold; color: red">
		<td>Jumlah Pembayaran</td>
		<td>:</td>
		<td>Rp. <?php echo number_format($tr->harga * $jmlHari,0,',','.') ?></td>
	</tr>
	<tr>
		<td>Rekening Pembayaran</td>
		<td>:</td>
		<td>
			<ul>
				<li>Bank Mandiri 1215484484879</li>
				<li>Bank BCA 2375959598995</li>
				<li>Bank BNI 54548826232326</li>	
			</ul>
		</td>
	</tr>
<?php endforeach; ?>
</table>


<script type="text/javascript">
	window.print();
</script>