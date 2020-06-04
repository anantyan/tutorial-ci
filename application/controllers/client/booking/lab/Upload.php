<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->form_validation->set_rules('ini_deskripsi', 'Deskripsi', 'required');

        if(!$this->form_validation->run() || !isset($_FILES["ini_foto"])) {
            $response = [
                "error"         => true,
                "ini_foto"      => "Foto is required!",
                "ini_deskripsi" => form_error("ini_deskripsi")
            ];
        } else {
            $data       = [
                "ini_foto"      => new CURLFile($_FILES["ini_foto"]["tmp_name"], $_FILES["ini_foto"]["type"], $_FILES["ini_foto"]["name"]),
                "ini_deskripsi" => $this->input->post("ini_deskripsi", true)
            ];
            $url        = $this->l_client->url("upload_api");
            $response   = $this->l_client->post($url, $data);
        }
        header("Content-type:application/json");
        echo json_encode($response, true);
    }
}