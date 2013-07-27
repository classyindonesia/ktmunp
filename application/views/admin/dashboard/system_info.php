<table class="table table-bordered">
    
    <tr>
        <td colspan="2" class="well">
            Informasi Sistem
        </td>
    </tr>
    
    
    <tr>
        <td>
           <i class=" icon-picture"></i> Kapasitas Foto Mahasiswa
        </td>
        <td>  <?php
$this->load->helper('number');

$ukuran = $this->fungsi->get_dir_size('./includes/img/foto_mahasiswa');
echo byte_format($ukuran);
?></td>
    </tr>
    
    
    
      <tr>
        <td>
            <i class=" icon-edit"></i> Permission Folder
        </td>
        <td>  <?php
        if(is_writable('./includes/img/foto_mahasiswa')){
            echo '<i class="icon-ok"></i> no problem';
        }else{
           echo '<span style="background-color: red"><i class="icon-exclamation-sign"></i> error </span>';
        }

?></td>
    </tr>  
    

    
    
      <tr>
        <td>
     <i class=" icon-user"></i> Jumlah Mahasiswa
        </td>
        <td>
<?php
$this->db->where('aktif', 1);
$jml = $this->db->count_all_results('mst_mahasiswa');
echo $jml,' orang';
?>
            
            
            
        </td>
    </tr>      
    
    
    
</table>