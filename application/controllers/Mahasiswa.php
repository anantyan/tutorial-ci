<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	protected $data_id;

	public function __construct() {
		parent::__construct();
		$this->data_id = $this->session->userdata('data-id');
		// if($this->data_id['status'] != 'active' && $this->data_id['level_user'] != 2){
		// 	redirect('account');
		// }
	}

	public function index() {
		$data = [
			'records'	=>	$this->m_mahasiswa->select('tbl_mahasiswa')->result_array(),
			'style'		=>	$this->l_stylescript->style(),
			'script'	=>	$this->l_stylescript->script(),
			'title'		=>	"Halaman Depan Mahasiswa",
			'template'	=>	"mahasiswa/select",
		];
		$this->load->view('layouts/content/main', $data);
	}

	public function modal_detail_foto($id='') {
		$where['id']				=	$this->db->escape_str($id);
		$data['record']				=	$this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array();
		$data['record']['photo'] 	=	json_decode($data['record']['photo'], true);
		header('Content-type:application/json');
		echo json_encode($data, true); 
	}

	public function detail($id='') {
		$where['id'] 			 = $this->db->escape_str($id);
		$data = [
			'record'	=> 	$this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array(),
			'style'		=>	$this->l_stylescript->style(),
			'script'	=>	$this->l_stylescript->script(),
			'title'		=>	"Halaman Detail Mahasiswa",
			'template'	=>	"mahasiswa/detail"
		];
		$data['record']['photo'] = json_decode($data['record']['photo'], true);
		if(empty($where['id']) || empty($data['record']['id'])){
			$this->load->view('errors/html/error_404', $this->l_custom->not_found());
		}else{
			$this->load->view('layouts/content/main', $data);
		}
	}

	public function insert() {
		$data = [
			'jurusan'	=>	$this->l_custom->list(),
			'style'		=>	$this->l_stylescript->style(),
			'script'	=>	$this->l_stylescript->script(),
			'title'		=>	"Halaman Input Mahasiswa",
			'template'	=>	"mahasiswa/insert"
		];
		$this->load->view('layouts/content/main', $data);
	}

	public function insert_action() {
		$this->form_validation->set_rules('nim', 'Nim', 'required|is_unique[tbl_mahasiswa.nim]|max_length[11]|is_natural_no_zero');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if(!$this->form_validation->run()){
			$this->l_custom->alert('nim', form_error('nim'), 'alert-warning');
			$this->l_custom->alert('nama', form_error('nama'), 'alert-warning');
			$this->l_custom->alert('jurusan', form_error('jurusan'), 'alert-warning');
			$this->l_custom->alert('alamat', form_error('alamat'), 'alert-warning');
		}else{
			$data = [
				'nim'		=>	$this->db->escape_str($this->input->post('nim', true)),
				'nama'		=>	$this->db->escape_str($this->input->post('nama', true)),
				'jurusan'	=>	$this->db->escape_str($this->input->post('jurusan', true)),
				'alamat'	=>	$this->db->escape_str($this->input->post('alamat', true))
			];
			$this->m_mahasiswa->insert($data, 'tbl_mahasiswa');
			$this->l_custom->alert('success', 'Berhasil Disimpan!', 'alert-success');
		}
		redirect('mahasiswa/insert');
	}

	public function delete($id='') {
		$where['id'] 	= $this->db->escape_str($id);
		$data['record'] = $this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array();
		$data['record']['photo'] = json_decode($data['record']['photo'], true);
		if(empty($where['id']) || empty($data['record']['id'])){
			$this->load->view('errors/html/error_404', $this->l_custom->not_found());
		}else{
			echo json_encode($data['record']);
			$this->m_mahasiswa->delete($where, 'tbl_mahasiswa');

			// cek uri photo empty or not
			if(!empty($data['record']['photo']['name'])){
				$uri = explode('/', $data['record']['photo']['name']);
				$uri = array_pop($uri); // untuk mengambil url terakhir
			}

			// cek if photo is exists to empty data or update new
			if(file_exists(FCPATH.'/assets/photo/'.$uri)){
				unlink(FCPATH.'/assets/photo/'.$uri);
			}
			$this->l_custom->alert('success', 'Berhasil Disimpan!', 'alert-success');
			redirect('mahasiswa');
		}
	}

	public function update($id='') {
		$where['id'] 	= $this->db->escape_str($id);
		$data = [
			'record'	=> 	$this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array(),
			'jurusan'	=>	$this->l_custom->list(),
			'style'		=>	$this->l_stylescript->style(),
			'script'	=>	$this->l_stylescript->script(),
			'title'		=>	"Halaman Update Mahasiswa",
			'template'	=>	"mahasiswa/update"
		];
		if(empty($where['id']) || empty($data['record']['id'])){
			$this->load->view('errors/html/error_404', $this->l_custom->not_found());
		}else{
			$this->load->view('layouts/content/main', $data);
		}
	}

	public function update_action($id='') {
		$this->form_validation->set_rules('nim', 'Nim', 'required|max_length[11]|is_natural_no_zero');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_emails');
		$this->form_validation->set_rules('no_telp', 'No. Telp.', 'is_natural|min_length[3]|max_length[12]');
		if($this->form_validation->run() != true){
			$this->l_custom->alert('nim', form_error('nim'), 'alert-warning');
			$this->l_custom->alert('nama',  form_error('nama'), 'alert-warning');
			$this->l_custom->alert('jurusan', form_error('jurusan'), 'alert-warning');
			$this->l_custom->alert('alamat', form_error('alamat'), 'alert-warning');
			$this->l_custom->alert('email', form_error('email'), 'alert-warning');
			$this->l_custom->alert('no_telp', form_error('no_telp'), 'alert-warning');
		}else{
			$where['id'] 		=	$this->db->escape_str($id);
			$data				= [
				'nim'		=>	$this->db->escape_str($this->input->post('nim', true)),
				'nama'		=>	$this->db->escape_str($this->input->post('nama', true)),
				'jurusan'	=>	$this->db->escape_str($this->input->post('jurusan', true)),
				'alamat'	=>	$this->db->escape_str($this->input->post('alamat', true)),
				'email'		=>	$this->db->escape_str($this->input->post('email', true)),
				'no_telp'	=>	$this->db->escape_str($this->input->post('no_telp', true))
			];
			$byId['records']	=	$this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array();
			if(empty($where['id']) || empty($byId['records']['id'])){
				$this->load->view('errors/html/error_404', $this->l_custom->not_found());
			}else{
				$this->m_mahasiswa->update($where, $data, 'tbl_mahasiswa');
				$this->l_custom->alert('success', 'Berhasil disimpan!', 'alert-success');
			}
		}
		redirect('mahasiswa/update/'.$where['id']);
	}

	public function upload_photo($id='') {
		$where['id']				=	$this->db->escape_str($id);
		$photo['record'] 			= 	$this->m_mahasiswa->select_by_id($where, 'tbl_mahasiswa')->row_array();
		$photo['photo'] 			= 	json_decode($photo['record']['photo'], true);
		$config['upload_path']		=	'assets/photo/';
		$config['allowed_types']	=	'gif|jpg|jpeg|png';
		$config['overwrite']		=	true;
		$config['max_size']			=	2048;
		$config['max_width']		=	0;
		$config['max_height']		=	0;
		$config['encrypt_name']		= 	true;
		$config['file_name']		=	'img_'.date('YmdHis').'_'.$where['id'];
		$this->load->library('upload', $config);

		if(empty($where['id']) || empty($photo['record']['id'])){
			$this->load->view('errors/html/error_404', $this->l_custom->not_found());
		}else{
			if(!$this->upload->do_upload('photo')){ // sesuaikan pada form name
				$this->l_custom->alert('upload_foto', $this->upload->display_errors(), 'alert-warning');
			}else{
				$data = [
					'photo'	=>	json_encode([
						'name'	=> base_url().'assets/photo/'.$this->upload->data('file_name'),
						'mime'	=> $this->upload->data('file_type'),
						'blob'	=> $this->upload->data('full_path')
					], true)
				];
				$this->m_mahasiswa->update($where, $data, 'tbl_mahasiswa');

				// cek uri photo empty or not
				if(!empty($photo['photo']['name'])){
					$uri = explode('/', $photo['photo']['name']);
					$uri = array_pop($uri); // untuk mengambil url terakhir
				}

				// cek if photo is exists to empty data and update new
				if(file_exists(FCPATH.'/assets/photo/'.$uri)){
					unlink(FCPATH.'/assets/photo/'.$uri);
				}
				$this->l_custom->alert('success', 'Berhasil disimpan!', 'alert-success');
			}
			redirect(base_url().'mahasiswa/detail/'.$where['id']);
		}
	}
}
