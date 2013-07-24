<?php

class log_user extends CI_Controller {

    function __construct() {
        parent::__construct();
          if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        $this->load->model('log_user_model');
    }
    
    
    function search(){
        if($this->input->post('submit')){
            
         $data['pagination'] = NULL;   
        $data['log_users'] = $this->log_user_model->search();    
        $this->load->view('admin/log_user/log_list', $data);    
        }else{
            show_404('page');
        }
        
    }
    
    

    function index() {

        $config = array(
            'base_url' => site_url() . '/admin/log_user/index/',
            'total_rows' => $this->db->count_all('log_user'),
            'per_page' => 10,
            'uri_segment'=>4
        );
        $this->pagination->initialize($config);
        $data['index']  = 'class="active"';
        $data['log_user'] = 'class="active"';
        $data['content'] = 'admin/log_user/log_user_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['log_users'] = $this->log_user_model->retrieve_all($config['per_page'], $this->uri->segment(4));
        $this->load->view('admin/template', $data);
    }
    
    
    
    
    
    
    
    
    

 
}

 //end of file  log_user.php


 