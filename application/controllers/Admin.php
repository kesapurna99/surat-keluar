<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	  public function __construct()
    {
        parent::__construct();
        $this->load->model("MUser");
		$this->load->model("MKendaliSurat");
        $this->load->library('form_validation');
		
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url();
            redirect($url);
		};
        if($this->session->userdata('access') != 'Admin'){
            $url=base_url();
            redirect($url);
        }

    }
	public function index()
	{

		
        $this->load->model("Dashboard");
       
        $this->load->view("Admin/dashboard.php");
	}
  
        
  public function user_profile(){
    $this->load->view("Admin/profile.php");
}
   
  //-------------Controller pegawai-------------//
	public function Datauser()
	{
		$data["user"] = $this->MUser->getALL();
		$this->load->view("Admin/data_user.php", $data);
	}

    public function Reset(){
    
    $this->MKendaliSurat->reset();
    redirect('Admin/Setting');
    }
	public function Setting()
	{
        $user = $this->MKendaliSurat;
        $data['ini'] = $user->getMax();
		$this->load->view("Admin/view_setting.php", $data);
	}
    public function tambahuser()
	{  
        
		$user = $this->MUser;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        
            if($validation->run()){
                if ($user->getNIP() >= 1){
                    $this->session->set_flashdata('error', 'NIP Telah digunakan');
                } else {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }}

        $this->load->view("Admin/input_datauser.php");
	}
	public function edituser($id = null)
    {
        if (!isset($id)) redirect('Admin/Datauser');
       
        $user = $this->MUser; 
		$validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        $this->load->view("Admin/edit_datauser", $data);
    }

    public function deleteuser($id=null)
    {
        if (!isset($id)) show_404();
        $user = $this->MUser->getById($id); 
        if ($user->paraf != null){
            $target_file = './uploads/paraf/'.$user->paraf;
            unlink($target_file);
        } 
        if ($user->qr_code != null){
            $target_file = './uploads/qr_code'.$user->qr_code;
            unlink($target_file);
        }
        if ($this->MUser->delete($id)) {
            redirect(site_url('Admin/datauser'));
        }
    }
//-------------END Controller pegawai-------------//
//--- User ---//


//------------- Controler Kendali surat ------------//
function tambahkendalisurat()
	{

		$kendali = $this->MKendaliSurat;
        $validation = $this->form_validation;
        $validation->set_rules($kendali->rules());

			if ($validation->run() != false){
			
			$kendali->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
           
			}
			
            $data ["Kendali"] = $kendali->getMAX();
            $this->load->view('Admin/input_kendalisurat',$data);
	}

	function datakendalisurat()
	{
	$data["Kendali"] = $this->MKendaliSurat->getAll();
		$this->load->view("Admin/data_kendalisurat.php", $data);
	}
	public function deletekendali($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MKendaliSurat->delete($id)) {
            redirect(site_url('Admin/datakendalisurat'));
        }
	}
    function tambah_surat_keluar()
	{
	$data["Kendali"] = $this->MKendaliSurat->getAll();
		$this->load->view("Admin/tambah_surat_keluar.php", $data);
	}
	
	public function upload_data()
    {
      
       
        $kendali = $this->MKendaliSurat; 
		

        $config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|pdf';
		$config['max_size']             = 3072;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name']			= false;
		$this->load->library('upload', $config); 

        $validation = $this->form_validation;
        $validation->set_rules($kendali->rules_upload());


		   if(! $this->upload->do_upload('file')){
            
                $this->session->set_flashdata('error', 'File Gagal Diupload');
                redirect("Admin/datakendalisurat");
			}else{
                $kendali->upload_data();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect("Admin/datakendalisurat");
            }}
 
//------------- END Controller kendali surat ----------//

    }





