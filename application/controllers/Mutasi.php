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

  public function info_mutasi($id_barang)
  {
    $judul['judul']  = 'SR INVENTORY|MUTASI';
    $data['masuk']   = $this->Mutasi_model->getMutasiMasuk($id_barang)->result();
    $data['keluar']  = $this->Mutasi_model->getMutasiKeluar($id_barang)->result();
    $data['barang']  = $this->Barang_model->getSingleBarang($id_barang)->row();

    $this->load->view('layouts/header', $judul);
    $this->load->view('mutasi/info_mutasi',$data);
    $this->load->view('layouts/footer');
  }

  public function input_masuk($id_barang)
  {
    $data['barang'] = $this->Barang_model->getSingleBarang($id_barang)->row();
    $judul['judul'] = 'SR INVENTORY';

    $this->load->view('layouts/header', $judul);
    $this->load->view('mutasi/input_masuk',$data);
    $this->load->view('layouts/footer');
  }

  public function masuk_proses($id_barang)
  {
    $data['barang'] = $this->Barang_model->getSingleBarang($id_barang)->row();

    $this->form_validation->set_rules('tanggal_masuk','tanggal','required');
    $this->form_validation->set_rules('keterangan_masuk','Keterangan_masuk','required');
    $this->form_validation->set_rules('stok','stok','required|numeric');
    if ($this->form_validation->run() == FALSE) {
      $this->input_masuk($id_barang);
    }else {
      $id_masuk          = $this->Mutasi_model->idMasuk();
      $keterangan_masuk  = $this->input->post('keterangan_masuk');
      $stok              = $this->input->post('stok');
      $tanggal_masuk     = $this->input->post('tanggal_masuk');
      $mutasi_masuk      = $data['barang']->stok + $stok;

      $data = array(
        'id_masuk'          => $id_masuk,
        'id_barang'         => $id_barang,
        'keterangan_masuk'  => $keterangan_masuk,
        'tanggal_masuk'     => $tanggal_masuk,
        'stok'              => $stok,
        'mutasi_masuk'      => $mutasi_masuk
      );

      $query = $this->Mutasi_model->insertBarangMasuk($data);
      if ($query) {
        redirect('Mutasi');
      }else {
        redirect('Mutasi/input_masuk/'.$id_barang);
      }
    }
  }

  public function input_keluar($id_barang)
  {
    $data['barang'] = $this->Barang_model->getSingleBarang($id_barang)->row();
    $judul['judul'] = 'SR INVENTORY';

    $this->load->view('layouts/header', $judul);
    $this->load->view('mutasi/input_keluar',$data);
    $this->load->view('layouts/footer');
  }

  public function keluar_proses($id_barang)
  {
    $data['barang'] = $this->Barang_model->getSingleBarang($id_barang)->row();

    $this->form_validation->set_rules('tanggal_keluar','tanggal','required');
    $this->form_validation->set_rules('keterangan_keluar','Keterangan_keluar','required');
    $this->form_validation->set_rules('stok','stok','required|numeric');
    if ($this->form_validation->run() == FALSE) {
      $this->input_keluar($id_barang);
    }else {
      $id_keluar          = $this->Mutasi_model->idKeluar();
      $keterangan_keluar  = $this->input->post('keterangan_keluar');
      $stok               = $this->input->post('stok');
      $tanggal_keluar     = $this->input->post('tanggal_keluar');
      $mutasi_keluar      = $data['barang']->stok - $stok;

      $data = array(
        'id_keluar'          => $id_keluar,
        'id_barang'          => $id_barang,
        'keterangan_keluar'  => $keterangan_keluar,
        'tanggal_keluar'     => $tanggal_keluar,
        'stok'               => $stok,
        'mutasi_keluar'      => $mutasi_keluar
      );

      $query = $this->Mutasi_model->insertBarangKeluar($data);
      if ($query) {
        redirect('Mutasi');
      }else {
        redirect('Mutasi/input_keluar/'.$id_barang);
      }
    }
  }

}
