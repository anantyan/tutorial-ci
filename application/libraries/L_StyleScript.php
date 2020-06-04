<?php

class L_StyleScript {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function style() {
        switch ($this->CI->uri->segment(1)) {
            case 'mahasiswa':
                return '<!-- DataTables -->
                <link rel="stylesheet" href="'.base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css").'">
                <link rel="stylesheet" href="'.base_url("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css").'">
                <!-- Select2 -->
                <link rel="stylesheet" href="'.base_url("assets/plugins/select2/css/select2.min.css").'">
                <link rel="stylesheet" href="'.base_url("assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css").'">';
                break;
            
            default:
                return '<!-- DataTables -->
                <link rel="stylesheet" href="'.base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css").'">
                <link rel="stylesheet" href="'.base_url("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css").'">
                <!-- Select2 -->
                <link rel="stylesheet" href="'.base_url("assets/plugins/select2/css/select2.min.css").'">
                <link rel="stylesheet" href="'.base_url("assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css").'">';
                break;
        }
    }    

    public function script() {
        switch ($this->CI->uri->segment(1)) {
            case 'mahasiswa':
                return '<!-- DataTables -->
                <script src="'.base_url("assets/plugins/datatables/jquery.dataTables.min.js").'"></script>
                <script src="'.base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js").'"></script>
                <script src="'.base_url("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js").'"></script>
                <script src="'.base_url("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js").'"></script>
                <!-- Select2 -->
                <script src="'.base_url("assets/plugins/select2/js/select2.full.min.js").'"></script>
                <!-- bs-custom-file-input -->
                <script src="'.base_url("assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js").'"></script>
                <script src="'.base_url("assets/dist/js/forMahasiswa.js").'"></script>';
                break;
            
            default:
                return '<!-- DataTables -->
                <script src="'.base_url("assets/plugins/datatables/jquery.dataTables.min.js").'"></script>
                <script src="'.base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js").'"></script>
                <script src="'.base_url("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js").'"></script>
                <script src="'.base_url("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js").'"></script>
                <!-- Select2 -->
                <script src="'.base_url("assets/plugins/select2/js/select2.full.min.js").'"></script>
                <!-- bs-custom-file-input -->
                <script src="'.base_url("assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js").'"></script>
                <script src="'.base_url("assets/dist/js/forMahasiswa.js").'"></script>';
                break;
        }
    }
}