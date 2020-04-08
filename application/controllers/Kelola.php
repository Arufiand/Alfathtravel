<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola extends CI_Controller{

    function  __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_staff');
        $this->load->model('m_pelanggan');
        $this->load->model('m_crud');

    }
    function staff(){ //view staff
      $data['provinsi'] = $this->m_crud->get_provinsi();
      $data['kotaKelahiran'] = $this->m_crud->get_kota();

      $data['judul'] = "Kelola Staff";
      $data['surname'] = "Staff";
      $this->load->view('kelola/staff',$data);
    }

    function kendaraan(){ //view staff
        // Load the member list view

        $data['judul'] = "Kelola Kendaraan";
        $data['surname'] = "Kendaraan";
        $this->load->view('kelola/kendaraan',$data);
      }
    function pelanggan(){ //view staff
        $data['provinsi'] = $this->m_crud->get_provinsi();
        $data['kotaKelahiran'] = $this->m_crud->get_kota();

        $data['data'] = $this->m_crud->get_provinsi();
        $data['judul'] = "Kelola Pelanggan";
        $data['surname'] = "Pelanggan";
        $this->load->view('kelola/pelanggan',$data);
      }

    function trayek(){
        $data['provinsiJatim'] = $this->m_crud->get_kotaJatim();
        $data['judul'] = "Kelola Trayek";
        $data['surname'] = "Trayek";
        $this->load->view('kelola/trayek',$data);
      }

      function get_subprovinsi(){
        $id=$this->input->post('id');
        $data=$this->m_crud->get_subprovinsi($id);
        echo json_encode($data);
      }

    function getListsStaff(){
      $data = $row = array();
      // Fetch member's records
      $staffData = $this->m_staff->getRows($_POST);
      $i = $_POST['start'];
      //$role = $this->m_staff->getNamaRole($i);
      foreach($staffData as $member){
          $i++;
          $TTL = $member->KotaLahirK." , ".date( 'j F Y', strtotime($member->TglLahirK));
          $TempatTinggal = $member->AlamatK." , ".$member->KotaK." , ".$member->PropinsiK;
          //$Role = $this->db->get('Table', limit, offset);
          $status = ($member->StatusK == 1)?'Active':'Inactive';
          $role = ($member->Id == 1)? 'Administrator' :'Author';
          $data[] = array
          (
                  $i,
                  $member->NamaK,
                  $TempatTinggal,
                  $TTL,
                  $member->NoTelpK,
                  $member->EmailK,
                  $status,
                  $role
          );
      }

      $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $this->m_staff->countAll(),
          "recordsFiltered" => $this->m_staff->countFiltered($_POST),
          "data" => $data,
      );

      // Output to JSON format
      echo json_encode($output);
    }
    function getListsKendaraan(){
      $data = $row = array();
      // Fetch member's records
      $staffData = $this->m_staff->getRows($_POST);
      $i = $_POST['start'];
      //$role = $this->m_staff->getNamaRole($i);
      foreach($staffData as $member){
          $i++;
          $TTL = $member->KotaLahirK." , ".date( 'j F Y', strtotime($member->TglLahirK));
          $TempatTinggal = $member->AlamatK." , ".$member->KotaK." , ".$member->PropinsiK;
          //$Role = $this->db->get('Table', limit, offset);
          $status = ($member->StatusK == 1)?'Active':'Inactive';
          $role = ($member->Id == 1)? 'Administrator' :'Author';
          $data[] = array
          (
                  $i,
                  $member->NamaK,
                  $TempatTinggal,
                  $TTL,
                  $member->NoTelpK,
                  $member->EmailK,
                  $status,
                  $role
          );
      }

      $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $this->m_staff->countAll(),
          "recordsFiltered" => $this->m_staff->countFiltered($_POST),
          "data" => $data,
      );

      // Output to JSON format
      echo json_encode($output);
    }
    function getListsPelanggan(){
      $data = $row = array();
      // Fetch member's records
      $pelangganData = $this->m_pelanggan->getRows($_POST);
      $i = $_POST['start'];
      //$role = $this->m_staff->getNamaRole($i);
      foreach($pelangganData as $member){
          $i++;
          $TTL = $member->KotaLahirP." , ".date( 'j F Y', strtotime($member->TglLahirP));
          $TempatTinggal = $member->AlamatP." , ".$member->KotaP." , ".$member->PropinsiP;
          //$Role = $this->db->get('Table', limit, offset);
          $status = ($member->StatusP == 1)?'Active':'Inactive';
          $data[] = array
          (
                  $i,
                  $member->NamaP,
                  $TempatTinggal,
                  $TTL,
                  $member->NoTelpP,
                  $member->EmailP,
                  $status
          );
      }

      $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $this->m_pelanggan->countAll(),
          "recordsFiltered" => $this->m_pelanggan->countFiltered($_POST),
          "data" => $data,
      );

      // Output to JSON format
      echo json_encode($output);
    }
    function inputStaff(){

       //form_validation
       $this->form_validation->set_rules('Nama','Nama Staff','required');
       $this->form_validation->set_rules('Alamat','Alamat Tempat Tinggal','required');
       $this->form_validation->set_rules('Kota','Kota Tempat Tinggal','required');
       $this->form_validation->set_rules('Propinsi','Propinsi Tempat Tinggal','required');
       $this->form_validation->set_rules('TglLahir','Tanggal Lahir Staff','required');
       $this->form_validation->set_rules('KotaLahir','Kota Lahir Staff','required');
       $this->form_validation->set_rules('Email','Email Staff','required');
       //auto increment
       $query= $this->db->query("SELECT MAX(IdK) as Max_ID from karyawan");
       $row = $query->row_array();
       $id = $row['Max_ID'];
       $ids = $id +1;
       //auto increment end
       if($this->form_validation->run() != false){
            $Nama= htmlentities ($this->input->post('Nama'), ENT_QUOTES, 'UTF-8');
            $Alamat= htmlentities ($this->input->post('Alamat'), ENT_QUOTES, 'UTF-8');
            $Kota= htmlentities ($this->input->post('Kota'), ENT_QUOTES, 'UTF-8');
            $Propinsi= htmlentities ($this->input->post('Propinsi'), ENT_QUOTES, 'UTF-8');
            $TglLahir = htmlentities ($this->input->post('TglLahir'), ENT_QUOTES, 'UTF-8');
            $KotaLahir= htmlentities ($this->input->post('KotaLahir'), ENT_QUOTES, 'UTF-8');
            $Email = htmlentities ($this->input->post('Email'), ENT_QUOTES, 'UTF-8');
            $NoTelp = htmlentities ($this->input->post('NoTelp'), ENT_QUOTES, 'UTF-8');
            $Id = 1;
            $status = htmlentities ($this->input->post('status'), ENT_QUOTES, 'UTF-8');

              if ($status == 1){
                $stat = 1;
              } else{
                $stat = 2;
              }
              $data = array (
                'IdK' => $ids,
                'Id' => $Id,
                'NamaK' => $Nama,
                'AlamatK' => $Alamat,
                'KotaK' => $Kota,
                'PropinsiK' => $Propinsi,
                'TglLahirK' => $TglLahir,
                'KotaLahirK' => $KotaLahir,
                'StatusK' => $stat,
                'EmailK' => $Email,
                'NoTelpK' => $NoTelp

              );
              $this->session->set_flashdata('success', 'Berhasil disimpan');
              $this->m_crud->input_data($data,'karyawan');
              redirect ('index.php/kelola/staff');
          } else
          {
            $this->session->set_flashdata('danger', 'Data Tidak Lengkap');
            redirect ('index.php/kelola/staff');
          }
      }

      function inputTrayek()
         {
           //form_validation
           // $this->form_validation->set_rules('kategori','Kategori','required');
           //auto increment
           // $query= $this->db->query("SELECT MAX(IdKategori) as Max_ID from kategori");
           // $row = $query->row_array();
           // $id = $row['Max_ID'];
           // $ids = $id +1;
           //auto increment end

           //if($this->form_validation->run() != false){
                  // $kategori = htmlentities($this->input->post('kategori'), ENT_QUOTES, 'UTF-8');
                   $tujuanAwal = $this->input->post('tujuanAwal');
                   $tujuanAkhir = $this->input->post('tujuanAkhir');
                   $jadwal = $this->input->post('jadwalKeberangkatan');
                   $kotaPemberhentian = $this->input->post('kotaPemberhentian');
                   // $data = array();
                   // $index = 0;
                   //
                   // foreach ($kotaPemberhentian as $dataKotaPem) {
                   //   array_push ($data, array(
                   //     'kotaPemberhentian'=> $kotaPemberhentian[$index]
                   //   ));
                   //   $index++;
                   // }
                   echo "Tujuan Awal :".$tujuanAwal."</br>";
                   echo "Tujuan Akhir :".$tujuanAwal."</br>";
                   echo "jadwal :".$jadwal."</br>";
                   echo "kota Pemberhentian :".$kotaPemberhentian."</br>";


                   // if ($status == 1){
                   //   $stat = 1;
                   // } else{
                   //   $stat = 2;
                   // }
                   // $data = array (
                   //   'IdKategori' => $ids,
                   //   'NamaKategori' => $kategori,
                   //   'StatusKategori' => $stat
                   // );
                   //$this->session->set_flashdata('success', 'Berhasil disimpan');
                   // $this->m_crud->input_data($data,'kategori');
                   //redirect ('index.php/berita/kategori');
               //}
          }
  }
