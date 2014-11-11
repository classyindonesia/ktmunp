<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
    </head>
    
    
    

<body>
    <div class="container">
        
  
<?php
$this->load->view('komponen/css');
        $this->db->where('mst_batch_id', $this->uri->segment(4));
        
        
           
        
        $q = $this->db->get('mst_batches_mahasiswa');
        foreach($q->result_array() as $list_mhs) {

        //ngambil id dari array yg sudah di enkripsi, menjadi variabel $i  
        $id = $list_mhs['mst_mahasiswa_id'];
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
    $this->db->where('mst_mahasiswa_id', $id);
    $this->db->order_by('id DESC');
    $this->db->limit(1);
    $q = $this->db->get('mst_foto');
    foreach($q->result_array() as $list2){
        
        $foto = $list2['nama_file'];
    }
    
    $data['val'] = $val;

    if(empty($foto)){
              $data['foto'] = "./includes/img/contoh_foto.jpg";
          }else{
             $data['foto'] =  "./includes/img/foto_mahasiswa/".$foto;
          }
 

    $data['id'] = $id;
    $data['fakultas'] = $list['fakultas'];
    $data['tgl_lahir'] = $list['tgl_lahir'];
    $data['tempat_lahir'] = $list['tempat_lahir'];
    $data['alamat'] = $list['alamat'];
    $data['nama'] = $list['nama'];
    $data['jurusan'] = $list['jurusan'];
    $this->load->view('admin/mahasiswa/batch/print_out/ktm_kiri', $data);
    ?>
    

             <div style="margin-right: -0.9em;border : 3px solid #aaa;">
                <img class="pull-right" src="./includes/img/template2/template_ktm_belakang.jpg" width="345" height="215" />
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