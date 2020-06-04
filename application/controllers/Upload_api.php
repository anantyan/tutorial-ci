<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_api extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		$this->form_validation->set_rules('ini_deskripsi', 'Deskripsi', 'required');

        if(!$this->form_validation->run() || !isset($_FILES["ini_foto"])) {
            $data = [
                "error"         => true,
                "ini_foto"      => "Foto is required!",
                "ini_deskripsi" => form_error("ini_deskripsi")
            ];
        } else {
            $data = [
                "ini_deskripsi" => $this->input->post("ini_deskripsi", true)
            ];

            $config = [
                "upload_path"   => "assets/photo/",
                "allowed_types" => "gif|jpg|png",
                "overwrite"     => true,
                "max_size"      => 2048,
                "max_width"     => 0,
                "max_height"    => 0,
                "encrypt_name"  => true,
                "file_name"     => "img_".date("YmdHis")."_".$data["ini_deskripsi"] // optional
            ];

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('ini_foto')) {
                $data = [
                    "error"         => true,
                    "ini_foto"      => $this->upload->display_errors()
                ];
            } else {
                $data = [
                    "ini_foto"      => "http://localhost/tutorial-ci/assets/photo/".$this->upload->data("file_name"),
                    "ini_deskripsi" => $this->db->escape_str($data['ini_deskripsi'])
                ];

                // berlaku untuk update data untuk insert data belum bisa
                // cek uri photo empty or not
				/* if(!empty($data['ini_foto']['name'])){
					$uri = explode('/', $byId['photo']['name']);
					$uri = array_pop($uri); // untuk mengambil url terakhir
				} */

				// cek if photo is exists to empty data and update new
				/* if(file_exists(FCPATH.'/assets/photo/'.$uri)){
					unlink(FCPATH.'/assets/photo/'.$uri);
                } */
                
                $this->m_upload->insert($data, "tbl_upload");
            }
        }
        header("Content-type:application/json");
        echo json_encode($data, true);
    }
}