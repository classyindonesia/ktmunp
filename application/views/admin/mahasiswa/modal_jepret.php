    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
        
     <div class="modal-body">
        
      <div id="modal-body1">  
        <div id="loading_profil">
       <img src="<?php echo base_url()?>includes/img/ajax-loader.gif" />
        </div>
<!--    <p>One fine body…</p>-->
    </div>
 <div  class="span8"  style="display:none;" id="ambil_gambar">
 
<table>
    <tr><td>
<script type="text/javascript">
   // $('#webcam_capture').flash('<?php echo base_url()?>includes/js/webcam.swf');
    document.write( webcam.get_html(250, 313) );
</script> </td>
       <td width="300px">
	<input class="btn btn-success" type=button value="Configure" onClick="webcam.configure()">
        <input class="btn btn-success" type=button value="Reset Kamera" onClick="webcam.reset()">
</td>
</table>
   </div>         
    </div>
    </div>