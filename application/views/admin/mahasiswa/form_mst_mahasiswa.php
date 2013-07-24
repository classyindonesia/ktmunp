<!-- Button to trigger modal -->

<!--    <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>-->
     
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Alert Info </h3>
    </div>

        <div class="modal-body">
<div class="error">
</div>
             
        </div>

    </div>
    </div>








<script type="text/javascript" src="<?php echo base_url();?>includes/js/webcam.js"></script>

<h4>Form Input Biodata Mahasiswa</h4>

 
<hr>
 


<div class="pesan">
</div>
<script>
$(document).ready(function(){
    
    $('#tgl_lahir').datepicker({
        format : "yyyy-mm-dd"
    });



})    
    
    
    </script>



<?php
 

 
if ($type_form == 'post') {

    echo form_open('admin/mst_mahasiswa/add');
} else {

    echo form_open('admin/mst_mahasiswa/update');
}
?>


     
<table style="height:450px">  

    
    
    <tr>
        <td>
          <span id="loading" style="float: left;display:none"> <img src="<?php echo base_url()?>includes/img/ajax-loader.gif" /> </span>
  
            
            
        <?php echo $this->load->view('admin/mahasiswa/form_tabel_kanan');?>
        
        </td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>    
    
    <td>
     <?php echo $this->load->view('admin/mahasiswa/form_tabel_kiri');?>
    </td>
        <td class="span5"  colspan="6" rowspan="6">
        <div style="display:none; float:right" id="foto_file2">
    	<!-- Next, write the movie to the page at 320x240 -->
	<script language="JavaScript">
		document.write( webcam.get_html(250, 313) );
	</script>
        <br>
	<input class="btn btn-success" type=button value="Configure..." onClick="webcam.configure()">
        <input class="btn btn-success" type=button value="Reset Kamera" onClick="webcam.reset()">
    </div>
        </td>    
    
    </tr>
        
        
        
        <tr>
 
        <td style="text-align:right" colspan="3" >
               <?php if ($type_form == 'post') { ?>
            <input  disabled="disabled" class="btn btn-info btn-large" id="simpan" type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['id'])){ echo form_hidden('id',$isi['id']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>  
    
    
    
 



</table>



</form>




<script>
    
    $(document).ready(function(){
        

        
        
        
        $('#simpan').removeAttr('disabled');
      
      
      
       $('.input_form').click(function(){
          $('.input_form').css('color', '#333');
           $('.input_form').css('background-color', 'white');
          $('.error').fadeOut(function(){
              $('.error').html(' ').fadeIn();
          });
      });
      
      
  
                
       
      //cek nim sebelum submit
      $('#simpan').click(function(e){
      e.preventDefault();
 
 $('#loading').fadeIn();
 $('#simpan').attr('disabled', 'disabled');
 
 
  //alert($('.nim').val());
  
  //rename foto yg telah di capture
  foto = $('#foto').val();
  if(foto == 2){
    <?php $url = site_url('admin/mst_mahasiswa/capture');?> 
    var nim_url = document.getElementById('nim').value;  
    webcam.set_api_url('<?php echo $url ?>/' + escape(nim_url));     
  }

  



      //begin of form falidation
      nim = $('#nim').val();
       nama = $('#nama').val();
       alamat = $('#alamat').val();
       jurusan = $('#jurusan').val();
       tgl_lahir = $('#tgl_lahir').val();
       tempat_lahir = $('#tempat_lahir').val();
       ref_jenis_kelamin_id = $('#ref_jenis_kelamin_id').val();
       no_hp = $('#no_hp').val();
       masa_berlaku = $('#masa_berlaku').val();
       
        
       if(nim == '' || nama == '' || alamat == '' || jurusan == '' || tgl_lahir == '' || tempat_lahir == '' || ref_jenis_kelamin_id == '' || no_hp == ''){
           //alert('NIM tdk boleh kosong !');
           $('.error').html('');
        
        $('#myModal').modal('show')
        
            if(nim == ''){
           $('.error').append('<div class="alert alert-error"> nim masih kosong </div>');
           $('#nim').css('background-color', '#FF6666');
            }
            if(nama == ''){
           $('.error').append('<div class="alert alert-error">nama masih kosong </div>');
           $('#nama').css('background-color', '#FF6666');
            }
 
            if(alamat == ''){
           $('.error').append('<div class="alert alert-error">alamat masih kosong </div>');
           $('#alamat').css('background-color', '#FF6666');
            }
            
            if(tgl_lahir == ''){
           $('.error').append('<div class="alert alert-error">tgl lahir masih kosong </div>');
           $('#tgl_lahir').css('background-color', '#FF6666');
            }
 
             if(tempat_lahir == ''){
           $('.error').append('<div class="alert alert-error">tempat lahir masih kosong </div>');
           $('#tempat_lahir').css('background-color', '#FF6666');
            }
            
            if(ref_jenis_kelamin_id == ''){
           $('.error').append('<div class="alert alert-error">jenis kelamin masih kosong </div>');
           $('#ref_jenis_kelamin_id').css('background-color', '#FF6666');
            }
            
            if(no_hp == ''){
           $('.error').append('<div class="alert alert-error">no hp masih kosong </div>');
           $('#no_hp').css('background-color', '#FF6666');
            }
           if(masa_berlaku == ''){
           $('.error').append('<div class="alert alert-error">no hp masih kosong </div>');
           $('#masa_berlaku').css('background-color', '#FF6666');
            }   
            
$('#loading').fadeOut();
$('#simpan').removeAttr('disabled'); 
        return false;
       }
  //end of form falidation     
      
      

       
       
   //  alert('<?php echo $url ?>/' + escape(nim_url));
       
       
    form_data = {
        nim : nim,
        submit : 1
    }
      $.ajax({
          url : "<?php echo site_url('admin/mst_mahasiswa/check_nim');?>",
          data : form_data,
          type : 'post',
          cache : false,
          success : function(sukses){
              if(sukses == 0){
                  insert_mahasiswa(nim,nama,alamat,tgl_lahir,tempat_lahir,no_hp,jurusan,ref_jenis_kelamin_id, masa_berlaku);
               //   alert('sukses');
                 //  return true;

                    
              }else if(sukses == 1){
                  $('#nim').css('color', 'red');
                //alert('NIM sudah ada, silahkan cek ulang pada form input NIM');
                
               $('.error').fadeIn().html('').append('<div class="alert alert-error">NIM sudah ada, silahkan cek ulang pada form input NIM </div>');
               $('#simpan').removeAttr('disabled'); 
                 $('#loading').fadeOut();

               $('#myModal').modal('show');
                //return false;
              }
            }
      });  
     return false; 
 })//end of click function
        
        
        
        
        
//fungsi untuk upload gambar    
function ajax_upload(){
    
     form_data = {
        upload : 1,
        nim : $('#nim').val()
    }
    
    
    $.ajaxFileUpload({
        url         :'<?php echo site_url("admin/mst_mahasiswa/upload");?>',
         secureuri      :false,
         fileElementId  :'foto_file1',
         dataType    : 'POST',
         cache : false,
         data        : form_data,
         success:function(upload){
             if(upload==1){
                 //sukses terupload
             }else{
                 //gagal
                 var upload = upload;
                   alert(upload);
               // $('.error').fadeIn().html('').append('<div class="alert alert-error">Foto Gagal Terupload (periksa ekstensi file) </div>');
               // $('#myModal').modal('show');                
                 //return false;
             }
             
         }
    });
    
     
}        
        
        
            
        
function insert_mahasiswa(nim,nama,alamat,tgl_lahir,tempat_lahir,no_hp,jurusan,ref_jenis_kelamin_id, masa_berlaku){
  
//  try{

//  }catch(e) {
//    alert("You messed something up!");
//}
//  
 
      /* capture */
    foto = $('#foto').val();
    
    if(foto == 2){
       take_snapshot();
     //  $.post("<?php echo site_url('admin/mst_mahasiswa/capture');?>", { rename: 1, nim: $('#nim').val() } );
      // webcam.reset();
    }else if(foto == 1){ 
       ajax_upload();
    
    }      
  
  
  form_data = {
      id : nim,
      nama : nama,
      alamat : alamat,
      tgl_lahir : tgl_lahir,
      tempat_lahir : tempat_lahir,
      mst_jurusan_id : jurusan,
      no_hp : no_hp,
      ref_jenis_kelamin_id : ref_jenis_kelamin_id,
      masa_berlaku : masa_berlaku,
      post : 1
      
  }
  
    $.ajax({
        url : "<?php echo site_url('admin/mst_mahasiswa/add');?>",
        type : 'post',
        data : form_data,
        cache : false,
        success:function(sukses){
    
    $('#loading').fadeOut();

         
            
        
      $('.pesan').fadeIn().html('').append('<div class="alert alert-success">data telah berhasil ditambahkan</div>');
      $('.pesan').fadeOut(1500, function(){
          
//   $.post("<?php echo site_url('admin/mst_mahasiswa/capture');?>", { rename: 1, nim: $('.nim').val() } ).done(function(msg){
//     //aktifkan alert jika ingin melakukan debug
//        alert(msg);
//    }).fail(function(){ 
//alert('error');    
//});         

          
         $('#simpan').removeAttr('disabled'); 
         
         
          if(foto == 2){
        webcam.reset(); 
          }
        
        
        //$('#nim').val('');
       // location.reload();
       //  
       //  clear input form
    //   $('.input_form').val('');
    
        
      });
   
   //$('.input_form').val('');
   
        }
        
    })//end of ajax
    
  
  

  
  }      
        
        
        
        
        
        
  

});




    
    </script>

 