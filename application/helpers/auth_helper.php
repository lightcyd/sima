<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('check_login')) {

  function check_login()
  {
    $CI = get_instance();
    if (!$CI->session->userdata('logged_in')) {
      redirect('auth/login');
    }
  }
}

if (!function_exists('check_user')) {

  function check_user()
  {
    $CI = get_instance();
    if ($CI->session->userdata('role') !== 'users') {
      redirect(md5('admin'));
    }
  }
}

if (!function_exists('check_admin')) {

  function check_admin()
  {
    $CI = get_instance();
    if ($CI->session->userdata('role') !== 'admin') {
      redirect(md5('users'));
    }
  }
}

if (!function_exists('check_already_logged_in')) {

  function check_already_logged_in()
  {
    $CI = get_instance();
    if ($CI->session->userdata('logged_in')) {
      $role = $CI->session->userdata('role');
      redirect(md5($role)); // Ubah sesuai halaman dashboard yang sesuai
    }
  }
}
