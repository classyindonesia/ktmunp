<div style='text-align:center'>
<h3>List Pembayaran Mahasiswa</h3>
</div>

<?php
for($i=1;$i<=8;$i++){
?>

<span id='sem<?php echo$i;?>' style='cursor:pointer;' class="label label-inverse">Semester <?php echo $i; ?></span>

<script type="text/javascript">
$('#sem<?php echo $i; ?>').click(function(){

	$.ajax({
		url : '<?php echo base_url();?>index.php/admin/mst_mahasiswa/get_data_bayar',
		type : 'post',
		data : {npm : '<?php echo $this->uri->segment(4) ?>', ref_semester_id : '<?php echo $i ?>'},
		error : function(err){
			alert('error! terjadi kesalahan/ url bermasalah/ npm tdk ditemukan');
		},
		success:function(ok){
			$('#result').html(ok);
		}
	})

})

</script>




<?php } ?>
<hr>

<div id='result'>
</div>