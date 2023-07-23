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

  /* =================== FUNCTION CRUD PIC ============================ */
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

  function detail_pic()
  {
    $id = $this->uri->segment(3);
    $data['pic'] = $this->db->get_where('ms_pic', ['npp_pic' => $id])->row();
    $data['user'] = $this->db->get_where('user', ['npp' => $id])->row();
    $this->templates->load('frontend/fe_admin', 'master_pic/update', $data);
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
  function proses_update_pic()
  {
    $post = $this->input->post();
    $data_pic = [
      'npp_pic' => antixss($post['update_npp']),
      'nama_pic' => antixss($post['update_nama']),
      'tgl_lahir' => antixss($post['update_tgl_lahir']),
      'created_at' => date('Y-m-d H:i:s'),
    ];
    $this->db->update('ms_pic', $data_pic, ['npp_pic' => $post['id_npp']]);

    $data_login = [
      'npp' => antixss($post['update_npp']),
      'password' => md5(antixss($post['update_tgl_lahir'])),
      'role' => antixss($post['update_role']),
    ];
    $this->db->update('user', $data_login, ['npp' => $post['id_npp']]);
    $this->session->set_flashdata('success', 'PIC BERHASIL DI UPDATE!');
    redirect('detail/pic/' . $post['id_npp']);
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
  /* =================== END FUNCTION CRUD PIC ============================ */





  /* =================== FUNCTION CRUD DIVISI ============================ */
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

  function update_divisi()
  {
    $post = $this->input->post();
    $id = antixss($post['id_divisi']);
    $this->db->update('ms_divisi', ['divisi' => antixss($post['update_divisi'])], ['id' => $id]);
    $this->session->set_flashdata('success', 'DIVISI BERHASIL DI UPDATE!');
    redirect('master_divisi');
  }

  function detail_divisi()
  {
    $id = $this->uri->segment(3);
    $data['divisi'] = $this->db->get_where('ms_divisi', ['id' => $id])->row();
    $this->templates->load('frontend/fe_admin', 'master_divisi/update', $data);
  }
  function delete_divisi()
  {
    if ($this->input->is_ajax_request()) {
      $post = $this->input->post();
      $id = antixss($post['id']);

      $this->db->delete('ms_divisi', ['id' => $id]);
      $data = array(
        'status' => 1,
        'msg' => 'Divisi Berhasil Di Hapus!'
      );
      echo json_encode($data);
    } else {
      show_404();
    }
  }
  /* =================== END FUNCTION CRUD DIVISI ============================ */




  /* =================== FUNCTION CRUD DEPARTMENT ============================ */

  function add_department()
  {
    $this->templates->load('frontend/fe_admin', 'master_department/add');
  }

  function delete_department()
  {
    if ($this->input->is_ajax_request()) {
      $post = $this->input->post();
      $id = antixss($post['id']);

      $this->db->delete('ms_department', ['id' => $id]);

      $data = array(
        'status' => 1,
        'msg' => 'Department Berhasil Di Hapus'
      );
      echo json_encode($data);
    } else {
      show_404();
    }
  }

  function detail_department()
  {
    $id = $this->uri->segment(3);
    $data['department'] = $this->db->get_where('ms_department', ['id' => $id])->row();
    $this->templates->load('frontend/fe_admin', 'master_department/update', $data);
  }
  /* =================== END FUNCTION CRUD DEPARTMENT ============================ */

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
    } elseif (isset($_POST['update_department'])) {
      $id = antixss($post['id_department']);
      $nama_department = antixss($post['nama_department']);
      $this->db->update('ms_department', ['department' => $nama_department], ['id' => $id]);
      $this->session->set_flashdata('success', 'DEPARTMENT BERHASIL DI UPDATE!');
      redirect('master_divisi');
    } elseif (isset($_POST['submit_kajian'])) {
      $this->form_validation->set_rules('add_kajian', 'Jenis kajian', 'required');
      $kajian = antixss($post['add_kajian']);
      if ($this->form_validation->run() == false) {
        $this->add_kajian();
      } else {
        $this->db->insert('ms_jenis_kajian', ['jenis_kajian' => $kajian]);
        $this->session->set_flashdata('success', 'KAJIAN BERHASIL DITAMBAHKAN!');
        redirect('master_kajian');
      }
    } elseif (isset($_POST['update_kajian'])) {
      $this->form_validation->set_rules('nama_kajian', 'Jenis kajian', 'required');
      $kajian = antixss($post['nama_kajian']);
      $id = antixss($post['id_kajian']);
      if ($this->form_validation->run() == false) {
        redirect('detail/kajian/' . $id);
      } else {
        $this->db->update('ms_jenis_kajian', ['jenis_kajian' => $kajian], ['id' => $id]);
        $this->session->set_flashdata('success', 'KAJIAN BERHASIL DI UPDATE!');
        redirect('master_kajian');
      }
    } else {
      show_404();
    }
  }

  function index_kajian()
  {
    $data['kajian'] = $this->db->get('ms_jenis_kajian')->result_array();
    $this->templates->load('frontend/fe_admin', 'master_kajian/index', $data);
  }

  function add_kajian()
  {
    $this->templates->load('frontend/fe_admin', 'master_kajian/add');
  }
  function detail_kajian()
  {
    $id = $this->uri->segment(3);
    $data['kajian'] = $this->db->get_where('ms_jenis_kajian', ['id' => $id])->row();
    $this->templates->load('frontend/fe_admin', 'master_kajian/update', $data);
  }



  function delete_kajian()
  {
    if ($this->input->is_ajax_request()) {
      $post = $this->input->post();
      $id = antixss($post['id']);
      $this->db->delete('ms_jenis_kajian', ['id' => $id]);
      $data = array(
        'status' => 1,
        'msg' => 'Department Berhasil Di Hapus'
      );
      echo json_encode($data);
    } else {
      show_404();
    }
  }

  private function _validation_pic()
  {
    $this->form_validation->set_rules('add_npp', 'Nomor NPP', 'required');
    $this->form_validation->set_rules('add_nama', 'Name Pic', 'required');
    $this->form_validation->set_rules('add_tgl_lahir', 'Tanggal Lahir', 'required');
  }
}
