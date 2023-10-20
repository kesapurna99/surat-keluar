<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasubagtu extends CI_Controller {

	  public function __construct()
    {
        parent::__construct();
        $this->load->model("MUser");
        $this->load->model("MSuratMasuk");
		$this->load->model("MDisposisi");
		$this->load->model("MKendaliSurat");
		$this->load->model("MHak_akses");
        $this->load->model("MTindak_Lanjut");
        $this->load->model("MTemplate");
        $this->load->library('form_validation');
		$this->load->model("MHak_akses");
        $this->load->library('form_validation');
		
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url();
            redirect($url);
		};
        if($this->session->userdata('access') != 'KasubagTu'){
            $url=base_url();
            redirect($url);
        }

    }
	public function index()
	{

		
        $this->load->model("Dashboard");
        $DB = $this->Dashboard;
		$data["surat_masuk"] = $DB->jumlah_surat_masuk();
        $data ["disposisi"] = $DB->jumlah_disposisi();
        $data ["user"] = $DB->jumlah_user();
        $data ["surat_keluar"] = $DB->jumlah_surat_keluar();
        $this->load->view("KasubagTU/dashboard.php", $data);
	}
    public function laporan_pdf($id){
        $surat = $this->MTemplate;
        $data["Surat"] = $surat->getById($id);
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('KasubagTU/laporan_pdf', $data);
        
        
        }
  public function user_profile(){
    $this->load->view("KasubagTU/profile.php");
}
    public function persetujuan_disposisi()
	{
		$data["Disposisi"] = $this->MDisposisi->join2table();
		$this->load->view("KasubagTU/data_disposisi2.php", $data);
	}
    public function persetujuan_suratkeluar()
	{
		$data["Surat"] = $this->MTemplate->getJoin();
		$this->load->view("KasubagTU/data_surat2.php", $data);
	}
    public function ACCkepala_kantor($id){
        if (!isset($id)) redirect('KasubagTU/data_disposisi');
       
        $acc = $this->MDisposisi; 
		$validation = $this->form_validation;
        $validation->set_rules($acc->rules2());

        if ($validation->run()) {
            $acc->update_status_kasubag();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["acc"] = $acc->getById($id);
        if (!$data["acc"]) show_404();
        
        $this->load->view("KasubagTU/persetujuan", $data);

    }
    
    public function ACCsuratkeluar($id){
        if (!isset($id)) redirect('KasubagTU/data_surat2');
       
        $acc = $this->MTemplate; 
		$validation = $this->form_validation;
        $validation->set_rules($acc->rules2());

        if ($validation->run()) {
            $acc->update_status_kasubag();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["acc"] = $acc->getById($id);
        if (!$data["acc"]) show_404();
        
        $this->load->view("KasubagTU/persetujuan_surat_keluar", $data);

    }
    
  //-------------Controller pegawai-------------//
	public function Datauser()
	{
		$data["user"] = $this->MUser->getALL();
		$this->load->view("KasubagTU/data_user.php", $data);
	}
	public function tambahuser()
	{   $NIP = $this->input->post("NIP");
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config1['cacheable']    = true; //boolean, the default is true
        $config1['cachedir']     = './uploads/'; //string, the default is application/cache/
        $config1['errorlog']     = './uploads/'; //string, the default is application/logs/
        $config1['imagedir']     = './uploads/qr_code/'; //direktori penyimpanan qr code
        $config1['quality']      = true; //boolean, the default is true
        $config1['size']         = '1024'; //interger, the default is 1024
        $config1['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config1['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config1);
 
        $image_name = $NIP.'QR.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = 'https://andikateknik.xyz/uploads/paraf/'.$image_name; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config1['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


        $config['upload_path']          = FCPATH.'/uploads/paraf/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024;
        $config['max_width']            = 1080;
        $config['max_height']           = 1080;
        $config['file_name']            = $NIP.'.png';
        $config['encrypt_name']			= false;
		$this->load->library('upload', $config); 

		$user = $this->MUser;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run() != false) {
            if ( ! $this->upload->do_upload('paraf'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('KasubagTU/input_datauser',$error);
            }else{
        
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }}

        $this->load->view("KasubagTU/input_datauser.php");
	}
	public function edituser($id = null)
    {
        if (!isset($id)) redirect('Kasubagtu/Datauser');
       
        $user = $this->MUser; 
		$validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        $this->load->view("KasubagTU/edit_datauser", $data);
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
            redirect(site_url('Kasubagtu/datauser'));
        }
    }
//-------------END Controller pegawai-------------//
//--- User ---//
public function hak_akses(){ 

	    $data["user"] = $this->MUser->getWhere();
        $this->load->view("KasubagTU/hak_akses", $data);
}
public function tambah_hak_akses($id){ 

    if (!isset($id)) redirect('Kasubagtu/DataPegawai');
        $hakakses = $this->MHak_akses; 
		$validation = $this->form_validation;
        $validation->set_rules($hakakses->rules());

		if ($validation->run()) {
            $hakakses->hak_akses();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan');
		}

        $data["hakakses"] = $hakakses->getById2($id);
        if (!$data["hakakses"]) show_404();
        
        $this->load->view("KasubagTU/tambah_hak_akses", $data);
}
//--- end user ---//


}
