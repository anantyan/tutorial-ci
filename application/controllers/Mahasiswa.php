<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['records'] = $this->m_mahasiswa->select('tbl_mahasiswa')->result_array();
		$this->load->view('layout/layout_header');
		$this->load->view('mahasiswa/v_select', $data);
		$this->load->view('layout/layout_footer');
	}

	public function insert(){
		$data = array(
			'jurusan' => $this->l_custom->list()
		);

		$this->load->view('layout/layout_header');
		$this->load->view('mahasiswa/v_insert', $data);
		$this->load->view('layout/layout_footer');
	}

	public function insert_action(){
		header("Content-type:application/json");

		$nim			=	$this->input->post('nim', true);
		$nama			=	$this->input->post('nama', true);
		$jurusan	=	$this->input->post('jurusan', true);
		$alamat		=	$this->input->post('alamat', true);
		$this->form_validation->set_rules('nim', 'Nim', 'required|is_unique[tbl_mahasiswa.nim]|max_length[11]|is_natural_no_zero');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$data = array(
			'nim' 		=>	$this->db->escape_str($nim),
			'nama'		=>	$this->db->escape_str($nama),
			'jurusan'	=>	$this->db->escape_str($jurusan),
			'alamat'	=>	$this->db->escape_str($alamat) 
		);

		if($this->form_validation->run() != true){
			$log = array(
				'error'		=> 1,
				'nim'			=> form_error('nim'),
				'nama'		=> form_error('nama'),
				'jurusan'	=> form_error('jurusan'),
				'alamat'	=> form_error('alamat')
			);
		}else{
			$log = array(
				'error'		=> 0,
				'status'	=> "Berhasil!"
			);
			$this->m_mahasiswa->insert($data, 'tbl_mahasiswa');
		}

		echo json_encode($log);
	}

	public function delete($id=''){
		header("Content-type:application/json");

		$where = array(
			'id' => $this->db->escape_str($id)
		);
		$data['records'] = $this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array();

		if($where['id'] == ''||$where['id'] == 0||$where['id'] != $data['records']['id']){
			$log = array(
				'error' => 1,
				'id'		=> "404 Page Not Found"
			);
		}else{
			$log = array(
				'error' 	=> 0,
				'status' 	=> "Berhasil!"
			);
			$this->m_mahasiswa->delete($where, 'tbl_mahasiswa');
		}
		
		echo json_encode($log);
	}

	public function update($id=''){
		$where = array(
			'id' => $this->db->escape_str($id)
		);
		$byId['records'] = $this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array();
		$byId['jurusan'] = $this->l_custom->list();

		if($where['id'] == ''||$where['id'] == 0||$where['id'] != $byId['records']['id']){
			$this->load->view('errors/html/error_404', $this->l_custom->not_found());
		}else{
			$this->load->view('layout/layout_header');
			$this->load->view('mahasiswa/v_update', $byId);
			$this->load->view('layout/layout_footer');
		}
	}

	public function update_action(){
		header("Content-type:application/json");

		$id				=	$this->input->post('id', true);
		$nim			=	$this->input->post('nim', true);
		$nama			=	$this->input->post('nama', true);
		$jurusan	=	$this->input->post('jurusan', true);
		$alamat		=	$this->input->post('alamat', true);
		$email		=	$this->input->post('email', true);
		$no_telp	=	$this->input->post('no_telp', true);
		$this->form_validation->set_rules('nim', 'Nim', 'required|max_length[11]|is_natural_no_zero');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_emails');
		$this->form_validation->set_rules('no_telp', 'No. Telp.', 'required|is_natural|min_length[3]|max_length[12]');
		$data = array(
			'nim' 		=>	$this->db->escape_str($nim),
			'nama'		=>	$this->db->escape_str($nama),
			'jurusan'	=>	$this->db->escape_str($jurusan),
			'alamat'	=>	$this->db->escape_str($alamat),
			'email'		=>	$this->db->escape_str($email),
			'no_telp'	=>	$this->db->escape_str($no_telp)
		);
		$where = array(
			'id' 			=>	$this->db->escape_str($id)
		);
		$byId['records'] = $this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array();

		if($this->form_validation->run() != true){
			$log = array(
				'error'		=> 1,
				'nim'			=> form_error('nim'),
				'nama'		=> form_error('nama'),
				'jurusan'	=> form_error('jurusan'),
				'alamat'	=> form_error('alamat'),
				'email'		=> form_error('email'),
				'no_telp'	=> form_error('no_telp')
			);
		}else{
			if($where['id'] == ''||$where['id'] == 0||$where['id'] != $byId['records']['id']){
				$log = array(
					'error'		=> 2,
					'status'	=> "404 Page Not Found"
				);
			}else{
				$log = array(
					'error'		=> 0,
					'status'	=> "Berhasil!"
				);
				$this->m_mahasiswa->update($where, $data, 'tbl_mahasiswa');
			}
		}

		echo json_encode($log);
	}

	public function detail($id=''){
		$where = array(
			'id' => $this->db->escape_str($id)
		);
		$data['records'] = $this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array();
		
		if($where['id'] == ''||$where['id'] == 0||$where['id'] != $data['records']['id']){
			$this->load->view('errors/html/error_404', $this->l_custom->not_found());
		}else{
			$this->load->view('layout/layout_header');
			$this->load->view('mahasiswa/v_detail', $data);
			$this->load->view('layout/layout_footer');
		}
	}

	public function upload_photo(){
		$id	=	$this->input->post('id', true);
		$where = array(
			'id'	=>	$this->db->escape_str($id)
		);
		$byId['records'] = $this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array();

		$config['upload_path']		=	'assets/photo/';
		$config['allowed_types']	=	'gif|jpg|png';
		$config['overwrite']			=	true;
		$config['max_size']				=	2048;
		$config['max_width']			=	1024;
		$config['max_height']			=	1024;
		$config['file_name']			=	'img_'.$where['id'];
		$this->load->library('upload', $config);
		
		if($where['id'] == ''||$where['id'] == 0||$where['id'] != $byId['records']['id']){
			$error = $this->l_custom->not_found();
			$this->session->set_flashdata('message', $error['message']);
			redirect(base_url().'mahasiswa/detail/'.$where['id']);
		}else{
			if(!$this->upload->do_upload('photo')){
				$error = array(
					'message'	=>	$this->upload->display_errors()
				);
				$this->session->set_flashdata('message', $error['message']);
				redirect(base_url().'mahasiswa/detail/'.$where['id']);
			}else{
				$log = array(
					'photo'		=>	base_url().'assets/photo/'.$this->upload->data('file_name')
				);
				$this->m_mahasiswa->update($where, $log, 'tbl_mahasiswa');
				redirect(base_url().'mahasiswa/detail/'.$where['id']);
			}
		}
	}
}