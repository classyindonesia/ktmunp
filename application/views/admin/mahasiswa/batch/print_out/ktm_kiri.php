<?php
 $alamat_kampus = $this->fungsi->setup_variable("alamat_kampus");
 $logo = $this->fungsi->setup_variable('logo');
 
 //value utk heading 1
 $style_head1 = $this->fungsi->setup_variable('style_head1');
 $value_head1 = $this->fungsi->setup_variable('value_head1');
 
  $style_head2 = $this->fungsi->setup_variable('style_head2');
  $value_head2 = $this->fungsi->setup_variable('value_head2');
  $warna_header1 = $this->fungsi->setup_variable('warna_header1');
  $warna_header1 = $this->fungsi->hex2rgb($warna_header1);
  $warna_header1 =  'rgb('.$warna_header1[0].', '.$warna_header1[1].', '.$warna_header1[2].')';
  
  
  
   $warna_header2 = $this->fungsi->setup_variable('warna_header2'); 
   $warna_header2 = $this->fungsi->hex2rgb($warna_header2);
   $warna_header2 = 'rgb('.$warna_header2[0].', '.$warna_header2[1].', '.$warna_header2[2].')';
 $align_header = $this->fungsi->setup_variable('align_header');
  $align_alamat_kampus = $this->fungsi->setup_variable('align_alamat_kampus');

  
  ?>
<div style="margin-left: 2px" class="pull-left span5">

    <img style="margin-bottom: -13.6em;" src="<?php echo base_url();?>includes/img/template/<?php echo $val;?>" height="215" width="345" />
   

    
    <table style=" margin-top: -1.6em" >   

        
 
        
        <tr>
           <td   colspan="2" width="340">
               
               
               <table width="340" >
                   <tr>
                       <td align="center">
                       <img  src="<?php echo base_url();?>includes/img/template/<?php echo $logo;?>" width="40" height="40" />
                       </td>
                       <td align="<?php echo $align_header;?>">
                        <p style=" margin: 1px;<?php echo 'color: '.$warna_header1.';'.$style_head1;?>"><?php echo $value_head1;?></p>
                        <p style="margin: 1px; <?php echo 'color: '.$warna_header2.';'.$style_head2;?>"><?php echo $value_head2;?></p>
                       </td>
                   </tr>
                           <tr>
         <td colspan="2" style="font-weight:bold;font-size: 8px;" align="<?php echo $align_alamat_kampus;?>">
              <i> <?php echo $alamat_kampus;?>  </i>  
        </td>
             </tr> 
                   
               </table>     
               
           
           
        </td>
        </tr>
    
 
    
    
    
    <tr>
   <td rowspan="6" valign="bottom" style="padding-left:1em; width: 100px" >

<img style="margin-bottom: 0px; border: 1px solid white; padding: 2px;"  src="<?php echo $foto;?>" width="65" height="85" />
         
        </td>
        </tr>
        
        
        

        
        
        <tr>
        <td width="200" style="padding-top: 1em; font-weight:bold; float:left;font-size: 20px;"   >
              <i><u><?php echo $id;?></u> </i> 
             </td>
             </tr>
             
              <tr>
             <td>
            <p style="text-transform: uppercase; font-family: roman, 'times new roman', times, serif;font-style: italic; font-weight:bold;">
                <?php  echo $nama;?> </p>
            <br>
             </td>
            </tr>
            
             <tr>
            <td style="padding-top: 1em;">
           <span style="font-style: italic"> <?php  echo $fakultas;?> /<?php  echo $jurusan;?> </span>
            </td>
            </tr>
            
             <tr>
                <td style="font-family: roman, 'times new roman', times, serif;font-size: 10px;font-weight: bold">            <?php  echo $tempat_lahir;?>, <?php  echo $this->fungsi->date_to_tgl($tgl_lahir);?>
            </td>
             </tr>
             
             
            <tr>
               <td style="font-size: 8px;">
           <?php  echo $alamat;?>
            </td>
             </tr>
             
             
    <tr>
        <td style="font-size:10px; padding-left: 15px; padding-top: 1.5em; font-family: brushscript;color:red;" colspan="2">
             <?php $batch_id = $this->uri->segment(4);
            $this->db->where('id', $batch_id);
            $q = $this->db->get('mst_batch');
            foreach($q->result_array() as $list){
                
                if($list['tampil_keterangan'] == 1){
                   echo $list['keterangan'];
                }else{
                echo 'berlaku s/d '.$this->fungsi->date_to_tgl($list['tgl_aktif']);
                }
                
            }
            ?>
        </td>
        </tr>
</table>  
</div>