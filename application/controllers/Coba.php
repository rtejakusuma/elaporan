<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{

    public function index()
    {
        $this->load->model('api_sipp_model');
        $data = $this->api_sipp_model->get_api('2020');
        $json = json_encode($data, JSON_PRETTY_PRINT);

        return json_decode($json, true);
        
        // printf("<pre>%s</pre>", $json);
        // die();
    }

    public function fetchkodeebud()
    {
        $data = $this->index()['data'];
        $ret = array();
        foreach($data as $row){
            if(!isset($ret[$row['kode_opd']]))
                $ret[$row['kode_opd']] = $row['nama_opd'];
        }
        $fet = array();
        foreach($ret as $key => $val){
            array_push($fet, array('kode_ebud' => $key, 'nama_opd' => $val));
        }
        $this->load->model('opd_model', 'opd');
        $this->opd->insert($fet);
        var_dump($this->opd->gets()); die();

    }

    public function fetchapi_realisasifisik()
    {
        $data = $this->index()['data'];

        $fieldindex = ['kode_opd', 'kode_program', 'nama_program', 'pagu_renja',
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
        $this->load->model('tipelaporan/realisasifisik_model', 'rf');
        $this->load->model('laporan_model', 'lp');
        $this->load->model('opd_model', 'opd');
        $this->load->model('tipelaporan_model', 'tl');
        
        $fet = array();
        foreach($data as $row){
            if(!isset($fet[$row['nama_opd']]))
                $fet[$row['nama_opd']] = array();
            array_push($fet[$row['nama_opd']], $row);
        }
        // asumsi 1 opd 1 laporan
        foreach($fet as $dataperopd){
            $id_opd = $this->opd->get_id_from_ebud($dataperopd[0]['kode_opd']);
            $id_tipe = $this->tl->get_idtipe_by_kodetipe('realisasi_fisik');
            $data = array(
                'id_opd' => $id_opd,
                'id_tipe' => $id_tipe,
            );
            // add to laporan
            $laporan_baru = $this->lp->add_data('realisasi_fisik', $data);

            //add to realisasi_fisik
            $data = array(
                'id_laporan' => $laporan_baru['id_laporan'],
                'id_opd' => $laporan_baru['id_opd'],
                'id_tipe' => $laporan_baru['id_tipe'],
                'created_at' => $laporan_baru['created_at'],
                'updated_at' => $laporan_baru['updated_at'],
            );
            $this->rf->insert_index($data);
            
            // tabel program
            foreach($dataperopd as $d){
                



            }

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
