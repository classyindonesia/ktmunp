<div class="span5">
<?php
$this->load->view('admin/dashboard/system_info');
?>

</div>


<div class=" well span5">
    <h3>
 </i><?php echo $this->fungsi->date_to_tgl(date("Y-m-d"));?>
        <br>
 
<span id="jam">
<script language="javascript">
function jam(){
var waktu = new Date();
var jam = waktu.getHours();
var menit = waktu.getMinutes();
var detik = waktu.getSeconds();

if (jam < 10){
jam = "0" + jam;
}
if (menit < 10){
menit = "0" + menit;
}
if (detik < 10){
detik = "0" + detik;
}
var jam_div = document.getElementById('jam');
jam_div.innerHTML = jam + ":" + menit + ":" + detik;
setTimeout("jam()", 1000);
}
jam();
</script>
</span> </h3>
    </div>

<div class="span11">
    
    <h4>Catatan Kegiatan</h4>
    <hr>
<?php
$this->load->view('admin/dashboard/log_list');
?>
</div>