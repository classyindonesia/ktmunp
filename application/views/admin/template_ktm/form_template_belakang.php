 <?php
$this->load->view('admin/template_ktm/tab_menu');
?>



 <table>
     <tr>
         <td>
           <div id="template_belakang"> 
<?php
$this->load->view('admin/template_ktm/template_belakang');
?>
    </div> 
 
         </td>
         
         
         <td>
             
       <button id="tombol_template_belakang1" style="height: 100px" class="btn btn-info"><i class="icon-upload"></i> <b> Change Template </b></button>
    
    <span style="display:none" id="tombol_template_belakang2">
    ganti template :
    <input id="file2" type="file" name="userfile" size="10" /> <br>
    <button id="submit_template_belakang" class="btn btn-info"><i class="icon-upload"></i> update</button>
    <button id="tombol_template_belakang3" class="btn btn-info"><i class="icon-remove"></i> Cancel</button>
    </span>
    <br>
    <img id="loading2" style="display:none" src="<?php echo base_url()?>includes/img/ajax-loader.gif" />           
             
             
             
         </td>
         
         
         
         
         
     </tr>

 
 </table>
 
 

    
    
    <script>
        $('#tombol_template_belakang1').click(function(){
            $('#tombol_template_belakang1').hide();
            $('#tombol_template_belakang2').fadeIn();
        })
            $('#tombol_template_belakang3').click(function(){
            $('#tombol_template_belakang2').hide();
            $('#tombol_template_belakang1').fadeIn();
        })
    </script>
 
 
 
 
 
 
 


<script>
    $('#submit_template_belakang').click(function(){
        $('#loading2').show();

form_data = {
    upload : 2
}

$.ajaxFileUpload({
        url         :'<?php echo site_url("admin/template_ktm/ganti_template")?>',
         secureuri      :false,
         fileElementId  :'file2',
         dataType    : 'POST',
         data        : form_data,
         success:function(upload){
             if(upload == 0){
                 alert('terjadi kesalahan, cb cek ekstensi atau ukuran gambar');
                 $('#loading2').fadeOut();
             }else{
                 $('#file2').val('');
                $('#template_belakang').load('<?php echo site_url("admin/template_ktm/template_belakang")?>'); 
                $('#loading2').fadeOut();
             }
             //alert(upload);
         }
       }); // end of ajax 
        
        
    });
    
</script>