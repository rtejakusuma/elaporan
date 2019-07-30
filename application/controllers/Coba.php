<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{

    public function index()
    {
        $this->load->model('api_sipp_model');
        $data = $this->api_sipp_model->get_api('tahun','2020');
        $json = json_encode($data, JSON_PRETTY_PRINT);

        return json_decode($json, true);
        
        // printf("<pre>%s</pre>", $json);
        // die();
    }

    public function lap($formname, $id)
    {
        $this->load->model('laporan_model', 'lp');
        $this->lp->get_laporan_data_by_name_id($formname, $id);
    } 

    public function loaddata()
    {
        $this->load->model('api_sipp_model', 'sipp');
        $this->sipp->api_fetchall_realisasifisik();
    }
}

/* End of file Coba.php */
