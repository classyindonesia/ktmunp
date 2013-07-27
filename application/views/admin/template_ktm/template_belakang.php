    <?php 
    $this->db->where('variable', 'template_belakang');
    $q = $this->db->get('setup_variable');
    foreach($q->result_array() as $list){
        $template = $list['value'];
 
    }
?>
<div  style="padding-top:4em; padding-bottom: -1em;padding-left: 0px; background: url('<?php echo base_url();?>includes/img/template/<?php echo $template;?>'); background-size: 100%; width:347px; height: 160px;">

</div>
 
<?php 
//$gambar = getimagesize("./includes/img/template/".$template);
///*
//print_r($gambar);
//panjang harus 347
//lebar harus 218
//
//
//echo "penjang : ".$gambar[0].'<br>';
//echo "lebar : ".$gambar[1].'<br>';
//*/
//
//if($gambar[0] > 344 && $gambar[0] <= 347){
//    echo "lebar gambar sudah pas  <br>";
//}elseif($gambar[0] < 344){
//        $kurang = 347 - $gambar[0];
//    echo "<span style='color: red'>lebar gambar blm pas, kurang ".$kurang."px </span><br>";
//}elseif($gambar[0] > 347){
//        $lebih = $gambar[0] - 347 ;
//    echo "<span style='color: red'>panjang gambar kelebihan ".$lebih.'px</span><br>';
//}else{
//    echo 'error,';
//}
//
//
//if($gambar[1] > 210 && $gambar[1] <= 218){
//    echo "panjang gambar sudah pas <br>";
//}elseif($gambar[1] < 218){
//    $kurang = 218 - $gambar[1];
//    echo "<span style='color: red'>panjang gambar blm pas, kurang ".$kurang."px </span><br>";
//}elseif($gambar[1] > 218){
//    $lebih = $gambar[1] - 218 ;
//    echo "<span style='color: red'>panjang gambar kelebihan ".$lebih.'px</span><br>';
//}else{
//    echo 'error,';
//}


?>