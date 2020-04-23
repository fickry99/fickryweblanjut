<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('auth/login');
  }

  public function proses_login()
  {
    $this->form_validation->set_rules('username','Username','required|min_length[4]');
    $this->form_validation->set_rules('password','Password','required');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    }else {
      $username = $this->input->post('username',true);
      $password = $this->input->post('password',true);
      if ($username == 'admin' && $password == 'admin') {
        $data = array(
                'username' => $username,
                'password' => $password
            );
        $this->session->set_userdata($data);
        $this->session->set_flashdata('is_login','Anda berhasil login!');
        redirect('Dashboard');
      }else {
        $this->session->set_flashdata('is_failed','Anda tidak berhasil login!');
        redirect(base_url());
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

}
