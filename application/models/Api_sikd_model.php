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
        $rawdata = $this->get_api($tahun, '1');

        //init data
        $data = array();
        foreach ($rawdata['data'] as $row) {
            array_push($data, ['kode_skpd' => $row['KODE_SKPD'], 'pagu' => $row['Pagu 1 Tahun']]);
            $data['tw'] = array();
            array_push($data['tw'], ['realisasi' => $row['realisasi sd Tw 1'], 'target' => $row['target sd Tw 1'], 'prosentase' => $row['prosentase']]);
        }

        // ini tw2/3/4
        for ($i = 2; $i < 4; $i++) {
            $rawdata = $this->get_api($tahun, $i);

            $idx = 0;
            foreach ($rawdata['data'] as $row) {
                array_push($data[$idx]['tw'], ['realisasi' => $row['realisasi sd Tw ' . $i], 'target' => $row['target sd Tw ' . $i], 'prosentase' => $row['prosentase']]);
                $idx++;
            }
        }

        return $data;
    }
}

/* End of file Api_sikd_model.php */
