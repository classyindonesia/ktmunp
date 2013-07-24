<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mst_foto extends CI_Controller {

    function __construct() {
        parent::__construct();
          if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        $this->load->model('mst_foto_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/admin/mst_foto/index/',
            'total_rows' => $this->db->count_all('mst_foto'),
            'per_page' => 5,
            'uri_segment'=>4
        );
        $this->pagination->initialize($config);
        $data['content'] = 'admin/mst_foto_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['mst_fotos'] = $this->mst_foto_model->retrieve_all($config['per_page'], $this->uri->segment(4));
        $this->load->view('admin/template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'nama_file',
                'label' => 'nama_file',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'aktif',
                'label' => 'aktif',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'op',
                'label' => 'op',
                'rules' => 'required'
            ),
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->mst_foto_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('admin/mst_foto');
            }
        }
        $data['content'] = 'admin/form_mst_foto';
        $data['type_form'] = 'post';
        $this->load->view('admin/template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->mst_foto_model->retrieve_one($id);
            $data['content'] = 'admin/form_mst_foto';
            $data['type_form'] = 'update';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('admin/mst_foto');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'nama_file',
                'label' => 'nama_file',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'aktif',
                'label' => 'aktif',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'op',
                'label' => 'op',
                'rules' => 'required'
            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->mst_foto_model->update($this->input->post('id'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('admin/mst_foto');
            }
        } else {
            $this->form_update($this->input->post('id'));
        }
    }

    function delete() {
        if (isset($_POST['id'])) {
            $this->mst_foto_model->delete($_POST['id']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('admin/mst_foto');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('admin/mst_foto');
        }
    }

}

 //end of file  mst_foto.php


 