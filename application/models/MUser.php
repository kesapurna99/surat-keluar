<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MUser extends CI_Model
{

    private $_table = "tbl_user";

    public $NIP;
    public $nama;
    public $jenis_kelamin;
    public $ttl;
    public $no_hp;
    public $alamat;
    public $jabatan;
    public $divisi;
    
    
    public function rules2(){
        return [['field' => 'hak_akses',
         'label' => 'hak_akses',
         'rules' => 'required'],];
     }
    public function rules()
    {
        return [
            ['field' => 'NIP',
            'label' => 'NIP',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required'],

            ['field' => 'jenis_kelamin',
            'label' => 'jenis_kelamin',
            'rules' => 'required'],
            
            ['field' => 'ttl',
            'label' => 'ttl',
            'rules' => 'required'],

            ['field' => 'no_hp',
            'label' => 'no_hp',
            'rules' => 'numeric'],
            
            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required'],

            ['field' => 'jabatan',
            'label' => 'jabatan',
            'rules' => 'required'],

            ['field' => 'hak_akses',
            'label' => 'hak_akses',
            'rules' => 'required'],

            ['field' => 'divisi',
            'label' => 'divisi',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_user'); 
        $this->db->order_by('id_user','DESC'); 

        return $this->db->get()->result();
    }
    public function getUser()
    {
        return $this->db->get($this->_table2)->result();
    }
    public function getJOIN()
    {
        $this->db->select('*');
    $this->db->from('tbl_pegawai'); 
    $this->db->join('tbl_user', 'tbl_user.NIP = tbl_pegawai.NIP');
    $query = $this->db->get();
    return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["NIP" => $id])->row();
    }
    public function getNIP()
    {
        $post = $this->input->post('NIP');
        $this->db->select('*');
        $this->db->from('tbl_user'); 
        $this->db->where('NIP', $post);
         return $this->db->get()->num_rows();
    }
    public function getById2($id)
    {
        return $this->db->get_where($this->_table2, ["NIP" => $id])->row();
    }
    public function getWhere()
    {   
        $this->db->select('*');
        $this->db->from('tbl_user'); 
        $this->db->where('hak_akses', NULL);
         return $this->db->get()->result();

    }

    public function save()
    {
       
       
        $post = $this->input->post();
        $this->NIP = $post["NIP"];
        $this->nama = $post["nama"];
        $this->password = $post["password"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->ttl = $post["ttl"];
        $this->no_hp = $post["no_hp"];
        $this->alamat = $post["alamat"];
        $this->jabatan = $post["jabatan"];
        $this->divisi = $post["divisi"];
        $this->hak_akses = $post["hak_akses"];
      
        return $this->db->insert($this->_table, $this);
    }


    public function update()
    {
        $post = $this->input->post();
        $this->NIP = $post["NIP"];
        $this->nama = $post["nama"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->ttl = $post["ttl"];
        $this->no_hp = $post["no_hp"];
        $this->alamat = $post["alamat"];
        $this->jabatan = $post["jabatan"];
        $this->divisi = $post["divisi"];
   


        return $this->db->update($this->_table, $this, array('NIP' => $post['NIP']));
    }
    public function hak_akses()
    {
       
       $data2 = [
        "hak_akses" => $this->input->post('hak_akses'),
       ];
       return 
       $this->db->where('NIP', $this->input->post('NIP'));
       $this->db->update($this->_table2, $data2);
    }
    
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("NIP" => $id));
    }
}