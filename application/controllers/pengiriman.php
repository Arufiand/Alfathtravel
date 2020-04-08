<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_crud');
  }

  function index()
  {
    $data['provinsi'] = $this->m_crud->get_provinsi();
    $data['kotaKelahiran'] = $this->m_crud->get_kota();
    $data['judul'] = "Manajemen Pengiriman";
    $data['surname'] = "Pengiriman Barang";
    $this->load->view('pengiriman/pengiriman',$data);
  }
  
  function get_subprovinsi(){
    $id=$this->input->post('id');
    $data=$this->m_crud->get_subprovinsi($id);
    echo json_encode($data);
  }
}
