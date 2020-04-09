<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model{

  public function getAlldata()
  {
      return $this->db->get('data_barang');
      return $this->db->get('data_barang_keluar');
  }

  public function getSingleData($id_barang)
  {
    return $this->db->get_where('data_barang', ['id_barang' => $id_barang]);
  }

  public function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function hapus_data($where,$table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function edit_data($data, $id_barang)
  {
    $this->db->where('id_barang', $id_barang);
    $this->db->update('data_barang', $data);
  }

}
