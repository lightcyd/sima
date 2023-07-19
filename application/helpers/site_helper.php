<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('generate_unique_id')) {
  function generate_unique_id($table, $field)
  {
    $CI = &get_instance();

    // Ambil ID terbesar dari tabel
    $CI->db->select_max($field);
    $query = $CI->db->get($table);
    $result = $query->row();
    $max_id = $result->$field;

    // Tentukan ID berikutnya dengan menambahkan 1
    $next_id = $max_id + 1;

    // Cek apakah ID sudah digunakan, jika iya, tambahkan 1 dan cek lagi hingga ID yang unik ditemukan
    while ($CI->db->where($field, $next_id)->get($table)->num_rows() > 0) {
      $next_id++;
    }

    return $next_id;
  }
}
