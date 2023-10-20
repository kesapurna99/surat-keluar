<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MHak_akses extends CI_Model
{
    private $_table = "tbl_user";

    public $id_user;
    public $NIP;
    public $password;
    public $hak_akses;
    
    public function rules(){
        return [['field' => 'hak_akses',
         'label' => 'hak_akses',
         'rules' => 'required'],];
     }
    public function getUser()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getJOIN()
    {
        $this->db->select('*');
    $this->db->from('tbl_pegawai'); 
    $this->db->join('tbl_user', 'tbl_user.NIP = tbl_pegawai.NIP');
    $query = $this->db->get();
    return $query->result();
    }
    
    public function getById2($id)
    {
        return $this->db->get_where($this->_table, ["NIP" => $id])->row();
    }


    public function hak_akses()
    {
        $post = $this->input->post();
        $this->id_user = $post["id_user"];
        $this->NIP = $post["NIP"];
        $this->password = $post["password"];
        $this->hak_akses = $post["hak_akses"];
        return $this->db->update($this->_table, $this, array('id_user' => $post['id_user']));
    }
    
    
}