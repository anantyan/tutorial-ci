<?php defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_mahasiswa');
        $this->load->helper('security');
    }

    public function mahasiswa_get($id=null) {
        // $id = $this->db->escape_str(xss_clean($this->get('id')));
        if($id == null) {
            $data = $this->m_mahasiswa->select('tbl_mahasiswa')->result_array();
        } else {
            $data = $this->m_mahasiswa->select_by_id(['id'=>$id], 'tbl_mahasiswa')->result_array();
        }
        if($data) {
            $this->response([
                'status' => true,
                'data' => $data
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'ID Not Found!'
            ], 404);
        }
    }

    public function mahasiswa_delete($id=null) {
        // $id = $this->db->escape_str(xss_clean($this->delete('id')));
        if($id == null) {
            $this->response([
                'status' => false,
                'message' => 'Bad Request Response Delete ID!'
            ], 400);
        } else {
            if($this->m_mahasiswa->delete(['id'=>$id], 'tbl_mahasiswa') > 0) {
                $this->response([
                    'status' => true,
                    'message' => $id.' Successfully Delete!'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'ID Not Found!'
                ], 404);
            }
        }
    }

    public function mahasiswa_put($id=null) {
        $data = [
            'nim' => $this->db->escape_str(xss_clean($this->put('nim'))),
            'nama' => $this->db->escape_str(xss_clean($this->put('nama'))),
            'jurusan' => $this->db->escape_str(xss_clean($this->put('jurusan'))),
            'alamat' => $this->db->escape_str(xss_clean($this->put('alamat'))),
            'email' => $this->db->escape_str(xss_clean($this->put('email'))),
            'no_telp' => $this->db->escape_str(xss_clean($this->put('no_telp'))),
        ];
        if($id == null) {
            $this->response([
                'status' => false,
                'message' => 'Bad Request Response Update ID!'
            ], 400);
        } else {
            if($this->m_mahasiswa->update(['id'=>$id], $data, 'tbl_mahasiswa') > 0) {
                $this->response([
                    'status' => true,
                    'message' => $id.' Successfully Update!'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'ID Not Found!'
                ], 404);
            }
        }
    }

    public function mahasiswa_post() {
        $data = [
            'nim' => $this->db->escape_str(xss_clean($this->post('nim'))),
            'nama' => $this->db->escape_str(xss_clean($this->post('nama'))),
            'jurusan' => $this->db->escape_str(xss_clean($this->post('jurusan'))),
            'alamat' => $this->db->escape_str(xss_clean($this->post('alamat'))),
            'email' => $this->db->escape_str(xss_clean($this->post('email'))),
            'no_telp' => $this->db->escape_str(xss_clean($this->post('no_telp')))
        ];
        if($this->m_mahasiswa->insert($data, 'tbl_mahasiswa') > 0) {
            $this->response([
                'status' => true,
                'message' => 'Successfully Insert!'
            ], 201);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Bad Request Response Insert Data!'
            ], 400);
        }
    }

    public function mahasiswa_photo_post($id=null) {
		$photo['record'] 			= 	$this->m_mahasiswa->select_by_id(['id'=>$id], 'tbl_mahasiswa')->row_array();
		$photo['photo'] 			= 	json_decode($photo['record']['photo'], true);
		$config['upload_path']		=	'assets/photo/';
		$config['allowed_types']	=	'jpg|jpeg|png';
		$config['overwrite']		=	true;
		$config['max_size']			=	2048;
		$config['max_width']		=	0;
		$config['max_height']		=	0;
		$config['encrypt_name']		= 	true;
        $config['file_name']		=	'img_'.date('YmdHis').'_'.$id;
        $this->load->library('upload', $config); // upload photo

        if($id == null) {
            $this->response([
                'status' => false,
                'message' => 'Bad Request Response Select ID!'
            ], 400);
        } else {
            if(!$this->upload->do_upload('photo') || empty($photo['record']['id'])) {
                $this->response([
                    'status' => false,
                    'message' => 'Bad Request Response Update Photo!'
                ], 400);
            } else {
                $data = [
                    'photo'	=>	json_encode([
                        'name'	=> base_url().'assets/photo/'.$this->upload->data('file_name'),
                        'mime'	=> $this->upload->data('file_type'),
                        'blob'	=> $this->upload->data('full_path')
                    ], true)
                ];
                $uri = null;
                if(!empty($photo['photo'])){
                    $uri = explode('/', $photo['photo']['name']);
                    $uri = array_pop($uri); // untuk mengambil url terakhir
                } // cek $photo berisi foto
                if(!empty($uri)){
                    unlink(FCPATH.'/assets/photo/'.$uri);
                } // cek $uri berisi file foto
                if($this->m_mahasiswa->update(['id'=>$id], $data, 'tbl_mahasiswa') > 0) {
                    $this->response([
                        'status' => true,
                        'message' => $id.' Successfully Update!'
                    ], 200);
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'ID Not Found!'
                    ], 404);
                }
            }
        }
    }
}