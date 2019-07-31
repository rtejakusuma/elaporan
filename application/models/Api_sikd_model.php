<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_sikd_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');
    }


    public function get_api($tahun = '2019', $tw = '1')
    {
        $url = 'sikd.madiunkota.net/serapan/serapan' . $tahun . '/api/' . $tw;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            // API GAGAL
            return NULL;
        } else {
            // API BERHASIL
            $arr = json_decode($response, true);
            return $arr;
        }
    }

    public function get_tahunan($tahun = '2019')
    {
        //init
        $rawdata = $this->get_api('2019', '1'); // KALAU PRODUCTION GET_API()
        return $rawdata;
    }
}

/* End of file Api_sikd_model.php */
