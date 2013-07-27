<?php
echo $this->load->view('admin/mahasiswa/tab_menu');

?>

<h4>Import Data</h4>
<hr>

<div class="span5">

 <table>   
    
<tr>
    <td>
    pilih file    
    </td>
    <td>
      <input type="file" id="userfile" name="userfile" size="20" />
    </td>
 </tr>

 
 <tr>
     <td>Jurusan</td>
     <td>
         <?php echo form_dropdown('jurusan', $jurusan, '', 'id="mst_jurusan_id"');?>
     </td>
 </tr>

 <tr>
     <td>Masa Berlaku</td>
     <td>
         <?php echo form_dropdown('jurusan', $masa_berlaku, '', 'id="mst_batch_id"');?>
     </td>
 </tr>
 
 
 
<tr>
    <td colspan="2" align="left">
        <br>
        <button id="submit_import" class="btn btn-info"><i class="icon-circle-arrow-up"></i> Import </button>
    <a class="btn btn-info" href="<?php echo base_url();?>includes/other/import.xls"><i class="icon-download-alt"></i> template import</a>
        
    </td>
</tr>
    
 </table>
<br>
    <img style="display:none" id="loading" src="<?php echo base_url();?>includes/img/ajax-loader.gif" />
    <span style="display:none" id="sukses" class="alert alert-success">Saved </span>
</div>

<script>

$('#submit_import').click(function(){
  
    
    mst_jurusan_id = $('#mst_jurusan_id').val();
    mst_batch_id = $('#mst_batch_id').val();
    if(mst_jurusan_id == '0' || mst_batch_id == '0'){
        
        alert('anda blm memilih');
        $('#loading').fadeOut();
        return false;
    }
    
    

    form_data= {
        upload : 1,
        mst_jurusan_id : mst_jurusan_id,
        mst_batch_id : mst_batch_id
        
    }
    
      $('#loading').show();
       $.ajaxFileUpload({
        url         :'<?php echo site_url("admin/import/data_mahasiswa")?>',
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'POST',
         cache : false,
         data        : form_data,
         success:function(upload){
             $('#loading').fadeOut();
             $('#sukses').fadeIn('slow', function(){
                 $('#sukses').fadeOut();
             });
             $('#userfile').val('');
             $('#mst_jurusan_id').val('');
             $('#mst_batch_id').val('');
        alert(upload);
             
         }
    });

    
    
}); //end of click function

    </script>