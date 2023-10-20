<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffSeksi extends CI_Controller {

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
        if($this->session->userdata('access') != 'StaffSeksi'){
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
        $this->load->view("StaffSeksi/dashboard.php", $data);
	}
	  public function user_profile(){
    $this->load->view("StaffSeksi/profile.php");
}
    public function report_surat_keluar(){
        $surat = $this->MTemplate;
         $validation = $this->form_validation;
         $validation->set_rules($surat->rules_tgl());
 
         if($validation->run()){
             $data["Surat"] = $this->MTemplate->getBetween();
         $this->load->view("StaffSeksi/report_surat_keluar.php", $data);
         } else{
         $data["Surat"] = $this->MTemplate->getAll();
         $this->load->view("StaffSeksi/report_surat_keluar.php", $data);}
     }
     public function report_hasil_tindak_lanjut(){
        $surat = $this->MTindak_Lanjut;
         $validation = $this->form_validation;
         $validation->set_rules($surat->rules_tgl());
 
         if($validation->run()){
             $data["Surat"] = $this->MTindak_Lanjut->getBetween();
         $this->load->view("StaffSeksi/report_hasil_tindak_lanjut.php", $data);
         } else{
         $data["Surat"] = $this->MTindak_Lanjut->getAll();
         $this->load->view("StaffSeksi/report_hasil_tindak_lanjut.php", $data);}
     }
    
  //-------------Controller pegawai-------------//
	
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
					$this->load->view('StaffSeksi/VMasuk',$error);
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
			redirect(site_url('StaffSeksi/tambahdisposisi'));
			}
			
		
	}
	$this->load->view('StaffSeksi/VMasuk');
	}

	function datasuratmasuk()
	{
	$data  ["Surat_masuk"] = $this->MSuratMasuk->getAll();
		$this->load->view("StaffSeksi/data_suratmasuk.php", $data);
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
            redirect(site_url('StaffSeksi/datasuratmasuk'));
        }
	}

	public function editsuratmasuk($id = null)
    {
        if (!isset($id)) redirect('StaffSeksi/datasuratmasuk');
       
        $suratmasuk = $this->MSuratMasuk; 
		$validation = $this->form_validation;
        $validation->set_rules($suratmasuk->rules());

        if ($validation->run()) {
            $suratmasuk->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["suratmasuk"] = $suratmasuk->getById($id);
        if (!$data["suratmasuk"]) show_404();
        
        $this->load->view("StaffSeksi/edit_suratmasuk", $data);
    }
//------------- END controller of  surat masuk-----------//

//------------- Controller Disposisi----------//
public function DataDisposisi()
	{
		$data["Disposisi"] = $this->MDisposisi->getAll();
		$this->load->view("StaffSeksi/data_disposisi.php", $data);
	}
	public function tambahdisposisi()
	{
		$disposisi = $this->MDisposisi;
        $validation = $this->form_validation;
        $validation->set_rules($disposisi->rules());

        if ($validation->run() != false) {
            $disposisi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('StaffSeksi/datasuratmasuk');
        }
		$data["DS"] = $disposisi->getMAX();
        $this->load->view("StaffSeksi/VDisposisi.php", $data);
	}
    public function tambahdisposisi_($id )
	{
		$disposisi = $this->MDisposisi;
        $validation = $this->form_validation;
        $validation->set_rules($disposisi->rules());

        if ($validation->run() != false) {
            $disposisi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('StaffSeksi/datasuratmasuk');
        }
		$data["DS"] = $disposisi->getById2($id);
        $this->load->view("StaffSeksi/input_disposisi.php", $data);
	}
	public function editdisposisi($id = null)
    {
        if (!isset($id)) redirect('StaffSeksi/VDisposisi');
       
        $disposisi = $this->MDisposisi; 
		$validation = $this->form_validation;
        $validation->set_rules($disposisi->rules());

        if ($validation->run()) {
            $disposisi->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["disposisi"] = $disposisi->getById($id);
        if (!$data["disposisi"]) show_404();
        
        $this->load->view("StaffSeksi/editdisposisi", $data);
    }

    public function deletedisposisi($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MDisposisi->delete($id)) {
            redirect(site_url('StaffSeksi/datadisposisi'));
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
			
            $data ["Kendali"] = $kendali->getMAX();
            $this->load->view('StaffSeksi/input_kendalisurat',$data);
	}

	function datakendalisurat()
	{
	$data["Kendali"] = $this->MKendaliSurat->getAll();
		$this->load->view("StaffSeksi/data_kendalisurat.php", $data);
	}
	public function deletekendali($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MKendaliSurat->delete($id)) {
            redirect(site_url('StaffSeksi/datakendalisurat'));
        }
	}
    function tambah_surat_keluar()
	{
	$data["Kendali"] = $this->MKendaliSurat->getAll();
		$this->load->view("StaffSeksi/tambah_surat_keluar.php", $data);
	}
	
	public function editkendalisurat($id)
    {
        if (!isset($id)) redirect('StaffSeksi/datakendalisurat');
       
        $kendali = $this->MKendaliSurat; 
		$validation = $this->form_validation;
        $validation->set_rules($kendali->rules());

        if ($validation->run()) {
            $kendali->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kendali"] = $kendali->getById($id);
        if (!$data["kendali"]) show_404();
        
        $this->load->view("StaffSeksi/edit_kendalisurat", $data);
    }
//------------- END Controller kendali surat ----------//
//------------ Controller Tanggapan ------------------//

	public function datatindak_lanjut()
	{
		$data["Disposisi"] = $this->MDisposisi->getALL();
		$this->load->view("StaffSeksi/data_tindak_lanjut.php", $data);
	}
    public function data_hasil_tindak_lanjut()
	{
		$data["tindak_lanjut"] = $this->MTindak_Lanjut->getALL();
		$this->load->view("StaffSeksi/data_hasil_tindak_lanjut.php", $data);
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
        $this->load->view("StaffSeksi/input_tindak_lanjut.php", $data);
	}
	public function edittindak_lanjut($id = null)
    {
        if (!isset($id)) redirect('StaffSeksi/data_hasil_tindak_lanjut');
       
        $tindak_lanjut = $this->MTindak_Lanjut; 
		$validation = $this->form_validation;
        $validation->set_rules($tindak_lanjut->rules());

        if ($validation->run()) {
            $tindak_lanjut->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["tindak_lanjut"] = $tindak_lanjut->getByIdTanggapan($id);
        if (!$data["tindak_lanjut"]) show_404();
        
        $this->load->view("StaffSeksi/edit_hasil_tindak_lanjut", $data);
    }

    public function delete_tindak_lanjut($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MTindak_Lanjut->delete($id)) {
            redirect(site_url('StaffSeksi/data_hasil_tindak_lanjut'));
        }
    }
//------------ END Of Tanggapan -----------------//

public function data_masuk_disposisi(){
    $this->load->view('StaffSeksi/Vmasuk_disposisi');
}
     //-------------Controller Template-------------//
	public function data_surat()
	{
		$data["Surat"] = $this->MTemplate->join2table();
		$this->load->view("StaffSeksi/data_surat.php", $data);
	}
	public function tambah_surat($id)
	{
		$surat = $this->MTemplate;
        
        $validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run() != false) {

            $surat->save();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan');
            redirect('StaffSeksi/tambah_surat_keluar');
        }
      
        $data["user"] = $this->MUser->getALL();
        $data["Kendali"] = $this->MKendaliSurat->getById($id);
        $this->load->view("StaffSeksi/buat_surat.php", $data);
	}
	public function edit_surat($id = null)
    {
        if (!isset($id)) redirect('StaffSeksi/data_surat');
       
        $surat = $this->MTemplate; 
		$validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $surat->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["surat"] = $surat->getById($id);
        if (!$data["surat"]) show_404();
        
        $this->load->view("StaffSeksi/edit_data_surat", $data);
    }
    public function delete_surat($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MTemplate->delete($id)) {
            redirect(site_url('StaffSeksi/data_surat'));
        }
    }
    
    public function laporan_pdf($id){
        $surat = $this->MTemplate;
        $data["Surat"] = $surat->join3table($id);
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('StaffSeksi/laporan_pdf', $data);
        
        
        }
    
//-------------END Controller surat-------------//
	public function dashboard()
	{
	}
}
