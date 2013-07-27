    <?php 
    
    
     $warna_header1 = $this->fungsi->setup_variable('warna_header1');
   $warna_header2 = $this->fungsi->setup_variable('warna_header2');  
    
    
   $alamat = $this->fungsi->setup_variable("alamat_kampus");
    $template_depan = $this->fungsi->setup_variable("template");
    
    
  $logo = $this->fungsi->setup_variable('logo');
 
 //value utk heading 1
 $style_head1 = $this->fungsi->setup_variable('style_head1');
 $value_head1 = $this->fungsi->setup_variable('value_head1');
 
  $style_head2 = $this->fungsi->setup_variable('style_head2');
  $value_head2 = $this->fungsi->setup_variable('value_head2');
 
 $align_header = $this->fungsi->setup_variable('align_header');
  $align_alamat_kampus = $this->fungsi->setup_variable('align_alamat_kampus');  

    
?>
<div id="hal_depan" style=" display:none; padding-bottom: 1em; padding-left: 0px; background: url('<?php echo base_url();?>includes/img/template/<?php echo $template_depan;?>');background-size: 100% 100%;width:400px; height: 220px;">
<table>   
    
    
     <tr>
        <td colspan="2" width="390">
         
            <table style=" width: 390px">
                <tr>
                    <td align="center">
                        <img src="<?php echo base_url()?>includes/img/template/<?php echo $logo;?>" width="45" height="45" />
                    </td>
                    <td align="<?php echo $align_header;?>">
                        <p style="margin: 1px; <?php echo $style_head1.';color :'.$warna_header1.';';?>"><?php echo $value_head1;?></p>
                        <p style="margin: 1px; <?php echo $style_head2.';color :'.$warna_header2.';';?>"><?php echo $value_head2;?></p>
                        
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="<?php echo $align_alamat_kampus;?>" style="font-size: 9px; font-weight: bold;">
                        
                        <?php  echo $alamat;?>
                    </td>
                </tr>
                
            </table>
            
            
            
        </td>
        
        </tr>    
    
    
    
    
    
     <tr>
        <td  rowspan="6" valign="bottom" style="padding-left:1em;" width="100">
           <img style="margin-bottom: 10px; border: 1px solid white; padding: 2px;"  src="<?php echo base_url();?>includes/img/contoh_foto.jpg" width="70" height="85" />
         
        </td>
        </tr>
        
 
        
        
        <tr>
        <td style="padding-top: 0.3em;font-weight:bold; float:left;font-size: 25px;" valign="bottom"  >
              <i><u>21.30.2131.0325</u> </i> 
             </td>
             </tr>
             
              <tr><td>
            <p style="text-transform: uppercase; font-family: roman, 'times new roman', times, serif;font-style: italic; font-weight:bold;"> success kid </p>
        
                  </td>
            </tr>
            
             <tr><td>
           <span style=" font-style: italic"> FTek /Sistem Informasi </span>
            </td>
            </tr>
            
             <tr><td style="font-family: roman, 'times new roman', times, serif;font-size: 11px;font-weight: bold">
            Kediri, 19 April 1991
            </td>
             </tr>
            <tr><td style="font-family: roman, 'times new roman', times, serif;font-size : 10px;">
           Ds Gampeng, Kec Gampengrejo, Kediri
            </td>
             </tr>
             
             
    <tr>
        <td style="font-size : 10px;padding-left: 15px; padding-top: 1em; font-family: monospace" colspan="2">berlaku s/d 19 maret 2015</td>
        </tr>
</table>  
</div>
 
<?php 
//$gambar = getimagesize("./includes/img/template/".$template_depan);
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
//    echo "<span style='color: red'>panjang gambar blm pas, kurang ".$kurang."px </span><br>";
//  //  echo "<span style='color: red'> lebar gambar blm pas, ".$gambar[0].'px, seharusnya adalah 347px</span> <br>';
//}elseif($gambar[0] > 347){
//        $lebih = $gambar[0] - 347 ;
//    echo "<span style='color: red'>lebar gambar kelebihan ".$lebih.'px lagi</span><br>';
//   // echo "<span style='color: red'>lebar gambar blm pas, ".$gambar[0].'px, seharusnya adalah 347px </span><br>';
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
//    echo "<span style='color: red'>panjang gambar kelebihan ".$lebih.'px lagi</span><br>';
//}else{
//    echo 'error,';
//}
//

?>
<script>
$(document).ready(function(){
   
   $('#hal_depan').fadeIn();
});
</script>