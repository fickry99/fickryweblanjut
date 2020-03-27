<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('aut_model');
  }

  function index()
  {
    $this->load->view('Dashboard/login');

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
      $data = array(
              'username' => $username,
              'password' => $password
          );

      $cek_user	= $this->aut_model->login($data);
      if ($cek_user->num_rows() > 0) {
        $this->session->set_userdata($cek_user->row_array());
        $this->session->set_flashdata('flash',$this->session->username);
        redirect(base_url());

      }else {
        $this->session->set_flashdata('status','Username atau Password tidak ditemukan');
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
