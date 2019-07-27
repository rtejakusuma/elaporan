<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{

    public function index()
    {
        $this->load->model('api_sipp_model');
        $data = $this->api_sipp_model->get_api('2020');
        $json = json_encode($data);
        return json_decode($json, true);
        // printf("<pre>%s</pre>", $json);
    }

    public function fetchapidata()
    {
        $data = $this->index()['data'];

        $field = ['kode_opd', 'kode_program', 'nama_program', 'pagu_renja',
                'pagu_rkpd', 'pagu_ppas_draft', 'pagu_ppas_final'
                ];
        $fieldkeluaran = ['indikator', 'target', 'target_rkpd', 'target_ppas_draft',
                        'target_ppas_final', 'satuan'
                ];
        $fieldcapaian = ['indikator', 'target', 'target_rkpd', 'target_ppas_draft',
                    'target_ppas_final', 'satuan'
                ];
        $fieldhasil = ['indikator', 'target', 'target_rkpd', 'target_ppas_draft',
                'target_ppas_final', 'satuan'
                ];
        $this->load->model('realisasifisik_model', 'rf');
        
        foreach($data as $row){
            
        }
    }

    public function loaddata($table)
    {
        $table = strtolower($table);
        $this->load->model("tipelaporan/$table"."_model", 'tes');
        $res = $this->tes->get_data();
        var_dump($res);
        // printf("<pre>%s</pre>", json_encode($res, JSON_PRETTY_PRINT));
        die();
    }
}

/* End of file Coba.php */
