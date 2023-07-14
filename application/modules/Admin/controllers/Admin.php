<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_login();
    check_admin();
  }
  function index()
  {
    $this->templates->load('frontend/fe_admin', 'index');
  }
}
