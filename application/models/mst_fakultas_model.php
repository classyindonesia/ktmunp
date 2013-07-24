<?php

class Mst_fakultas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function retrieve_all($limit, $uri) {

        $result = $this->db->get('mst_fakultas', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function retrieve_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('mst_fakultas');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'nama' => $this->input->post('nama', TRUE),
            'op' => $this->fungsi->op(),
           
        );
        $this->db->insert('mst_fakultas', $data);
    }

    function update($id) {
        $data = array(
       'nama' => $this->input->post('nama', TRUE),
         );
        $this->db->where('id', $id);
        $this->db->update('mst_fakultas', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id', $sip);
            $this->db->delete('mst_fakultas');
         
            $this->db->where('id', $sip);
            $q = $this->db->get('mst_fakultas');
            foreach($q->result_array() as $list){
                $nama = $list['nama'];
            }
            $pesan = "user ".$this->session->userdata('username')." telah menghapus ".$nama." dari list fakultas";
            $this->fungsi->log($pesan);
        }
    }

}
//end of model mst_fakultas.php
