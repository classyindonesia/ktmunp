
<?php
$this->load->view('admin/user/tab_atas');

if ($type_form == 'post') {

    echo form_open('admin/user/add');
} else {

    echo form_open('admin/user/update');
}
?>


<?php echo form_error('username'); ?>

<?php echo form_error('password'); ?>

<?php echo form_error('email'); ?>

<?php echo form_error('ref_level_user_id'); ?>

<?php echo form_error('status'); ?>

<table >
 
   
    <tr>
        <td>username</td>
        <td>
            <?php if(isset ($isi['username'])){
    ?>
                        <input readonly="0" type="text" name="username" value="<?php if(isset ($isi['username'])){echo $isi['username'];}?>" />
            <?php
                
            }else{
?>
                        
                        <input type="text" name="username" value="<?php if(isset ($isi['username'])){echo $isi['username'];}?>" />
        
                        
                        <?php
            }
                        ?>
        </td>
    </tr>
    

    
    <tr>
        <td>email</td>
        <td><input type="text" name="email" value="<?php if(isset ($isi['email'])){echo $isi['email'];}?>" /></td>
    </tr>
    
    <tr>
        <td>level</td>
        
        <td>
            <?php if(isset ($isi['ref_user_level_id'])){
            
            echo form_dropdown("ref_level_user_id", $level, $isi['ref_user_level_id'], 'class="input_form" id="jurusan"');
            
            }else{
              echo form_dropdown("ref_level_user_id", $level, "", 'id="jurusan" class="input_form"');

            }

             ?>            
        </td>
    </tr>
    
    
    
    
    
    
    <tr>
        <td>password</td>
        <td><input type="password" name="password" value="" id="pass1" /></td>
    </tr>
    
    
    
        <tr>
        <td>re-password</td>
        <td><input type="password" name="password2" value="" id="pass2" /></td>
    </tr>
    
    
    
    
    
    
    
    
 
    
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input class="btn btn-info" id="submit" type="submit" name="post" value="Submit" disabled="disabled" />
               <?php } else { ?>

             <?php if(isset ($isi['id'])){ echo form_hidden('id',$isi['id']);}?>

            <input id="submit" class="btn btn-info" type="submit" name="update" value="update" disabled="disabled" />       
            
                <?php } ?>

        </td>
    </tr>
</table>
</form>




<script>
$(document).ready(function(){
    $('#submit').removeAttr('disabled');
    
   
   
   $('#submit').click(function(){
       
   pass = $('#pass1').val();
   pass2 = $('#pass2').val();
   
   if(pass != '' || pass2 != ''){
       if(pass != pass2){
           alert('pasword tdk cocok');
           return false;
       }
       
   }
   
       
   }); //end of click function
    
    
});   




</script>