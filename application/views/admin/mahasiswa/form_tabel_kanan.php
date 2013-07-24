<script>
    
    $(document).ready(function(){
//        alert(location.host);
       $('#foto').val(0); 
    
    $('#foto').change(function(){
        
       var foto = $('#foto').val();
        
        if(foto == 1){
            $('#foto_file2').hide();
            $('#foto_file1').fadeIn();
        }
        if(foto == 2){
            $('#foto_file1').hide();
            $('#foto_file2').fadeIn();
        }
        if(foto == 0){
            $('#foto_file2').fadeOut();
            $('#foto_file1').fadeOut();
        }
        
         
    })
        
        
    });
    

</script>






<table>
     <tr>
        <td>FOTO </td>
        <td>
            <?php
            $data = array(
                0 => '-pilih-',
                1 => 'upload',
                2   => 'ambil dari webcam'
            );
            
            echo form_dropdown('foto', $data, 0, 'id="foto"');?>
        </td>
    </tr>   
    
    
    
    
    <tr>
        <td>NIM </td>
        <td><input class="input_form nim" id="nim" type="text" <?php if(isset ($isi['id'])){echo 'readonly=0';}?>  name="id" value="<?php if(isset ($isi['id'])){echo $isi['id'];}?>" /></td>
    </tr>
    
 

    
        <tr>
        <td>nama</td>
        <td><input type="text" class="input_form" id="nama" name="nama" value="<?php if(isset ($isi['nama'])){echo $isi['nama'];}?>" /></td>
    </tr>
    
    
    
    
    
    
        <tr>
        <td valign="top">alamat</td>
        <td>
            <textarea id="alamat"  name="alamat" class="input_form" > <?php if(isset ($isi['alamat'])){echo $isi['alamat'];}?> </textarea> </td>
    </tr>
    
    
    
    
    
    
    
    
 
    
   

    
    
      <tr>
        <td>Jurusan</td>
        <td>  
            <?php if(isset ($isi['mst_jurusan_id'])){
            
            echo form_dropdown("mst_jurusan_id", $jurusan, $isi['mst_jurusan_id'], 'class="input_form" id="jurusan"');
            
            }else{
              echo form_dropdown("mst_jurusan_id", $jurusan, "", 'id="jurusan" class="input_form"');

            }

             ?> </td>
    </tr>
       
    
</table>