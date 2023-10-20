<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLogin extends CI_Model{

    function query_validasi_username($username){
    	$result = $this->db->query("SELECT * FROM tbl_user WHERE NIP='$username' LIMIT 1");
        return $result;
    }

    function query_validasi_password($username,$password){
    	$result = $this->db->query("SELECT * FROM tbl_user WHERE NIP='$username' AND password = '$password' LIMIT 1");
        return $result;
    }
    

} 