<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent:: __construct();
    if (empty($this->session->username)) {
      redirect('Auth');
    }
    $this->load->model('Barang_model');  // load model dari kelas Barang_model.php
  }

  public function index()        //function untuk memanggil halaman home
  {
    $judul['judul']      = 'SR INVENTORY'; // seting judul di taskbar aras
    $data['data_barang'] = $this->Barang_model->getAllBarang()->result();

    $this->load->view('layouts/header', $judul);
    $this->load->view('dashboard/index', $data);
    $this->load->view('layouts/footer');
  }

  public function info()
  {
    $query = $this->Barang_model->getAlldata()->result();
    $data['data_barang'] = $query ;
    $data2['data_barang_keluar'] = $query;

    $judul['judul'] = 'SR INVENTORY';     // seting judul di taskbar atas

    $this->load->view('layouts/header', $judul);
    $this->load->view('dashboard/info',$data2);
    $this->load->view('layouts/footer');
  }


}
