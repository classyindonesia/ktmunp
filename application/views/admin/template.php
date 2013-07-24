<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Percetakan Kartu Tanda Mahasiswa</title>
<?php
$this->load->view('komponen/css');
$this->load->view('komponen/js');
?>
 
 
 
<script type='text/javascript'>
     $(document).ready(function () {
     if ($("[rel=tooltip]").length) {
     $("[rel=tooltip]").tooltip();
     }
   });
  </script>
  
 
    </head>
    <body>
        
        
        
           
<div class="container">

    
    
    
<?php
$this->load->view('komponen/nav_atas');

?>
    
    
    

    
     
  
    
    
    

         
        
    <div class="row-fluid">

    <div class="span12">
        
        <div class="span12">
        <?php
        $this->load->view('komponen/alert');
        ?></div>
        
        
                
                    
                    <?php 
                    if($this->session->flashdata('notif')){
                    echo '<div class="alert">'.$this->session->flashdata('notif').'</div>';
                        
                    }
                    ?>
                

        
        
    
        <?php
        $this->load->view($content);
        ?>
    </div>
    </div>
    </div>  
  
    

        
        
        
        
        
    </body>
</html>
