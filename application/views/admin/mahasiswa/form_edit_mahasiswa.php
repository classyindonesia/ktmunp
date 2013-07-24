<button id="kembali" class="btn btn-info"> <i class="icon-arrow-left"></i> back </button>
<button id="update" class="btn btn-info"> <i class="icon-ok-sign"></i> simpan </button>
<img style="display:none" id="loading_simpan" src="<?php echo base_url()?>includes/img/ajax-loader.gif" style="width: 150px" />


<table>
    
    <tr>
        <td colspan="3" align="left"><h4>DATA MAHASISWA</h4></td>
    </tr>
    
        <tr style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td  width="100px">NIM</td> <td>:</td><td> <?php echo form_input('nim', $mahasiswa['id'], 'id="nim" readonly=0');?></td>
    </tr>
    
    
    <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td valign="top" >Nama</td> <td valign="top">:</td><td style="text-transform: uppercase"> <?php echo form_input('nama', $mahasiswa['nama'], 'id="nama"');?></td>
    </tr>
    
    
    <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td valign="top" >Jurusan</td> <td valign="top">:</td><td> <?php
        echo  form_dropdown('jurusan', $jurusan, $mahasiswa['mst_jurusan_id'], 'id="mst_jurusan_id" style="width:150px"');
        
        
        ?></td>
    </tr>    

    
</table>

    <hr>
    
    
    
    <table>
        
    <tr>
        <td colspan="3" align="left"><h4>BIODATA MAHASISWA</h4></td>
    </tr>
            
        
        
        
        
           <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
                
               <td width="100px">Tempat Lahir</td> <td>:</td><td>
                   
                   <?php 
                   echo form_input('tempat_lahir', $mahasiswa['tempat_lahir'], 'id="tempat_lahir" style="width:60px"');
                   ?>
                   
                   
               </td>
        
        
        
         
            <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
                
        <td width="100px">Tgl Lahir</td> <td>:</td><td> <?php 
        $data_thn = array();
        for($thn = 1970;$thn <= date('Y'); $thn++){
            $data_thn[$thn] = $thn;
        }
                 
        $data_bln =array();
        for($bln = 1;$bln <= 12;$bln++){
            $data_bln[$bln]= $this->fungsi->bulan2($bln);
        }
        
        $data_tgl =array();
        for($tgl = 1;$tgl <= 31;$tgl++){
            $data_tgl[$tgl]=$tgl;
        }
        
        
        
        echo    form_dropdown('tgl', $data_tgl, date('d', strtotime($mahasiswa['tgl_lahir'])), 'id="tgl" style="width:50px"').'/'.
               form_dropdown('bln', $data_bln, date('m', strtotime($mahasiswa['tgl_lahir'])), 'id="bln" style="width:50px"').'/'.
               form_dropdown('thn', $data_thn, date('Y', strtotime($mahasiswa['tgl_lahir'])), 'id="thn" style="width:80px"').'/';
        
        
        
        ?></td>
    </tr>
        <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td valign="top">Alamat </td> <td valign="top">:</td><td> <?php echo form_input('alamat', $mahasiswa['alamat'], 'id="alamat"');?></td>
    </tr>
    <tr  style="padding: 1em 0 0 10px;border-bottom:  1px solid #ccc; ">
        <td>No HP</td> <td>:</td><td> <?php echo form_input('no_hp', $mahasiswa['no_hp'], 'id="no_hp"');?></td>
    </tr>    
    </table>
    
    
    
    
    <script>
        $(document).ready(function(){
    
    $('#tgl_lahir2').datepicker({
        format : "yyyy-mm-dd"
    });
});    
    
        
        
        
        
        $('#edit').click(function(){
            $('#tabel_profil').hide();
            $('#form_edit').fadeIn();
            
        })

        $('#kembali').click(function(){
            $('#form_edit').hide();
            $('#tabel_profil').fadeIn();
            
            
        })
        
        
        
        $('#update').click(function(){
            $('#loading_simpan').fadeIn();
             
            nama = $('#nama').val();
             
            tgl_lahir = $('#thn').val()+'-'+$('#bln').val()+'-'+$('#tgl').val();
            tempat_lahir = $('#tempat_lahir').val();
            alamat = $('#alamat').val();
            mst_jurusan_id = $('#mst_jurusan_id').val();
            no_hp = $('#no_hp').val();
            
            
            if(nama == ''){
                alert('nama masih kosong');
                $('#loading_simpan').fadeOut();
                return false;
            }
            
            
            form_data = {
                id : "<?php echo $mahasiswa['id'];?>",
                nama : nama,
                tempat_lahir : tempat_lahir,
                tgl_lahir : tgl_lahir,
                alamat : alamat,
                no_hp : no_hp,
                mst_jurusan_id : mst_jurusan_id,
                ref_jenis_kelamin_id : <?php echo $mahasiswa['ref_jenis_kelamin_id'];?>,
                update : 1
            }
         
         $.ajax({
             url : "<?php echo site_url('admin/mst_mahasiswa/update')?>",
             type : 'post',
             data : form_data,
             success:function(sukses){
                 $('#loading_simpan').fadeOut();
                 $('.modal-body').load('<?php echo site_url("admin/mst_mahasiswa/view_profil/".$this->uri->segment(4));?>'); 
             }
         })
          
          
            
        });//end of click update
        
        
    </script>