
<?php
if ($type_form == 'post') {

    echo form_open('admin/mst_foto/add');
} else {

    echo form_open('admin/mst_foto/update');
}
?>


<?php echo form_error('nama_file'); ?>

<?php echo form_error('aktif'); ?>

<?php echo form_error('op'); ?>

<table class="table table-bordered">
    
    <tr>
        <td>id-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id" value="<?php if(isset ($isi['id'])){echo $isi['id'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td>nama_file</td>
        <td><input type="text" name="nama_file" value="<?php if(isset ($isi['nama_file'])){echo $isi['nama_file'];}?>" /></td>
    </tr>
    
    <tr>
        <td>aktif</td>
        <td><input type="text" name="aktif" value="<?php if(isset ($isi['aktif'])){echo $isi['aktif'];}?>" /></td>
    </tr>
    
    <tr>
        <td>op</td>
        <td><input type="text" name="op" value="<?php if(isset ($isi['op'])){echo $isi['op'];}?>" /></td>
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