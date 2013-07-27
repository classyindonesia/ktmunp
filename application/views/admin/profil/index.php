<h4>Edit Profil</h4>

<hr>

 <div class="span5">
    <?php
        $this->load->view('admin/profil/edit_profil');
    ?>
 </div>
 <div class="span5">
    <?php
        $this->load->view('admin/profil/edit_password');
    ?>
 </div>
<div class="span10">
     <div class="alert">
    <strong> <i class=" icon-info-sign"></i> Warning!</strong> Kosongkan password jika tdk ingin mengubahnya
    </div>
    <div id="pesan">
        
    </div>
    
    
<br>
<button id="update" class="btn btn-success"> <i class="icon-ok"> </i> Update</button>

<span id="sukses" style="display:none" class="alert alert-success"> saved </span>


<img style="display:none" src="<?php echo base_url();?>includes/img/ajax-loader.gif" id="loading" />


</div>




<script>
    
    function update_profil(email){
 
    if(email == ''){
        alert('email masih kosong');
        return false;
    }

        form_data ={
            update : 1,
            username : $('#username').val(),
            email : email
        }
        
        
        $.ajax({
            url : "<?php echo site_url('admin/profil/update_biodata');?>",
            type : 'post',
            data : form_data,
            success:function(sukses){
                //sukses statement
            }
            
        }); //end of ajax
    }
    
   function update_password(pass1, pass2){


    if(pass1 != '' && pass2 != ''){
        
        if(pass1 != pass2){
            alert('password tdk sama, silahkan ketik ulang');
            $('#pass1').val('');
            $('#pass2').val('');
            $('#pass1').focus();
            $('#loading').fadeOut();
            return false;
        }
        
        
        form_data = {
            update : 1,
            username : $('#username').val(),            
            password : pass1
        }
        
        $.ajax({
            url : "<?php echo site_url('admin/profil/update_password');?>",
            type : 'post',
            data : form_data,
            success:function(sukses){
            $('#pass1').val('');
            $('#pass2').val('');
            $('#pass_lama').val('');
            $('#pesan').html('<div class="alert alert-success"> password telah tersimpan </div>').fadeOut(2500, function(){
            $('#pesan').html(''); 
            });
                
            }
        })
        
    }//end if

}
 
    
    function cek_password_lama(pass){
    
    pass_lama = $('#pass_lama').val();
 
    if(pass_lama != ''){
        
        
        form_data = {
            check : 1,
            pass_lama : pass_lama
        }
        hasil = null;
         
        $.ajax({
            url : "<?php echo site_url('admin/profil/check_pass_lama');?>",
            data : form_data,
            type : 'post',
            async: false,
            success:function(check){
                hasil = check; 
            }
        })
        
        
        
        
    } 
    
     return hasil;
    }
    





    
    $(document).ready(function(){



    $('#update').click(function(){
 
 
        $('#loading').show();
        
       update_profil($('#email').val());
        
        pass1 = $('#pass1').val();
        pass2 = $('#pass2').val();
        pass_lama = $('#pass_lama').val();
        
        
         
         if(pass1 != '' && pass2 != '' && pass_lama != ''){
             check = cek_password_lama(pass_lama);
             if(check != 1){
                 
                  alert('password lama salah');
            $('#pass1').val('');
            $('#pass2').val('');
            $('#pass_lama').val('');
            $('#pass_lama').focus();
            $('#loading').fadeOut();
                 return false;
             }
             
           if(pass1 != pass2){
            alert('password tdk sama, silahkan ketik ulang');
            $('#pass1').val('');
            $('#pass2').val('');
            $('#pass1').focus();
            $('#loading').fadeOut();
            return false;
        }
        
        
        
        
        update_password(pass1, pass2);
        
 

       
        }
        $('#loading').fadeOut();

        
    });//end of click function

    
    });
    

    
</script>