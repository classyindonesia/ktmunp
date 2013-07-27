

<?php
$this->load->view('admin/user/tab_atas');
  echo form_open('admin/user/delete');?>


<table class="table table-bordered">


    <tr>
        
        <td>id</td>
       
        
        <td>username</td>
        
        
        <td>email</td>
        
        <td>level</td>
        
        <td>status</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($mst_users as $mst_user) { ?>

        <tr>
            <td><?php echo form_checkbox('id[]',$mst_user['id']); ?></td>
            <td><?php echo $mst_user['username']; ?></td>
            <td><?php echo $mst_user['email']; ?></td>
            <td><?php echo $mst_user['level']; ?></td>
            <td><?php
            if($mst_user['aktif'] == 1){
                echo '<i class=" icon-ok"></i>';
            }else{
            echo '<i clas="icon-remove"></i>'; 
            } ?>
            </td>
            <td>
                <?php
                if($this->session->userdata('id') == $mst_user['id']){
                    echo anchor('admin/profil/edit', 'edit');
                }else{
                ?>
                
                <a href="<?php echo site_url().'admin/user/form_update/'.$mst_user['id'];?>" >Edit</a>
                <?php } ?>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>