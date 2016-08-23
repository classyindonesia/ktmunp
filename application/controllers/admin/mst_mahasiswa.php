<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class mst_mahasiswa extends CI_Controller {

    function __construct() {
        parent::__construct();
          if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            redirect('admin_login', 'refresh');
        }
        
        $this->load->library(array('fungsi', 'aesfunction', 'cart', 'ciqrcode'));
        $this->load->model(array('mst_mahasiswa_model', 'dropdown_model', 'mst_foto_model'));
    }
    
    
    
    function batch(){

        $config = array(
            'base_url' => site_url() . '/admin/mst_mahasiswa/batch/',
            'total_rows' => $this->db->count_all('mst_batch'),
            'per_page' => 20,
            'uri_segment'=>4
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['mst_batch'] = $this->mst_mahasiswa_model->retrieve_batch($config['per_page'], $this->uri->segment(4));
        $data['batch'] = 'class="active"';   
        $data['mahasiswa'] = "class='active'";
        $data['content'] = 'admin/mahasiswa/batch/batch_view';    
        $this->load->view('admin/template', $data);    
    }
    
    function add_batch(){
        if($this->input->post('add')){
        $data = array(
            'tgl_aktif'     => $this->input->post('tgl_aktif'),
            'keterangan'    => $this->input->post('ket'),
            'tampil_keterangan' => $this->input->post('tampil_keterangan'),
            'op'            => $this->fungsi->op()
        );
        $this->db->insert('mst_batch', $data);
        $pesan = "user ".$this->session->userdata('username').' telah berhasil menambahkan <b>batch</b> dgn tgl aktif '.$this->fungsi->date_to_tgl($this->input->post('tgl_aktif'));
         $this->fungsi->log($pesan);   
            
        
            $config = array(
            'base_url' => site_url() . '/admin/mst_mahasiswa/batch/',
            'total_rows' => $this->db->count_all('mst_batch'),
            'per_page' => 20,
            'uri_segment'=>4
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['mst_batch'] = $this->mst_mahasiswa_model->retrieve_batch($config['per_page'], $this->uri->segment(4));
        $data['batch'] = 'class="active"';   
        $this->load->view('admin/mahasiswa/batch/list_batch', $data);   
        }else{
            show_404('page');
        }
    }
    
    function view_kantong(){
        $item = $this->cart->total_items();
        if($this->input->post('view')){
            echo $item;
            
        }else{
            if($item > 0){
                echo '<table class="table table-bordered">';
                echo '<tr class="well"> <td>NIM</td> <td>Nama</td> <td> Jurusan</td></tr>';
                foreach($this->cart->contents() as $item){
                    echo '<tr>';
                    $mhs = $this->mst_mahasiswa_model->retrieve_one($this->aesfunction->paramDecrypt($item['name']));
                    echo '<td>'.$mhs['id'].'</td><td>'.$mhs['nama'].'</td><td>'.$mhs['jurusan'].'</td>';
                    echo '</tr>';
                    }
                echo '</table>';
            }else{
                show_404('page');
            }
        }
    }
    
    
    
   function update_kantong(){
       
       if($this->input->post('update')){
           $data = array(
                'id'      => $this->input->post('id_mahasiswa'),
               'qty'     => 1,
               'price'   => 10,
               'name'    => $this->input->post('id_mahasiswa'),
           );
           $this->cart->insert($data);
 $item = $this->cart->total_items();
echo 'ada <b style="font-size: 20px;">'.$item.'</b> antrian yg hendak di cetak'; 
           
       }else{
           show_404('page');
       }
       
       
   } 
   
   function cetak_kantong($batch_id = NULL){
        $item = $this->cart->total_items();
        if($this->input->post('check')){
            
            echo $this->cart->total_items();
            
        }else{
        if($item > 0){
            $data= "";
            foreach($this->cart->contents() as $item){
                $data = $data.''.$item['name'].'-';
            }
             $this->cart->destroy();
            redirect("admin/mst_mahasiswa/cetak/".$data.'/'.$batch_id);
        }else{
            show_404('page');
        }
        }
       
   }


   function cetak_kantong2($batch_id = NULL){
        $item = $this->cart->total_items();
        if($this->input->post('check')){
            
            echo $this->cart->total_items();
            
        }else{
        if($item > 0){
            $data= "";
            foreach($this->cart->contents() as $item){
                $data = $data.''.$item['name'].'-';
            }
             $this->cart->destroy();
            redirect("admin/mst_mahasiswa/cetak2/".$data.'/'.$batch_id);
        }else{
            show_404('page');
        }
        }
       
   }   


   function clear_kantong(){
       if($this->input->post('update')){
           
           $this->cart->destroy();
       }else{
           show_404('page');
       }
   }
    
    
    
    
    function cetak($id = NULL, $print = null){
    $data['arr'] = explode("-", $id);
    $data['data'] = 0; 
    if($print != null && $print == 'html'){
        $this->load->view("admin/mahasiswa/print_out/view_printout", $data);        
    }else{
      $html = $this->load->view("admin/mahasiswa/print_out/view_printout", $data, TRUE);
      $this->load->library('mpdf');
      $stylesheet = file_get_contents('./includes/css/bootstrap.css');
      $this->mpdf->WriteHTML($stylesheet,1);
      $this->mpdf->WriteHTML($html);
      $this->mpdf->debug = true;
      $this->mpdf->Output('ktm_'.date('Y_m_d_-_H:i:s').'.pdf','I');          
    }


   
  }
    
 
   function cetak2($id = NULL){
    $data['arr'] = explode("-", $id);
    $data['data'] = 0; 
//  $html = $this->load->view("test",$data,TRUE);
    $html = $this->load->view("admin/mahasiswa/print_out2/view_printout", $data, TRUE);
//  $this->load->library('mpdf56/mpdf');
    $this->load->library('mpdf');
  //$this->mpdf=new mPDF('c','A4','','',4,4,4,4,4,4);
  $stylesheet = file_get_contents('./includes/css/bootstrap.css');
  $this->mpdf->WriteHTML($stylesheet,1);
  $this->mpdf->WriteHTML($html);
  $this->mpdf->debug = true;
  $this->mpdf->Output('ktm_'.date('Y_m_d_-_H:i:s').'.pdf','I');   
  }   
    
    
    
    
    
    
    
    function cetak_batch($id = NULL){
        $data['data'] = 0; 
        $html = $this->load->view("admin/mahasiswa/batch/print_out/view_printout", $data, TRUE);
        $this->load->library('mpdf');    
        $stylesheet = file_get_contents('./includes/css/bootstrap.css');
        $this->mpdf->WriteHTML($stylesheet,1);
        $this->mpdf->WriteHTML($html);
        $this->mpdf->debug = true;
        $this->mpdf->Output('ktm_'.date('Y_m_d_-_H:i:s').'.pdf','I');     
    }    

    function cetak_batch2($id = NULL){
        $data['data'] = 0; 
        $html = $this->load->view("admin/mahasiswa/batch/print_out2/view_printout", $data, TRUE);
        $this->load->library('mpdf');    
        $stylesheet = file_get_contents('./includes/css/bootstrap.css');
        $this->mpdf->WriteHTML($stylesheet,1);
        $this->mpdf->WriteHTML($html);
        $this->mpdf->debug = true;
        $this->mpdf->Output('ktm_'.date('Y_m_d_-_H:i:s').'.pdf','I');     
    }    
    
    
    function pencarian(){
        $data['mahasiswa'] = "class='active'";        
        $data['pencarian'] = "class='active'";
        $data['masa_berlaku'] = $this->dropdown_model->batch();
        $data['content'] = "admin/mahasiswa/search/index";   
        $this->load->view('admin/template', $data);
    }




    function pencarian2(){
        $data['mahasiswa'] = "class='active'";        
        $data['pencarian2'] = "class='active'";
        $data['masa_berlaku'] = $this->dropdown_model->batch();
        $data['content'] = "admin/mahasiswa/search2/index";   
        $this->load->view('admin/template', $data);
    }


    
    
    
    function view_profil($id = NULL){
       $data['jurusan'] = $this->dropdown_model->jurusan();
       $data['jenis_kelamin'] = $this->dropdown_model->jenis_kelamin(); 
       $data['foto'] = $this->mst_foto_model->retrieve_by_nim($this->aesfunction->paramDecrypt($id));
       $data['mahasiswa'] = $this->mst_mahasiswa_model->retrieve_one($this->aesfunction->paramDecrypt($id));
       $this->load->view('admin/mahasiswa/show_profil', $data); 
    }
    
    
    function search(){
        if($this->input->post('search')){
        $data['no'] = $this->input->post('no');
        $cari = $this->mst_mahasiswa_model->search();
        $cari2 = $this->mst_mahasiswa_model->search_npm();

        if(!empty($cari)){
        $data['mst_mahasiswas'] = $cari;
        }else{
            $data['mst_mahasiswas'] = $cari2;
        }


        $this->load->view('admin/mahasiswa/search/list_mahasiswa', $data);    
        }else{
            show_404('page');
        }
        
        
    }

 

    function search2(){
        if($this->input->post('search')){
        $data['no'] = $this->input->post('no');
            $cari = $this->mst_mahasiswa_model->search();
            $cari2 = $this->mst_mahasiswa_model->search_npm();

            if(!empty($cari)){
            $data['mst_mahasiswas'] = $cari;
            }else{
                $data['mst_mahasiswas'] = $cari2;
            }
            
        $this->load->view('admin/mahasiswa/search2/list_mahasiswa', $data);    
        }else{
            show_404('page');
        }
        
        
    }

    
    function reload_tabel(){
        if($this->input->post('reload')){
            $mahasiswa = $this->mst_mahasiswa_model->reload();
            if(!empty($mahasiswa)){
            //jika mahasiswa masih ada, maka akan dimunculkan pada load more
            $data['mst_mahasiswas'] = $mahasiswa;
            $data['no'] = 1;
            $this->load->view('admin/mahasiswa/list_mahasiswa', $data);
            }else{
                //jika mahasiswa sudah habis, berarti, sudah tdk ada lg pada read more
                echo $this->input->post('urut');
            }
        }else{
            show_404('page');
        }        
    }
    
    
    function load_more(){
        if($this->input->post('load_more')){
            
            $mahasiswa = $this->mst_mahasiswa_model->load_more();
            if(!empty($mahasiswa)){
            //jika mahasiswa masih ada, maka akan dimunculkan pada load more
            
            $data['mst_mahasiswas'] = $mahasiswa;
            $this->load->view('admin/mahasiswa/load_more', $data);
            }else{
                //jika mahasiswa sudah habis, berarti, sudah tdk ada lg pada read more
                echo 0;
            }
        }else{
            show_404('page');
        }
        
    }
    
    
    

    function index() {

        $config = array(
            'base_url' => site_url() . '/admin/mst_mahasiswa/index/',
            'total_rows' => $this->db->count_all('mst_mahasiswa'),
            'per_page' => 20,
            'uri_segment'=>4
        );
 
        
        $this->pagination->initialize($config);
        $data['mahasiswa'] = "class='active'";
        $data['masa_berlaku'] = $this->dropdown_model->batch();
        $data['index'] = "class='active'";
        $data['jurusan'] = $this->dropdown_model->jurusan();
        $data['jenis_kelamin'] = $this->dropdown_model->jenis_kelamin();
        $data['type_form'] = 'post';
        $data['content'] = 'admin/mahasiswa/mst_mahasiswa_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['mst_mahasiswas'] = $this->mst_mahasiswa_model->retrieve_all($config['per_page'], $this->uri->segment(4));
        $this->load->view('admin/template', $data);
    }


    function view_pembayaran_home($npm = NULL){
        $this->load->view('admin/mahasiswa/view_pembayaran/index');
    }

    function get_data_bayar(){
        $url = $this->fungsi->setup_variable('url_duml').'get_data_bayar/'.$this->input->post('npm').'/'.$this->input->post('ref_semester_id');
        $response = file_get_contents($url); //Converting in json string
        $data['data'] = json_decode($response);

        $this->load->view('admin/mahasiswa/view_pembayaran/view_pembayaran', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'mst_jurusan_id',
                'label' => 'mst_jurusan_id',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'tempat_lahir',
                'label' => 'tempat_lahir',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'tgl_lahir',
                'label' => 'tgl_lahir',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'ref_jenis_kelamin_id',
                'label' => 'ref_jenis_kelamin_id',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'masa_berlaku',
                'label' => 'masa_berlaku',
                'rules' => 'required'
            ), 

        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->mst_mahasiswa_model->insert();
                
                $data = array(
                    'mst_batch_id' => $this->input->post('masa_berlaku'),
                    'mst_mahasiswa_id'  => $this->input->post('id')
                );
                $this->db->insert('mst_batches_mahasiswa', $data);
                $pesan = "user ".$this->session->userdata('username')." berhasil menambahkan <b>".$this->input->post('nama')."</b> ke dalam list mahasiswa secara manual";
                $this->fungsi->log($pesan);                   
               // $this->session->set_flashdata('notif', 'data has been inserted');
              //  redirect('admin/mst_mahasiswa');
            }
        }
        $data['jurusan'] = $this->dropdown_model->jurusan();
        $data['masa_berlaku'] = $this->dropdown_model->batch();
        $data['jenis_kelamin'] = $this->dropdown_model->jenis_kelamin();
        $data['content'] = 'admin/mahasiswa/form_mst_mahasiswa';
        $data['type_form'] = 'post';
        $this->load->view('admin/template', $data);
    }
    
    
    
    function capture($id=NULL){
        $lokasi = "./includes/img/foto_mahasiswa/".$id.'.jpg';
        $nama_gambar = $id.'.jpg';
       
        
        if(file_exists($lokasi)){
           $lokasi = "./includes/img/foto_mahasiswa/".$id.'_'.date('s').'.jpg'; 
           $nama_gambar = $id.'_'.date('s').'.jpg';
        }
         $result = file_put_contents( $lokasi, file_get_contents('php://input') );
        $data=array(
            'mst_mahasiswa_id' => $id,
            'nama_file'     => $nama_gambar,
            'op'            => $this->fungsi->op()
            );
         $this->db->insert('mst_foto', $data);


        $this->db->where('id', $id);
        $mhs = $this->db->get('mst_mahasiswa')->row_array();
            if(!empty($mhs)){
                $no_hp = $mhs['no_hp'];
            }else{
                $no_hp = '-';
            }
        $data2=array(
            'mst_mahasiswa_id'      => $id,
            'ref_jenis_request_id'  => 2,
            'tgl'                   => date('Y-m-d'),
            'aktif'                 => 2,
            'no_hp'                 => $no_hp,
            'op'                    => $this->fungsi->op()
            );
        $this->db->insert('mst_request', $data2);



        $pesan = "user ".$this->session->userdata('username')." berhasil menambahkan foto untuk mahasiswa yg mempunyai nim <b>".$id."</b>";
        $this->fungsi->log($pesan);           
        if (!$result) {
	print "ERROR: Failed to write data to $filename, check permissions\n";
	exit();
        }     
    }
    
    
    
    function show_profil_capture($id = NULL){
        $data['nim'] = $id;
        $this->load->view('admin/mahasiswa/show_profil_capture', $data);
    }
    
    
    
    
    
    function upload(){
        if($this->input->post('upload')){
            $namafile = trim($this->input->post('nim')).'.jpg';
        	$config['upload_path'] = './includes/img/foto_mahasiswa/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= 0;
                $config['overwrite']    = FALSE;
                $config['file_name']    = $namafile;
                $config['remove_spaces']    = TRUE;
		$config['max_width']  = 0;
		$config['max_height']  = 0;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('upload_form', $error);
                        echo 0;
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
              
                $config_thumb['image_library'] = 'gd2';
                $config_thumb['source_image'] =  $data['upload_data']['full_path']; //$_FILES['tmp_name'][0];  // '/path/to/image/mypic.jpg';
              //  $config['create_thumb'] = TRUE;
                $config_thumb['maintain_ratio'] = TRUE;
                $config_thumb['width'] = 250;
                $config_thumb['height'] = 313;
                $this->load->library('image_lib'); 
                $this->image_lib->initialize($config_thumb);
                 $this->image_lib->resize();
                        echo 1;
                        
                        chmod($data['upload_data']['full_path'], 0644);
                                $data=array(
                                'mst_mahasiswa_id' => $this->input->post('nim'),
                                'nama_file'     => $data['upload_data']['file_name'],
                                'op'            => $this->fungsi->op()
                                );
                                $this->db->insert('mst_foto', $data);
                                
                $pesan = "user ".$this->session->userdata('username')." berhasil menambahkan foto untuk mahasiswa dgn NIM ".$this->input->post('nim');
                $this->fungsi->log($pesan);                                   
                                
		}
                

                
                
                
        }else{
            show_404('page');
        }
        
    }
    
    
    
    
    
    
    function check_nim(){
        if($this->input->post('submit')){
            
            $nim = $this->input->post('nim');
            
            $this->db->where('id', $nim);
            $q = $this->db->get('mst_mahasiswa');
            if($q->num_rows() <= 0){
                echo 0; //nim masih belum ada
            }else{
                foreach($q->result_array() as $list){
                    
                    //jika nim sudah ada, tp aktif != 1 / aktif == 0, maka : hapus
                    if($list['aktif'] != 1){
                        $this->db->where('id', $nim);
                        $this->db->delete('mst_mahasiswa');
                        
                        echo 0;
                    }else{
                        //jika selain kondisi di atas, maka munculkan angka 1(artinya nim sudah ada dlm kondisi aktif)
                        echo 1;
                    }
                    
                    
                }
                
            }
            
            
            
        }else{
            show_404('page');
        }
        
    }
    
    

    function form_update($id='') {
        if ($id != '') {
        $data['jurusan'] = $this->dropdown_model->jurusan();
        $data['jenis_kelamin'] = $this->dropdown_model->jenis_kelamin();
            $data['isi'] = $this->mst_mahasiswa_model->retrieve_one($this->aesfunction->paramDecrypt($id));
            $data['content'] = 'admin/mahasiswa/form_mst_mahasiswa';
            $data['type_form'] = 'update';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('admin/mst_mahasiswa');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'mst_jurusan_id',
                'label' => 'mst_jurusan_id',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'tempat_lahir',
                'label' => 'tempat_lahir',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'tgl_lahir',
                'label' => 'tgl_lahir',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'ref_jenis_kelamin_id',
                'label' => 'ref_jenis_kelamin_id',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'no_hp',
                'label' => 'no_hp',
                'rules' => 'required'
            ),
 
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->mst_mahasiswa_model->update($this->input->post('id'));
                $pesan = "user ".$this->session->userdata('username')." berhasil meng-update mahasiswa dgn NIM ".$this->input->post('id');
                $this->fungsi->log($pesan);                      
               // $this->session->set_flashdata('notif', 'Data is updated');
             //   redirect('admin/mst_mahasiswa');
            }
        } else {
            $this->form_update($this->input->post('id'));
        }
    }

    function delete() {
        if (isset($_POST['id'])) {
            $this->mst_mahasiswa_model->delete($_POST['id']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('admin/mst_mahasiswa');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('admin/mst_mahasiswa');
        }
    }

}

 //end of file  mst_mahasiswa.php


 