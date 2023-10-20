<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MTemplate extends CI_Model
{
    private $_table = "tbl_template";

    public $id_user;
    public $jenis_surat;
    public $nomor_surat;
    public $lampiran;
    public $perihal;
    public $tgl;
    public $dari;
    public $kepada;
    public $isi_surat;
    public $status_kepala_kantor;
    public $status_kasubag_tu;
    public $status_kepala_seksi; 


    public function rules2()
    {
        return [
            ['field' => 'acc',
            'label' => 'acc',
            'rules' => 'required'],

        ];
    }
    public function rules_tgl()
    {
        return [
            ['field' => 'tgl_awal',
            'label' => 'tanggal awal',
            'rules' => 'required'],
            ['field' => 'tgl_akhir',
            'label' => 'tanggal akhir',
            'rules' => 'required']

        ];
    }
    public function rules()
    {
        return [
            ['field' => 'jenis_surat',
            'label' => 'jenis_surat',
            'rules' => 'required'],

            ['field' => 'nomor_surat',
            'label' => 'nomor_surat',
            'rules' => 'required'],

            ['field' => 'no_urut',
            'label' => 'no_urut',
            'rules' => 'required'],

            ['field' => 'lampiran',
            'label' => 'lampiran',
            'rules' => 'required'],
            
            ['field' => 'perihal',
            'label' => 'perihal',
            'rules' => 'required'],

             ['field' => 'dari',
            'label' => 'dari',
            'rules' => 'required'],

            ['field' => 'tgl',
            'label' => 'tgl',
            'rules' => 'required'],
            
            ['field' => 'kepada',
            'label' => 'kepada',
            'rules' => 'required'],

            ['field' => 'isi_surat',
            'label' => 'isi_surat',
            'rules' => 'required'],


        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getBetween()
    {
    $post = $this->input->post();
    $tgl_awal = $post["tgl_awal"];
    $tgl_akhir = $post["tgl_akhir"];
       $this->db->select('*');
       $this->db->from('tbl_template');
       $this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
       /*$this->db->where('tgl >=' , date('yyyy-mmm-ddd', strtotime($post)));
       $this->db->where('tgl <=', date('yyyy-mm-dd', strtotime($post2)));*/

        return $this->db->get()->result();
    }
    public function getUser()
    {
        return $this->db->get($this->_table2)->result();
    }
    public function join3table($id){
        $this->db->select('*');
        $this->db->from('tbl_template');
        $this->db->join('tbl_user','tbl_template.id_user = tbl_user.id_user');      
        $this->db->join('tbl_kendali_surat','tbl_template.nomor_surat = tbl_kendali_surat.nomor_surat');
        $this->db->where('id_template', $id);
        $query = $this->db->get();
        return $query->row();
     }
     public function join2table(){
        $this->db->select('*');
        $this->db->from('tbl_template');
        $this->db->join('tbl_user','tbl_template.id_user = tbl_user.id_user');      
       
        $query = $this->db->get();
        return $query->result();
     }
     public function getJoin(){
        $this->db->select('*');
        $this->db->from('tbl_template');
        $this->db->join('tbl_kendali_surat','tbl_template.no_urut = tbl_kendali_surat.no_urut');      
       
        $query = $this->db->get();
        return $query->result();
     }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_template" => $id])->row();
    }
    public function getById2($id)
    {
        return $this->db->get_where($this->_table2, ["NIP" => $id])->row();
    }

    public function save()
    {
       
        $post = $this->input->post();
        $this->id_user = $post["id_user"];
        $this->jenis_surat = $post["jenis_surat"];
        $this->no_urut = $post["no_urut"];
        $this->nomor_surat = $post["nomor_surat"];
        $this->lampiran = $post["lampiran"];
        $this->perihal = $post["perihal"];
        $this->dari = $post["dari"];
        $this->tgl = $post["tgl"];
        $this->kepada = $post["kepada"];
        $this->isi_surat = $post["isi_surat"];
        $this->status_kepala_seksi = 0;
        $this->status_kepala_kantor = 0;
       $this->status_kasubag_tu = 0;
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_user = $post["id_user"];
        $this->jenis_surat = $post["jenis_surat"];
        $this->no_urut = $post["no_urut"];
        $this->nomor_surat = $post["nomor_surat"];
        $this->lampiran = $post["lampiran"];
        $this->perihal = $post["perihal"];
        $this->dari = $post["dari"];
        $this->tgl = $post["tgl"];
        $this->kepada = $post["kepada"];
        $this->isi_surat = $post["isi_surat"];
        $this->status_kepala_kantor = $post["status_kepala_kantor"];
        $this->status_kasubag_tu = $post["status_kasubag_tu"];
        $this->status_kepala_seksi = $post["status_kepala_seksi"];
        return $this->db->update($this->_table, $this, array('id_template' => $post['id_template']));
    }
    public function update_status()
    {
       $post = $this->input->post();
       $update_status = array('id_template' => $post["id_template"],
                                'status_kepala_seksi' => $post["acc"]);
        $this->db->where('id_template', $post["id_template"]);
        return $this->db->update('tbl_template', $update_status);
    }
    public function update_status_KK()
    {
       $post = $this->input->post();
       $update_status = array('id_template' => $post["id_template"],
                                'status_kepala_kantor' => $post["acc"]);
        $this->db->where('id_template', $post["id_template"]);
        return $this->db->update('tbl_template', $update_status);
    }
    public function update_status_Kasubag()
    {
       $post = $this->input->post();
       $update_status = array('id_template' => $post["id_template"],
                                'status_kasubag_tu' => $post["acc"]);
        $this->db->where('id_template', $post["id_template"]);
        return $this->db->update('tbl_template', $update_status);
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_template" => $id));
    }
}