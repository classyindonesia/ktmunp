 
 
<?php
echo form_input('pencarian', '', ' id="cari" class="span3 pull-right" placeholder="pencarian..."');
?>
            
                   <img class="pull-right" style="display: none" alt="" id="loading"   src="<?php echo base_url()?>includes/img/ajax-loader.gif" />


<script>
    
 $('#cari').keypress(function(e){
    
    if(e.keyCode==13){
         cari = $('#cari').val();
         if(cari == ''){
             alert('isian masih kosong');
             return false;
         }
         
         form_data = {
             cari : cari,
             submit : 1
         }
         $('#loading').fadeIn();
         $.ajax({
            url : '<?php echo site_url("admin/log_user/search");?>',
            data: form_data,
            type:'post',
            success:function(sukses){
                $('#konten_pencarian').html(sukses);
                $('#loading').fadeOut();
            }
         });
         
         
         
         
    } 
})
        
 
    
</script>