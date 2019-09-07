<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class L_Custom{

  public function form($data){
    $inject = html_escape(stripslashes(trim($data)));
    return $inject;
  }

  public function list(){
    $data = array(
      1 => 'Teknik Informatika',
      2 => 'Sistem Informasi',
      3 => 'Teknologi Infomasi'
    );
    return $data;
  }

  public function not_found(){
    $log = array(
			'heading' 	=> "404 Not Found",
			'message'		=> "<p>The page you requested was not found.</p>"
    );
    return $log;
  }
}