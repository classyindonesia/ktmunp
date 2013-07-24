<?php

class mst_jurusan extends CI_Controller {

    function __construct() {
        parent::__construct();
          if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        $this->load->library('fungsi');
        $this->load->model(array('mst_jurusan_model', 'dropdown_model'));
    }

    function index() {
            $data['mahasiswa'] = "class='active'";        
        $config = array(
            'base_url' => site_url() . '/admin/mst_jurusan/index/',
            'total_rows' => $this->db->count_all('mst_jurusan'),
            'per_page' => 5,
            'uri_segment'=>4
        );
        $this->pagination->initialize($config);
        $data['content'] = 'admin/mst_jurusan_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['jurusan']    = 'class="active"';
        $data['mst_jurusans'] = $this->mst_jurusan_model->retrieve_all($config['per_page'], $this->uri->segment(4));
        $this->load->view('admin/template', $data);
        
    }
    
    
    
    
    

    function add() {
        $config = array(
        
            array(
                'field' => 'mst_fakultas_id',
                'label' => 'mst_fakultas_id',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ),
 
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->mst_jurusan_model->insert();
                $pesan = "user ".$this->session->userdata('username')." berhasil menambahkan <b>".$this->input->post('nama')."</b> ke dalam list jurusan";
                $this->fungsi->log($pesan);                
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('admin/mst_jurusan');
            }
        }
            $data['mahasiswa'] = "class='active'";        

        $data['jurusan']    = 'class="active"';
        $data['fakultas'] = $this->dropdown_model->fakultas();
        $data['content'] = 'admin/form_mst_jurusan';
        $data['type_form'] = 'post';
        $this->load->view('admin/template', $data);
    }

    function form_update($id='') {
        if ($id != '') {
    $data['mahasiswa'] = "class='active'";        
            
            $data['fakultas'] = $this->dropdown_model->fakultas();
            $data['jurusan']    = 'class="active"';
            $data['isi'] = $this->mst_jurusan_model->retrieve_one($id);
            $data['content'] = 'admin/form_mst_jurusan';
            $data['type_form'] = 'update';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('admin/mst_jurusan');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'mst_fakultas_id',
                'label' => 'mst_fakultas_id',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ),
            

           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->mst_jurusan_model->update($this->input->post('id'));
                $pesan = "user ".$this->session->userdata('username')." berhasil meng-update <b>".$this->input->post('nama')."</b> di dalam list jurusan";
                $this->fungsi->log($pesan);                
                
                
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('admin/mst_jurusan');
            }
        } else {
            $this->form_update($this->input->post('id'));
        }
    }

    function delete() {
        if (isset($_POST['id'])) {
            $this->mst_jurusan_model->delete($_POST['id']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('admin/mst_jurusan');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('admin/mst_jurusan');
        }
    }

}

 //end of file  mst_jurusan.php


 