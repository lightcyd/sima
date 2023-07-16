<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Users/Serverside_arsip', 'sam');
    $this->load->library('FirexEnkripsi');
    check_login();
    check_user();
  }

  /**
   * Retrieves data for the dashboard.
   *
   * @throws Some_Exception_Class description of exception
   * @return Some_Return_Value
   * This code defines a function called dashboard that retrieves data for a dashboard. It fetches data from four database tables (ms_devisi, ms_pic, ms_jenis_kajian, ms_status) and stores the results in an array called $data. Finally, it loads a specific template called 'frontend/fe_users' with the 'index' view using a templates object.
   */
  function dashboard()
  {
    $data['devisi'] = $this->db->get('ms_divisi')->result_array();
    $data['pic'] = $this->db->get('ms_pic')->result_array();
    $data['kaji'] = $this->db->get('ms_jenis_kajian')->result_array();
    $data['prog'] = $this->db->get('ms_status')->result_array();
    $this->templates->load('frontend/fe_users', 'index', $data);
  }

  function add_arsip()
  {
    $data['kelompok'] = $this->db->get('ms_department')->result_array();
    $this->templates->load('frontend/fe_users', 'add', $data);
  }

  /**
   * Calls the server-side arsip, retrieves the data, and formats it for display.
   *
   * @throws -
   * @return void
   * This code snippet defines a function called call_serverside_arsip in PHP. It retrieves data from a server-side API, formats it for display, and sends the formatted data back as a JSON response. The function uses the $this->sam->get_data() method to fetch the data, and then loops through the retrieved data to format it into an array of rows. Finally, it creates an output array containing the formatted data and some additional information, and sends it as a JSON response using the json_encode() function.
   */
  function call_serverside_arsip()
  {

    $list = $this->sam->get_data();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $v) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $v->no_memo;
      $row[] = $v->nama_pic;
      $row[] = $v->kajian_resiko;
      $row[] = $v->divisi;
      $row[] = $v->jenis_kajian;
      $row[] = !empty($v->tgl_input) ? date('d-M-Y', strtotime($v->tgl_input)) : '-';
      $row[] = !empty($v->tgl_disposisi) ? date('d-M-Y', strtotime($v->tgl_disposisi)) : '-';
      $row[] = !empty($v->tgl_memo) ? date('d-M-Y', strtotime($v->tgl_memo)) : '-';
      $row[] = !empty($v->tgl_selesai) ? date('d-M-Y', strtotime($v->tgl_selesai)) : '-';
      $row[] = $v->jarak_hari . ' Hari';
      $row[] = '<h6><span class="badge badge-primary"> ' . strtoupper($v->sts) . '</span></h6>';
      $row[] = '<div class="btn-group"><button type="button" class="btn btn-secondary btn-xs" onclick="detail(' . $v->id . ')"><i class="fa fa-eye"></i></button><button type="button" class="btn btn-danger ml-1 btn-xs" onclick="detail(' . $v->id . ')"><i class="fa fa-trash"></i></button></div>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->sam->count_all(),
      "recordsFiltered" => $this->sam->count_filtered(),
      "data" => $data,
    );
    $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($output));
  }
}
