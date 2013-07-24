<?php
$this->load->view('admin/mahasiswa/tab_menu');
if ($type_form == 'post') {

    echo form_open('admin/mst_fakultas/add');
} else {

    echo form_open('admin/mst_fakultas/update');
}
?>


<?php echo form_error('nama'); ?>

<?php echo form_error('aktif'); ?>

<?php echo form_error('op'); ?>

<table class="table table-bordered">
 
   
    <tr>
        <td>nama</td>
        <td><input type="text" name="nama" value="<?php if(isset ($isi['nama'])){echo $isi['nama'];}?>" /></td>
    </tr>
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['id'])){ echo form_hidden('id',$isi['id']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>
</table>




</form>