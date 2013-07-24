<?php

class Mst_foto_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function retrieve_all($limit, $uri) {

        $result = $this->db->get('mst_foto', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    
    function retrieve_by_nim($nim){
       $this->db->where('mst_mahasiswa_id', $nim);
       $this->db->limit(1);
       $this->db->order_by('id DESC');
       $this->db->where('aktif', 1);
       $q = $this->db->get('mst_foto');
       return $q->row_array();

    }
    

    function retrieve_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('mst_foto');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'nama_file' => $this->input->post('nama_file', TRUE),
           
            'aktif' => $this->input->post('aktif', TRUE),
           
            'op' => $this->input->post('op', TRUE),
           
        );
        $this->db->insert('mst_foto', $data);
    }

    function update($id) {
        $data = array(
         
       'nama_file' => $this->input->post('nama_file', TRUE),
       
       'aktif' => $this->input->post('aktif', TRUE),
       
       'op' => $this->input->post('op', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('mst_foto', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id', $sip);
            $this->db->delete('mst_foto');
        }
    }

}
//end of model mst_foto.php
