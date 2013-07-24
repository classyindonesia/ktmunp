


<div class="span4">

    <h4>Sistem Informasi</h4>
    <hr>
    
    <img style="margin-top: -1.5em;" src="<?php echo base_url();?>includes/img/id_card.png" height="50" width="140" />
    
    <p style="font-weight:bold;">Percetakan Kartu Tanda Mahasiswa</p>
    
    </div>
 
       <?php echo form_open('admin_login/index'); ?>
       <?php echo $this->session->flashdata('login_notif'); ?>
       <?php echo form_error('username'); ?>
       <?php echo form_error('password'); ?>
        
        <div id="login">
            <table class="span3"  border="0" align="center">
                <tr>
                    <td align="center">
                        <h4>login</h4>
                    </td>
                </tr>
                
                
                <tr>
                    <td> 
                         <input style="width:250px" type="text" name="username" placeHolder="username..." /></td>
                </tr>
                <tr>
                    <td>
                        <br>
                         <input style="width:250px" type="password" name="password" placeHolder="password..." /></td>
                </tr>
                <tr>
                  
                    <td align="right">
                        <input class="btn btn-success btn-large" type="submit" name="post" value="masuk" />
                    </td>
                </tr>
            </table>
        </div>
    </form>
    