<?php

class Import extends CI_Controller {

    function __construct() {
        parent::__construct();
         if ($this->session->userdata("login") != TRUE) {
           $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        
        $this->load->library(array('excel_reader'));
        $this->load->model(array('import_model', 'dropdown_model'));
    }

    
    
    function index() {
        $data['mahasiswa'] = "class='active'";        
        $data['import'] = 'class="active"';
        $data['jurusan'] = $this->dropdown_model->jurusan();
        $data['masa_berlaku'] = $this->dropdown_model->batch();
        $data['content']='admin/mahasiswa/import/index';
        $this->load->view('admin/template',$data);
    }

    
            
function data_mahasiswa(){    
 if(!file_exists($_FILES['userfile']['tmp_name']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
    echo 'No upload';
}else{
    if($_FILES['userfile']['type'] == 'application/vnd.ms-excel' || $_FILES['userfile']['type'] == 'application/vnd.ms-office'){
        $file = $_FILES['userfile']['tmp_name'];
        $this->excel_reader->read($file);
            $worksheet = $this->excel_reader->worksheets[0];

            $i=0;
        foreach($worksheet as $list){
            $no = 0;
            if($i != 0){
//                            //0 = nim
//                            //1 = nama
//                            //2 = jenis kelamin
//                            //3 = Tempat Lahir
//                            //4 = Tgl Lahir
//                            //5 = Alamat
                              //6 = tgl lahir

                       $nim = $list[0];
                       $nama = $list[1];
                       
                        if(!empty($list[2])) 
                        {
                            $jk = $list[2];
                            if($jk == 'P' || $jk == 'p'){
                                $jk = 2;
                            }else{
                                $jk = 1;
                            }
                        } else {
                            $jk = 0;
                        }
                        if(!empty($list[3]))  $tempat_lahir = $list[3];  else $tempat_lahir = 0;                        
                        if(!empty($list[4]))  $tgl_lahir = $list[4];  else  $tgl_lahir = 0;                        
                       if(!empty($list[5])) $alamat = $list[5]; else  $alamat = 0;                        
                       if(!empty($list[6])) $no_hp = $list[6]; else  $no_hp = 0;   
                       $jurusan = $this->input->post('mst_jurusan_id');
                       $batch_id = $this->input->post('mst_batch_id');
                       
                       $check_batches = $this->import_model->check_batches_mahasiswa($nim, $batch_id);
                       
                       $check = $this->import_model->check_data_mahasiswa($nim);
                       
                       if($check == 0 && $check_batches == 0){
                       //jika blm ada, maka akan insert
                       $this->import_model->import_mahasiswa($nim, $nama, $jk, $tempat_lahir, $tgl_lahir, $alamat, $no_hp, $jurusan);
                       $this->import_model->import_batches_mahasiswa($nim, $batch_id);
                       }elseif($check == 1 && $check_batches == 0){
                           //jika sudah ada data mahasiswa, tp blm ada di batches, 
                           //maka akan masuk ke batches saja
                           $this->import_model->import_batches_mahasiswa($nim, $batch_id);
                       }else{
                           //jika sudah ada semua, maka akan masuk log
                           
                           if($no_hp == 0){
                               $pesan = "mahasiswa dengan NIM ".$nim.' belum memiliki nomor HP';
                               $this->fungsi->log($pesan);
                           }
                           if($alamat == 0){
                               $pesan = "mahasiswa dengan NIM ".$nim.' belum memiliki alamat';
                               $this->fungsi->log($pesan);
                           }                           
                           $pesan = "Mahasiswa dengan NIM <b>".$nim.'</bi> sudah ada dalam database. maka data tdk di import ke db';
                           $this->fungsi->log($pesan);
                           
                       }
                       
                       
                       // $this->mst_nilai_uas_model->import($nis, $nk,$na, $np, $kkm);
                  // echo $check.'/ '.$check_batches.'<br>';
                       
                   }
                   $i++;
                   }
                echo 'sukses!!!';
            }else{
                
                 
             echo 'file harus ekstensi .xls || '.$_FILES['userfile']['type'];
            }
    
             
}

         

}

            
            
            
            
            
    
}

//end of import file