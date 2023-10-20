<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MSuratMasuk extends CI_Model
{
    private $_table = "tbl_surat_masuk";

    public $nomor_surat;
    public $kode;
    public $nama_instansi;
    public $lampiran;
    public $perihal;
    public $tgl;
    public $dari;
    public $kepada;
    public $isi_surat;
    public function rules()
    {
        return [
            ['field' => 'kode',
            'label' => 'kode',
            'rules' => 'required'],

            ['field' => 'nama_instansi',
            'label' => 'nama_instansi',
            'rules' => 'required'],

            ['field' => 'perihal',
            'label' => 'perihal',
            'rules' => 'required'],

            ['field' => 'tgl',
            'label' => 'tgl',
            'rules' => 'required'],
            
            ['field' => 'dari',
            'label' => 'dari',
            'rules' => 'required'],


             ['field' => 'kepada',
            'label' => 'kepada',
            'rules' => 'required'],

          

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["nomor_surat" => $id])->row();
    }

    public function save()
    {
       $up = $this->upload->data();
        $post = $this->input->post();
        $this->kode = $post["kode"];
        $this->nama_instansi = $post["nama_instansi"];
        $this->lampiran = $post["lampiran"];
        $this->perihal = $post["perihal"];
        $this->tgl = $post["tgl"];
        $this->dari = $post["dari"];
        $this->kepada = $post["kepada"];
        $this->isi_surat = $up["file_name"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nomor_surat =  $post["nomor_surat"];
        $this->kode = $post["kode"];
        $this->nama_instansi = $post["nama_instansi"];
        $this->lampiran = $post["lampiran"];
        $this->perihal = $post["perihal"];
        $this->tgl = $post["tgl"];
        $this->dari = $post["dari"];
        $this->kepada = $post["kepada"];
        return $this->db->update($this->_table, $this, array('nomor_surat' => $post['nomor_surat']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("nomor_surat" => $id));
    }
}