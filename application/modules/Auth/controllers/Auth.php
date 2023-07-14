<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model', 'am');
    date_default_timezone_set('Asia/Jakarta');
  }


  function login()
  {
    check_already_logged_in();
    $this->load->view('login_view');
  }

  function do_login()
  {
    $username = $this->input->post('username');
    $pass = $this->input->post('password');
    $result = $this->am->setLogin($username, $pass);
    if ($result->result() == NULL) {
      $this->session->set_flashdata('error', 'Password salah!');
      $this->am->log_login($username);
      redirect();
    } else {
      $pecah = $result->row();
      if ($pecah->status == '0') {
        $this->session->set_flashdata('error', 'User tidak aktif');
        redirect();
      } else {
        $data = [
          'nama' => $pecah->nama,
          'username' => $pecah->username,
          'role' => $pecah->role,
          'logged_in' => TRUE
        ];
        $this->session->set_userdata($data);
        $this->am->log_login();
        redirect(md5($pecah->role));
      }
    }
  }

  function validate()
  {
    if ($this->input->is_ajax_request()) {
      $username = $this->input->post('username');
      $res = $this->am->username_search($username);
      $response = ($res != null) ? array('sts' => 'done') : array('sts' => 'fail');
      echo json_encode($response);
    } else {
      show_404();
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect();
  }
}
