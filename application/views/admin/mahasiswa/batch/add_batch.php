<script>
$(document).ready(function(){
    
    $('#tgl_aktif').datepicker({
        format : "yyyy-mm-dd"
    });



})    
    
    
    </script>
<button id="add_view" class="btn btn-success">add batch</button>


<table id="form_add" style="display: none">
    <tr>
        <td>Tgl Aktif</td>
        <td> <input type="text" id="tgl_aktif" name="tgl_aktif" /> </td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td> <input type="text" id="keterangan" name="keterangan"/> </td>
    </tr>
    <tr>
        <td>tampilkan keterangan
    </td>
    <td><?php echo form_checkbox('tampil_keterangan', '1', FALSE, 'id="tampil_keterangan"'); ?></td>
    </tr>
     <tr>
         <td colspan="2">
             <button class="btn btn-success" id="simpan">simpan</button>
         <button class="btn btn-success" id="cancel">cancel</button>
         
         <img id="loading" style="display:none" src="<?php echo base_url();?>includes/img/ajax-loader.gif" />
         </td>
     </tr>
</table> 



<script>
    $('#add_view').click(function(){
      $('#add_view').hide();  
       $('#form_add').fadeIn();
    });

    $('#cancel').click(function(){
      $('#add_view').fadeIn();  
       $('#form_add').hide();
    });




    $('#simpan').click(function(){
       
       tgl_aktif = $('#tgl_aktif').val();
       ket = $('#keterangan').val();
       if(tgl_aktif == ''){
           alert('tgl aktif masih kosong');
           return false;
       }
       $('#loading').fadeIn();
       
       form_data = {
           tgl_aktif : tgl_aktif,
           ket : ket,
           tampil_keterangan : $('#tampil_keterangan').val(),
           add : 1
       }
 
 $.ajax({
     url : '<?php echo site_url("admin/mst_mahasiswa/add_batch");?>',
     type : 'post',
     data : form_data,
     success:function(sukses){
         $('#keterangan').val('');
         $('#tgl_aktif').val('');
         $('#list_batch').html(sukses);
        $('#add_view').fadeIn();  
       $('#form_add').hide();     
       $('#loading').fadeOut();
     }
 })
       
       
        
    });

</script>

 