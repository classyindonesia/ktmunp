<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class import_model extends CI_Model {
 
    
    
    //fungsi untuk mengecek, apakah data sudah ada atau belum
    function check_data_mahasiswa($nim){
        $this->db->where('id', $nim);
        $q = $this->db->get('mst_mahasiswa');
        if($q->num_rows() <= 0){
            //jika blm ada, maka tampil 0
            $data = 0;
        }else{
            //jika sudah ada
            $data = 1;
        }
        return $data;
    }
    
    
    function check_batches_mahasiswa($nim, $batches_id){
        $this->db->where('mst_mahasiswa_id', $nim);
        $this->db->where('mst_batch_id', $batches_id);
        $q = $this->db->get('mst_batches_mahasiswa');
        if($q->num_rows() <= 0){
            //jika blm ada, maka tampil 0
            $data = 0;
        }else{
            //jika sudah ada
            $data = 1;
        }
        return $data;
    }    
    
    
    function import_mahasiswa($nim, $nama, $jk, $tempat_lahir, $tgl_lahir, $alamat, $no_hp, $jurusan){
    $data = array(
        'id'                    => $nim,
        'nama'                  => $nama,
        'ref_jenis_kelamin_id'  => $jk,
        'tempat_lahir'          => $tempat_lahir,
        'tgl_lahir'             => $tgl_lahir,
        'alamat'                => $alamat,
        'no_hp'                 => $no_hp,
        'mst_jurusan_id'        => $jurusan
    );    
    $this->db->insert('mst_mahasiswa', $data);
    }
    
    
    
    function import_batches_mahasiswa($nim, $batch_id){
        $data = array(
          'mst_mahasiswa_id' => $nim,
          'mst_batch_id'     => $batch_id
        );
        
        $this->db->insert('mst_batches_mahasiswa', $data);
        
    }
    
    
    
}

//end of model