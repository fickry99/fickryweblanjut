<?php

class aut_model extends CI_Controller {


  function login($data)
  {
    $this->db->where('username',$data['username']);
    $this->db->where('password',$data['password']);
    $query = $this->db->get('login');

    if ($query->num_rows() == 1) {
      return $query->row(0)->id;
    }else{
    return $query;

  }
}
