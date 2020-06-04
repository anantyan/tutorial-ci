<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class L_Client {

    protected $uri;

    public function __construct() {
        $this->uri = "http://localhost/tutorial-ci/";
    }

    public function get($url) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->uri.$url,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => "User Open Source",
            CURLOPT_FOLLOWLOCATION => true
        ]);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }

    public function post($url, $data) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->uri.$url,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => "User Open Source",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data
        ]);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }

    public function put($url, $data) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->uri.$url,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => "User Open Source",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => HTTP_BUILD_QUERY($data)
        ]);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }

    public function delete($url) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->uri.$url,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => "User Open Source",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "DELETE"
        ]);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }
}