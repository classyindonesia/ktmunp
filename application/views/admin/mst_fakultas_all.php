<?php
$this->load->view('admin/mahasiswa/tab_menu');
echo anchor('admin/mst_fakultas/add','add', 'class="btn btn-info"');?>
 
<?php echo form_open('admin/mst_fakultas/delete');?>


<table class="table table-bordered">


    <tr class="well">
        
        <td>id</td>
       
        
        <td>nama</td>
        <td>Action</td>

    </tr>
    <?php foreach ($mst_fakultass as $mst_fakultas) { ?>

        <tr>
            <td><?php echo form_checkbox('id[]',$mst_fakultas['id']); ?></td>
            <td><?php echo $mst_fakultas['nama']; ?></td>
            <td><a href="<?php echo site_url().'/admin/mst_fakultas/form_update/'.$mst_fakultas['id'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>