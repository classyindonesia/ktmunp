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
        <td><?php echo form_input('nim', '', 'id="fakultas_jurusan"  placeholder="Fakultas/Jurusan.." readonly="0"');?></td>
    </tr>    
    
 
    <tr>
        <td>Tgl Lahir</td>
        <td>
            
           <?php
        
        $data_thn =array();
        for($thn_lawas = date('Y') - 40;$thn_lawas <= date('Y');$thn_lawas++){
            $data_thn[$thn_lawas] = $thn_lawas;
        }
        
        $data_tgl =array();
        for($tgl = 1;$tgl <= 31;$tgl++){
                        if ($tgl < 10)
			$tgl = "0".$tgl;
                                
            $data_tgl[$tgl] = $tgl;
        }
 
        
        $data_bln =array();
        for($bln = 1;$bln <= 12;$bln++){
                        if ($bln < 10)
			$bln = "0".$bln;

            $data_bln[$bln] = $this->fungsi->bulan2($bln);
        }
         
       
        echo form_dropdown('tgl', $data_tgl, 0, 'id="tgl" style="width:50px;"').'/';
        echo form_dropdown('bln', $data_bln, 0, 'id="bln" style="width:80px;"').'/';         
        echo form_dropdown('thn', $data_thn, 0, 'id="thn" style="width:80px;"');
 
 
        ?> 
            
            
            
            
            <?php // echo form_input('nim', '', 'id="tgl_lahir"  placeholder="TTL.." data-date-format="yyyy-mm-dd"');?>
        
        
        </td>
    </tr> 
<!--    <script>
        $('#tgl_lahir').datepicker();
        </script>-->
        
    <tr>
        <td>Jenis Kelamin</td>
        <td><?php
        $jenis_kelamin = $this->dropdown_model->jenis_kelamin();
        
        echo form_dropdown('jenis_kelamin', $jenis_kelamin, '', 'id="ref_jenis_kelamin_id"');
        
        //echo form_input('nim', '', 'id="alamat"  placeholder="Alamat.."');?></td>
    </tr>
    
    
   
    <tr>
        <td>Tempat Lahir</td>
        <td><?php echo form_input('nim', '', 'id="tempat_lahir"  placeholder="Tmp lahir.."');?></td>
    </tr>        
        
        
        
    <tr>
        <td>Alamat</td>
        <td><?php echo form_input('nim', '', 'id="alamat"  placeholder="Alamat.."');?></td>
    </tr>      
     <tr>
        <td>No HP*</td>
        <td><?php echo form_input('nim', '', 'id="no_hp"   placeholder="Nomor HP.."');?></td>
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
               check : 2
            }
           $.ajax({
               url : '<?php echo site_url("request/check_perpanjangan")?>',
               data : form_data,
               type : 'post',
               success:function(check){
                if(check == '0'){
                    alert('data tidak ada yg cocok');
                }else{
                    isi = check.split('||');
                    tgl = isi[2].split('-');
                    $('#nama').val(isi[0]); //nama
                    $('#fakultas_jurusan').val(isi[1]); //fakultas & jurusan
                    $('#ttl').val(isi[2]); // ttl
                    $('#alamat').val(isi[3]); //alamat
                    $('#no_hp').val(isi[4]); //no hp
                    $('#ref_jenis_kelamin_id').val(isi[5]);
                    $('#tempat_lahir').val(isi[6]); //no hp
                    
                    //bagian tgl
                    $('#tgl').val(tgl[2]);
                    $('#bln').val(tgl[1]);
                    $('#thn').val(tgl[0]);
                    
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
       tgl_lahir = $('#thn').val()+'-'+$('#bln').val()+'-'+$('#tgl').val();
       
       
       
       if(nim == '' || no_hp == ''){
           alert('nim/no hp masih kosong');
           return false;
       }
       
       
       form_data = {
           submit : 1,
           nim : nim,
           tgl_lahir : tgl_lahir,
           ref_jenis_kelamin_id : $('#ref_jenis_kelamin_id').val(),
           tempat_lahir : $('#tempat_lahir').val(),
           alamat: $('#alamat').val(),
           no_hp : $('#no_hp').val(),
           no_hp : no_hp
       }
       
       $.ajax({
           url : '<?php echo site_url("request/submit_request_baru");?>',
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