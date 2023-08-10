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
    $data['divisi'] = $this->db->get('ms_divisi')->result_array();
    $data['pic'] = $this->db->get('ms_pic')->result_array();
    $data['kaji'] = $this->db->get('ms_jenis_kajian')->result_array();
    $data['prog'] = $this->db->get('ms_status')->result_array();
    $this->templates->load('frontend/fe_users', 'index', $data);
  }

  function add_arsip()
  {
    $data['divisi'] = $this->db->get('ms_divisi')->result_array();
    $data['kaji'] = $this->db->get('ms_jenis_kajian')->result_array();
    $data['pic'] = $this->db->get('ms_pic')->result_array();
    $data['prog'] = $this->db->get('ms_status')->result_array();
    $data['kelompok'] = $this->db->get('ms_department')->result_array();
    $this->templates->load('frontend/fe_users', 'add', $data);
  }

  /**
   * Process save function.
   *
   * @throws Exception if there is an error during the process.
   * This code snippet is a PHP function called proses_simpan(). It appears to be a function that processes a save operation. Here's a summary of what the code does:
   *It defines a configuration array for file uploads.
   *It loads the upload library and initializes it with the configuration.
   *It gets the form input data and generates an ID for the file group.
   *It performs form validation, and if it fails, it calls the add_arsip() function.
   *If form validation passes, it uploads multiple files using the upload_file() function for each file.
   *It handles the upload errors, such as file size or format issues.
   *It saves the file information to the database.
   *It saves other form data to the tr_arsip table in the database.
   *Finally, it redirects the user to the add/arsip page.
   *Please note that without additional context or knowledge of the specific libraries or frameworks used, it's difficult to provide a complete understanding of the code's functionality
   *
   */
  function proses_simpan()
  {
    // Konfigurasi upload
    $config = [
      'upload_path' => './Uploads/memo',
      'allowed_types' => 'gif|jpg|png|pdf|doc|docx',
      'overwrite' => true,
      'max_size' => 20048, // Ukuran maksimum file dalam kilobita (KB)
      'encrypt_name' => true // Mengenkripsi nama file
    ];

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    $post = $this->input->post();

    // generate kode urut dari tabel tb_arsip_file berdasarkan field id_memo
    $id_group = generate_unique_id('tr_arsip', 'group_file_id');

    $this->_validation();

    if ($this->form_validation->run() == FALSE) {
      // Jika validasi form tidak berhasil, panggil add_arsip()
      $this->add_arsip();
    } else {
      // Lakukan upload file menggunakan fungsi upload_file()
      $file_memo_unit = $this->upload_file('file_memo_unit', $this->upload);
      $file_memo_irs = $this->upload_file('file_memo_irs', $this->upload);
      $file_memo_imp = $this->upload_file('file_memo_imp', $this->upload);

      if (!empty($_FILES['memo_file']['name'])) {
        $departemen_ids = $this->input->post('id_departemen_file'); // Mengambil array departemen_id dari inputan

        // Melakukan upload untuk setiap file yang diunggah
        foreach ($_FILES['memo_file']['name'] as $key => $filename) {
          $_FILES['userfile']['name']     = $_FILES['memo_file']['name'][$key];
          $_FILES['userfile']['type']     = $_FILES['memo_file']['type'][$key];
          $_FILES['userfile']['tmp_name'] = $_FILES['memo_file']['tmp_name'][$key];
          $_FILES['userfile']['error']    = $_FILES['memo_file']['error'][$key];
          $_FILES['userfile']['size']     = $_FILES['memo_file']['size'][$key];

          if ($this->upload->do_upload('userfile')) {
            $data = $this->upload->data();

            // Simpan informasi file ke database
            $file_path = $data['file_name']; // Mendapatkan nama file yang diunggah

            // Mendapatkan departemen_id sesuai dengan indeks saat ini
            $departemen_id = $departemen_ids[$key];

            // Simpan informasi file ke dalam tabel
            $this->db->insert('tb_arsip_file', [
              'id_group_file' => $id_group,
              'departmen_id' => $departemen_id,
              'file_memo' => $file_path
            ]);
          } else {
            // Menangani kesalahan upload, misalnya file terlalu besar atau format file tidak diizinkan
            $error = $this->upload->display_errors();
            $this->session->set_flashdata($error);
            $this->add_arsip();
            // Tambahkan log atau tindakan lain sesuai kebutuhan
          }
        }
      } else {
        $this->db->insert('tb_arsip_file', [
          'id_group_file' => $id_group
        ]);
      }

      // Menyimpan data pada tabel tb_arsip
      $data_memo = [
        'no_memo' => antixss($post['add_no_memo']),
        'jenis_kajian' => antixss($post['add_jns_kajian']),
        'divisi' => antixss($post['add_divisi']),
        'pic' => antixss($post['add_pic']),
        'status' => antixss($post['add_status']),
        'kajian_resiko' => antixss($post['add_kajian_resiko']),
        'follow_up' => antixss($post['add_follow_up']),
        'tgl_memo' => antixss($post['add_tgl_memo']),
        'tgl_disposisi' => antixss($post['add_tgl_disposisi']),
        'tgl_input' => antixss($post['add_tgl_kelengkapan_memo']),
        'group_file_id' => antixss($id_group),
        'file_memo_unit' => antixss($file_memo_unit),
        'file_memo_irs' => antixss($file_memo_irs),
        'file_memo_impl' => antixss($file_memo_imp),
        'tgl_impl' => antixss($post['tgl_implementasi']),
        'tgl_selesai' => antixss($post['tgl_memoirs']),
        'created_at' => date('Y-m-d H:i:s')
      ];

      // Simpan data memo ke tabel tb_arsip
      $this->db->insert('tr_arsip', $data_memo);
      $this->session->set_flashdata('success', 'MEMO ARSIP BERHASIL DITAMBAHKAN!');
      redirect('add/arsip');
    }
  }

  /**
   * Delete the arsip.
   *
   * @throws Some_Exception_Class If the database deletion fails.
   * @return void
   */
  function delete_arsip()
  {
    $id = $this->uri->segment(3);
    $this->db->delete('tr_arsip', ['group_file_id' => $id]);
    $this->db->delete('tb_arsip_file', ['id_group_file' => $id]);
    redirect(md5('users'));
  }

  function detail_arsip()
  {
    $id = antixss(dekrip($this->uri->segment(2)));

    // DETAILS 
    $data['divisi'] = $this->db->get('ms_divisi')->result_array();
    $data['kaji'] = $this->db->get('ms_jenis_kajian')->result_array();
    $data['pic'] = $this->db->get('ms_pic')->result_array();
    $data['prog'] = $this->db->get('ms_status')->result_array();
    $data['kelompok'] = $this->db->get('ms_department')->result_array();

    // DATA
    $data['arsip'] = $this->db->get_where('tr_arsip', ['group_file_id' => $id])->row();
    $data['file'] = $this->db->get_where('tb_arsip_file', ['id_group_file' => $id])->result_array();

    $this->templates->load('frontend/fe_users', 'detail', $data);
  }

  function proses_update()
  {
    // BUG EDIT REPLACE FILE
    // Konfigurasi upload
    $config = [
      'upload_path' => './Uploads/memo',
      'allowed_types' => 'gif|jpg|png|pdf|doc|docx',
      'overwrite' => true,
      'max_size' => 20048, // Ukuran maksimum file dalam kilobita (KB)
      'encrypt_name' => true // Mengenkripsi nama file
    ];

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    $post = $this->input->post();

    // Get the id_group_file from the form data
    $id_group = antixss($post['update_id_group']);
    $test = enkrip($post['update_id_group']);


    // Lakukan update file menggunakan fungsi upload_file()
    $file_memo_unit = $this->upload_file('file_memo_unit', $this->upload);
    $file_memo_irs = $this->upload_file('file_memo_irs', $this->upload);
    $file_memo_imp = $this->upload_file('file_memo_imp', $this->upload);

    // Update data memo di tabel tb_arsip
    $data_memo = [
      'no_memo' => antixss($post['update_no_memo']),
      'jenis_kajian' => antixss($post['update_jns_kajian']),
      'divisi' => antixss($post['update_divisi']),
      'pic' => antixss($post['update_pic']),
      'status' => antixss($post['update_status']),
      'kajian_resiko' => antixss($post['update_kajian_resiko']),
      'follow_up' => antixss($post['update_follow_up']),
      'tgl_memo' => antixss($post['update_tgl_memo']),
      'tgl_disposisi' => antixss($post['update_tgl_disposisi']),
      'tgl_input' => antixss($post['update_tgl_kelengkapan_memo']),
      'tgl_impl' => antixss($post['update_tgl_implementasi']),
      'tgl_selesai' => antixss($post['update_tgl_memoirs']),
      'updated_at' => date('Y-m-d H:i:s')
    ];

    // Only update file fields if there are new files uploaded
    if (!empty($_FILES['file_memo_unit']['name'])) {
      $data_memo['file_memo_unit'] = antixss($file_memo_unit);
    }

    if (!empty($_FILES['file_memo_irs']['name'])) {
      $data_memo['file_memo_irs'] = antixss($file_memo_irs);
    }

    if (!empty($_FILES['file_memo_imp']['name'])) {
      $data_memo['file_memo_impl'] = antixss($file_memo_imp);
    }

    // Update data memo di tabel tr_arsip
    $this->db->where('group_file_id', $id_group);
    $this->db->update('tr_arsip', $data_memo);

    if (!empty($_FILES['memo_file_update']['name'])) {
      $departemen_ids = $this->input->post('id_departemen_file'); // Mengambil array departemen_id dari inputan
      // var_dump($departemen_ids);
      // die;
      // Melakukan update atau insert untuk setiap file yang diunggah
      foreach ($_FILES['memo_file_update']['name'] as $key => $filename) {
        $_FILES['userfile']['name']     = $_FILES['memo_file_update']['name'][$key];
        $_FILES['userfile']['type']     = $_FILES['memo_file_update']['type'][$key];
        $_FILES['userfile']['tmp_name'] = $_FILES['memo_file_update']['tmp_name'][$key];
        $_FILES['userfile']['error']    = $_FILES['memo_file_update']['error'][$key];
        $_FILES['userfile']['size']     = $_FILES['memo_file_update']['size'][$key];

        // Mendapatkan departemen_id sesuai dengan indeks saat ini
        $departemen_id = $departemen_ids[$key];

        // Cek apakah data file dengan id_group_file dan departemen_id sudah ada dalam database
        $existing_data = $this->db->get_where('tb_arsip_file', ['id_group_file' => $id_group, 'departmen_id' => $departemen_id])->row();

        if ($this->upload->do_upload('userfile')) {
          $data = $this->upload->data();

          // Simpan informasi file ke database
          $file_path = $data['file_name']; // Mendapatkan nama file yang diunggah

          if (!$existing_data) {
            $this->db->insert('tb_arsip_file', [
              'id_group_file' => $id_group,
              'departmen_id' => $departemen_id,
              'file_memo' => $file_path
            ]);
          } else {
            $this->db->where(['id_group_file' => $id_group, 'departmen_id' => $departemen_id])->update('tb_arsip_file', ['file_memo' => $file_path]);
          }
        } else {
          // Menangani kesalahan upload, misalnya file terlalu besar atau format file tidak diizinkan
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error', 'Failed to upload file for Departemen ID ' . $departemen_id . ': ' . $error);
        }
      }
    }

    $this->session->set_flashdata('success', 'MEMO ARSIP BERHASIL DIUPDATE!');
    redirect(base_url('detail/' . $test)); // Redirect back to the edit page after updat
  }


  /**
   * Uploads a file.
   *
   * @param string $file_name The name of the file to be uploaded.
   * @param object $uploader The uploader object.
   * @throws None
   * @return string The name of the uploaded file, or an empty string if no file was uploaded.
   */
  function upload_file($file_name, $uploader)
  {
    if (!empty($_FILES[$file_name]['name'])) {
      if ($uploader->do_upload($file_name)) {
        $data = $uploader->data();
        return $data['file_name'];
      } else {
        $error = $uploader->display_errors();
        echo $error;
        die;
      }
    }
    return '';
  }

  /**
   * Private function for validation.
   *
   * @return void
   */
  /**
   * Validates the input fields for adding a new memo.
   *
   * @throws Some_Exception_Class if any of the required fields are missing.
   */
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
      $id_group = enkrip($v->group_id);
      // $id = preg_replace('/[^a-zA-Z0-9,]/', '', $id_group);

      $row = array();
      $row[] = $no;
      $row[] = $v->no_memo;
      $row[] = $v->kajian_resiko;
      $row[] = $v->divisi;
      $row[] = !empty($v->tgl_memo) ? date('d-M-Y', strtotime($v->tgl_memo)) : '-';
      $row[] = !empty($v->tgl_disposisi) ? date('d-M-Y', strtotime($v->tgl_disposisi)) : '-';
      $row[] = $v->jenis_kajian;
      $row[] = $v->nama_pic;
      $row[] = !empty($v->tgl_input) ? date('d-M-Y', strtotime($v->tgl_input)) : '-';
      $row[] = !empty($v->tgl_selesai) ? date('d-M-Y', strtotime($v->tgl_selesai)) : '-';
      $row[] = $v->jarak_hari . ' Hari';
      $row[] = '<h6><span class="badge badge-primary"> ' . strtoupper($v->sts) . '</span></h6>';
      $row[] = '<div class="btn-group"><a type="button" class="btn btn-secondary btn-xs" href="' . base_url('detail/' . $id_group) . '"><i class="fa fa-eye"></i></a><a type="button" class="btn btn-danger ml-1 btn-xs" href="' . base_url('delete/arsip/' . $v->group_id) . '" ><i class="fa fa-trash"></i></a></div>';
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
