<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 
 

class user extends CI_Controller {

    
    function __construct() {
        parent::__construct();
          if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        $this->load->model(array('mst_user_model', 'dropdown_model'));
    }
 
    
    
      function index() {
       $level = $this->session->userdata('ref_level_user_id');
       if($level == 1){
        $config = array(
            'base_url' => site_url() . '/admin/user/index/',
            'total_rows' => $this->db->count_all('mst_user'),
            'per_page' => 5,
            'uri_segment'=>4
        );
        $this->pagination->initialize($config);
        $data['user'] = 'class="active"';
       $data['content']='admin/user/index';
        $data['pagination'] = $this->pagination->create_links();
        $data['mst_users'] = $this->mst_user_model->retrieve_all($config['per_page'], $this->uri->segment(4));
        $this->load->view('admin/template', $data);
        
               }else{
           show_404('page');
       }
    }

    function add() {
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
            
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'ref_level_user_id',
                'label' => 'ref_level_user_id',
                'rules' => 'required'
            ),

            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->mst_user_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('admin/user');
            }
        }
        $data['add_user'] = 'class="active"';
        $data['level']  = $this->dropdown_model->level_user();
        $data['content'] = 'admin/user/form_mst_user';
        $data['type_form'] = 'post';
        $this->load->view('admin/template', $data);
    }

    function form_update($id='') {
        if ($id != '') {
            if($this->session->userdata('id') == $id){
                redirect('admin/profil/edit');
            }
            $data['isi'] = $this->mst_user_model->retrieve_one($id);
            $data['level']  = $this->dropdown_model->level_user();
            $data['content'] = 'admin/user/form_mst_user';
            $data['type_form'] = 'update';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('admin/user');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'
            ),            
            array(
                'field' => 'ref_level_user_id',
                'label' => 'ref_level_user_id',
                'rules' => 'required'
            ),
            
 
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {
                $this->mst_user_model->update($this->input->post('id'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('admin/user');
            }
        } else {
            $this->form_update($this->input->post('id'));
        }
    }

    function delete() {
        if (isset($_POST['id'])) {
            $this->mst_user_model->delete($_POST['id']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('admin/user');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('admin/user');
        }
    }
 




  
    
    
    
    
    
    
    
    
    
}
 //end of file  mst_user.php