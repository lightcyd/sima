<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('Form_validation');
    check_login();
    check_admin();
  }
  function index()
  {
    $this->templates->load('frontend/fe_admin', 'index');
  }

  function index_pic()
  {
    $data['pic'] = $this->db->get('ms_pic')->result_array();
    $this->templates->load('frontend/fe_admin', 'master_pic/index', $data);
  }

  function add_pic()
  {
    $data['pic'] = $this->db->get('ms_pic')->result_array();
    $this->templates->load('frontend/fe_admin', 'master_pic/add', $data);
  }
  function proses_add_pic()
  {
    $post = $this->input->post();
    $this->_validation_pic();
    if ($this->form_validation->run() == false) {
      $this->add_pic();
    } else {
      $data_pic = [
        'npp_pic' => antixss($post['add_npp']),
        'nama_pic' => antixss($post['add_nama']),
        'tgl_lahir' => antixss($post['add_tgl_lahir']),
        'created_at' => date('Y-m-d H:i:s'),
      ];
      $this->db->insert('ms_pic', $data_pic);

      $data_login = [
        'npp' => antixss($post['add_npp']),
        'password' => md5(antixss($post['add_tgl_lahir'])),
        'role' => antixss($post['add_role']),
      ];
      $this->db->insert('user', $data_login);
      $this->session->set_flashdata('success', 'PIC BERHASIL DITAMBAHAKAN!');
      redirect('add/pic');
    }
  }

  function delete_pic()
  {
    if ($this->input->is_ajax_request()) {
      $post = $this->input->post();
      $id = antixss($post['id']);

      $this->db->delete('ms_pic', ['npp_pic' => $id]);
      $this->db->delete('user', ['npp' => $id]);

      $data = array(
        'status' => 1,
        'msg' => 'Pic Berhasil Di Hapus'
      );
      echo json_encode($data);
    } else {
      show_404();
    }
  }

  function index_divisi()
  {
    $data['divisi'] = $this->db->get('ms_divisi')->result_array();
    $data['department'] = $this->db->get('ms_department')->result_array();
    $this->templates->load('frontend/fe_admin', 'master_divisi/index', $data);
  }

  function add_divisi()
  {
    $this->templates->load('frontend/fe_admin', 'master_divisi/add');
  }

  function add_department()
  {
    $this->templates->load('frontend/fe_admin', 'master_department/add');
  }

  function proses()
  {
    $post = $this->input->post();
    if (isset($_POST['submit_divisi'])) {
      $this->form_validation->set_rules('add_divisi', 'Nama divisi', 'required');
      $nama_divisi = antixss($post['add_divisi']);
      if ($this->form_validation->run() == false) {
        $this->add_divisi();
      } else {
        $this->db->insert('ms_divisi', ['divisi' => $nama_divisi]);
        $this->session->set_flashdata('success', 'DIVISI BERHASIL DITAMBAHAKAN!');
        redirect('master_divisi');
      }
    } elseif (isset($_POST['submit_department'])) {
      $nama_department = antixss($post['add_department']);
      $this->form_validation->set_rules('add_department', 'Nama Department', 'required');
      if ($this->form_validation->run() == false) {
        $this->add_department();
      } else {
        $this->db->insert('ms_department', ['department' => $nama_department]);
        $this->session->set_flashdata('success', 'DEPARTMENT BERHASIL DITAMBAHAKAN!');
        redirect('master_divisi');
      }
    } else {
      show_404();
    }
  }


  function update_pic()
  {
  }


  function index_kajian()
  {
    $this->templates->load('frontend/fe_admin', 'master_kajian/index');
  }

  private function _validation_pic()
  {
    $this->form_validation->set_rules('add_npp', 'Nomor NPP', 'required');
    $this->form_validation->set_rules('add_nama', 'Name Pic', 'required');
    $this->form_validation->set_rules('add_tgl_lahir', 'Tanggal Lahir', 'required');
  }
}
