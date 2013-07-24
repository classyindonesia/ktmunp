<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

    var $AT = null;

    function __construct() {
        $this->AT = & get_instance();
        $this->AT->load->database();
    }

    function process_login($user, $pass) {
        $this->AT->db->where('username', $user);
        
        
        $tmp_pass1 = md5($pass);
        $tmp_pass2 = md5($pass);
        $final_pass = md5($tmp_pass1." ".$tmp_pass2);
        
        
        $this->AT->db->where('password', $final_pass);
        $this->AT->db->where('aktif', 1);
        $eo = $this->AT->db->get('mst_user');

        if ($eo->num_rows == 1) {
            $login = $eo->row_array();

     
            $id = $login['id'];            
            $sess = array(
                'id' => $id, 
                'login' => TRUE, 
                'username' => $login['username'],
                'email'     => $login['email'],
                'ref_level_user_id' => $login['ref_level_user_id']
                );
            $this->AT->session->set_userdata($sess);
            return TRUE;
        } else {
            return FALSE;
        }
    }
}


//end of auth