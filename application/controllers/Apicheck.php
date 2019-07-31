<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apicheck extends CI_Controller
{
    public function index()
    {
        echo '<a href="' . base_url('apicheck/sipp') . '">SIPP</a><br>';
        echo '<a href="' . base_url('apicheck/sikd') . '">SIKD</a><br>';
    }
    public function sipp($key = 'tahun', $val = '2020')
    {
        $this->load->model('api_sipp_model');
        $data = $this->api_sipp_model->get_api($key, $val);
        $json = json_encode($data, JSON_PRETTY_PRINT);

        printf("<pre>%s</pre>", $json);
    }

    public function sikd($tahun = '2019', $tw = '2')
    {
        $this->load->model('api_sikd_model');
        $data = $this->api_sikd_model->get_api($tahun, $tw);
        $json = json_encode($data, JSON_PRETTY_PRINT);

        printf("<pre>%s</pre>", $json);
    }
}

/* End of file Apicheck.php */
