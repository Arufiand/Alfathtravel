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

    }

    function staff(){ //view staff
        // Load the member list view
        //$data['kategori'] = $this->m_berita->ambilDataKategori()->result();
        $data['judul'] = "Kelola Staff";
        $data['surname'] = "Staff";
        $this->load->view('kelola/staff',$data);
      }
      function kendaraan(){ //view staff
          // Load the member list view
          //$data['kategori'] = $this->m_berita->ambilDataKategori()->result();
          $data['judul'] = "Kelola Kendaraan";
          $data['surname'] = "Kendaraan";
          $this->load->view('kelola/kendaraan',$data);
        }
      function pelanggan(){ //view staff
          // Load the member list view
          //$data['kategori'] = $this->m_berita->ambilDataKategori()->result();
          $data['judul'] = "Kelola Pelanggan";
          $data['surname'] = "Pelanggan";
          $this->load->view('kelola/pelanggan',$data);
        }

      function inputKonten(){
      //auto increment
      $this->form_validation->set_rules('judul','Judul Berita','required');
      $query= $this->db->query("SELECT MAX(IdBerita) as Max_ID from kontenberita");
      $row = $query->row_array();
      $id = $row['Max_ID'];
      $ids = $id +1;
      if($this->form_validation->run() != false){
              $judul= htmlentities($this->input->post('judul'), ENT_QUOTES, 'UTF-8');
              $kategori = $this->input->post('Kategori');
              $status = $this->input->post('status');
              $isi = $this->input->post('isi');
              $TglRilis = $this->input->post('TglRilis');
              $TglKadaluarsa = $this->input->post('TglKadaluarsa');
              //$gambarBerita = $this->input->post('gambarBerita');
              $waktu = mdate("%H:%i");
              $IdU = 2;

              if ($status == 1){
                $stat = 1;
              } else{
                $stat = 2;
              }
              $data = array (
                'IdBerita' => $ids,
                'Judul' => $judul,
                'TanggalRilis' => $TglRilis,
                'TanggalKadaluarsa' => $TglKadaluarsa,
                'WaktuRilis' => $waktu,
                'StatusBerita' => $stat,
                'Gambar' => $gambar,

              );
              $this->session->set_flashdata('success', 'Berhasil disimpan');
              $this->m_berita->input_konten($data,'kontenberita');
              redirect ('index.php/berita');
          }
      }

    function getListsStaff()
    {
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
    function getListsKendaraan()
    {
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
    function getListsPelanggan()
    {
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

    function inputKategori(){
       //form_validation
       $this->form_validation->set_rules('kategori','Kategori','required');
       //auto increment
       $query= $this->db->query("SELECT MAX(IdKategori) as Max_ID from kategori");
       $row = $query->row_array();
       $id = $row['Max_ID'];
       $ids = $id +1;
       //auto increment end
       if($this->form_validation->run() != false){
               $kategori = htmlentities($this->input->post('kategori'), ENT_QUOTES, 'UTF-8');
               $status = $this->input->post('inputStatus');
               if ($status == 1){
                 $stat = 1;
               } else{
                 $stat = 2;
               }
               $data = array (
                 'IdKategori' => $ids,
                 'NamaKategori' => $kategori,
                 'StatusKategori' => $stat
               );
               $this->session->set_flashdata('success', 'Berhasil disimpan');
               $this->m_kategori->input_kategori($data,'kategori');
               redirect ('index.php/berita/kategori');
           }
      }




     }
