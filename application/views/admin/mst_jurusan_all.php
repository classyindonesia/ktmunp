<?php
$this->load->view('admin/mahasiswa/tab_menu');
  echo anchor('admin/mst_jurusan/add','add', 'class="btn btn-info"');?>
<?php echo form_open('admin/mst_jurusan/delete');?>


<table class="table table-bordered">


    <tr class="well">
        
        <td>id</td>
       
        
        <td>mst_fakultas_id</td>
        
        <td>nama</td>
        <td>Action</td>

    </tr>
    <?php foreach ($mst_jurusans as $mst_jurusan) { ?>

        <tr>
            <td><?php echo form_checkbox('id[]',$mst_jurusan['id']); ?></td>
            <td><?php echo $mst_jurusan['fakultas']; ?></td>
            <td><?php echo $mst_jurusan['nama']; ?></td>
            <td><a href="<?php echo site_url().'/admin/mst_jurusan/form_update/'.$mst_jurusan['id'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>