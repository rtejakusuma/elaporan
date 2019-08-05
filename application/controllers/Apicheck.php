<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apicheck extends CI_Controller
{
    public function index()
    {
        echo '<a href="' . base_url('apicheck/sipp/tahun/2020') . '">SIPP</a><br>';
        echo '<a href="' . base_url('apicheck/sikd_serapan/2019/2') . '">SIKD SERAPAN</a><br>';
        echo '<a href="' . base_url('apicheck/sikd_lra/2019/1.0.18.01') . '">SIKD LRA</a><br>';
    }
    public function sipp($key = 'tahun', $val = '2020')
    {
        $this->load->model('api_sipp_model');
        $data = $this->api_sipp_model->get_api($key, $val);
        $json = json_encode($data, JSON_PRETTY_PRINT);

        printf('<pre>%s</pre>', $json);
    }

    public function sikd_serapan($tahun = '2019', $tw = '2')
    {
        $this->load->model('api_sikd_model');
        $data = $this->api_sikd_model->get_serapan($tahun, $tw);
        $json = json_encode($data, JSON_PRETTY_PRINT);

        printf('<pre>%s</pre>', $json);
    }

    public function sikd_lra($tahun, $kode_skpd)
    {
        $this->load->model('api_sikd_model');
        $data = $this->api_sikd_model->get_lra($tahun, $kode_skpd);
        $json = json_encode($data, JSON_PRETTY_PRINT);

        printf('<pre>%s</pre>', $json);
    }
}

/* End of file Apicheck.php */
