<?php

class Mst_jurusan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function retrieve_all($limit, $uri) {
        $this->db->select('J.*, F.nama as fakultas');
        $this->db->join('mst_fakultas F', 'F.id=J.mst_fakultas_id', 'left');
        $result = $this->db->get('mst_jurusan J', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function retrieve_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('mst_jurusan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'mst_fakultas_id' => $this->input->post('mst_fakultas_id', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'op' => $this->fungsi->op(),
           
        );
        $this->db->insert('mst_jurusan', $data);
    }

    function update($id) {
        $data = array(
       'mst_fakultas_id' => $this->input->post('mst_fakultas_id', TRUE),
       'nama' => $this->input->post('nama', TRUE),
        );
        $this->db->where('id', $id);
        $this->db->update('mst_jurusan', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id', $sip);
            $this->db->delete('mst_jurusan');
            
            $this->db->where('id', $sip);
            $q = $this->db->get('mst_fakultas');
            foreach($q->result_array() as $list){
                $nama = $list['nama'];
            }
            $pesan = "user ".$this->session->userdata('username')." telah menghapus ".$nama." dari list jurusan";
            $this->fungsi->log($pesan);            
        }
    }

}
//end of model mst_jurusan.php
