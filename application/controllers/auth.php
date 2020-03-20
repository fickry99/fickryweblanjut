<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('aut_model');
    $this->load->libraries('Session');
    // $this->load->view('viewname');
  }

  function index()
  {
    $this->load->view('Dashboard/login');

  }
  public function proses_login()
  {
    $this->form_validation->set_rules('username','Username','require');
    $this->form_validation->set_rules('password','password','require');

    if ($this->form_validation->run() == FALSE){
      $this->login();
    }else{
    $username = $this->input->post('username',true);
    $password = $this->input->post('password',true);
    $data = array('username' => $username,
                   'password' => $password);

    $result = $this->aut_model->login($data);
    if ($result->num_row() > 0) {

      $this->session->set_userdata($result->row_array());
      redirect(base_url());
    }else {
      $this->session->set_flashdata('pesan','username atau password salah');
      redirect(base_url('auth/index'));
    }
  }

}
}

// function aksi_login(){
// 		$username = $this->input->post('username');
// 		$password = $this->input->post('password');
// 		$where = array(
// 			'username' => $username,
// 			'password' => md5($password)
// 			);
// 		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
// 		if($cek > 0){
//
// 			$data_session = array(
// 				'nama' => $username,
// 				'status' => "login"
// 				);
//
// 			$this->session->set_userdata($data_session);
//
// 			redirect(base_url("admin"));
//
// 		}else{
// 			echo "Username dan password salah !";
// 		}
// 	}
//
// 	function logout(){
// 		$this->session->sess_destroy();
// 		redirect(base_url('login'));
// 	}
// }
