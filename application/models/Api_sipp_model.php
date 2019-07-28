<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_sipp_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');
    }


    public function get_api($key, $value)
    {
        $key = 'b64149c3ea867959207e933bb686c9ab41d3370b';
        $url = "http://eplanning.madiunkota.go.id/api/ws/ppas/final?$key=$value";

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-API-KEY: b64149c3ea867959207e933bb686c9ab41d3370b"
            ]
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            // API GAGAL
            return "cURL Error #:" . $err;
        } else {
            // API BERHASIL
            $arr = json_decode($response, true);
            return $arr;
        }
    }
}

/* End of file Api_sipp_model.php */
