<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class L_Custom {

  protected $CI;

  public function __construct() {
    $this->CI =& get_instance();
  }

  public function form($data) {
    $inject = html_escape(stripslashes(trim($data)));
    return $inject;
  }

  public function alert($name, $value) {
    return $this->CI->session->set_flashdata($name, '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i> Alert!</h5>
      '.$value.'
    </div>');
  }

  public function list() {
    $data = [
      1   => 'Teknik Informatika',
      'Sistem Informasi',
      'Teknologi Infomasi'
    ];
    return $data;
  }

  public function not_found() {
    $data = [
			'heading'   => "404 Not Found",
			'message'   => "<p>The page you requested was not found.</p>"
    ];
    return $data;
  }
}