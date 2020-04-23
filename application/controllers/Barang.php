<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->username)) {
      redirect(base_url());
    }
    $this->load->model('Barang_model');
  }

  public function index()       // functiom untuk memanggil halaman table
  {
    $judul['judul']      = 'SR INVENTORY';
    $data['data_barang'] = $this->Barang_model->getAllBarang()->result();

    $this->load->view('layouts/header', $judul);
    $this->load->view('barang/data_barang',$data);
    $this->load->view('layouts/footer');
  }

  public function tambah_barang()
  {
    $judul['judul'] = 'SR INVENTORY';
    $this->load->view('layouts/header', $judul);
    $this->load->view('barang/tambah_barang');
    $this->load->view('layouts/footer');
  }

  public function tambah_proses()
  {
    $this->form_validation->set_rules('nama_barang','Nama','required');
    $this->form_validation->set_rules('keterangan','Keterangan','required');
    $this->form_validation->set_rules('stok','stok','required|numeric');
    if ($this->form_validation->run() == FALSE) {
      $this->tambah_barang();
    }else {
      $id_barang    = $this->Barang_model->idBarang();
      $nama_barang  = $this->input->post('nama_barang');
      $keterangan   = $this->input->post('keterangan');
      $stok         = $this->input->post('stok');

      $data = array(
        'id_barang'     => $id_barang,
        'nama_barang'   => $nama_barang,
        'keterangan'    => $keterangan,
        'stok'          => $stok
      );

      $query = $this->Barang_model->insertBarang($data);
      if ($query) {
        redirect('Barang');
      }else {
        redirect('Barang/tambah_barang');
      }
    }
  }

  public function edit_barang($id_barang)
  {
    $data['barang'] = $this->Barang_model->getSingleBarang($id_barang)->row();
    $judul['judul'] = 'SR INVENTORY';

    $this->load->view('layouts/header', $judul);
    $this->load->view('barang/edit_barang',$data);
    $this->load->view('layouts/footer');
  }

  public function edit_proses($id_barang)
  {
    $this->form_validation->set_rules('nama_barang','Nama','required');
    $this->form_validation->set_rules('keterangan','Keterangan','required');
    $this->form_validation->set_rules('stok','stok','required|numeric');
    if ($this->form_validation->run() == FALSE) {
      $this->edit_barang($id_barang);
    }else {
      $nama_barang  = $this->input->post('nama_barang');
      $keterangan   = $this->input->post('keterangan');
      $stok         = $this->input->post('stok');

      $data = array(
        'nama_barang'   => $nama_barang,
        'keterangan'    => $keterangan,
        'stok'          => $stok
      );

      $query = $this->Barang_model->updateBarang($data,$id_barang);
      if ($query) {
        redirect('Barang');
      }else {
        redirect('Barang/edit_barang/'.$id_barang);
      }
    }
  }

  public function hapus_barang($id_barang)
  {
    $this->Barang_model->deleteBarang($id_barang);
    redirect('Barang');
  }
}
