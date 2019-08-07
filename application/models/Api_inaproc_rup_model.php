<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_inaproc_rup_model extends CI_Model
{
    public function get_api()
    {
        $url = "https://inaproc.lkpp.go.id/isb/api/9e80f42a-7850-403f-b619-e33105f1e1a7/json/17864547/pengumumanruptahunan2018/tipe/4:12/parameter/2019:D179";

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            // API GAGAL
            return NULL;
        } else {
            // API BERHASIL
            $arr = json_decode($response, true);
            // $arr = $response;
            return $arr;
        }
    }

    public function get_rup()
    {
        $data = $this->get_api();
        printf("<pre>%s</pre>", json_encode($data, JSON_PRETTY_PRINT)); die();
    }
}

/* End of file Api_ekin_model.php */
