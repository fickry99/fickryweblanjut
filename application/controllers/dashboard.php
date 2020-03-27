<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

  public function __construct()
  {
    parent:: __construct();
    $this->load->model('Barang_model');  // load model dari kelas Barang_model.php

  }


  function index()        //function untuk memanggil halaman home
  {
    $query = $this->Barang_model->getAlldata()->result();
    $data['data_barang'] = $query ;

    $judul['judul'] = 'SR INVENTORY'; // seting judul di taskbar aras

    $this->load->view('layouts/header', $judul);
    $this->load->view('dashboard/home',$data);
    $this->load->view('layouts/footer');
  }

  public function table()       // functiom untuk memanggil halaman table
  {
    $query = $this->Barang_model->getAlldata()->result();
    $data['data_barang'] = $query ;

    $judul['judul'] = 'SR INVENTORY';     // seting judul di taskbar atas

    $this->load->view('layouts/header', $judul);
    $this->load->view('dashboard/table',$data);
    $this->load->view('layouts/footer');
  }

  public function tambah()
  {
    $judul['judul'] = 'SR INVENTORY';

    $this->load->view('layouts/header', $judul);
    $this->load->view('dashboard/form');
    $this->load->view('layouts/footer');
  }

  public function tambah_proses()
  {

  $this->form_validation->set_rules('nama','Nama','require');
  $this->form_validation->set_rules('tanggal','tanggal','require');
  $this->form_validation->set_rules('stok','stok','require');

  if($this->form_validation->run() != false){
     $this->session->set_flashdata('status','data yang anda masukan salah');
    redirect(base_url('dashboard/tambah'));
    }else{
          redirect(base_url('dashboard/table'));

      }

  }


}
