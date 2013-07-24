	<!-- First, include the JPEGCam JavaScript Library -->

	







	<!-- Configure a few settings -->
	<script language="JavaScript">
   
		webcam.set_quality( 100 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true ); // play shutter click sound
	</script>








	




    <table>
    

    
    <tr>
        <td><br></td>
    <td>
        
        
        <input style="display: none" id="foto_file1" type="file" name="userfile" size="10" />
    
    

    </td>
    </tr>

    
    
    
    
    <tr>
        <td>tempat_lahir</td>
        <td><input class="input_form" type="text" id="tempat_lahir" name="tempat_lahir" value="<?php if(isset ($isi['tempat_lahir'])){echo $isi['tempat_lahir'];}?>" /></td>
    </tr>
    
    
    
    
    
    
    
    <tr>
        <td>tgl_lahir</td>
        <td>
            <input class="input_form" id="tgl_lahir" type="text" name="tgl_lahir" value="<?php if(isset ($isi['tgl_lahir'])){echo $isi['tgl_lahir'];}?>" />
         </td>
    </tr>
    
    
    
    

    
    
    
     <tr>
        <td>Jenis Kelamin </td>
        <td>  
            <?php if(isset ($isi['ref_jenis_kelamin_id'])){
            
            echo form_dropdown("ref_jenis_kelamin_id", $jenis_kelamin, $isi['ref_jenis_kelamin_id'], 'class="input_form" id="ref_jenis_kelamin_id"');
            
            }else{
              echo form_dropdown("ref_jenis_kelamin_id", $jenis_kelamin, "", 'class="input_form" id="ref_jenis_kelamin_id"');

            }

             ?> </td>
    </tr>
    
    
    
    
    <tr>
        <td>no_hp</td>
        <td><input class="input_form" id="no_hp" type="text" name="no_hp" value="<?php if(isset ($isi['no_hp'])){echo $isi['no_hp'];}?>" /></td>
    </tr>
    
    
 
    
     <tr>
        <td>Berlaku Hingga </td>
        <td>  
            <?php  
              echo form_dropdown("masa_berlaku", $masa_berlaku, "", 'class="input_form" id="masa_berlaku"');
             ?> </td>
    </tr>    
    
  
    
    
    
    </table>
        
        
        
<!--        	 Some buttons for controlling things 
	<br/><form>
		<input type=button value="Configure..." onClick="webcam.configure()">
		&nbsp;&nbsp;
		<input type=button value="Take Snapshot" onClick="take_snapshot()">
	</form>-->
        
        
        	<!-- Code to handle the server response (see test.php) -->
	<script language="JavaScript">
		
		//webcam.set_hook( 'onComplete', 'my_completion_handler' );
		
		
		function take_snapshot() {
			// take snapshot and upload to server
		 	//document.getElementById('upload_results').innerHTML = '<h1>Uploading...</h1>';
			webcam.snap();
                       // alert(id_mahasiswa);
		}
 
	</script>



