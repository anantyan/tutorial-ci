<?php defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Mahasiswa_api extends RestController {

    protected $limits = 10000;
    
    public function __construct() {
        parent::__construct();
        $this->methods['index_get']['limit'] = $this->limits;
        $this->methods['index_delete']['limit'] = $this->limits;
        $this->methods['index_put']['limit'] = $this->limits;
        $this->methods['index_post']['limit'] = $this->limits;
        $this->methods['photo_post']['limit'] = $this->limits;
    }

    public function index_get($id = NULL) {
        $results = $this->m_mahasiswa->select('tbl_mahasiswa');
        $result = $this->m_mahasiswa->select_by_id(['id'=>$id], 'tbl_mahasiswa');
        $result['photo'] = json_decode($result['photo'], true); // decode directory link image dari json encode ke decode [1]
        $results_blank = []; // trick decode link image seperti [1]

        foreach ($results as $key => $value) {
            $results[$key]['photo'] = json_decode($value['photo'], true);
            $results_blank = $results;
        } // trick decode link image seperti [1]
        
        if ($id == NULL) {
            if ($results) {
                $this->response([
                    'status' => TRUE,
                    'results' => $results_blank
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Results not found'
                ], RestController::HTTP_NOT_FOUND);
            }
        } else {
            if ($result) {
                $this->response([
                    'status' => TRUE,
                    'result' => $result
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Result ID not found'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_delete($id = NULL) {
        $result_count = $this->m_mahasiswa->delete(['id'=>$id], 'tbl_mahasiswa');

        if($id == NULL) {
            $this->response([
                'status' => FALSE,
                'message' => 'Bad request response delete ID'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if($result_count > 0) {
                $this->response([
                    'status' => TRUE,
                    'message' => $id.' Successfully delete'
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Result ID not found'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_put($id = NULL) {
        if($id == NULL) {
            $this->response([
                'status' => FALSE,
                'message' => 'Bad request response update ID'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            try {
                $this->form_validation->set_data($this->put());
                $this->form_validation->set_error_delimiters('', '');
                $this->form_validation->set_rules('nim', 'NIM', 'trim|is_unique[tbl_mahasiswa.nim]|numeric|required');
                $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
                $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|in_list[Teknik Informatika, Sistem Informasi, Teknologi Infomasi]|required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
                $this->form_validation->set_rules('no_telp', 'No. Telp.', 'trim|numeric|required');

                if (!$this->form_validation->run()) throw new Exception(validation_errors());

                $data = [
                    'nim' => $this->put('nim'),
                    'nama' => $this->put('nama'),
                    'jurusan' => $this->put('jurusan'),
                    'alamat' => $this->put('alamat'),
                    'email' => $this->put('email'),
                    'no_telp' => $this->put('no_telp'),
                    'update_at' => date('Y-m-d H:i:s')
                ];
                $result_count = $this->m_mahasiswa->update(['id'=>$id], $data, 'tbl_mahasiswa');

                if ($result_count > 0) {
                    $this->response([
                        'status' => TRUE,
                        'message' => $id.' Successfully update'
                    ], RestController::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'Response update fail'
                    ], 204);
                }
            } catch (\Throwable $th) {
                $pass = explode("\n", $th->getMessage());
                array_pop($pass);
                $this->response([
                    'status' => FALSE,
                    'message' => $pass,
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post() {
        try {
            $this->form_validation->set_data($this->post());
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('nim', 'NIM', 'trim|is_unique[tbl_mahasiswa.nim]|numeric|required');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|in_list[Teknik Informatika, Sistem Informasi, Teknologi Infomasi]|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
            $this->form_validation->set_rules('no_telp', 'No. Telp.', 'trim|numeric|required');

            if (!$this->form_validation->run()) throw new Exception(validation_errors());

            $data = [
                'nim' => $this->post('nim'),
                'nama' => $this->post('nama'),
                'jurusan' => $this->post('jurusan'),
                'alamat' => $this->post('alamat'),
                'email' => $this->post('email'),
                'no_telp' => $this->post('no_telp')
            ];
            $result_count = $this->m_mahasiswa->insert($data, 'tbl_mahasiswa');

            if ($result_count > 0) {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Successfully insert'
                ], RestController::HTTP_CREATED);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Response update fail'
                ], 204);
            }
        } catch (\Throwable $th) {
            $pass = explode("\n", $th->getMessage());
            array_pop($pass);
            $this->response([
                'status' => FALSE,
                'message' => $pass,
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function photo_post($id = NULL) {
		$photo['record'] 			= 	$this->m_mahasiswa->select_by_id(['id'=>$id], 'tbl_mahasiswa');
		$photo['photo'] 			= 	json_decode($photo['record']['photo'], TRUE);
		$config['upload_path']		=	'assets/photo/';
		$config['allowed_types']	=	'jpg|jpeg|png';
		$config['overwrite']		=	TRUE;
		$config['max_size']			=	2048;
		$config['max_width']		=	0;
		$config['max_height']		=	0;
		$config['encrypt_name']		= 	TRUE;
        $config['file_name']		=	'img_'.date('YmdHis').'_'.$id;
        $this->load->library('upload', $config); // upload photo

        if ($id == NULL) {
            $this->response([
                'status' => FALSE,
                'message' => 'Bad Request Response Select ID!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if (!$this->upload->do_upload('photo') || empty($photo['record']['id'])) {
                $this->response([
                    'status' => false,
                    'message' => 'Bad Request Response Update Photo!'
                ], RestController::HTTP_BAD_REQUEST);
            } else {
                $data = [
                    'photo'	=>	json_encode([
                        'name'	=> base_url().'assets/photo/'.$this->upload->data('file_name'),
                        'mime'	=> $this->upload->data('file_type')
                    ], TRUE)
                ];
                $uri = NULL;

                if (!empty($photo['photo'])){
                    $uri = explode('/', $photo['photo']['name']);
                    $uri = array_pop($uri); // untuk mengambil url terakhir
                } // cek $photo berisi foto

                if (!empty($uri)){
                    unlink(FCPATH.'/assets/photo/'.$uri);
                } // cek $uri berisi file foto

                if($this->m_mahasiswa->update(['id'=>$id], $data, 'tbl_mahasiswa') > 0) {
                    $this->response([
                        'status' => TRUE,
                        'message' => $id.' Successfully Update!'
                    ], RestController::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'ID Not Found!'
                    ], RestController::HTTP_NOT_FOUND);
                }
            }
        }
    }
}