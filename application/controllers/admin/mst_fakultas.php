<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mst_fakultas extends CI_Controller {

    function __construct() {
        parent::__construct();
          if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        $this->load->library('fungsi');
        $this->load->model('mst_fakultas_model');
    }

    function index() {
         $config = array(
            'base_url' => site_url() . '/admin/mst_fakultas/index/',
            'total_rows' => $this->db->count_all('mst_fakultas'),
            'per_page' => 5,
            'uri_segment'=>4
        );
        $this->pagination->initialize($config);
        $data['mahasiswa'] = "class='active'";        
        $data['fakultas']   = 'class="active"';
        $data['content'] = 'admin/mst_fakultas_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['mst_fakultass'] = $this->mst_fakultas_model->retrieve_all($config['per_page'], $this->uri->segment(4));
        $this->load->view('admin/template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ),
//            
//            array(
//                'field' => 'aktif',
//                'label' => 'aktif',
//                'rules' => 'required'
//            ),
//            
//            array(
//                'field' => 'op',
//                'label' => 'op',
//                'rules' => 'required'
//            ),
//            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {
                $this->mst_fakultas_model->insert();
                $pesan = "user ".$this->session->userdata('username')." berhasil menambahkan <b>".$this->input->post('nama')."</b> ke dalam list fakultas";
                $this->fungsi->log($pesan);
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('admin/mst_fakultas');
            }
        }
        $data['fakultas']   = 'class="active"';
        
        $data['content'] = 'admin/form_mst_fakultas';
        $data['type_form'] = 'post';
        $this->load->view('admin/template', $data);
    }

    function form_update($id='') {
        if ($id != '') {
        $data['fakultas']   = 'class="active"';
            $data['mahasiswa'] = "class='active'";        
            $data['isi'] = $this->mst_fakultas_model->retrieve_one($id);
            $data['content'] = 'admin/form_mst_fakultas';
            $data['type_form'] = 'update';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('admin/mst_fakultas');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ),
            
//            array(
//                'field' => 'aktif',
//                'label' => 'aktif',
//                'rules' => 'required'
//            ),
//            
//            array(
//                'field' => 'op',
//                'label' => 'op',
//                'rules' => 'required'
//            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->mst_fakultas_model->update($this->input->post('id'));
                $pesan = "user ".$this->session->userdata('username')." berhasil meng-update <b>".$this->input->post('nama')."</b> di dalam list fakultas";
                $this->fungsi->log($pesan);
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('admin/mst_fakultas');
            }
        } else {
            $this->form_update($this->input->post('id'));
        }
    }

    function delete() {
        if (isset($_POST['id'])) {
            $this->mst_fakultas_model->delete($_POST['id']);
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('admin/mst_fakultas');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('admin/mst_fakultas');
        }
    }

}

 //end of file  mst_fakultas.php


 