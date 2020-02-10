<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller{

    function  __construct(){
        parent::__construct();
        $this->load->model('m_berita');
        $this->load->model('m_kategori');
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');

    }

    function index(){
        // Load the member list view
        $data['kategori'] = $this->m_berita->ambilDataKategori()->result();
        $data['judul'] = "Kelola Berita";
        $this->load->view('berita/index',$data);

      }

    function inputKonten()
    {
      //auto increment
      $query= $this->db->query("SELECT MAX(IdBerita) as Max_ID from kontenberita");
      $row = $query->row_array();
      $id = $row['Max_ID'];
      $ids = $id +1;
      //Config Gambar Upload
    //  $config['upload_path']          = './gambar/';
  	//	$config['allowed_types']        = 'gif|jpg|png';
  		//$config['max_size']             = 100;
  		//$config['max_width']            = 1024;
  		//$config['max_height']           = 768;

  		//$this->load->library('upload', $config);

  	//	if ( ! $this->upload->do_upload('berkas')){
  	//		$error = array('error' => $this->upload->display_errors());
  	//		$this->load->view('v_upload', $error);
  	//	}else{
  	//		$data = array('upload_data' => $this->upload->data());
  	//		$this->load->view('v_upload_sukses', $data);
      //Config Gambar Upload
      //auto increment end
              $judul= $this->input->post('judul');
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
                'IdKategori' => $kategori,
                'Id' => $IdU,
                'Judul' => $judul,
                'TanggalRilis' => $TglRilis,
                'TanggalKadaluarsa' => $TglKadaluarsa,
                'StatusBerita' => $stat,
                'WaktuRilis' => $waktu
              );

              $this->m_berita->input_konten($data,'kontenberita');
              redirect ('index.php/berita');
          }

    function getListsBerita(){
        $data = $row = array();

        // Fetch member's records
        $memData = $this->m_berita->getRows($_POST);

        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
            $tgl_rilis = date( 'jS M Y', strtotime($member->TanggalRilis));
            $tgl_kadaluarsa = date( 'jS M Y', strtotime($member->TanggalKadaluarsa));
            $data[] = array(
            $i,
            $member->Judul,
            $tgl_rilis,
            $tgl_kadaluarsa,
            $member->WaktuRilis,
            $member->StatusBerita
          );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_berita->countAll(),
            "recordsFiltered" => $this->m_berita->countFiltered($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }
      function tambah()
      {
        $nama;
      }

    //Kategori berita

     function kategori(){
       $data['judul'] = "Kelola Kategori";
       $this->load->view('berita/kategoriBerita',$data);
     }

     function getListsKategori(){
         $data = $row = array();

         // Fetch member's records
         $memData = $this->m_kategori->getRows($_POST);

         $i = $_POST['start'];
         foreach($memData as $member){
             $i++;
             $status = ($member->StatusKategori == 1)?'Active':'Inactive';
             $data[] = array(
             $i,
             $member->IdKategori,
             $member->NamaKategori,
             $status
             );
         }

         $output = array(
             "draw" => $_POST['draw'],
             "recordsTotal" => $this->m_kategori->countAll(),
             "recordsFiltered" => $this->m_kategori->countFiltered($_POST),
             "data" => $data,
         );

         // Output to JSON format
         echo json_encode($output);
     }

     function inputKategori()
     {
       //auto increment
       $query= $this->db->query("SELECT MAX(IdKategori) as Max_ID from kategori");
       $row = $query->row_array();
       $id = $row['Max_ID'];
       $ids = $id +1;
       //auto increment end
               $kategori = $this->input->post('kategoris');
               $status = $this->input->post('status');
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

               $this->m_berita->input_kategori($data,'kategori');
               redirect ('index.php/berita/kategori');
           }





     }
