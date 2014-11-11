<?php

class template_ktm extends CI_Controller {

    function __construct() {
        parent::__construct();
          if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        $this->load->library(array('fungsi', 'aesfunction'));
        $this->load->model(array('mst_mahasiswa_model', 'dropdown_model', 'mst_foto_model'));
    }
    
    
    
    
    function index(){
        $data['template'] = "class='active'";        
        $data['template_depan'] = 'class="active"';
        $data['content'] = 'admin/template_ktm/index';
        $this->load->view('admin/template', $data);
    }

    
    function form_template_belakang(){
        $data['template'] = "class='active'";        
        $data['template_belakang'] = 'class="active"';
        $data['content'] = 'admin/template_ktm/form_template_belakang';
        $this->load->view('admin/template', $data);
    }
    
    
    function form_logo(){
        $data['template'] = "class='active'";        
        $data['logo'] = 'class="active"';
        $data['content'] = 'admin/template_ktm/form_logo';
        $this->load->view('admin/template', $data);
    }
    
    function update_info(){
        $update = $this->input->post('update');
        if($update){
            $data = array(
                'value' => $this->input->post('value'),
            );
            $this->db->where('variable', $this->input->post('variable'));
            $this->db->update('setup_variable', $data);
            
            
        }else{
            show_404('page');
        }
        
    }
    
    
    
    function form_data_kampus(){
        $data['template'] = "class='active'";        
        $data['data_kampus'] = 'class="active"';
        $data['content'] = 'admin/template_ktm/form_data_kampus';
        $this->load->view('admin/template', $data);
    }
    
    
      function ganti_logo(){
        
        	$config['upload_path'] = './includes/img/template/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= 0;
		$config['max_width']  = 0;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
		$config['max_height']  = 0;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
                        echo 0;
                        //jika error
			//$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
                        
                        
  
                            //template belakang
                            $this->db->where('variable', 'logo');
                            $q = $this->db->get('setup_variable');
                            foreach($q->result_array() as $list){
                                $logo_lama = $list['value'];
                            }                           
                   
                        
                                $config_thumb['image_library'] = 'gd2'; 
                                $config_thumb['source_image'] = $data['upload_data']['full_path'];
                                $config_thumb['maintain_ratio'] = TRUE;
                                $config_thumb['height'] = 100; //218;
                                $config_thumb['width'] = 100; //347;
                                $this->load->library('image_lib', $config_thumb);
                                $this->image_lib->resize();
                        
                        
                        $logo_baru = $data['upload_data']['file_name'];
                        $file_lama = "./includes/img/template/".$logo_lama;
                        if(file_exists($file_lama)){
                            unlink($file_lama);
                        }
                        
                        $data = array(
                            'value' => $logo_baru
                        );
                        
                        $this->db->where('variable', 'logo');
                        $this->db->update('setup_variable', $data);  
                 
                        
                        
                  echo "<img src='".base_url()."includes/img/template/".$logo_baru."' width='200' height='200' /> ";
                        //sukses
			//$this->load->view('upload_success', $data);
		}
        
    }
     
    
    
    
    
    
    function ganti_template(){
        
        	$config['upload_path'] = './includes/img/template/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= 0;
		$config['max_width']  = 0;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
		$config['max_height']  = 0;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
                        echo 0;
                        //jika error
			//$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
                        
                        
                        if($this->input->post('upload') == 1){
                            //template depan
                            $this->db->where('variable', 'template');
                            $q = $this->db->get('setup_variable');
                            foreach($q->result_array() as $list){
                                $template_lama = $list['value'];
                            }
                        }else{
                            //template belakang
                            $this->db->where('variable', 'template_belakang');
                            $q = $this->db->get('setup_variable');
                            foreach($q->result_array() as $list){
                                $template_lama = $list['value'];
                            }                           
                        }
                        
                                $config_thumb['image_library'] = 'gd2'; 
                                $config_thumb['source_image'] = $data['upload_data']['full_path'];
                                $config_thumb['maintain_ratio'] = TRUE;
                                $config_thumb['height'] = 600; //218;
                                $config_thumb['width'] = 800; //347;
                                $this->load->library('image_lib', $config_thumb);
                                $this->image_lib->resize();
                        
                        
                        $template_baru = $data['upload_data']['file_name'];
                        $file_lama = "./includes/img/template/".$template_lama;
                        if(file_exists($file_lama)){
                            unlink($file_lama);
                        }
                        
                        $data = array(
                            'value' => $template_baru
                        );
                        
                        if($this->input->post('upload') == 1){
                        $this->db->where('variable', 'template');
                        $this->db->update('setup_variable', $data);
                        }else{
                         $this->db->where('variable', 'template_belakang');
                        $this->db->update('setup_variable', $data);  
                        }
                        
                        
                        echo 1;
                        //sukses
			//$this->load->view('upload_success', $data);
		}
        
    }
    
    
    
    function template_depan(){
        $this->load->view('admin/template_ktm/template_depan');
    }
    
    function template_belakang(){
        $this->load->view('admin/template_ktm/template_belakang');
    } 
    
}
//end of file