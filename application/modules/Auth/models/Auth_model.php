<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->library('user_agent');
  }

  function setLogin($username, $password)
  {
    return $this->db->select('*')
      ->from('USER a')
      ->join('ms_pic b', 'a.npp = b.npp_pic', 'LEFT')
      ->where(array('a.npp' => $username, 'password' => md5($password)))
      ->get();
  }

  /**
   * Retrieves the username value from the database for the given username.
   *
   * @param string $username the username for which to retrieve the username value
   * @return mixed the username value if found, false otherwise
   */
  function username_search($username)
  {
    $query = $this->db->get_where('user', ['npp' => $username]);
    $row = $query->row();
    return $row ? $row->npp : false;
  }

  function log_login($username = null)
  {
    if ($username != null) {
      // username ambil dari form login karna gagal login
      $ip = $this->input->ip_address();
      if ($this->agent->is_browser()) {
        $agent = $this->agent->browser() . ' ' . $this->agent->version();
      } elseif ($this->agent->is_robot()) {
        $agent = $this->agent->robot();
      } elseif ($this->agent->is_mobile()) {
        $agent = $this->agent->mobile();
      } else {
        $agent = 'Unidentified User Agent';
      }
      $string = $this->agent->agent_string();
      $platform = $this->agent->platform();
      $data = [
        'ip_address' => 'IP-' . $ip . '/' . $agent .  ' - ' . $platform . ' - ' . $string,
        'login' => $username,
        'status' => 'fail',
        'login_time' => date('Y-m-d H:i:s')
      ];
      $this->db->insert('login_attempts', $data);
    } else {
      // username diambil dari session karna berhasil login
      $username = $this->session->userdata('username');
      $ip = $this->input->ip_address();
      if ($this->agent->is_browser()) {
        $agent = $this->agent->browser() . ' ' . $this->agent->version();
      } elseif ($this->agent->is_robot()) {
        $agent = $this->agent->robot();
      } elseif ($this->agent->is_mobile()) {
        $agent = $this->agent->mobile();
      } else {
        $agent = 'Unidentified User Agent';
      }
      $string = $this->agent->agent_string();
      $platform = $this->agent->platform();
      $data = [
        'ip_address' => 'IP-' . $ip . '/' . $agent .  ' - ' . $platform . ' - ' . $string,
        'login' => $username,
        'status' => 'success',
        'login_time' => date('Y-m-d H:i:s')
      ];
      $this->db->insert('login_attempts', $data);
    }
  }
}
