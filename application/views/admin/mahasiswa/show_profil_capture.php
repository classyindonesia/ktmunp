	<!-- Configure a few settings -->
	<script language="JavaScript">
   
		webcam.set_quality( 100 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true ); // play shutter click sound

     <?php $url = site_url('admin/mst_mahasiswa/capture/'.$this->aesfunction->paramDecrypt($nim));?> 
   // var nim_url = document.getElementById('nim').value;  
    webcam.set_api_url('<?php echo $url ?>');
	</script>
        
        

 
        
        <span id="webcam_capture">
        </span>
        
        
 
        
        <button class="btn btn-info"  onClick="take_snapshot()"><i class="icon-camera"></i> Jepret</button>

        <a class="btn btn-info pull-right" id="back" href="#"><i class="icon-arrow-left"></i>  back</a>
        
           <br>
        <img style="display: none"  id="loading_capture" src="<?php echo base_url()?>includes/img/ajax-loader.gif" />
        
        
        
        
        
        	<script language="JavaScript">
		
		//webcam.set_hook( 'onComplete', 'my_completion_handler' );
            $('#back').click(function(){
            $('#capture_gambar').hide();
            $('#upload_gambar').hide();
            $('#dropdown').fadeIn();
            $('#ambil_gambar').hide();
            return false;
        });
		
		function take_snapshot() {
                        webcam.snap();
			// take snapshot and upload to server
		 	//document.getElementById('upload_results').innerHTML = '<h1>Uploading...</h1>';
                        $('#loading_capture').show();
			
                        $('#loading_capture').fadeOut();
                        $('#ambil_gambar').hide('slow', function(){
                            
                                $('#modal-body1').load('<?php echo site_url("admin/mst_mahasiswa/view_profil/".$this->uri->segment(4));?>');
                        
                    });
                        
                       // alert(id_mahasiswa);
		}
 
	</script>