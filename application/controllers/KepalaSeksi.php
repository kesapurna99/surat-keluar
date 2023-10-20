\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\hnxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxcc<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KepalaSeksi extends CI_Controller {

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
		
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
        if($this->session->userdata('access') != 'KepalaSeksi'){
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
        $this->load->view("KepalaSeksi/dashboard.php", $data);
	}
	  public function user_profile(){
    $this->load->view("KepalaSeksi/profile.php");
}
    public function ACCkepala_kantor($id){
        if (!isset($id)) redirect('KepalaSeksi/data_disposisi');
       
        $acc = $this->MDisposisi; 
		$validation = $this->form_validation;
        $validation->set_rules($acc->rules2());

        if ($validation->run()) {
            $acc->update_status();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["acc"] = $acc->getById($id);
        if (!$data["acc"]) show_404();
        
        $this->load->view("KepalaSeksi/persetujuan", $data);

    }
    public function ACCsuratkeluar($id){
        if (!isset($id)) redirect('KepalaSeksi/data_surat2');
       
        $acc = $this->MTemplate; 
		$validation = $this->form_validation;
        $validation->set_rules($acc->rules2());

        if ($validation->run()) {
            $acc->update_status();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["acc"] = $acc->getById($id);
        if (!$data["acc"]) show_404();
        
        $this->load->view("KepalaSeksi/persetujuan_surat_keluar", $data);

    }
    public function persetujuan_disposisi()
	{
		$data["Disposisi"] = $this->MDisposisi->join2table();
		$this->load->view("KepalaSeksi/data_disposisi2.php", $data);
	}
    public function persetujuan_suratkeluar()
	{
		$data["Surat"] = $this->MTemplate->getJoin();
		$this->load->view("KepalaSeksi/data_surat2.php", $data);
	}

  //-------------Controller pegawai-------------//
	public function Datauser()
	{
		$data["user"] = $this->MUser->getALL();
		$this->load->view("KepalaSeksi/data_user.php", $data);
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
 
        $params['data'] = 'http://siapers/uploads/qr_code/'.$image_name; //data yang akan di jadikan QR CODE
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
                $this->load->view('KepalaSeksi/input_datauser',$error);
            }else{
        
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }}

        $this->load->view("KepalaSeksi/input_datauser.php");
	}
	public function edituser($id = null)
    {
        if (!isset($id)) redirect('KepalaSeksi/Datauser');
       
        $user = $this->MUser; 
		$validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        $this->load->view("KepalaSeksi/edit_datauser", $data);
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
            redirect(site_url('KepalaSeksi/datauser'));
        }
    }
//-------------END Controller pegawai-------------//
//--- User ---//
public function tambah_hak_akses($id){ 

	if (!isset($id)) redirect('KepalaSeksi/DataPegawai');
        $hakakses = $this->MHak_akses; 
		$validation = $this->form_validation;
        $validation->set_rules($hakakses->rules());

		if ($validation->run()) {
            $hakakses->hak_akses();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan');
		}

        $data["hakakses"] = $hakakses->getById2($id);
        if (!$data["hakakses"]) show_404();
        
        $this->load->view("KepalaSeksi/hak_akses", $data);
}
//--- end user ---//

//-------------Controller Surat Masuk-------------//
	function tambahsuratmasuk()
	{

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|pdf';
		$config['max_size']             = 3072;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name']			= false;
		$this->load->library('upload', $config); 

		$suratmasuk = $this->MSuratMasuk;
        $validation = $this->form_validation;
        $validation->set_rules($suratmasuk->rules());

			if ($validation->run() != false){

				if ( ! $this->upload->do_upload('lampiran'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('KepalaSeksi/VMasuk',$error);
				}
			/*$data['lampiran'] = $this->upload->data("file_name");
			$data['nomor_surat'] = $this->input->post('nomor_surat');
			$data['perihal'] = $this->input->post('perihal');
			$data['tgl'] = $this->input->post('tgl');
			$data['dari'] = $this->input->post('dari');
			$data['kepada'] =  $this->input->post('kepada');
			$data['isi_surat'] = $this->input->post('isi_surat');
			$this->db->insert('tbl_surat_masuk',$data);
			 $this->session->set_flashdata('success', 'Berhasil disimpan');
			 */ else {
			$suratmasuk->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('KepalaSeksi/tambahdisposisi'));
			}
			
		
	}
	$this->load->view('KepalaSeksi/VMasuk');
	}

	function datasuratmasuk()
	{
	$data  ["Surat_masuk"] = $this->MSuratMasuk->getAll();
		$this->load->view("KepalaSeksi/data_suratmasuk.php", $data);
	}
	public function delete_suratmasuk($id)
    {
        if (!isset($id)) show_404();
        $suratmasuk = $this->MSuratMasuk->getById($id); 
        if ($suratmasuk->lampiran != null){
            $target_file = './uploads/'.$suratmasuk->lampiran;
            unlink($target_file);
        }
        
        if ($this->MSuratMasuk->delete($id)) {
            redirect(site_url('KepalaSeksi/datasuratmasuk'));
        }
	}

	public function editsuratmasuk($id = null)
    {
        if (!isset($id)) redirect('KepalaSeksi/datasuratmasuk');
       
        $suratmasuk = $this->MSuratMasuk; 
		$validation = $this->form_validation;
        $validation->set_rules($suratmasuk->rules());

        if ($validation->run()) {
            $suratmasuk->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["suratmasuk"] = $suratmasuk->getById($id);
        if (!$data["suratmasuk"]) show_404();
        
        $this->load->view("KepalaSeksi/edit_suratmasuk", $data);
    }
//------------- END controller of  surat masuk-----------//

//------------- Controller Disposisi----------//
public function DataDisposisi()
	{
		$data["Disposisi"] = $this->MDisposisi->getAll();
		$this->load->view("KepalaSeksi/data_disposisi.php", $data);
	}
	public function tambahdisposisi()
	{
		$disposisi = $this->MDisposisi;
        $validation = $this->form_validation;
        $validation->set_rules($disposisi->rules());

        if ($validation->run() != false) {
            $disposisi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('KepalaSeksi/datasuratmasuk');
        }
		$data["DS"] = $disposisi->getMAX();
        $this->load->view("KepalaSeksi/VDisposisi.php", $data);
	}
    public function tambahdisposisi_($id )
	{
		$disposisi = $this->MDisposisi;
        $validation = $this->form_validation;
        $validation->set_rules($disposisi->rules());

        if ($validation->run() != false) {
            $disposisi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('KepalaSeksi/datasuratmasuk');
        }
		$data["DS"] = $disposisi->getById2($id);
        $this->load->view("KepalaSeksi/input_disposisi.php", $data);
	}
	public function editdisposisi($id = null)
    {
        if (!isset($id)) redirect('KepalaSeksi/VDisposisi');
       
        $disposisi = $this->MDisposisi; 
		$validation = $this->form_validation;
        $validation->set_rules($disposisi->rules());

        if ($validation->run()) {
            $disposisi->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["disposisi"] = $disposisi->getById($id);
        if (!$data["disposisi"]) show_404();
        
        $this->load->view("KepalaSeksi/editdisposisi", $data);
    }

    public function deletedisposisi($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MDisposisi->delete($id)) {
            redirect(site_url('KepalaSeksi/datadisposisi'));
        }
    }
//-------------END Controller disposisi-------------//

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
			
		$this->load->view('KepalaSeksi/input_kendalisurat');
	}

	function datakendalisurat()
	{
	$data["Kendali"] = $this->MKendaliSurat->getAll();
		$this->load->view("KepalaSeksi/data_kendalisurat.php", $data);
	}
	public function deletekendali($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MKendaliSurat->delete($id)) {
            redirect(site_url('KepalaSeksi/datakendalisurat'));
        }
	}

	public function editkendalisurat($id)
    {
        if (!isset($id)) redirect('KepalaSeksi/datakendalisurat');
       
        $kendali = $this->MKendaliSurat; 
		$validation = $this->form_validation;
        $validation->set_rules($kendali->rules());

        if ($validation->run()) {
            $kendali->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kendali"] = $kendali->getById($id);
        if (!$data["kendali"]) show_404();
        
        $this->load->view("KepalaSeksi/edit_kendalisurat", $data);
    }
//------------- END Controller kendali surat ----------//
//------------ Controller Tanggapan ------------------//

	public function datatindak_lanjut()
	{
		$data["Disposisi"] = $this->MDisposisi->getALL();
		$this->load->view("KepalaSeksi/data_tindak_lanjut.php", $data);
	}
	public function tambahtindak_lanjut($id)
	{
		$tindak_lanjut = $this->MTindak_Lanjut;
        $validation = $this->form_validation;
        $validation->set_rules($tindak_lanjut->rules());

        if ($validation->run() != false) {
            $tindak_lanjut->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["tindak_lanjut"] = $tindak_lanjut->getById2($id);
        $this->load->view("KepalaSeksi/input_tindak_lanjut.php", $data);
	}
	public function edittindak_lanjut($id = null)
    {
        if (!isset($id)) redirect('KepalaSeksi/datatanggapan');
       
        $tindak_lanjut = $this->MTindak_Lanjut; 
		$validation = $this->form_validation;
        $validation->set_rules($tindak_lanjut->rules());

        if ($validation->run()) {
            $tindak_lanjut->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["tindak_lanjut"] = $tindak_lanjut->getById($id);
        if (!$data["tindak_lanjut"]) show_404();
        
        $this->load->view("KepalaSeksi/edit_tindak_lanjut", $data);
    }

    public function delete_tindak_lanjut($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MTindak_Lanjut->delete($id)) {
            redirect(site_url('KepalaSeksi/datatindak_lanjut'));
        }
    }
//------------ END Of Tanggapan -----------------//

public function data_masuk_disposisi(){
    $this->load->view('KepalaSeksi/Vmasuk_disposisi');
}
     //-------------Controller Template-------------//
	public function data_surat()
	{
		$data["Surat"] = $this->MTemplate->getAll();
		$this->load->view("KepalaSeksi/data_surat.php", $data);
	}
	public function tambah_surat()
	{
		$surat = $this->MTemplate;
        $validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run() != false) {
            $surat->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("KepalaSeksi/buat_surat.php");
	}
	public function edit_surat($id = null)
    {
        if (!isset($id)) redirect('KepalaSeksi/data_surat');
       
        $surat = $this->MTemplate; 
		$validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $surat->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["surat"] = $surat->getById($id);
        if (!$data["surat"]) show_404();
        
        $this->load->view("KepalaSeksi/edit_data_surat", $data);
    }
    public function delete_surat($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MTamplate->delete($id)) {
            redirect(site_url('KepalaSeksi/data_surat'));
        }
    }
    
    public function laporan_pdf($id){
        $surat = $this->MTemplate;
        $data["Surat"] = $surat->getById($id);
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('KepalaSeksi/laporan_pdf', $data);
        
        
        }
    
//-------------END Controller surat-------------//
	public function dashboard()
	{
	}
}
