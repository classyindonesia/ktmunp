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
<div style="margin-left: 1.7em; border-right:2px solid #ccc;" class="pull-left span5">

    <img style="margin-bottom: -13.6em;" src="./includes/img/template2/template_ktm_depan.jpg" height="215" width="345" />
   

    
    <table style=" margin-top: -1.6em" >   

        
 
        
        <tr>
           <td   colspan="2" width="340">
               
               
               <table width="340" >
                   <tr>
                       <td align="center">
                       <img  src="./includes/img/template/<?php echo $logo;?>" width="40" height="40" />
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
         <td colspan="2" style="text-align:center;text-transform: uppercase; font-family: Calibri; font-size: 10px; " >
            <br> <br> <br> <br> 
        </td>
      </tr>  
        
        
<tr>
<td><br></td>
           <td rowspan="5" valign="top" style="width: 100px" >

                <?php

                $params['data'] = $jurusan.', '.$tempat_lahir.'. 
                '.$this->fungsi->date_to_tgl($tgl_lahir).', '.$alamat;
                $params['level'] = 'H';
                $params['size'] = 10;
                $params['savename'] = FCPATH.'includes/qrcode/'.$id.'.png';
                $this->ciqrcode->generate($params);



                    $this->db->where('mst_mahasiswa_id', $id);
                    $this->db->order_by('id DESC');
                    $this->db->limit(1);
                    $q = $this->db->get('mst_foto');
                    foreach($q->result_array() as $list2){
                        $foto = $list2['nama_file'];
                  if(!empty($foto)){
                         $foto = "./includes/img/foto_mahasiswa/".$foto;
                      }else{
                           $foto = "./includes/img/contoh_foto.jpg";
                    }

                        }
                    

                  

                ?>
                       
                <img style=" border: 1px solid black;"  src="<?php echo $foto;?>" width="90" height="110" />

              </td>
</tr>        

        
        
        <tr> 

        <td width="200" style="font-size: 15px;font-family: Calibri;padding-left:1em;font-weight:bold;"   >
             
               <?php  echo $nama;?>  
             </td>
             </tr>
             
              <tr>
             <td style="text-transform: uppercase; font-family: Calibri;padding-left:1em;font-size: 13px;">
                <?php echo $id;?> 
            <br>
             </td> 
            </tr>
              <tr>
             <td style='padding-left:1em;'>
                 <?php  echo '<img width="50" height="50" src="./includes/qrcode/'.$id.'.png" />'; ?>  
            <br>
             </td> 
            </tr> 
<tr>
<td colspan='2' align='right' style='font-family: Calibri; font-size: 9px;padding-top: 2px;'>
    <?php $batch_id = $this->uri->segment(5);
    $this->db->where('id', $batch_id);
    $q = $this->db->get('mst_batch');
    foreach($q->result_array() as $list){
        
       if($list['tampil_keterangan'] == 1){
           echo $list['keterangan'];
        }else{
        echo 'Berlaku s.d. '.$this->fungsi->date_to_tgl($list['tgl_aktif']);
        }
    }
    ?>
</td>
</tr>

             
             
 
</table>  
</div>