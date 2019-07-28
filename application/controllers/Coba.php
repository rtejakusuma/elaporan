<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{

    public function index()
    {
        $this->load->model('api_sipp_model');
        $data = $this->api_sipp_model->get_api('tahun','2020');
        $json = json_encode($data, JSON_PRETTY_PRINT);

        // return json_decode($json, true);
        
        printf("<pre>%s</pre>", $json);
        die();
    }

    public function fetchapi_realisasifisik()
    {
        $this->load->model('api_sipp_model', 'sipp');
        $this->load->model('opd_model', 'opd');
        // $idebud = $this->opd->get_idebud();
        // $tmp = array();
        $data = $this->sipp->get_api("tahun", "2020");
        if(!isset($data['data'])){
            echo "TIMEOUT<br/>";
            return;
        }
        $data = $data['data'];
        $this->load->model('tipelaporan/realisasifisik_model', 'rf');
        $this->load->model('laporan_model', 'lp');
        $this->load->model('tipelaporan_model', 'tl');

        $fet = array();
        foreach($data as $row){
            if(!isset($fet[$row['nama_opd']]))
                $fet[$row['nama_opd']] = array();
            array_push($fet[$row['nama_opd']], $row);
        }
        unset($data);
        $data_lp; $data_rf; $data_prog; $data_kg;
        // asumsi 1 opd 1 laporan
        foreach($fet as $dataperopd){
            unset($data_lp, $data_rf, $data_prog, $data_kg);
            $data_kg = [[]];
            $id_opd = $this->opd->get_id_from_ebud($dataperopd[0]['kode_opd']);
            if($id_opd == NULL){
                var_dump($dataperopd[0]['kode_opd'], $dataperopd[0]['nama_opd']);
                echo "<br/><br/>";
                continue;
            }
            $id_tipe = $this->tl->get_idtipe_by_kodetipe('realisasi_fisik');
            $data_lp = array(
                'id_opd' => $id_opd,
                'id_tipe' => $id_tipe,
            );
            // add to laporan
            $laporan_baru = $this->lp->add_data($data_lp);

            //add to realisasi_fisik
            $data_rf = array(
                'id_laporan' => $laporan_baru['id_laporan'],
                'id_opd' => $laporan_baru['id_opd'],
                'id_tipe' => $laporan_baru['id_tipe'],
                'created_at' => $laporan_baru['created_at'],
                'updated_at' => $laporan_baru['updated_at'],
            );
            $this->rf->insert_index($data_rf);

            // tabel program
            foreach($dataperopd as $d){
                $data_prog = array(
                    'id_laporan' => $laporan_baru['id_laporan'],
                    'kode_program' => $d['kode_program'],
                    'nama_program' => $d['nama_program'],
                    'capaian_indikator' => reset($d['capaian'])['indikator'],
                    'capaian_target' => reset($d['capaian'])['target'],
                    'capaian_target_rkpd' => reset($d['capaian'])['target_rkpd'],
                    'capaian_target_ppas_draft' => reset($d['capaian'])['target_ppas_draft'],
                    'capaian_target_ppas_final' => reset($d['capaian'])['target_ppas_final'],
                    'capaian_satuan' => reset($d['capaian'])['satuan'],
                ); 
                $this->rf->insert_program($data_prog);

                if(!isset($data_kg[$d['kode_program']]))
                    $data_kg[$d['kode_program']] = array();

                array_push($data_kg[$d['kode_program']], 
                    array(
                    'kode_kegiatan' => $d['kode_kegiatan'],
                    'kode_program' => $d['kode_program'],
                    'nama_kegiatan' => $d['nama_kegiatan'],
                    'pagu_renja' => $d['pagu_renja'],
                    'pagu_rkpd' => $d['pagu_rkpd'],
                    'pagu_ppas_draft' => $d['pagu_ppas_draft'],
                    'pagu_ppas_final' => $d['pagu_ppas_final'],
                    
                    'keluaran_indikator' => reset($d['keluaran'])['indikator'],
                    'keluaran_target' => reset($d['keluaran'])['target'],
                    'keluaran_target_rkpd' => reset($d['keluaran'])['target_rkpd'],
                    'keluaran_target_ppas_draft' => reset($d['keluaran'])['target_ppas_draft'],
                    'keluaran_target_ppas_final' => reset($d['keluaran'])['target_ppas_final'],
                    'keluaran_satuan' => reset($d['keluaran'])['satuan'],

                    'hasil_indikator' => reset($d['hasil'])['indikator'],
                    'hasil_target' => reset($d['hasil'])['target'],
                    'hasil_target_rkpd' => reset($d['hasil'])['target_rkpd'],
                    'hasil_target_ppas_draft' => reset($d['hasil'])['target_ppas_draft'],
                    'hasil_target_ppas_final' => reset($d['hasil'])['target_ppas_final'],
                    'hasil_satuan' => reset($d['hasil'])['satuan'],
                ));

                
            }
            $t=json_decode(json_encode($data_kg, JSON_PRETTY_PRINT), true);

            // tabel kegiatan
            foreach($t as $key => $value){
                if($value == NULL || sizeof($value) <= 0 || $value == [])
                    continue;
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
