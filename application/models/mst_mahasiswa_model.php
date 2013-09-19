<?php

class Mst_mahasiswa_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function search(){
        $this->db->select('M.*, JK.nama as jenis_kelamin, J.nama as jurusan, F.nama as fakultas, J.mst_fakultas_id');
        $this->db->join('mst_jurusan J', 'J.id=M.mst_jurusan_id', 'left');
        $this->db->join('mst_fakultas F', 'F.id=J.mst_fakultas_id', 'left');
        $this->db->join('ref_jenis_kelamin JK', 'JK.id=M.ref_jenis_kelamin_id');
        $this->db->where('M.aktif', 1);
        $this->db->like('M.nama', $this->input->post('nama'));
        $this->db->order_by('M.urut DESC');
        $result = $this->db->get('mst_mahasiswa M');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }


    function search_npm(){
        $this->db->select('M.*, JK.nama as jenis_kelamin, J.nama as jurusan, F.nama as fakultas, J.mst_fakultas_id');
        $this->db->join('mst_jurusan J', 'J.id=M.mst_jurusan_id', 'left');
        $this->db->join('mst_fakultas F', 'F.id=J.mst_fakultas_id', 'left');
        $this->db->join('ref_jenis_kelamin JK', 'JK.id=M.ref_jenis_kelamin_id');
        $this->db->where('M.aktif', 1);
        $this->db->like('M.id', $this->input->post('nama'));
        $this->db->order_by('M.urut DESC');
        $result = $this->db->get('mst_mahasiswa M');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
 


    
    function cetak($id) {
        $this->db->select('M.*, JK.nama as jenis_kelamin, J.nama as jurusan, F.nama as fakultas, J.mst_fakultas_id');
        $this->db->join('mst_jurusan J', 'J.id=M.mst_jurusan_id', 'left');
        $this->db->join('mst_fakultas F', 'F.id=J.mst_fakultas_id', 'left');
        $this->db->join('ref_jenis_kelamin JK', 'JK.id=M.ref_jenis_kelamin_id');
        $this->db->where('M.aktif', 1);
        $this->db->where('M.id', $id);
        $this->db->order_by('M.urut DESC');
        $result = $this->db->get('mst_mahasiswa M');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }    
    
    function retrieve_all($limit, $uri) {
        $this->db->select('M.*, JK.nama as jenis_kelamin, J.nama as jurusan, F.nama as fakultas, J.mst_fakultas_id');
        $this->db->join('mst_jurusan J', 'J.id=M.mst_jurusan_id', 'left');
        $this->db->join('mst_fakultas F', 'F.id=J.mst_fakultas_id', 'left');
        $this->db->join('ref_jenis_kelamin JK', 'JK.id=M.ref_jenis_kelamin_id');
        $this->db->where('M.aktif', 1);
        $this->db->order_by('M.urut DESC');
        $result = $this->db->get('mst_mahasiswa M', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    

    function retrieve_batch($limit, $uri) {
        $this->db->where('aktif', 1);
        $this->db->order_by('id DESC');
        $result = $this->db->get('mst_batch', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }    
    

    function load_more() {
        $this->db->select('M.*, JK.nama as jenis_kelamin, J.nama as jurusan, F.nama as fakultas, J.mst_fakultas_id');
        $this->db->join('mst_jurusan J', 'J.id=M.mst_jurusan_id', 'left');
        $this->db->join('mst_fakultas F', 'F.id=J.mst_fakultas_id', 'left');
        $this->db->join('ref_jenis_kelamin JK', 'JK.id=M.ref_jenis_kelamin_id');
        $this->db->where('M.aktif', 1);
        $this->db->where('M.urut <', $this->input->post('id'));
        $this->db->order_by('M.urut DESC');
        $this->db->limit(20);
        $result = $this->db->get('mst_mahasiswa M');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }    
    
 
    
    function reload() {
        $this->db->select('M.*, JK.nama as jenis_kelamin, J.nama as jurusan, F.nama as fakultas, J.mst_fakultas_id');
        $this->db->join('mst_jurusan J', 'J.id=M.mst_jurusan_id', 'left');
        $this->db->join('mst_fakultas F', 'F.id=J.mst_fakultas_id', 'left');
        $this->db->join('ref_jenis_kelamin JK', 'JK.id=M.ref_jenis_kelamin_id');
        $this->db->where('M.urut between '.$this->input->post('urut_akhir').' AND '.$this->input->post('urut'));
        $this->db->order_by('M.urut DESC');
        $this->db->where('M.aktif', 1);
        //$this->db->limit(20);
        $result = $this->db->get('mst_mahasiswa M');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }     
    
    
    

    function retrieve_one($id) {
        $this->db->select('M.*, JK.nama as jenis_kelamin, J.nama as jurusan, F.nama as fakultas, 
            J.mst_fakultas_id, F.id as mst_fakultas_id, J.id as mst_jurusan_id');
        $this->db->where('M.id', $id);
        $this->db->join('mst_jurusan J', 'J.id=M.mst_jurusan_id', 'left');
        $this->db->join('mst_fakultas F', 'F.id=J.mst_fakultas_id', 'left');
        
        $this->db->join('ref_jenis_kelamin JK', 'JK.id=M.ref_jenis_kelamin_id', 'left');
        $this->db->where('M.aktif', 1);
        $result = $this->db->get('mst_mahasiswa M');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
            'id' => $this->input->post('id', TRUE),
            'mst_jurusan_id' => $this->input->post('mst_jurusan_id', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
            'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'ref_jenis_kelamin_id' => $this->input->post('ref_jenis_kelamin_id', TRUE),
            'no_hp' => $this->input->post('no_hp', TRUE),
            'op' => $this->fungsi->op(),
           
        );
        $this->db->insert('mst_mahasiswa', $data);
    }

    function update($id) {
        $data = array(
         
       'mst_jurusan_id' => $this->input->post('mst_jurusan_id', TRUE),
       
       'nama' => $this->input->post('nama', TRUE),
       
       'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
       
       'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
       
       'alamat' => $this->input->post('alamat', TRUE),
       
       'ref_jenis_kelamin_id' => $this->input->post('ref_jenis_kelamin_id', TRUE),
       
       'no_hp' => $this->input->post('no_hp', TRUE),

        );
        $this->db->where('id', $id);
        $this->db->update('mst_mahasiswa', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id', $this->aesfunction->paramDecrypt($sip));
            $this->db->delete('mst_mahasiswa');
            
            
            $this->db->where('mst_mahasiswa_id', $this->aesfunction->paramDecrypt($sip));
            $q = $this->db->get('mst_foto');
            if($q->num_rows() > 0){
                foreach($q->result_array() as $list){
                    $file = "./includes/img/foto_mahasiswa/".$list['nama_file'];
                  if(file_exists($file)){
                      unlink($file);
                  }  
                    
                    
                }
            } //end of delete files
            
            //mulai hapus data yg ada di db
            $this->db->where('mst_mahasiswa_id', $this->aesfunction->paramDecrypt($sip));
            $this->db->delete('mst_foto');
            
            
            $this->db->where('mst_mahasiswa_id', $this->aesfunction->paramDecrypt($sip));
            $this->db->delete('mst_batches_mahasiswa');            
$pesan = "user ".$this->session->userdata('username')." telah menghapus mahasiswa dgn NIM ".$this->aesfunction->paramDecrypt($sip);
        $this->fungsi->log($pesan);        
        }
    }

}
//end of model mst_mahasiswa.php
