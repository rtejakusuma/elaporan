<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apicheck extends CI_Controller
{
    public function index()
    {
        echo '<a href="' . base_url('apicheck/sipp/tahun/2020') . '">SIPP</a><br>';
        echo '<a href="' . base_url('apicheck/sikd_serapan/2019/2') . '">SIKD SERAPAN</a><br>';
        echo '<a href="' . base_url('apicheck/sikd_lra/2019/1.18.01') . '">SIKD LRA</a><br>';
        echo '<a href="' . base_url('apicheck/ekin_pegawai') . '">MASTER AUDITOR</a><br>';
        echo '<a href="' . base_url('apicheck/ekin_pegawai/16') . '">AUDITOR BY ID</a><br>';
    }
    public function sipp($key = 'tahun', $val = '2020')
    {
        $this->load->model('api_sipp_model');
        $data = $this->api_sipp_model->get_api($key, $val);
        $json = json_encode($data['arr'], JSON_PRETTY_PRINT);

        printf('Data<pre>%s</pre>', $json);
    }

    public function sikd_serapan($tahun = '2019', $tw = '2')
    {
        $this->load->model('api_sikd_model');
        $data = $this->api_sikd_model->get_serapan($tahun, $tw);
        $json = json_encode($data['arr'], JSON_PRETTY_PRINT);

        printf('Data<pre>%s</pre>', $json);
    }

    public function sikd_lra($tahun, $kode_skpd)
    {
        $this->load->model('api_sikd_model');
        $data = $this->api_sikd_model->get_lra($tahun, $kode_skpd);
        $json = json_encode($data, JSON_PRETTY_PRINT);

        printf('Data<pre>%s</pre>', $json);
    }

    public function ekin_pegawai($kode_ekin)
    {
        if ($kode_ekin) {
            $this->load->model('api_ekin_model');
            $data = $this->api_ekin_model->get_peg($kode_ekin);
            $json = json_encode($data, JSON_PRETTY_PRINT);

            printf('Data<pre>%s</pre>', $json);
        } else {
            $this->load->model('api_ekin_model');
            $data = $this->api_ekin_model->get_api();
            $json = json_encode($data, JSON_PRETTY_PRINT);

            printf("Data<pre>%s</pre>", $json);
        }
    }
}

/* End of file Apicheck.php */
