<?php

class Log_user_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    
    
    function search(){
        $this->db->like('ket', $this->input->post('cari'));
        $q = $this->db->get('log_user');
        return $q->result_array();
    }
    
    
    function get_log_depan(){
        $this->db->limit(10);
        $this->db->order_by('id DESC');
        $q = $this->db->get('log_user');
        if($q->num_rows() > 0){
            return $q->result_array();
        }
        }

    function retrieve_all($limit, $uri) {
        $this->db->order_by('id DESC');
        $result = $this->db->get('log_user', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function retrieve_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('log_user');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'ket' => $this->input->post('ket', TRUE),
           
            'tgl' => $this->input->post('tgl', TRUE),
           
            'aktif' => $this->input->post('aktif', TRUE),
           
            'op' => $this->input->post('op', TRUE),
           
        );
        $this->db->insert('log_user', $data);
    }

    function update($id) {
        $data = array(
         
       'ket' => $this->input->post('ket', TRUE),
       
       'tgl' => $this->input->post('tgl', TRUE),
       
       'aktif' => $this->input->post('aktif', TRUE),
       
       'op' => $this->input->post('op', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('log_user', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id', $sip);
            $this->db->delete('log_user');
        }
    }

}
//end of model log_user.php
