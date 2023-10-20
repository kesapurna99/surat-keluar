<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('MLogin','MLogin');
    }
    
	function index(){
        if($this->session->userdata('logged') !=TRUE){
            $this->load->view('login');
        }elseif($this->session->userdata('access')=='Admin'){
            $url=site_url('Admin');
            redirect($url);
        }elseif($this->session->userdata('access')=='User'){
            $url=site_url('User');
            redirect($url);
        }else{
            $url = base_url($this->session->userdata('access'));
            redirect($url);
        }

    }
    
    function autentikasi(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
                
        $validasi_username = $this->MLogin->query_validasi_username($username);
        if($validasi_username->num_rows() > 0){
            $validate_ps=$this->MLogin->query_validasi_password($username,$password);
            if($validate_ps->num_rows() > 0){
                $x = $validate_ps->row_array();
               
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('user',$username);
                    $id=$x['id_user'];
                    $jabatan = $x['jabatan'];
              		$NIP = $x['NIP'];
                    $divisi = $x['divisi'];
                    $alamat = $x['alamat'];
                    $no_hp = $x['no_hp'];
                    $jenis_kelamin = $x['jenis_kelamin'];
                    $ttl = $x['ttl'];
                    if($x['hak_akses']=='Admin'){ //Kepala Kantor
                        $nama = $x['nama'];
                        $this->session->set_userdata('access','Admin');
                        $this->session->set_userdata('id_user',$id);
                        $this->session->set_userdata('nama',$nama);
                      	$this->session->set_userdata('NIP',$NIP);
                        $this->session->set_userdata('divisi',$divisi);
                        $this->session->set_userdata('alamat',$alamat);
                        $this->session->set_userdata('no_hp',$no_hp);
                        $this->session->set_userdata('jenis_kelamin',$jenis_kelamin);
                        $this->session->set_userdata('ttl',$ttl);
                        $this->session->set_userdata('jabatan',$jabatan);
                        redirect('Admin');

                    }else if($x['hak_akses']=='User'){ //kasubagtu
                        $nama = $x['nama'];
                        $this->session->set_userdata('access','User');
                        $this->session->set_userdata('id_user',$id);
                        $this->session->set_userdata('nama',$nama);
                      	$this->session->set_userdata('NIP',$NIP);
                        $this->session->set_userdata('divisi',$divisi);
                        $this->session->set_userdata('alamat',$alamat);
                        $this->session->set_userdata('no_hp',$no_hp);
                        $this->session->set_userdata('jenis_kelamin',$jenis_kelamin);
                        $this->session->set_userdata('ttl',$ttl);
                        $this->session->set_userdata('jabatan',$jabatan);
                        redirect('User');

                    }
                
            }else{
                $url=base_url();
                echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect($url);
            }

        }else{
            $url=base_url();
            echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Uupps!</h3>
            <p>username yang kamu masukan salah.</p>');
            redirect($url);
        }

    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url();
        redirect($url);
    }

}
