<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Front extends CI_Controller {

    function __construct() {
        parent::__construct();
         if ($this->session->userdata("login") != TRUE) {
           $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        $this->load->model(array('log_user_model'));
    }

    function index() {
        $data['log']    = $this->log_user_model->get_log_depan();
        $data['dashboard'] = "class='active'";        
        $data['content']='admin/dashboard/front';
        $this->load->view('admin/template',$data);
    }

}
?>
