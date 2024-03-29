<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mahasiswa extends CI_Model {

	public function select($table){
    $this->db->order_by('nim','DESC');

    $sql    = $this->db->get($table);
    $error  = $this->db->error();

    if(!$sql){
      return $error;
    }else{
      return $sql->result_array();
    }
  }
  
  public function insert($data, $table){
    $this->db->insert($table, $data);
    return $this->db->affected_rows();
  }

  public function delete($data, $table){
    $this->db->where($data);
    $this->db->delete($table);
    return $this->db->affected_rows();
  }

  public function select_by_id($data, $table){
    $this->db->where($data);

    $sql    = $this->db->get($table);
    $error  = $this->db->error();

    if(!$sql){
      return $error;
    }else{
      return $sql->row_array();
    }
  }

  public function update($where, $data, $table){
    $this->db->where($where);
    $this->db->update($table, $data);
    return $this->db->affected_rows();
  }
}
