<?php
 
/**
 * Description of dropdown_model
 *
 * @author man3
 */
class dropdown_model extends CI_Model {
    
    
    function jurusan(){
        $data = array( 0 => '--pilih--');
        $this->db->where('aktif', 1);
        $q = $this->db->get('mst_jurusan');
        if($q->num_rows() > 0){
            foreach($q->result_array() as $list){
                $data[$list['id']] = $list['nama'];
            }
        }
        return $data;
        
    }

    
    function level_user(){
        $data = array( 0 => '--pilih--');
        $this->db->where('aktif', 1);
        $q = $this->db->get('ref_level_user');
        if($q->num_rows() > 0){
            foreach($q->result_array() as $list){
                $data[$list['id']] = $list['nama'];
            }
        }
        return $data;
        
    }    
    
    //masa berlaku ktm
    function batch(){
        $data = array( 0 => '--pilih--');
        $this->db->where('aktif', 1);
        $this->db->order_by('id DESC');
        $q = $this->db->get('mst_batch');
        if($q->num_rows() > 0){
            foreach($q->result_array() as $list){
                if($list['tampil_keterangan'] == 1){
                    $data[$list['id']] = $list['keterangan'];
                }else{
                $data[$list['id']] = $this->fungsi->date_to_tgl($list['tgl_aktif']);
                }
            }
        }
        return $data;
    }    
    
    
    
     function fakultas(){
        $data = array( 0 => '--pilih--');
        $this->db->where('aktif', 1);
        $q = $this->db->get('mst_fakultas');
        if($q->num_rows() > 0){
            foreach($q->result_array() as $list){
                $data[$list['id']] = $list['nama'];
            }
        }
        return $data;
    }
    
    
    
        function jenis_kelamin(){
        $data = array( 0 => '--pilih--');
        $this->db->where('aktif', 1);
        $q = $this->db->get('ref_jenis_kelamin');
        if($q->num_rows() > 0){
            foreach($q->result_array() as $list){
                $data[$list['id']] = $list['nama'];
            }
        }
        return $data;
    }
    
    
    
    
}


//end of dropdown