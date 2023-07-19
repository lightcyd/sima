<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Serverside_arsip extends CI_Model
{

  // Call database detail_arsip 
  var $table = 'detail_arsip';
  var $column_order = array('id', 'no_memo', 'divisi',  'nama_pic', 'jenis_kajian', 'sts', 'kajian_resiko', 'follow_up', 'tgl_memo', 'tgl_disposisi', 'tgl_input', 'tgl_selesai', 'jarak_hari');
  var $column_search = array('id', 'no_memo', 'divisi', 'nama_pic', 'jenis_kajian', 'sts', 'kajian_resiko', 'follow_up', 'tgl_memo', 'tgl_disposisi', 'tgl_input', 'tgl_selesai', 'jarak_hari');
  var $order = array('tgl_input' => 'desc');

  /**
   * Retrieves the query for the datatables in the PHP function.
   *
   * @return void
   */
  private function _get_datatables_query()
  {
    // Retrieve the values from the input post request
    $input = $this->input->post();
    $tgl_awal = $input['tgl_awal'];
    $tgl_akhir = $input['tgl_akhir'];
    $divisi = $input['divisi'];
    $pic = $input['pic'];
    $kajian = $input['kajian'];
    $progress = $input['progress'];

    // Set the main table for the query
    $this->db->from($this->table);

    // Apply filters based on the values from the input post request
    $filterApplied = false; // Variable to track if any filter has been applied

    if (!empty($tgl_awal) && !empty($tgl_akhir)) {
      $this->db->where('DATE(tgl_input) >=', $tgl_awal)
        ->where('DATE(tgl_input) <=', $tgl_akhir);
      $filterApplied = true;
    }

    if (!empty($divisi)) {
      $this->db->where('divisi', $divisi);
      $filterApplied = true;
    }

    if (!empty($pic)) {
      $this->db->where('nama_pic', $pic);
      $filterApplied = true;
    }

    if (!empty($kajian)) {
      $this->db->where('jenis_kajian', $kajian);
      $filterApplied = true;
    }

    if (!empty($progress)) {
      $this->db->where('sts', $progress);
      $filterApplied = true;
    }

    // If no filters applied, retrieve all data
    if (!$filterApplied) {
      // Perform default action when no filters are applied
    } else {
      // // If both "devisi" and "progress" filters are present, combine them with an AND condition
      // if (!empty($divisi) && !empty($progress)) {
      //   $this->db->where('divisi', $divisi)
      //     ->where('sts', $progress);
      // }
      // Combine all the conditions with an AND condition
      if (!empty($tgl_awal) && !empty($tgl_akhir) && !empty($divisi) && !empty($pic) && !empty($kajian) && !empty($progress)) {
        $this->db->where('divisi', $divisi)
          ->where('nama_pic', $pic)
          ->where('jenis_kajian', $kajian)
          ->where('sts', $progress);
      }
    }

    // Apply search filters based on the values from the input post request
    $searchValue = $_POST['search']['value'];
    if ($searchValue) {
      $this->db->group_start();
      foreach ($this->column_search as $i => $item) {
        if ($i !== 0) {
          $this->db->or_like($item, $searchValue);
        } else {
          $this->db->like($item, $searchValue);
        }
        if (count($this->column_search) - 1 === $i) {
          $this->db->group_end();
        }
      }
    }

    // Apply ordering based on the values from the input post request
    if (isset($_POST['order'])) {
      $orderColumn = $_POST['order']['0']['column'];
      $orderDir = $_POST['order']['0']['dir'];
      $this->db->order_by($this->column_order[$orderColumn], $orderDir);
    } else if (isset($this->order)) {
      $order = $this->order;
      $orderColumn = key($order);
      $orderDir = $order[$orderColumn];
      $this->db->order_by($orderColumn, $orderDir);
    }
  }

  /**
   * Retrieves data from the database.
   *
   * @return array The retrieved data.
   */
  public function get_data()
  {
    // Execute the query to retrieve data from the database
    $this->_get_datatables_query();

    // Check if pagination parameters are passed via the $_POST array
    if ($_POST['length'] != -1) {
      // Limit the number of results returned based on the pagination parameters
      $this->db->limit($_POST['length'], $_POST['start']);
    }

    // Get the result of the executed query
    $query = $this->db->get();

    // Return the retrieved data as an array
    return $query->result();
  }

  /**
   * Counts the number of rows in the result set after applying filters.
   *
   * @throws Some_Exception_Class description of exception
   * @return int the number of rows
   */
  public function count_filtered()
  {
    // Retrieve the query object with applied filters
    $this->_get_datatables_query();

    // Execute the query and get the result set
    $query = $this->db->get();

    // Return the number of rows in the result set
    return $query->num_rows();
  }

  /**
   * Count all the results in the database table.
   *
   * @throws Exception If there is an error counting the results.
   * @return int The total count of results.
   */
  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }
}
