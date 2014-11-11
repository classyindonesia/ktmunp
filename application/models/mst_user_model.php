<?php

class Mst_user_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function retrieve_all($limit, $uri) {
        $this->db->select('U.*, L.nama as level');
        $this->db->join('ref_level_user L', 'L.id=U.ref_level_user_id');
        $result = $this->db->get('mst_user U', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function retrieve_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('mst_user');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
$pass = $this->input->post('password');
        $tmp_pass1 = md5($pass);
        $tmp_pass2 = md5($pass);
        $final_pass = md5($tmp_pass1." ".$tmp_pass2);
           $data = array(
            'username' => $this->input->post('username', TRUE),
            'password' => $final_pass,
            'email' => $this->input->post('email', TRUE),
            'ref_level_user_id' => $this->input->post('ref_level_user_id', TRUE),
            'aktif' => 1,
           
        );
        $this->db->insert('mst_user', $data);
    }

    
    
    
    
    
    
    function update($id) {
        $pass = $this->input->post('password');
        $pass2 = $this->input->post('password2');
        if($pass != NULL){            
            if($pass == $pass2){
            $data_pass = array(
                'password'  => $this->input->post('password', TRUE)
            );
            $this->db->where('id', $id);
            $this->db->update('mst_user', $data_pass);
        }
        }
        
        $data = array(
       'username' => $this->input->post('username', TRUE),
       'email' => $this->input->post('email', TRUE),
       'ref_level_user_id' => $this->input->post('ref_level_user_id', TRUE),
        );
        $this->db->where('id', $id);
        $this->db->update('mst_user', $data);
    }
    
    
    

    function delete($id) {
        foreach ($id as $sip) {
            
            $this->db->where('id', $sip);
            $this->db->delete('mst_user');
        }
    }

}
//end of model mst_user.php
