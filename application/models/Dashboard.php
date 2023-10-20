<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Model{

    public function jumlah_surat_masuk(){
    	$query =$this->db->get('tbl_surat_masuk');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    

    public function jumlah_surat_keluar(){
    	$query = $this->db->get('tbl_template');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    public function jumlah_disposisi(){
    	$query = $this->db->get('tbl_disposisi');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    public function jumlah_user(){
    	$query = $this->db->get('tbl_disposisi');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    

} 