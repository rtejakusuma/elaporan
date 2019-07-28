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
        $data = $this->index();
        var_dump($data); die();
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
            $kegiatan = [[]];
            $id_opd = $this->opd->get_id_from_ebud($dataperopd[0]['kode_opd']);
            $id_tipe = $this->tl->get_idtipe_by_kodetipe('realisasi_fisik');
            $data = array(
                'id_opd' => $id_opd,
                'id_tipe' => $id_tipe,
            );
            // add to laporan
            $laporan_baru = $this->lp->add_data($data);

            //add to realisasi_fisik
            $data = array(
                'id_laporan' => $laporan_baru['id_laporan'],
                'id_opd' => $laporan_baru['id_opd'],
                'id_tipe' => $laporan_baru['id_tipe'],
                'created_at' => $laporan_baru['created_at'],
                'updated_at' => $laporan_baru['updated_at'],
            );
            $this->rf->insert_index($data);
            echo "TEST<br/><br/>";
            // tabel program
            foreach($dataperopd as $d){
                $data = array(
                    'id_laporan' => $laporan_baru['id_laporan'],
                    'kode_program' => $d['kode_program'],
                    'nama_program' => $d['nama_program'],
                    'capaian_indikator' => $d['capaian'][0]['indikator'],
                    'capaian_target' => $d['capaian'][0]['target'],
                    'capaian_target_rkpd' => $d['capaian'][0]['target_rkpd'],
                    'capaian_target_ppas_draft' => $d['capaian'][0]['target_ppas_draft'],
                    'capaian_target_ppas_final' => $d['capaian'][0]['target_ppas_final'],
                    'capaian_satuan' => $d['capaian'][0]['satuan'],
                ); 
                $this->rf->insert_program($data);

                if(!isset($kegiatan[$d['kode_program']]))
                    $kegiatan[$d['kode_program']] = NULL;
                array_push(
                $kegiatan[$d['kode_program']], array(
                    'kode_kegiatan' => $d['kode_kegiatan'],
                    'kode_program' => $d['kode_program'],
                    'nama_kegiatan' => $d['nama_kegiatan'],
                    'pagu_renja' => $d['pagu_renja'],
                    'pagu_rkpd' => $d['pagu_rkpd'],
                    'pagu_ppas_draft' => $d['pagu_ppas_draft'],
                    'pagu_ppas_final' => $d['pagu_ppas_final'],
                    
                    'keluaran_indikator' => $d['keluaran'][0]['indikator'],
                    'keluaran_target' => $d['keluaran'][0]['target'],
                    'keluaran_target_rkpd' => $d['keluaran'][0]['target_rkpd'],
                    'keluaran_target_ppas_draft' => $d['keluaran'][0]['target_ppas_draft'],
                    'keluaran_target_ppas_final' => $d['keluaran'][0]['target_ppas_final'],
                    'keluaran_satuan' => $d['keluaran'][0]['satuan'],

                    'hasil_indikator' => $d['hasil'][0]['indikator'],
                    'hasil_target' => $d['hasil'][0]['target'],
                    'hasil_target_rkpd' => $d['hasil'][0]['target_rkpd'],
                    'hasil_target_ppas_draft' => $d['hasil'][0]['target_ppas_draft'],
                    'hasil_target_ppas_final' => $d['hasil'][0]['target_ppas_final'],
                    'hasil_satuan' => $d['hasil'][0]['satuan'],
                ));

                
            }
            foreach($kegiatan as $key => $value){
                $this->rf->insert_kegiatan($value);
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
