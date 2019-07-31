<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{

    public function index()
    {
        $this->load->model('api_sikd_model');
        $data = $this->api_sikd_model->get_api();
        $json = json_encode($data, JSON_PRETTY_PRINT);

        var_dump(json_decode($json, true));

        // printf("<pre>%s</pre>", $json);
        // die();
    }

    public function test()
    {
        $laporan_baru = array('id_laporan' => '318', 'id_opd' => '290', 'id_tipe' => '1');
        $id_opd = '290';
        $tahun = '2020';
        $this->load->model("tipelaporan/realisasifisik_model", 'tt');
        $this->tt->init_insert($id_opd, $laporan_baru, array('tgl' => '2020-09-09'));
        // $this->load->model('api_sipp_model', 'sipp');
        // $this->sipp->api_fetch_data($id_opd, $laporan_baru, $tahun);

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
