<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Request extends CI_Controller {

    
    function __construct() {
        parent::__construct();
          if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        $this->load->library(array('cart', 'aesfunction'));
        $this->load->model(array('mst_request_model', 'dropdown_model'));
    }
    
    
    function index(){
            $this->db->where('aktif', 3);
            $jml = $this->db->count_all_results('mst_request');        
        $config = array(
            'base_url' => site_url() . '/admin/request/index/',
            'total_rows' => $jml,
            'per_page' => 10,
            'uri_segment'=>4
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['list_request'] = $this->mst_request_model->get_all($config['per_page'], $this->uri->segment(4));
        $data['request_home'] = 'class="active"';
        $data['request'] = 'class="active"';
        $data['content'] = 'admin/request/index';
        $this->load->view('admin/template', $data);
    }
    
    
    
    function cari_ditolak(){
        if($this->input->post('search')){
            $data['pagination'] = NULL;
            $data['list_request'] = $this->mst_request_model->get_cari_ditolak();
            $this->load->view('admin/request/list_ditolak', $data);
        }else{
            show_404('page');
        }
        
        
        
    }
    
     function cari_diterima(){
        if($this->input->post('search')){
            $data['pagination'] = NULL;
            $data['masa_berlaku'] = $this->dropdown_model->batch();
            $data['list_request'] = $this->mst_request_model->get_cari_diterima();
            $this->load->view('admin/request/list_diterima', $data);
        }else{
            show_404('page');
        }
        
        
        
    }   
    
    
        function ditolak(){
            $this->db->where('aktif', 3);
            $jml = $this->db->count_all_results('mst_request');
        $config = array(
            'base_url' => site_url() . '/admin/request/ditolak/',
            'total_rows' => $jml,
            'per_page' => 10,
            'uri_segment'=>4
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['list_request'] = $this->mst_request_model->get_all_ditolak($config['per_page'], $this->uri->segment(4));
        $data['request_ditolak'] = 'class="active"';
        $data['request'] = 'class="active"';
        $data['content'] = 'admin/request/ditolak';
        $this->load->view('admin/template', $data);
    }
    
           function diterima(){
            $this->db->where('aktif', 1);
            $jml = $this->db->count_all_results('mst_request');
        $config = array(
            'base_url' => site_url() . '/admin/request/diterima/',
            'total_rows' => $jml,
            'per_page' => 10,
            'uri_segment'=>4
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['list_request'] = $this->mst_request_model->get_all_diterima($config['per_page'], $this->uri->segment(4));
        $data['request_diterima'] = 'class="active"';
        $data['request'] = 'class="active"';
        $data['masa_berlaku'] = $this->dropdown_model->batch();
        $data['content'] = 'admin/request/diterima';
        $this->load->view('admin/template', $data);
    } 
    
    
    
    
    
    
    function tolak_request(){
        if($this->input->post('del')){
            $data = array(
                'aktif' => 3
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('mst_request', $data);
        }else{
            show_404('page');
        }
    }

    
    function terima_request(){
        if($this->input->post('del')){
            $data = array(
                'aktif' => 1
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('mst_request', $data);
        }else{
            show_404('page');
        }
    }
    
    
    
}
