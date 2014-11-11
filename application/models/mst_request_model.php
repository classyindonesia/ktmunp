<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Mst_Request_Model extends CI_Model {
    
    
    
    
    function get_cetak_perpanjangan($id){
        $this->db->select('M.*, MJ.nama as jurusan');
        $this->db->join('mst_jurusan MJ', 'M.mst_jurusan_id=MJ.id');
        $this->db->where('M.id', $id);
        $q=$this->db->get('mst_mahasiswa M');
        if($q->num_rows() <= 0){
            show_404('page');
        }else{
        return $q->row_array();
        }
    }
    
    
    
    
    function get_all($limit, $uri){
//        $this->db->where('aktif', 1);
        $this->db->select('MR.*, M.nama');
        $this->db->join('mst_mahasiswa M', 'M.id=MR.mst_mahasiswa_id');
        $this->db->order_by('MR.id DESC');
        $this->db->where('MR.aktif', 2);
        $result = $this->db->get('mst_request MR', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    
       function get_all_ditolak($limit, $uri){
        $this->db->select('MR.*, M.nama');
        $this->db->join('mst_mahasiswa M', 'M.id=MR.mst_mahasiswa_id');
        $this->db->order_by('MR.id DESC');
        $this->db->where('MR.aktif', 3);
        $result = $this->db->get('mst_request MR', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    } 
    
    
        function get_cari_ditolak(){
        $this->db->select('MR.*, M.nama');
        $this->db->join('mst_mahasiswa M', 'M.id=MR.mst_mahasiswa_id');
        $this->db->where('MR.mst_mahasiswa_id', trim($this->input->post('cari')));
        $this->db->order_by('MR.id DESC');
        $this->db->where('MR.aktif', 3);
        $result = $this->db->get('mst_request MR');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    } 
           function get_cari_diterima(){
        $this->db->select('MR.*, M.nama');
        $this->db->join('mst_mahasiswa M', 'M.id=MR.mst_mahasiswa_id');
        $this->db->where('MR.mst_mahasiswa_id', trim($this->input->post('cari')));
        $this->db->order_by('MR.id DESC');
        $this->db->where('MR.aktif', 1);
        $result = $this->db->get('mst_request MR');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }  
    
     
       function get_all_diterima($limit, $uri){
        $this->db->select('MR.*, M.nama');
        $this->db->join('mst_mahasiswa M', 'M.id=MR.mst_mahasiswa_id');
        $this->db->order_by('MR.id DESC');
        $this->db->where('MR.aktif', 1);
        $result = $this->db->get('mst_request MR', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }    
}

    