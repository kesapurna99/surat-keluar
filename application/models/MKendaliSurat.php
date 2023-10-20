<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MKendaliSurat extends CI_Model
{
    private $_table = "tbl_kendali_surat";

    public $no_urut;
    public $jenis_surat;
    public $nomor_surat;
    public $indeks;
    public $kode;
    public $dari;
    public $kepada;
    public $lampiran;
    public $isi_ringkasan;
    public $tanggal;
    public $pengolah;
    public $catatan;
    public $klasifikasi;
    public $file;
    public function rules_upload()
    {
        return [
            ['field' => 'file',
            'label' => 'file',
            'rules' => 'required']
            
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
            ['field' => 'nomor_surat',
            'label' => 'nomor_surat',
            'rules' => 'required'],

            ['field' => 'jenis_surat',
            'label' => 'jenis_surat',
            'rules' => 'required'],
            
            ['field' => 'indeks',
            'label' => 'indeks',
            'rules' => 'required'],

            ['field' => 'kode',
            'label' => 'kode',
            'rules' => 'required'],

            ['field' => 'dari',
            'label' => 'dari',
            'rules' => 'required'],
            
            ['field' => 'kepada',
            'label' => 'kepada',
            'rules' => 'required'],

             ['field' => 'lampiran',
            'label' => 'lampiran',
            'rules' => 'required'],

            ['field' => 'isi_ringkasan',
            'label' => 'isi_ringkasan',
            'rules' => 'required'],


             ['field' => 'tanggal',
            'label' => 'tanggal',
            'rules' => 'required'],

            ['field' => 'pengolah',
            'label' => 'pengolah',
            'rules' => 'required'],


            ['field' => 'catatan',
            'label' => 'catatan',
            'rules' => 'required'],


            ['field' => 'klasifikasi',
            'label' => 'klasifikasi',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        $this->db->order_by('no_urut','DESC');
        $this->db->where('nomor_surat !=','0');
        return $this->db->get($this->_table)->result();
    }
    public function getBetween()
    {
    $post = $this->input->post();
    $tgl_awal = $post["tgl_awal"];
    $tgl_akhir = $post["tgl_akhir"];
       $this->db->select('*');
       $this->db->from('tbl_kendali_surat');
       $this->db->where("tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'");
       /*$this->db->where('tgl >=' , date('yyyy-mmm-ddd', strtotime($post)));
       $this->db->where('tgl <=', date('yyyy-mm-dd', strtotime($post2)));*/

        return $this->db->get()->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no_urut" => $id])->row();
    }
    public function getById2($id)
    {
        return $this->db->get_where($this->_table, ["nomor_surat" => $id])->row();
    }
    public function getMax()
    {
        $this->db->order_by('no_urut','DESC');
        $this->db->limit(1);
        return $this->db->get('tbl_kendali_surat')->row();
    }
    public function reset()
    {
       
        $this->nomor_surat = 0;
        $this->jenis_surat = 0;
        $this->jenis_surat = 0;
        $this->indeks = "-";
        $this->kode = "-";
        $this->dari = "-";
        $this->kepada = "-";
        $this->isi_ringkasan = "-";
        $this->lampiran = "-";
        $this->klasifikasi = "-";
        $this->tanggal = "";
        $this->pengolah = "-";
        $this->catatan = "-";
        $this->klasifikasi = "-";
        return $this->db->insert($this->_table, $this);
    }

    public function save()
    {
       
        $post = $this->input->post();
        $this->nomor_surat = $post["nomor_surat"];
        $this->jenis_surat = $post["jenis_surat"];
        $this->indeks = $post["indeks"];
        $this->kode = $post["kode"];
        $this->dari = $post["dari"];
        $this->kepada = $post["kepada"];
        $this->isi_ringkasan = $post["isi_ringkasan"];
        $this->lampiran = $post["lampiran"];
        $this->klasifikasi = $post["klasifikasi"];
        $this->tanggal = $post["tanggal"];
        $this->pengolah = $post["pengolah"];
        $this->catatan = $post["catatan"];
        $this->klasifikasi = $post["klasifikasi"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->no_urut = $post["no_urut"];
        $this->nomor_surat = $post["nomor_surat"];
        $this->jenis_surat = $post["jenis_surat"];
        $this->indeks = $post["indeks"];
        $this->kode = $post["kode"];
        $this->dari = $post["dari"];
        $this->kepada = $post["kepada"];
        $this->isi_ringkasan = $post["isi_ringkasan"];
        $this->lampiran = $post["lampiran"];
        $this->tanggal = $post["tanggal"];
        $this->pengolah = $post["pengolah"];
        $this->catatan = $post["catatan"];
        $this->klasifikasi = $post["klasifikasi"];
        return $this->db->update($this->_table, $this, array('no_urut' => $post['no_urut']));
    }
    public function upload_data()
    {
       
        $up = $this->upload->data();
   
        $post = $this->input->post();
       $update_status = array('no_urut' => $post["no_urut"],
                                'file' => $up["file_name"]);
        $this->db->where('no_urut', $post["no_urut"]);
        return $this->db->update($this->_table, $update_status);
   
   
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("no_urut" => $id));
    }
}