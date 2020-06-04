<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Upload extends CI_Model {
    
    public function insert($data, $table){
        $this->db->insert($table, $data);
    }
}