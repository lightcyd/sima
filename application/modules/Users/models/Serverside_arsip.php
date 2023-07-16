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
   * This code defines a private function in a PHP class that retrieves a query for datatables. It iterates over an array of columns to build a search query based on user input. It also handles sorting the results based on user-defined order.
   */
  private function _get_datatables_query()
  {
    // $bln = date('m');
    // $this->db->where('MONTH(tgl)', $bln)->order_by('tgl', 'desc')->from($this->table);
    $this->db->from($this->table);
    $i = 0;
    foreach ($this->column_search as $item) // loop column 
    {
      if ($_POST['search']['value']) // if datatable send POST for search
      {
        if ($i === 0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }
        if (count($this->column_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if (isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  /**
   * Retrieves data from the database.
   *
   * @return array The retrieved data.
   * This code snippet is a PHP function that retrieves data from a database. It uses the CodeIgniter framework's database library to execute a query and return the result as an array. The function takes into account any pagination parameters passed via the $_POST array to limit the number of results returned.
   */
  public function get_data()
  {
    $this->_get_datatables_query();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
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
    $this->_get_datatables_query();
    $query = $this->db->get();
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
