<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Account extends CI_Model {

  public function select_by_id($data, $table){
    $this->db->where($data);
    
    $sql = $this->db->get($table);
    $error = $this->db->error();

    if(!$sql){
      return $error;
    }else{
      return $sql;
    }
  }

  public function insert($data, $table){
    $this->db->insert($table, $data);
  }
}