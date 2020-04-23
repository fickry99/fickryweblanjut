<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->username)) {
      redirect(base_url());
    }
    $this->load->model('Mutasi_model');
    $this->load->model('Barang_model');
  }

  public function index()
  {
    $judul['judul']      = 'SR INVENTORY';
    $data['data_barang'] = $this->Barang_model->getAllBarang()->result();

    $this->load->view('layouts/header', $judul);
    $this->load->view('mutasi/mutasi_barang',$data);
    $this->load->view('layouts/footer');
  }

}
