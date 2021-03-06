<?php

class Admin_login extends CI_Controller {

    function __construct() {
        parent::__construct();
       
    }

    function index() {
         if ($this->session->userdata("login") == TRUE) {
            redirect('admin/front', 'refresh');
        }
        $config = array(
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            $this->load->library('auth');
            $user = $this->input->post('username');
            $pass = $this->input->post('password');
            if ($this->auth->process_login($user, $pass) == TRUE) {
             $pesan = "<span style='color: green'>login success! from ".$this->session->userdata('ip_address')." | user :".$user.'</span>';
             $this->fungsi->log($pesan);                    
                redirect('admin/front');
            } else {
             $pesan = "<span style='color: red'>warning! login error from ".$this->session->userdata('ip_address')." | user :".$user.'</span>';
             $this->fungsi->log($pesan);          
                $this->session->set_flashdata('login_notif', '<p>username and password do not exist in database</p>');
                redirect('admin_login');
            }
        }
        $data['login'] = 'class="active"';
        $data['main'] = 'login_view';
        $this->load->view('public_template', $data);
    }

    function logout() {
     //   $this->session->sess_destroy();
     
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('login');
        $this->session->set_flashdata('login_notif', '<p>logout from system</p>');
        redirect('admin_login');
    }
   
}
//end of controller
