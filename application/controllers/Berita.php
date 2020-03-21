<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller{

    function  __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_berita');
        $this->load->model('m_kategori');
        $this->load->model('m_crud');
        $this->load->helper('date');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');

    }
    function index(){
        // Load the member list view
        $data['kategori'] = $this->m_berita->ambilDataKategori()->result();
        $data['judul'] = "Kelola Berita";
        $data['surname'] = "Berita";
        $this->load->view('berita/index',$data);
      }
      //Kategori berita
       function kategori(){
         $data['judul'] = "Kelola Kategori";
         $data['surname'] = "Kategori";
         $this->load->view('berita/kategoriBerita',$data);
       }
    function inputKonten(){
      //auto increment
      $this->form_validation->set_rules('judul','Judul Berita','required');
      $query= $this->db->query("SELECT MAX(IdBerita) as Max_ID from kontenberita");
      $row = $query->row_array();
      $id = $row['Max_ID'];
      $ids = $id +1;
      // //Config Gambar Upload
      // $config['upload_path']          = './gambar/';
  	  // $config['allowed_types']        = 'jpg|png';
  		// $config['max_size']             = 200;
  		// $config['max_width']            = 1280;
  		// $config['max_height']           = 960;
      //
  		// $this->load->library('upload', $config);
      //
  		// if ( ! $this->upload->do_upload('gambar')){
  		// 	$error = array('error' => $this->upload->display_errors());
  		// 	$this->load->view('berita/index', $error);
  		// }else{

       if($this->form_validation->run() != false){

              $judul= htmlentities($this->input->post('judul'), ENT_QUOTES, 'UTF-8');
              $kategori = $this->input->post('Kategori');
              $status = $this->input->post('status');
              $isi = $this->input->post('isi');
              $Tanggal = $this->input->post('TglRilis');


              //$gambarBerita = $this->input->post('gambarBerita');
              $waktu = mdate("%H:%i");

              //// TODO: IdU nanti rubah untuk ambil ID Login
              $IdU = 2;
              // pecah string dan rubah ke bentuk date
              $Pecah = explode( "-", $Tanggal );
              $dateA = strtotime($Pecah[0]);
              $dateK = strtotime($Pecah[1]);
              $TglRilis = date ('yy-m-d',$dateA);
              $TglKadaluarsa = date ('yy-m-d',$dateK);

              if ($status == 1){
                $stat = 1;
              } else{
                $stat = 2;
              }

              $data = array (
                'IdBerita' => $ids,
                'Judul' => $judul,
                'IdKategori' => $kategori,
                'Id' => $IdU,
                'TanggalRilis' => $TglRilis,
                'TanggalKadaluarsa' => $TglKadaluarsa,
                'WaktuRilis' => $waktu,
                'StatusBerita' => $stat
                //'Gambar' => $gambar

              );
              $this->session->set_flashdata('success', 'Berhasil disimpan');
              $this->m_crud->input_data($data,'kontenberita');
              redirect ('index.php/berita');
          }

      }
    function getListsBerita(){
        $data = $row = array();

        // Fetch member's records
        $memData = $this->m_berita->getRows($_POST);

        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
            $tgl_rilis = date( 'j F Y', strtotime($member->TanggalRilis));
            $tgl_kadaluarsa = date( 'j F Y', strtotime($member->TanggalKadaluarsa));
            $status = ($member->StatusBerita == 1)?'Active':'Inactive';
            $data[] = array(
            $i,
            $member->Judul,
            $tgl_rilis,
            $tgl_kadaluarsa,
            $member->WaktuRilis,
            $status
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
             $member->NamaKategori,
             $status,
             anchor('crud/edit/'.$member->IdKategori,'Edit')." || ".
             anchor('index.php/Berita/delete_kategori/'.$member->IdKategori,'Hapus')
             //"<a class='btn btn-primary btn-sm' href=".anchor('crud/hapus/'.$member->IdKategori,'Edit')."</a>
             //<a class='btn btn-danger btn-sm' href=".anchor('Berita/hapusKategori'.$member->IdKategori,'Hapus')."</a>"
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
               $this->m_crud->input_data($data,'kategori');
               redirect ('index.php/berita/kategori');
           }
      }
    function delete_kategori($id){
		    $where = array('IdKategori' => $id);
		    $this->m_crud->delete_data($where,'kategori');
		    redirect('index.php/berita/kategori');
	     }
}
