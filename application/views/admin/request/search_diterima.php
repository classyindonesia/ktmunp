<input type="text" id="search" placeholder="Cari Berdasarkan NIM..">


<script>
$('#search').keypress(function(e){
    if(e.keyCode==13){
        cari = $('#search').val();
        if(cari == ''){
            alert('kolom pencarian harus di isi');
   return false;    
   }
   
   
   form_data = {
       search : 1,
       cari : cari
   }
   $('#loading').show();
   
   $.ajax({
       url : '<?php echo site_url("admin/request/cari_diterima")?>',
       data : form_data,
       type: 'post',
       success:function(sukses){
           
           $('#loading').fadeOut();
           
           $('#konten').html(sukses);
           
       }//sukses
   });//ajax
        
        
        

    }
}); //end of keypress[enter] function
</script>