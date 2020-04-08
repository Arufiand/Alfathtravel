<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_crud');
  }

  function index()
  {

  }

  function get_subprovinsi(){
    $id=$this->input->post('id');
    $data=$this->m_crud->get_subprovinsi($id);
    echo json_encode($data);
  }
}
