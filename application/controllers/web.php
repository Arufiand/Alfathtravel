<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url'));

  }

  public function index()
  {
     $data['judul'] = "Dashboard";
     $this->load->view('index',$data);
  }
  public function kelolaBerita()
  {
    $this->load->model('employees');
     $data['judul'] = "Kelola Berita";
     $data['dept_emp'] = $this->employees->ambil_data()->result();
     $this->load->view('kelolaBerita',$data);
  }

}
