<div id="tabel_profil" class="span8" >
<button id="edit" class="btn btn-info"><i class="icon-edit"></i> edit</button>

 <table>
    
    <tr>
        <td colspan="3" align="left"><h4>DATA MAHASISWA</h4></td>
    </tr>
    
        <tr style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td  width="100px">NIM</td> <td>:</td><td> <?php echo $mahasiswa['id'];?></td>
    </tr>
    
    
    <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td valign="top" >Nama</td> <td valign="top">:</td><td style="text-transform: uppercase"> <?php echo $mahasiswa['nama'];?></td>
    </tr>
    
    
    <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td valign="top" >Fak/Jurusan</td> <td valign="top">:</td><td> <?php echo $mahasiswa['fakultas'].' /'.$mahasiswa['jurusan'];?></td>
    </tr>    

    
</table>
    
 
    
    
    
    <table>
        
    <tr>
        <td colspan="3" align="left"><h4>BIODATA MAHASISWA</h4></td>
    </tr>
            
        
        
            <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td width="100px">TTL</td> <td>:</td><td> <?php echo $mahasiswa['tempat_lahir'].', '.$this->fungsi->date_to_tgl($mahasiswa['tgl_lahir']);?></td>
    </tr>
        <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td valign="top">Alamat </td> <td valign="top">:</td><td> <?php echo $mahasiswa['alamat'];?></td>
    </tr>
    <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td>No HP</td> <td>:</td><td> <?php echo $mahasiswa['no_hp'];?></td>
    </tr>    
    </table>
   
    
    
 
    
</div>

<div style="display: none" id="form_edit" class="span7" >
 <?php echo $this->load->view('admin/mahasiswa/form_edit_mahasiswa');?>      
</div>





<div class="span4">
    
    <?php
    if(!empty($foto['nama_file'])){
    ?>
    <img class="img-polaroid" src="<?php echo base_url();?>includes/img/foto_mahasiswa/<?php echo $foto['nama_file']?>" />
   
<ul style="height: 300px" id="dropdown" class="nav nav-pills">
    <li class="dropdown">
    <a class="dropdown-toggle"
    data-toggle="dropdown"
    href="#">
    Ganti Foto 
    <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <!-- links -->
    <li><a id="capture" href="#">  Ambil Dari Webcam</a> </li>
    <li> <a href="#" id="upload"> Upload </a></li>
    </ul>
    </li>
    </ul>   


  <?php
    }else{
    ?>
    
    <div style="height: 150px; border: 1px solid #ccc;">FOTO MASIH KOSONG
     </div>
<ul id="dropdown" class="nav nav-pills">
    <li class="dropdown">
    <a class="dropdown-toggle"
    data-toggle="dropdown"
    href="#">
    Upload Foto
    <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <!-- links -->
    <li><a id="capture" href="#">  Ambil Dari Webcam</a> </li>
    <li> <a href="#" id="upload"> Upload </a></li>
    </ul>
    </li>
    </ul>    
    
    
    
    <?php }?>
    
    

    

    
    
    
    <div style="display:none" id="upload_gambar">
        
        
   <input  type="file" id="foto_file1" name="userfile" size="4" />
   
   
   <button id="submit_upload" class="btn btn-success"><i class="icon-upload"></i> upload</button>
    <a class="btn btn-info pull-right" id="back2" href="#"><i class="icon-arrow-left"></i>  back</a>
    <br>
    <img style="display:none" id="loading_upload" src="<?php echo base_url()?>includes/img/ajax-loader.gif" />
 
    
    </div>
    
    
    
    
    
    <div style="display:none" id="capture_gambar">
        
        <?php
         //$data['nim'] = $mahasiswa['id'];
        // $this->load->view('admin/mahasiswa/show_profil_capture', $data);?>
        
          
 
    </div>
        
        
    
    </div>  <!--end of span3-->




<script>
    $(document).ready(function(){
        $('#loading_profil').fadeOut();
        $('#ambil_gambar').hide();
        

        

        
          $('#back2').click(function(){
            $('#capture_gambar').hide();
            $('#upload_gambar').hide();
            $('#dropdown').fadeIn();
            return false;
        });      
        
        
        
        $('#upload').click(function(){
            
            $('#dropdown').hide(function(){
                $('#upload_gambar').fadeIn();
            });
            
            
            
            return false;
        })
        
        
        
           $('#capture').click(function(){
            $('#dropdown').hide(function(){
                $('#capture_gambar').fadeIn(function(){
                    $('#capture_gambar').load('<?php echo site_url('admin/mst_mahasiswa/show_profil_capture/'.$this->uri->segment(4));?>');
                });
              $('#ambil_gambar').fadeIn();  
            });
            
            
            
            return false;
        }) 
        
        
        
        
        
    })
    
    
    
    
    $('#submit_upload').click(function(){
        $('#loading_upload').fadeIn();
       ajax_upload().done(function(){
           $('#loading_upload').hide();
       }); 
       
    });
    
    
    
    
    
    //fungsi untuk upload gambar    
function ajax_upload(){
    
     form_data = {
        upload : 1,
        nim : '<?php echo $mahasiswa['id'];?>'
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
                 
                 $('#modal-body1').load('<?php echo site_url("admin/mst_mahasiswa/view_profil/".$this->uri->segment(4));?>');
                 
                 
                 
             }else{
                 //gagal
                 $('#loading_upload').hide();
                 var upload = upload;
                   alert('terjadi kesalahan, coba periksa ekstensi gambar');
               // $('.error').fadeIn().html('').append('<div class="alert alert-error">Foto Gagal Terupload (periksa ekstensi file) </div>');
               // $('#myModal').modal('show');                
                 //return false;
             }
             
         }
    });
    
     
}     
    
    
    
    
    </script>