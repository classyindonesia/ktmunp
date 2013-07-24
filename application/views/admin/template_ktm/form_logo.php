 <?php
$this->load->view('admin/template_ktm/tab_menu');

$logo = $this->fungsi->setup_variable('logo');
?>







<div class="span4">
<div id="logo">
    
    <img src="<?php echo base_url();?>includes/img/template/<?php echo $logo;?>" width="100" height="100" />
    
</div>
 </div>
<div class="span6">
    
    <button id="open_form" class="btn btn-info"><b><i class="icon-edit"></i><br> ganti logo  </b>  </button>
    
    
    
     <div style="display: none" id="form_logo">
     
        Pilih File :  <input id="file" type="file" name="userfile" size="20" />
        <hr>
        <br>
        <button id="update" class="btn btn-info"> <i class="icon-ok"></i> Update </button>
        <button id="cancel" class="btn btn-info"> <i class="icon-remove"></i> Cancel </button>
     <br>
     
     <img style="display:none" src="<?php echo base_url()?>includes/img/ajax-loader.gif" id="loading" />
     </div>
    
    
    
    
</div>




<script>

$(document).ready(function(){
   $('#open_form').click(function(){
      $('#open_form').hide();
      $('#form_logo').fadeIn();
   });
    
   $('#cancel').click(function(){
      $('#form_logo').hide();
      $('#open_form').fadeIn();

   });
   
   
   
   
   
   $('#update').click(function(){
       $('#loading').show();
       
      form_data ={
          upload : 1
      }
      
      
      $.ajaxFileUpload({
        url         :'<?php echo site_url("admin/template_ktm/ganti_logo")?>',
         secureuri      :false,
         fileElementId  :'file',
         dataType    : 'POST',
         data        : form_data,
         success:function(upload){
             if(upload == 0){
                 alert('terjadi kesalahan, cb cek ekstensi atau ukuran gambar');
                 $('#loading').fadeOut();
             }else{
                 $('#file').val('');
                $('#logo').html(upload); 
                $('#loading').fadeOut();
             }
             //alert(upload);
         }
       }); // end of ajax 
      
       
   });
   
   
   
   
   
   
   
    
    
    
    
});



    
</script>