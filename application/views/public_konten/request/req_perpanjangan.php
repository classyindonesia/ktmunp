<h4>Request Perpanjangan</h4>
<hr>




<table>
    <tr>
        <td>NIM*</td>
        <td><?php echo form_input('nim', '', 'id="nim" placeholder="nim.."');?>
            
        </td>
        <td style="display: none" id="loading">
        <img src="<?php echo base_url();?>includes/img/ajax-loader.gif" />
        </td>
    </tr>
    
    <tr>
        <td>Nama</td>
        <td><?php echo form_input('nim', '', 'id="nama" readonly=0 placeholder="nama.."');?></td>
    </tr>    
    
    <tr>
        <td>Fakultas/Jurusan</td>
        <td><?php echo form_input('nim', '', 'id="fakultas_jurusan" readonly=0 placeholder="Fakultas/Jurusan.."');?></td>
    </tr>    
    
 
    <tr>
        <td>TTL</td>
        <td><?php echo form_input('nim', '', 'id="ttl" readonly=0 placeholder="TTL.."');?></td>
    </tr>     
   
    <tr>
        <td>Alamat</td>
        <td><?php echo form_input('nim', '', 'id="alamat" readonly=0 placeholder="Alamat.."');?></td>
    </tr>      
     <tr>
        <td>No HP*</td>
        <td><?php echo form_input('nim', '', 'id="no_hp"  readonly=0 placeholder="Nomor HP.."');?></td>
    </tr>     
    

    <tr>
        <td colspan="2" align="right"><button id="submit" disabled="disabled" class="btn btn-success"> Submit </button></td>
         
    </tr>  

</table>


<script>
    $(document).ready(function(){
       






















       
       $('#nim').blur(function(){
           $('#loading').fadeIn(); //fadein
        nim = $('#nim').val();
        if(nim == ''){
            $('#nim').css('background-color', 'red');
             $('#loading').fadeOut();
            return false;
        }else{
           form_data = {
               nim : nim,
                check : 1
           }
           $.ajax({
               url : '<?php echo site_url("request/check_perpanjangan")?>',
               data : form_data,
               type : 'post',
               success:function(check){
                if(check == '0'){
                    alert('data tidak ada yg cocok');

                  }else if(check == '2'){
                    alert('belum ada foto');
                }else{
                    isi = check.split('||');
                    $('#nama').val(isi[0]); //nama
                    $('#fakultas_jurusan').val(isi[1]); //fakultas & jurusan
                    $('#ttl').val(isi[6]+'/ '+isi[2]); // ttl
                    $('#alamat').val(isi[3]); //alamat
                    $('#no_hp').val(isi[4]); //no hp
                    $('#submit').removeAttr('disabled');
                }
                 $('#nim').css('background-color', 'white');
                $('#loading').fadeOut(); 
               }//check
           });//ajax
        }//else statement
       });//blur







       $('#submit').click(function(){
       
       nim = $('#nim').val();
       no_hp = $('#no_hp').val();
       if(nim == '' || no_hp == ''){
           alert('nim/no hp masih kosong');
           return false;
       }
       
       
       form_data = {
           submit : 1,
           nim : nim,
           no_hp : no_hp
       }
       
       $.ajax({
           url : '<?php echo site_url("request/submit_perpanjangan");?>',
           data : form_data,
           type : 'post',
           success:function(submit){
               
               $('#myModal').modal('show');
               $('#konten').load("<?php echo base_url()?>index.php/request/cetak/"+nim);
               
               
//                    $('#nim').val(''); //nama
//                    $('#nama').val(''); //nama
//                    $('#fakultas_jurusan').val(''); //fakultas & jurusan
//                    $('#ttl').val(''); // ttl
//                    $('#alamat').val(''); //alamat
//                    $('#no_hp').val(''); //no hp       
                    
              // alert(submit);
               $('#submit').attr('disabled', 'disabled');
           }
       })
       
       
       });






    //$('#konten').print();    
         //   
    });//ready
    
    
    </script>
    
    <br>
    <div  class="alert alert-info">
    Jika ada kesalahan data, harap segera laporkan kpd petugas!    
    </div>
    
    
    
        <!-- Button to trigger modal -->
      
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
    <div class="modal-body">
    <p id="konten">
        <img id="loading" src="<?php echo base_url()?>includes/img/ajax-loader.gif" />
        
        
    </p>
    </div>
 
    </div>


    <script>

    $('#myModal').on('hidden', function () {
    window.location.reload();
    })

$(document).ready(function(){

  $('#nim').val('');
  $('#nama').val('');
  $('#fakultas_jurusan').val('');
  $('#ttl').val('');
  $('#alamat').val('');
  $('#no_hp').val('');
 
})


    </script>