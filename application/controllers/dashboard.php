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

  $this->form_validation->set_rules('nama_barang','Nama','require');
  $this->form_validation->set_rules('tanggal_masuk','tanggal','require');
  $this->form_validation->set_rules('stok','stok','require');

  $nama_barang = $this->input->post('nama_barang');
  $tanggal_masuk = $this->input->post('tanggal_masuk');
  $stok = $this->input->post('stok');

  $data = array(
    'nama_barang' => $nama_barang,
    'tanggal_masuk' => $tanggal_masuk,
    'stok' => $stok
  );

  $this ->Barang_model->input_data($data,'data_barang');
  redirect('dashboard/table');

  }

  public function hapus($id_barang)
  {
      $where = array('id_barang' => $id_barang);
      $this->Barang_model->hapus_data($where,'data_barang');
      redirect('dashboard/table');
  }

  public function edit()
  {
    $this->load->view('dashboard/edit');

  }

  public function edit_proses($id_barang)
  {
      $where = array('id_barang' => $id_barang);
      $data['data_barang'] = $this->Barang_model->edit_data($where,'data_barang')->result();
      redirect('dashboard/table');
  }


}
