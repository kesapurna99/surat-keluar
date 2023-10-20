<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KepalaKantor extends CI_Controller {

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
        if($this->session->userdata('access') != 'KepalaKantor'){
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
        $this->load->view("KepalaKantor/dashboard.php", $data);
	}
	  public function user_profile(){
    $this->load->view("KepalaKantor/profile.php");
}
    public function ACCkepala_kantor($id){
        if (!isset($id)) redirect('KepalaKantor/data_disposisi');
       
        $acc = $this->MDisposisi; 
		$validation = $this->form_validation;
        $validation->set_rules($acc->rules2());

        if ($validation->run()) {
            $acc->update_status_KK();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["acc"] = $acc->getById($id);
        if (!$data["acc"]) show_404();
        
        $this->load->view("KepalaKantor/persetujuan", $data);

    }
    public function ACCsuratkeluar($id){
        if (!isset($id)) redirect('KepalaKantor/data_surat2');
       
        $acc = $this->MTemplate; 
		$validation = $this->form_validation;
        $validation->set_rules($acc->rules2());

        if ($validation->run()) {
            $acc->update_status_KK();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["acc"] = $acc->getById($id);
        if (!$data["acc"]) show_404();
        
        $this->load->view("KepalaKantor/persetujuan_surat_keluar", $data);

    }

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
					$this->load->view('KepalaKantor/VMasuk',$error);
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
			redirect(site_url('KepalaKantor/tambahdisposisi'));
			}
			
		
	}
	$this->load->view('KepalaKantor/VMasuk');
	}

	function datasuratmasuk()
	{
	$data  ["Surat_masuk"] = $this->MSuratMasuk->getAll();
		$this->load->view("KepalaKantor/data_suratmasuk.php", $data);
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
            redirect(site_url('KepalaKantor/datasuratmasuk'));
        }
	}

	public function editsuratmasuk($id = null)
    {
        if (!isset($id)) redirect('KepalaKantor/datasuratmasuk');
       
        $suratmasuk = $this->MSuratMasuk; 
		$validation = $this->form_validation;
        $validation->set_rules($suratmasuk->rules());

        if ($validation->run()) {
            $suratmasuk->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["suratmasuk"] = $suratmasuk->getById($id);
        if (!$data["suratmasuk"]) show_404();
        
        $this->load->view("KepalaKantor/edit_suratmasuk", $data);
    }
//------------- END controller of  surat masuk-----------//

//------------- Controller Disposisi----------//
public function DataDisposisi()
	{
		$data["Disposisi"] = $this->MDisposisi->getAll();
		$this->load->view("KepalaKantor/data_disposisi2.php", $data);
	}
    public function persetujuan_disposisi()
	{
		$data["Disposisi"] = $this->MDisposisi->join2table();
		$this->load->view("KepalaKantor/data_disposisi.php", $data);
	}
    public function persetujuan_suratkeluar()
	{
		$data["Surat"] = $this->MTemplate->getJoin();
		$this->load->view("KepalaKantor/data_surat2.php", $data);
	}
	public function tambahdisposisi()
	{
		$disposisi = $this->MDisposisi;
        $validation = $this->form_validation;
        $validation->set_rules($disposisi->rules());

        if ($validation->run() != false) {
            $disposisi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('KepalaKantor/datasuratmasuk');
        }
		$data["DS"] = $disposisi->getMAX();
        $this->load->view("KepalaKantor/VDisposisi.php", $data);
	}
    public function tambahdisposisi_($id )
	{
		$disposisi = $this->MDisposisi;
        $validation = $this->form_validation;
        $validation->set_rules($disposisi->rules());

        if ($validation->run() != false) {
            $disposisi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('KepalaKantor/datasuratmasuk');
        }
		$data["DS"] = $disposisi->getById2($id);
        $this->load->view("KepalaKantor/input_disposisi.php", $data);
	}
	public function editdisposisi($id = null)
    {
        if (!isset($id)) redirect('KepalaKantor/VDisposisi');
       
        $disposisi = $this->MDisposisi; 
		$validation = $this->form_validation;
        $validation->set_rules($disposisi->rules());

        if ($validation->run()) {
            $disposisi->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["disposisi"] = $disposisi->getById($id);
        if (!$data["disposisi"]) show_404();
        
        $this->load->view("KepalaKantor/editdisposisi", $data);
    }

    public function deletedisposisi($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MDisposisi->delete($id)) {
            redirect(site_url('KepalaKantor/datadisposisi'));
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
			
		$this->load->view('KepalaKantor/input_kendalisurat');
	}

	function datakendalisurat()
	{
	$data["Kendali"] = $this->MKendaliSurat->getAll();
		$this->load->view("KepalaKantor/data_kendalisurat.php", $data);
	}
	public function deletekendali($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MKendaliSurat->delete($id)) {
            redirect(site_url('KepalaKantor/datakendalisurat'));
        }
	}

	public function editkendalisurat($id)
    {
        if (!isset($id)) redirect('KepalaKantor/datakendalisurat');
       
        $kendali = $this->MKendaliSurat; 
		$validation = $this->form_validation;
        $validation->set_rules($kendali->rules());

        if ($validation->run()) {
            $kendali->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kendali"] = $kendali->getById($id);
        if (!$data["kendali"]) show_404();
        
        $this->load->view("KepalaKantor/edit_kendalisurat", $data);
    }
//------------- END Controller kendali surat ----------//
//------------ Controller Tanggapan ------------------//

	public function datatindak_lanjut()
	{
		$data["Disposisi"] = $this->MDisposisi->getALL();
		$this->load->view("KepalaKantor/data_tindak_lanjut.php", $data);
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
        $this->load->view("KepalaKantor/input_tindak_lanjut.php", $data);
	}
	public function edittindak_lanjut($id = null)
    {
        if (!isset($id)) redirect('KepalaKantor/datatanggapan');
       
        $tindak_lanjut = $this->MTindak_Lanjut; 
		$validation = $this->form_validation;
        $validation->set_rules($tindak_lanjut->rules());

        if ($validation->run()) {
            $tindak_lanjut->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["tindak_lanjut"] = $tindak_lanjut->getById($id);
        if (!$data["tindak_lanjut"]) show_404();
        
        $this->load->view("KepalaKantor/edit_tindak_lanjut", $data);
    }

    public function delete_tindak_lanjut($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MTindak_Lanjut->delete($id)) {
            redirect(site_url('KepalaKantor/datatindak_lanjut'));
        }
    }
//------------ END Of Tanggapan -----------------//

public function data_masuk_disposisi(){
    $this->load->view('KepalaKantor/Vmasuk_disposisi');
}
public function data_keluar_kendali(){
    $this->load->view('KepalaKantor/Vkeluar_kendali');
}
     //-------------Controller Template-------------//
	public function data_surat()
	{
		$data["Surat"] = $this->MTemplate->getAll();
		$this->load->view("KepalaKantor/data_surat.php", $data);
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

        $this->load->view("KepalaKantor/buat_surat.php");
	}
	public function edit_surat($id = null)
    {
        if (!isset($id)) redirect('KepalaKantor/data_surat');
       
        $surat = $this->MTemplate; 
		$validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $surat->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["surat"] = $surat->getById($id);
        if (!$data["surat"]) show_404();
        
        $this->load->view("KepalaKantor/edit_data_surat", $data);
    }
    public function delete_surat($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MTamplate->delete($id)) {
            redirect(site_url('KepalaKantor/data_surat'));
        }
    }
    
    public function laporan_pdf($id){
        $surat = $this->MTemplate;
        $data["Surat"] = $surat->getById($id);
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('KepalaKantor/laporan_pdf', $data);
        
        
        }
    
//-------------END Controller surat-------------//
	public function dashboard()
	{
	}
}
