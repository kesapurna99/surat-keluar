<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MDisposisi extends CI_Model
{
    private $_table = "tbl_disposisi";

    public $id_disposisi;
    public $indeks;
    public $klasifikasi;
    public $tgl_masuk;
    public $kode;
    public $tgl_penyelesaian;
    public $tgl_buat;
    public $nomor_surat;
    public $dari;
    public $ringkasan_isi;
    public $disposisi_kakanim;
    public $diteruskan_kepada;
    public $status_kepala_kantor;
    public $status_kepala_seksi;
    public $status_kasubag_tu;

    public function rules2(){
        return [    ['field' => 'acc',
                    'label' => 'acc',
                    'rules' => 'required']];
    }
   
    public function rules()
    {
        return [

            ['field' => 'indeks',
            'label' => 'indeks',
            'rules' => 'required'],

            ['field' => 'klasifikasi',
            'label' => 'klasifikasi',
            'rules' => 'required'],
            
            ['field' => 'tgl_masuk',
            'label' => 'tgl_masuk',
            'rules' => 'required'],

             ['field' => 'kode',
            'label' => 'kode',
            'rules' => 'required'],

            ['field' => 'tgl_penyelesaian',
            'label' => 'tgl_penyelesaian',
            'rules' => 'required'],

            ['field' => 'tgl_buat',
            'label' => 'tgl_buat',
            'rules' => 'required'],

            ['field' => 'nomor_surat',
            'label' => 'nomor_surat',
            'rules' => 'required'],

            ['field' => 'dari',
            'label' => 'dari',
            'rules' => 'required'],

            ['field' => 'ringkasan_isi',
            'label' => 'ringkasan_isi',
            'rules' => 'required'],

            ['field' => 'disposisi_kakanim',
            'label' => 'disposisi_kakanim',
            'rules' => 'required'],

            ['field' => 'diteruskan_kepada',
            'label' => 'diteruskan_kepada',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getMax()
    {
        $this->db->order_by('nomor_surat','DESC');
        $this->db->limit(1);
        return $this->db->get('tbl_surat_masuk')->row();
    }
    public function join2table(){
        $this->db->select('*');
        $this->db->from('tbl_disposisi');
        $this->db->join('tbl_surat_masuk','tbl_disposisi.nomor_surat = tbl_surat_masuk.nomor_surat');      
       
        $query = $this->db->get();
        return $query->result();
     }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_disposisi" => $id])->row();
    }
    public function getById2($id)
    {
        return $this->db->get_where("tbl_surat_masuk", ["nomor_surat" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->indeks = $post["indeks"];
        $this->klasifikasi = $post["klasifikasi"];
        $this->tgl_masuk = $post["tgl_masuk"];
        $this->kode = $post["kode"];
        $this->tgl_penyelesaian = $post["tgl_penyelesaian"];
        $this->tgl_buat = $post["tgl_buat"];
        $this->nomor_surat = $post["nomor_surat"];
        $this->dari = $post["dari"];
        $this->ringkasan_isi = $post["ringkasan_isi"];
        $this->disposisi_kakanim = $post["disposisi_kakanim"];
         $this->diteruskan_kepada = $post["diteruskan_kepada"];
       $this->status_kepala_kantor = 0;
        $this->status_kasubag_tu = 0;
         $this->status_kepala_seksi = 0;
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
       $post = $this->input->post();
       $this->id_disposisi = $post["id_disposisi"];
        $this->indeks = $post["indeks"];
        $this->klasifikasi = $post["klasifikasi"];
        $this->tgl_masuk = $post["tgl_masuk"];
        $this->kode = $post["kode"];
        $this->tgl_penyelesaian = $post["tgl_penyelesaian"];
        $this->tgl_buat = $post["tgl_buat"];
        $this->nomor_surat = $post["nomor_surat"];
        $this->dari = $post["dari"];
        $this->ringkasan_isi = $post["ringkasan_isi"];
        $this->disposisi_kakanim = $post["disposisi_kakanim"];
         $this->diteruskan_kepada = $post["diteruskan_kepada"];
         $this->status_kepala_kantor = $post["status_kepala_kantor"];
        $this->status_kasubag_tu = $post["status_kasubag_tu"];
         $this->status_kepala_seksi = $post["status_kepala_seksi"];

        return $this->db->update($this->_table, $this, array('id_disposisi' => $post['id_disposisi']));
    }
    public function update_status()
    {
       $post = $this->input->post();
       $update_status = array('id_disposisi' => $post["id_disposisi"],
                                'status_kepala_seksi' => $post["acc"]);
        $this->db->where('id_disposisi', $post["id_disposisi"]);
        return $this->db->update('tbl_disposisi', $update_status);
    }
    public function update_status_KK()
    {
       $post = $this->input->post();
       $update_status = array('id_disposisi' => $post["id_disposisi"],
                                'status_kepala_kantor' => $post["acc"]);
        $this->db->where('id_disposisi', $post["id_disposisi"]);
        return $this->db->update('tbl_disposisi', $update_status);
    }
    public function update_status_kasubag()
    {
       $post = $this->input->post();
       $update_status = array('id_disposisi' => $post["id_disposisi"],
                                'status_kasubag_tu' => $post["acc"]);
        $this->db->where('id_disposisi', $post["id_disposisi"]);
        return $this->db->update('tbl_disposisi', $update_status);
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_disposisi" => $id));
    }
}