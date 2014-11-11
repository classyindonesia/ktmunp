<script type="text/javascript" src="<?php echo base_url();?>includes/js/webcam.js"></script>


<?php
$this->load->view('admin/mahasiswa/tab_menu');


    $uri = $this->uri->segment(4);
    if($uri == NULL){
    $data['no']=1;
    }else{
        $data['no']=$uri;
    }
    
echo '<div class="span12">';    



$this->load->view('admin/mahasiswa/search2/search_mahasiswa', $data);


echo '</div>';

?>
<div class="span12" id="konten">
    
    </div>