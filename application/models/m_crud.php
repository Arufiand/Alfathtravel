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
}
