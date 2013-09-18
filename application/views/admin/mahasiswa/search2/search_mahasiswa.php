







<script type="text/javascript" src="<?php echo base_url();?>includes/js/webcam.js"></script>

<?php $this->load->view('admin/mahasiswa/modal_jepret') ?>

















<table class="table" >
    <tr>
       <td valign="bottom">
           <table>
               <tr>
                   <td>
                     <input placeholder="cari berdasarkan nama..." type="text" id="input_search" />   
                   </td>
                   <td>
                    <button id="search" class="btn btn-info"><i class="icon-search"></i> search</button>
                    <img id="loading_search" style="display:none" src="<?php echo base_url()?>includes/img/ajax-loader.gif" />
                   </td>
               </tr>
           </table>
       </td>
<td>
<div id="kantong"  class="alert alert-info" > 
    <?php 

$item = $this->cart->total_items();
    if($item > 0){
echo 'ada <b style="font-size: 20px;">'.$item.'</b> antrian yg hendak di cetak'; 
    }else{
        echo 'tidak ada antrian cetak';
    }
?>
</div>
 

    <button id="view_cetak" class="btn btn-info pull-right"> <i class="icon-file"></i> view </button>

    <button id="hapus_cetak" class="btn btn-danger pull-right"> <i class="icon-refresh"></i> clear</button>

    <button id="checkout_kantong" class="btn btn-info pull-right"> <i class="icon-download-alt"></i> download</button>
</td>

</tr>
<td colspan="2">
    <?php echo form_dropdown("masa_berlaku", $masa_berlaku, "", 'class="input_form pull-right" id="batch_id"');?> 

    
</td>
<tr>
    
</tr>


 </table>


<script>
    
    $(document).ready(function(){
        $('#input_search').val('');
    });
    
    
    
    
    $('#view_cetak').click(function(){

        
      form_data = {
          view : 1
      }  
      
      $.ajax({
          url : '<?php echo site_url("admin/mst_mahasiswa/view_kantong");?>',
          data : form_data,
          type : 'post',
          success:function(view){
              if(view == 0){
                  alert('anda belum memilih sama sekali');
                  return false;
              }else{
                   
                  $('#myModal').modal('show');
                  $('.modal-body').load('<?php echo site_url("admin/mst_mahasiswa/view_kantong");?>');
                  
              }
          }
          
      });//end of ajax
        
        return false;
    });//end click function
    
    
    
    function hapus_kantong(){
       form_data={
           update : 1
       }
       
       $.ajax({
           url : '<?php echo site_url("admin/mst_mahasiswa/clear_kantong")?>',
           type : 'post',
           data : form_data,
           success:function(hapus){
                $('#kantong').html('tidak ada antrian cetak');
               
           }
       })        
    }
    
    $('#hapus_cetak').click(function(){
       
        hapus_kantong()
        
    });//end of click function
    
    
    
    $('#checkout_kantong').click(function(){
    
    batch_id = $('#batch_id').val();
    if(batch_id == '0'){
        alert('masa berlaku belum ditentukan');
        return false;
    }
    
    
    form_data={
        check : 1
    }
    $.ajax({
        url : '<?php echo site_url("admin/mst_mahasiswa/cetak_kantong")?>',
        data : form_data,
        type : 'post',
        success:function(check){
            if(check > 0){
                window.open('<?php echo site_url("admin/mst_mahasiswa/cetak_kantong")?>/'+batch_id, '_blank');
               // hapus_kantong();    
               //location.reload();
            }else{
                alert('anda belum memilih sama sekali');
            }
        }
    })

    
    });//end of click function
    
    
    
    
       function update_kantong(id_mahasiswa){
 
    
    form_data = {
        update : 1,
        id_mahasiswa : id_mahasiswa
    }

    $.ajax({
        url : '<?php echo site_url("admin/mst_mahasiswa/update_kantong")?>',
        data : form_data,
        type : 'post',
        success:function(sukses){
            $('#kantong').html(sukses);
            
        }
        
        
    });//end of ajax
    return false;   
   } //end of function
    
    
    
    
    
    
    
    
    
    
    $('#search').click(function(){
       // alert('ok');
       
       $('loading_search').show();
       
       nama = $('#input_search').val();
       if(nama == ''){
           alert('nama blm dimasukan');
           $('loading_search').fadeOut();
           return false;
       }
       
       
       
       
       form_data = {
           nama : nama,
           search : 1,
           no : <?php echo $no ?>
       }
       
       $.ajax({
           url : "<?php echo site_url('admin/mst_mahasiswa/search2');?>",
           type : 'post',
           data : form_data,
           success:function(sukses){
               $('loading_search').fadeOut();
               $('#konten').html(sukses);
           }
       })
       
       
       
       
       
       
        
     return false;
    });

</script>


 
    
    <script>
    function load_profil(id,msg){
        
      // $('#myModal').modal('show');
       
    $('#myModal').modal({
    backdrop: true,
    keyboard: true
}).css({
    width: 'auto',
    'margin-left': function () {
        return -($(this).width() / 2);
    }
});


    
   $('#modal-body1').load('<?php echo site_url("admin/mst_mahasiswa/view_profil");?>/'+escape(id));
  
  //alert('<?php echo site_url("admin/mst_mahasiswa/view_profil");?>/'+escape(id));
  
    }      
        
   </script>