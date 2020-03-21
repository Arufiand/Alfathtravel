<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function input_data($data,$table){
  $this->db->insert($table, $data);
  }


  function delete_data($where,$table){
     $this->db->where($where);
      $this->db->delete($table);
    }
}
