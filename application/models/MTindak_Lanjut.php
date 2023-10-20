<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MTindak_Lanjut extends CI_Model
{
    private $_table = "tbl_tindak_lanjut_surat_masuk";



    public $id_tanggapan;
    public $id_disposisi;
    public $nomor_surat;
    public $lampiran;
    public $perihal;
    public $isi_ringkasan;
    public $dibuat_oleh;
    public $kepada;
    public $tanggal_masuk;
    public $hasil;
    public $keterangan;
    public $status;
    

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
            ['field' => 'nomor_surat',
            'label' => 'nomor_surat',
            'rules' => 'required'],

            ['field' => 'perihal',
            'label' => 'perihal',
            'rules' => 'required'],

            ['field' => 'isi_ringkasan',
            'label' => 'isi_ringkasan',
            'rules' => 'required'],
            
            ['field' => 'dibuat_oleh',
            'label' => 'dibuat_oleh',
            'rules' => 'required'],

             ['field' => 'kepada',
            'label' => 'kepada',
            'rules' => 'required'],

            ['field' => 'tanggal_masuk',
            'label' => 'tanggal_masuk',
            'rules' => 'required'],
            
            ['field' => 'hasil',
            'label' => 'hasil',
            'rules' => 'required'],

            ['field' => 'keterangan',
            'label' => 'keterangan',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
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
    public function getBetween()
    {
    $post = $this->input->post();
    $tgl_awal = $post["tgl_awal"];
    $tgl_akhir = $post["tgl_akhir"];
       $this->db->select('*');
       $this->db->from('tbl_tindak_lanjut_surat_masuk');
       $this->db->where("tanggal_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir'");
       /*$this->db->where('tgl >=' , date('yyyy-mmm-ddd', strtotime($post)));
       $this->db->where('tgl <=', date('yyyy-mm-dd', strtotime($post2)));*/

        return $this->db->get()->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_disposisi" => $id])->row();
    }
    public function getById2($id)
    {
        $this->db->select('*');
    $this->db->from('tbl_disposisi'); 
    $this->db->join('tbl_surat_masuk', 'tbl_surat_masuk.nomor_surat = tbl_disposisi.nomor_surat');
    $this->db->where('tbl_disposisi.nomor_surat' , $id);
    $query = $this->db->get();
    return $query->row();
    }
    public function getByIdTanggapan($id)
    {
        return $this->db->get_where($this->_table, ["id_tanggapan" => $id])->row();
    }

    public function save()
    {
       
        $post = $this->input->post();
        $this->id_disposisi = $post["id_disposisi"];
        $this->nomor_surat = $post["nomor_surat"];
        $this->perihal = $post["perihal"];
        $this->lampiran = $post["lampiran"];
        $this->isi_ringkasan = $post["isi_ringkasan"];
        $this->dibuat_oleh = $post["dibuat_oleh"];
        $this->kepada = $post["kepada"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->hasil = $post["hasil"];
        $this->keterangan = $post["keterangan"];
        $this->status = 0;
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->id_tanggapan = $post["id_tanggapan"];
         $this->nomor_surat = $post["nomor_surat"];

        $this->perihal = $post["perihal"];
        $this->isi_ringkasan = $post["isi_ringkasan"];
        $this->dibuat_oleh = $post["dibuat_oleh"];
        $this->kepada = $post["kepada"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->hasil = $post["hasil"];
        $this->keterangan = $post["keterangan"];
        $this->status = $post["status"];
        
        return $this->db->update($this->_table, $this, array('id_tanggapan' => $post['id_tanggapan']));
    }
    
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_tanggapan" => $id));
    }
}