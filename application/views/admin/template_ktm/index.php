<?php
$this->load->view('admin/template_ktm/tab_menu');
?>




<table>
    <tr>
        <td>
<div id="template_depan"> 
<?php
$this->load->view('admin/template_ktm/template_depan');
?></td>
<td>
    
    <button id="tombol_template_depan1" style="height: 100px" class="btn btn-info"><i class="icon-upload"></i> <b> Change Template </b></button>
    
    <span style="display:none" id="tombol_template_depan2">
    ganti template :
    <input id="file1" type="file" name="userfile" size="10" /> <br>
    <button id="submit_template_depan" class="btn btn-info"><i class="icon-upload"></i> update</button>
    <button id="tombol_template_depan3" class="btn btn-info"><i class="icon-remove"></i> Cancel</button>
    </span>
    <br>
    <img id="loading1" style="display:none" src="<?php echo base_url()?>includes/img/ajax-loader.gif" />
    
    
    <script>
        $('#tombol_template_depan1').click(function(){
            $('#tombol_template_depan1').hide();
            $('#tombol_template_depan2').fadeIn();
        })
            $('#tombol_template_depan3').click(function(){
            $('#tombol_template_depan2').hide();
            $('#tombol_template_depan1').fadeIn();
        })
    </script>
    
    
</td>

<script>
    $('#submit_template_depan').click(function(){
        $('#loading1').show();

form_data = {
    upload : 1
}

$.ajaxFileUpload({
        url         :'<?php echo site_url("admin/template_ktm/ganti_template")?>',
         secureuri      :false,
         fileElementId  :'file1',
         dataType    : 'POST',
         data        : form_data,
         success:function(upload){
             if(upload == 0){
                 alert('terjadi kesalahan, cb cek ekstensi atau ukuran gambar');
                 $('#loading1').fadeOut();
             }else{
                 $('#file1').val('');
                $('#template_depan').load('<?php echo site_url("admin/template_ktm/template_depan")?>'); 
                $('#loading1').fadeOut();
             }
             //alert(upload);
         }
       }); // end of ajax 
        
        
    });
    
</script>


    </tr>
    </div>

</table>
