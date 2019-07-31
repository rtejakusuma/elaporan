<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Apicheck extends REST_Controller
{

    public function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    public function index()
    {
        echo '<a href="' . base_url('apicheck/sipp/tahun/2020') . '">SIPP</a><br>';
        echo '<a href="' . base_url('apicheck/sikd/2019/2') . '">SIKD</a><br>';
    }
    public function sipp($key = 'tahun', $val = '2020')
    {
        $this->load->model('api_sipp_model');
        $data = $this->api_sipp_model->get_api($key, $val);
        $json = json_encode($data, JSON_PRETTY_PRINT);

        $this->response(json_decode($json, true), 200);
    }

    public function sikd($tahun = '2019', $tw = '2')
    {
        $this->load->model('api_sikd_model');
        $data = $this->api_sikd_model->get_api($tahun, $tw);
        $json = json_encode($data, JSON_PRETTY_PRINT);

        $this->response(json_decode($json, true), 200);
    }
}

/* End of file Apicheck.php */
