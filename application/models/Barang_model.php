<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model{

  public function idBarang()
	{
		$barang = "BRG";
    $q = "SELECT MAX(TRIM(REPLACE(id_barang,'BRG', ''))) as nama
          FROM data_barang WHERE id_barang LIKE '$barang%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "BRG".$id;
    return $id;
	}

  public function getAllBarang()
  {
    $procedure = "CALL pview_barang()";
    return $this->db->query($procedure);
  }

  public function getSingleBarang($id_barang)
  {
    return $this->db->get_where('data_barang', ['id_barang' => $id_barang]);
  }

  public function insertBarang($data)
  {
    return $this->db->insert('data_barang',$data);
  }

  public function updateBarang($data, $id_barang)
  {
    $this->db->where('id_barang', $id_barang);
    return $this->db->update('data_barang', $data);
  }

  public function deleteBarang($id_barang)
  {
    $this->db->where('id_barang', $id_barang);
    return $this->db->delete('data_barang');
  }



}
