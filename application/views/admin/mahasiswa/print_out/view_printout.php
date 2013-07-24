<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
    </head>
    
    
    

<body>
    <div class="container">

        
        
 
        
  
<?php
$this->load->view('komponen/css');
        $jml = count($arr);   
        for($i=0;$i<$jml;$i++){

        //ngambil id dari array yg sudah di enkripsi, menjadi variabel $i  
        $id = $this->aesfunction->paramDecrypt($arr[$i]);
        
    $pesan = "user ".$this->session->userdata('username')." berhasil mencetak KTM dengan nim : ".$id;
    $this->fungsi->log($pesan);    
        
        $data = $this->mst_mahasiswa_model->cetak($id);
        foreach($data as $list){
        ?>
 
    <?php 
    $this->db->where('variable', 'template');
    $q = $this->db->get('setup_variable');
    foreach($q->result_array() as $item){
        $val = $item['value'];
    }
    
    $this->db->where('variable', 'template_belakang');
    $q = $this->db->get('setup_variable');
    foreach($q->result_array() as $item){
        $val2 = $item['value'];
    }    
    ?>
 <div class="span12">
     
         <?php 
    $data['val'] = $val;

    $data['id'] = $id;
    $data['fakultas'] = $list['fakultas'];
    $data['tgl_lahir'] = $list['tgl_lahir'];
    $data['tempat_lahir'] = $list['tempat_lahir'];
    $data['alamat'] = $list['alamat'];
    $data['nama'] = $list['nama'];
    $data['jurusan'] = $list['jurusan'];
    $this->load->view('admin/mahasiswa/print_out/ktm_kiri', $data);
    ?>
    
  
     
             <div style="margin-right: -2px;border : 3px solid #aaa;">
                <img class="pull-right" src="<?php echo base_url();?>includes/img/template/<?php echo $val2;?>" width="345" height="215" />
             </div>
         
     
     </div> 
<?php    
}
?>




 

            
 








          <?php  
        }


    ?>
      
 </div>    
    
    
    
</body>    
</html>