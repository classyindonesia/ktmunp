<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 
 

class profil extends CI_Controller {

    
 function __construct() {
        parent::__construct();
          if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        $this->load->model('log_user_model');
    }
    
    
    
    

    
    
    
    function edit(){
        
     $data['content'] = 'admin/profil/index';   
 
     $this->load->view('admin/template', $data);   
    }
    
    
    function update_biodata(){
        $update = $this->input->post('update');
        if($update){
            $data = array(
                'email' => $this->input->post('email')
            );
            $this->db->where('username', $this->input->post('username'));
            $this->db->update('mst_user', $data);
            
            $this->session->set_userdata('email', $this->input->post('email'));
        }else{
            show_404('page');
        }
        
        
    }
    
    function check_pass_lama(){
        $check = $this->input->post('check');
        if($check){
         $pass = $this->input->post('pass_lama');
        $tmp_pass1 = md5($pass);
        $tmp_pass2 = md5($pass);
        $final_pass = md5($tmp_pass1." ".$tmp_pass2); 
            
        $this->db->where('password', $final_pass);
        $q = $this->db->get('mst_user');
        if($q->num_rows() <= 0){
            echo 0;
            //pass salah / tdk ada
        }else{
            //pass cocok
            echo 1;
        }
            
        }else{
            show_404('page');
        }
        
        
    }
    
    
    
        function update_password(){
        $update = $this->input->post('update');
        if($update){
        $pass = $this->input->post('password');
        $tmp_pass1 = md5($pass);
        $tmp_pass2 = md5($pass);
        $final_pass = md5($tmp_pass1." ".$tmp_pass2);
        
            

            $data = array(
                'password' => $final_pass
            );
            $this->db->where('username', $this->input->post('username'));
            $this->db->update('mst_user', $data);
            
            
        }else{
            show_404('page');
        }
        
        
    }
    
    
    
    
    
    
    
    
    
}
//end of profil.php