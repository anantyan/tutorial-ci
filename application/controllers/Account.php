<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct(){
    parent::__construct();
  }

  public function index(){
    $session = $this->session->userdata('data-id');
    switch($session['level_user']){
      case 1:
        redirect('admin');
        break;
      case 2:
        redirect('mahasiswa');
        break;  
      default:
        $this->session->unset_userdata('data-id');
        $data = [
          'style'		  =>	$this->l_stylescript->style(),
          'script'	  =>	$this->l_stylescript->script(),
          'title'		  =>	"Halaman Login",
          'template'	=>	"account/login"
        ];
        $this->load->view('layouts/content/login', $data);
    }
  }

  public function login_action(){
    header("Content-type:application/json");

    $username = $this->input->post('username', true);
    $password = $this->input->post('password', true);
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $data = array(
      'username' => $username,
      'password' => $password
    );

    $byId = $this->m_account->select_by_id($data, 'tbl_account')->row_array();
    $session = array(
      'data-id' => array(
        'username'  => $byId['username'],
        'email'     => $byId['email'],
        'level_user'=> $byId['level_user'],
        'status'    => 'active'
      )
    );

    if($this->form_validation->run() != true){
      $log = array(
        'error'     => 1,
        'username'  => form_error('username'),
        'password'  => form_error('password')
      );
    }else{
      if($username != $byId['username']){
        $log = array(
          'error'   => 2,
          'status'  => 'Username salah!'
        );
      }elseif($password != $byId['password']){
        $log = array(
          'error'   => 2,
          'status'  => 'Password salah!'
        );
      }else{
        switch($byId['level_user']){
          case 1:
            $this->session->set_userdata($session);
            $log = array(
              'error' => 0,
              'status' => 'Refresh data please!'
            );
            break;
          case 2:
            $this->session->set_userdata($session);
            $log = array(
              'error'   => 0,
              'status' => 'Refresh data please!'
            );
            break;
          default:
            $this->session->unset_userdata('data-id');
            $log = array(
              'error' => 0,
              'status' => 'Refresh data please!'
            );
            break;
        }
      }
    }
    echo json_encode($log);
  }
  
  public function logout(){
    $this->session->unset_userdata('data-id');
    redirect('account');
  }
}