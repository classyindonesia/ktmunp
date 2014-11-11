
<?php
if($data->status_npm == 0){
echo "<h4>NPM tdk ditemukan </h4>";
}else{
echo "<h4>Data Pembayaran Semester : ".$this->fungsi->angka_romawi($this->input->post('ref_semester_id'))." </h4>";
}
?>
<hr>
<?php $jml_bayar = 0; ?>
 Biaya : <?php echo $this->fungsi->rupiah($data->biaya) ?><br>

Detail Pembayaran : 
<table class='table table-bordered'>
	<tr class='well'>
		<td>No.</td>
		<td>tgl pembayaran</td>
		<td>Nominal</td>
	</tr>
<?php
if(!empty($data->pembayaran)){
	$no=1;
	foreach($data->pembayaran as $list){
		?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $this->fungsi->date_to_tgl(date('Y-m-d', strtotime($list->tgl_slip))) ?></td>
		<td><?php echo $this->fungsi->rupiah($list->bayar); ?></td>

	</tr>
<?php
$jml_bayar = $jml_bayar + $list->bayar;
$no++;	
	}
}
 ?>
 <tr>
 	<td colspan='2'>Jumlah</td>
 	<td> <?php echo $this->fungsi->rupiah($jml_bayar);?> </td>
 </tr>
</table>


		


 