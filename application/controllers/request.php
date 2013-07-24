<?php

Class Request extends Ci_controller{
    
    
        function __construct() {
        parent::__construct();
        $this->load->model(array('mst_request_model', 'dropdown_model'));
    }
    
    
    
    
    
    function cetak($id = NULL){
        $data['cetak'] = $this->mst_request_model->get_cetak_perpanjangan($id);
        $this->load->view('public_konten/request/cetak_perpanjangan', $data);       
    }
    
    
    function perpanjangan(){
        $data['perpanjangan'] = 'class="active"';
        $data['main'] = 'public_konten/request/req_perpanjangan';
        $this->load->view('public_template', $data);
    }
    
        function buat_baru(){
        $data['baru'] = 'class="active"';
        $data['main'] = 'public_konten/request/req_baru';
        $this->load->view('public_template', $data);
    }
    
    
    function check_perpanjangan(){
        $check = $this->input->post('check');
        if($check){
            
        $nim = trim($this->input->post('nim')); 
        //trim berfungsi untuk menghilangkan spasi di depan dan belakang
        //ada jg fungsi lain yg serupa, yaitu rtrim dan ltrim
        //yaitu hanya menghilangkan spasi di depan saja or belakang saja
        
        
        $this->db->select('M.*, MF.nama as fakultas, MJ.nama as jurusan');
        $this->db->join('mst_jurusan MJ', 'M.mst_jurusan_id=MJ.id');
        $this->db->join('mst_fakultas MF', 'MJ.mst_fakultas_id=MF.id');
        $this->db->where('M.id', $nim);
        $q = $this->db->get('mst_mahasiswa M');
        if($q->num_rows() <= 0){
            echo 0;
        }else{
            foreach($q->result_array() as $list){
                if($check == 1){
                $tgl_lahir = $this->fungsi->date_to_tgl($list['tgl_lahir']);
                }else{
                 $tgl_lahir = $list['tgl_lahir'];   
                }
                echo $list['nama'].'||'.$list['jurusan'].'/'.$list['fakultas'].'||'.$tgl_lahir.'||'.$list['alamat'].'||'.$list['no_hp'].'||'.$list['ref_jenis_kelamin_id']
                        .'||'.$list['tempat_lahir'];
            }
        }
        
        
            
        
        }else{
            show_404('page');
        }
        
        
        
    }
    
    
    
    function submit_perpanjangan(){
       if($this->input->post('submit')){
           $nim = trim($this->input->post('nim'));
           
           $this->db->where('mst_mahasiswa_id', $nim);
           $this->db->where('aktif', 2);
          // $this->db->where('aktif', 1);
           $q = $this->db->get('mst_request');
           if($q->num_rows() <= 0){
           
           
           
           $data = array(
               'mst_mahasiswa_id'       => $nim,
               'tgl'                    => date('Y-m-d'),
               'aktif'                  => 2, //1= approve, 2=pending, 3=ditolak, 0=ktm telah diterima
               'ref_jenis_request_id'   => 1, //perpanjangan
               'no_hp'                  => $this->input->post('no_hp'),
               'op'                     => $this->fungsi->op()
           );
            $this->db->insert('mst_request', $data);
           echo 'sukses';
           }else{
               echo 'data anda sedang diproses';
           }
       }else{
           show_404('page');
       } 
        
       
    }
    
    
    
    
    
    
    
    
    
    
    
    
        function submit_request_baru(){
       if($this->input->post('submit')){
           $nim = trim($this->input->post('nim'));
           $this->db->where('mst_mahasiswa_id', $nim);
           $this->db->where('aktif', 2);
          // $this->db->where('aktif', 1);
           $q = $this->db->get('mst_request');
           if($q->num_rows() <= 0){
           $data = array(
               'mst_mahasiswa_id'       => $nim,
               'tgl'                    => date('Y-m-d'),
               'aktif'                  => 2, //1= approve, 2=pending, 3=ditolak, 0=ktm telah diterima
               'ref_jenis_request_id'   => 2, //buat baru
               'no_hp'                  => $this->input->post('no_hp'),
               'op'                     => $this->fungsi->op()
           );
           $this->db->insert('mst_request', $data);
           
           $data2=array(
               'tgl_lahir'              => trim($this->input->post('tgl_lahir')),
               'tempat_lahir'           => trim($this->input->post('tempat_lahir')),
               'alamat'                 => trim($this->input->post('alamat')),
               'ref_jenis_kelamin_id'   => $this->input->post('ref_jenis_kelamin_id'),
               'no_hp'                  => trim($this->input->post('no_hp')),
            );
           $this->db->where('id', $nim);
           $this->db->update('mst_mahasiswa', $data2);
           
           echo 'sukses';
           }else{
               echo 'data anda sedang diproses';
           }
       }else{
           show_404('page');
       } 
        
       
    }
    
    
    
    
    
    
}