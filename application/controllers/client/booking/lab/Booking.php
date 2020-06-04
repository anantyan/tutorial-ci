<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "url disini!",
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => "User Open Source",
            CURLOPT_FOLLOWLOCATION => true,
        ]);
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);
    }

    public function post() {
        $data = [
            "field" => $this->input->post("field", true),
            "field" => $this->input->post("field", true)
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "url disini!",
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => "User Open Source",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data
        ]);
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);
    }

    public function put() {
        $data = [
            "field" => $this->input->get("field", true),
            "field" => $this->input->post("field", true)
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "url disini!",
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => "User Open Source",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => HTTP_BUILD_QUERY($data)
        ]);
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);
    }

    public function delete() {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "url disini!",
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => "User Open Source",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "DELETE"
        ]);
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);
    }
}