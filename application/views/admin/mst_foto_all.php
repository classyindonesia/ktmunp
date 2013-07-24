<?php echo anchor('admin/mst_foto/add','add');?>
<br>
<?php echo anchor('admin/front','back');?>
<?php echo form_open('admin/mst_foto/delete');?>


<table class="table table-bordered">


    <tr>
        
        <td>id</td>
       
        
        <td>nama_file</td>
        
        <td>aktif</td>
        
        <td>op</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($mst_fotos as $mst_foto) { ?>

        <tr>
            <td><?php echo form_checkbox('id[]',$mst_foto['id']).$mst_foto['id']; ?></td>

             
            <td><?php echo $mst_foto['nama_file']; ?></td>
           
            <td><?php echo $mst_foto['aktif']; ?></td>
           
            <td><?php echo $mst_foto['op']; ?></td>
           
            <td><a href="<?php echo site_url().'/admin/mst_foto/form_update/'.$mst_foto['id'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>