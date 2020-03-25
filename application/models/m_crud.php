<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function input_data($data,$table){
      $this->db->trans_begin();
      $this->db->insert($table, $data);

      if ($this->db->trans_status() === FALSE)
      {
        $this->db->trans_rollback();
      }
      else
      {
        $this->db->trans_commit();
      }
  }


  function delete_data($where,$table){

      $this->db->trans_begin();
      $this->db->where($where);
      $this->db->delete($table);
      if ($this->db->trans_status() === FALSE)
      {
        $this->db->trans_rollback();
      }
      else
      {
        $this->db->trans_commit();
      }
    }
    //// TODO: https://codeigniter.com/user_guide/database/transactions.html baca bagian strict Mode

    //ambil data tabel jenis, provinsi dan kabupaten untuk select kota dan provinsi
    function get_jenis(){
      $jenis = $this->db->query("SELECT * FROM jenis");
      return $jenis;
    }

    function get_provinsi(){
      $hasil = $this->db->query("SELECT * FROM provinsi");
      return $hasil;
    }

    function get_kota(){
      $hasil = $this->db->query("SELECT * FROM kabupaten");
      return $hasil;
    }

    function get_kotaJatim(){
      $hasil = $this->db->query("SELECT id_kab,kabupaten.nama FROM kabupaten LEFT JOIN provinsi on kabupaten.id_prov = provinsi.id_prov where provinsi.nama = 'JAWA TIMUR'");
      return $hasil;
    }

    function get_subprovinsi($id){

  		$hasil=$this->db->query("SELECT * FROM kabupaten WHERE id_prov='$id'");
  		return $hasil->result();
  	}

}
