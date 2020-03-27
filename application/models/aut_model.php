<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class aut_model extends CI_Model {

  public function login($data)
  {
    $this->db->where('username',$data['username']);
    $this->db->where('password',$data['password']);
    $query  = $this->db->get('login');
    return $query;
  }
}
