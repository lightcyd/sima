<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Users/Serverside_arsip', 'sam');
    $this->load->library('FirexEnkripsi');
    $this->load->library('Form_validation');
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
    $data['devisi'] = $this->db->get('ms_divisi')->result_array();
    $data['kaji'] = $this->db->get('ms_jenis_kajian')->result_array();
    $data['pic'] = $this->db->get('ms_pic')->result_array();
    $data['prog'] = $this->db->get('ms_status')->result_array();
    $data['kelompok'] = $this->db->get('ms_department')->result_array();
    $this->templates->load('frontend/fe_users', 'add', $data);
  }

  function proses_simpan()
  {

    $config['upload_path'] = './assets/file_upload/';
    $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
    $config['max_size'] = 2048; // Ukuran maksimum file dalam kilobita (KB)
    $config['encrypt_name'] = TRUE; // Mengenkripsi nama file

    $this->load->library('upload', $config);
    $post = $this->input->post();
    $id_group = substr(enkrip(rand(1, 10000)), 0, 18);

    // Menyimpan data pada tabel tb_arsip
    $data_memo = [
      'no_memo' => antixss($post['add_no_memo']),
      'jenis_kajian' => antixss($post['add_jns_kajian']),
      'divisi' => antixss($post['add_divisi']),
      'pic' => antixss($post['add_pic']),
      'status' => antixss($post['add_status']),
      'kajian_resiko' => antixss($post['add_kajian_resiko']),
      'tgl_memo' => antixss($post['add_tgl_memo']),
      'tgl_disposisi' => antixss($post['add_tgl_disposisi']),
      'tgl_input' => antixss($post['add_tgl_kelengkapan_memo']),
      'group_file_id' => $id_group
    ];

    // Simpan data memo ke tabel tb_arsip
    $this->db->insert('tr_arsip', $data_memo);
    if ($this->db->affected_rows() == 0) {
      echo 'Failed to insert data into tb_arsip.';
      exit();
    }

    // Menyimpan data file yang diunggah ke dalam tabel tr_arsip_file
    $memoFiles = $_FILES['memo_file'];
    $idDepartemen = $post['id_departemen_file'];

    foreach ($memoFiles['name'] as $index => $fileName) {
      // Menjalankan proses upload file
      if ($this->upload->do_upload("memo_file[$index]")) {
        $uploadData = $this->upload->data();
        $filePath = $uploadData['full_path'];

        // Menyimpan data ke tabel tr_arsip_file
        $data_file = [
          'group_id' => $id_group,
          'departmen_id' => $idDepartemen[$index], // ID departemen dari iterasi saat ini
          'file_path' => $filePath
        ];

        $this->db->insert('tr_arsip_file', $data_file);
        if ($this->db->affected_rows() == 0) {
          echo 'Failed to insert data into tr_arsip_file.';
          exit();
        }
      } else {
        // Penanganan jika proses upload file gagal
        echo $this->upload->display_errors();
        // Tambahkan penanganan kesalahan sesuai kebutuhan Anda
      }
    }

    redirect('add/arsip');


    $this->_validation();
    if ($this->form_validation->run() == FALSE) {
      $this->add_arsip();
    } else {

      // Redirect atau tampilkan pesan sukses sesuai kebutuhan Anda
    }
  }

  private function _validation()
  {
    $this->form_validation->set_rules('add_no_memo', 'No. Memo', 'required');
    $this->form_validation->set_rules('add_jns_kajian', 'Jenis Kajian', 'required');
    $this->form_validation->set_rules('add_divisi', 'Divisi', 'required');
    $this->form_validation->set_rules('add_pic', 'PIC', 'required');
    $this->form_validation->set_rules('add_status', 'Status', 'required');
    $this->form_validation->set_rules('add_tgl_memo', 'Tanggal Memo', 'required');
    $this->form_validation->set_rules('add_tgl_disposisi', 'Tanggal Disposisi', 'required');
    $this->form_validation->set_rules('add_tgl_kelengkapan_memo', 'Tanggal Kelengkapan Memo', 'required');
    $this->form_validation->set_rules('add_kajian_resiko', 'Kajian Resiko', 'required');
  }

  /**
   * Configures the upload settings for file uploads.
   *
   * @return void
   * This code snippet is a PHP function called configureUpload that sets up the configuration settings for file uploads. It specifies the upload path, allowed file types, maximum file size, and whether to encrypt the file name. It then loads the Upload library with the provided configuration.
   */
  public function configureUpload()
  {
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
