<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{

    public function index()
    {
        $this->load->model('api_sipp_model');
        $data = $this->api_sipp_model->get_api('2020');
        $json = json_encode($data, JSON_PRETTY_PRINT);
        printf("<pre>%s</pre>", $json);
    }
}

/* End of file Coba.php */
