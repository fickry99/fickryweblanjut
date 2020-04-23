<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi_model extends CI_Model{

  public function idMasuk()
	{
		$masuk = "MSK";
    $q = "SELECT MAX(TRIM(REPLACE(id_masuk,'MSK', ''))) as nama
          FROM barang_masuk WHERE id_masuk LIKE '$masuk%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "MSK".$id;
    return $id;
	}

  public function idKeluar()
	{
		$keluar = "KLR";
    $q = "SELECT MAX(TRIM(REPLACE(id_keluar,'KLR', ''))) as nama
          FROM barang_keluar WHERE id_keluar LIKE '$keluar%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "KLR".$id;
    return $id;
	}

  public function insertBarangMasuk($data)
  {
    return $this->db->insert('barang_masuk', $data);
  }

  public function insertBarangKeluar($data)
  {
    return $this->db->insert('barang_keluar', $data);
  }

  public function getMutasiKeluar($id_barang)
  {
    $this->db->order_by('tanggal_keluar', 'ASC');
    return $this->db->get_where('barang_keluar',['id_barang' => $id_barang]);
  }

  public function getMutasiMasuk($id_barang)
  {
    $this->db->order_by('tanggal_masuk', 'ASC');
    return $this->db->get_where('barang_masuk',['id_barang' => $id_barang]);
  }

}
