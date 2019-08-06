<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rbquickwins_model extends CI_Model
{

    public function get_data_by_id($id)
    {
        $rbdata = $this->db->get_where('laporan_rb', ['id_laporan' => $id])->result_array()[0];
        $rbqw = $this->db->order_by('rincian', 'ASC')->get_where('rb_prioritas', "id_laporan = $id")->result_array();
        $rbqws = array();
        if($rbqw != NULL){
            foreach($rbqw as $d){
                $rbqws[$d['id_rb_prioritas']] = $this->db->get_where('rb_prioritas_sasaran', "id_rb_prioritas = $d[id_rb_prioritas]")->result_array();
            }
        }
        $rbqwk = array();
        if($rbqws != NULL && sizeof($rbqws) > 0){
            foreach($rbqwk as $d){
                foreach($d as $k){
                    $rbqwk[$k['id_rb_prioritas_sasaran']] = $this->db->get_where('rb_prioritas_kegiatan', "id_rb_prioritas_sasaran = $k[id_rb_prioritas_sasaran]")->result_array();
                }
            }
        }
        return array('rb' => $rbdata, 'rbqw' => $rbqw, 'rbqws' => $rbqws, 'rbqwk' => $rbqwk);
    }

    public function init_insert($id_opd, $datalaporan, $data)
    {
        $this->db->trans_start();
        $this->load->model('laporan_model', 'lp');
        $this->db->insert('laporan', 
                    [
                        'id_opd' => $datalaporan['id_opd'],
                        'id_tipe' => $datalaporan['id_tipe'],
                        'created_at' => date('Y-m-d H:i:s', time()),
                        'updated_at' => date('Y-m-d H:i:s', time()),
                    ]);
        $this->db->order_by('updated_at', 'DESC');
        $datalaporan = $this->db->get_where('laporan', ['id_opd' => $datalaporan['id_opd'], 'id_tipe' => $datalaporan['id_tipe'],])->result_array()[0];
        $datalaporan['tgl'] = $data['tgl'];
        $this->db->insert('laporan_rb', $datalaporan);
        // insert second etc. table data here
        // no api
        // end
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return NULL;
        }
        return $datalaporan['id_laporan'];
    }

    public function update_data($id_laporan, $data)
    {
        $table = $data['nama_tabel'];
        unset($data['nama_tabel']);
        $insdata = array();
        $updata = array();
        
        $this->db->trans_begin();
        if($table == 'laporan_rb'){
            if($data != NULL){
                $this->db->update('laporan_rb', $data, "id_laporan = $id_laporan");
            }
        }
        elseif($table == 'rb_prioritas'){
            if($data != NULL){
                // new data
                for($i = 0; $i < sizeof(reset($data['new'])); $i+=1){
                    array_push($insdata, array(
                        'id_laporan' => $id_laporan,
                        'rincian' => $data['new']['rincian'][$i]
                    ));
                }
                if($insdata != NULL){
                    $this->db->insert_batch('rb_prioritas', $insdata);
                }
                unset($data['new']);
                
                // updated data
                if(isset($data['id_rb_prioritas'])){
                    for($i = 0; $i < sizeof($data['id_rb_prioritas']); $i+=1){
                        array_push($updata, array(
                                    'id_laporan' => $id_laporan,
                                    'id_rb_prioritas' => $data['id_rb_prioritas'][$i], 
                                    'rincian' => $data['rincian'][$i],
                        ));
                    }
                    $this->db->update_batch('rb_prioritas', $updata, 'id_rb_prioritas');
                }
                
                // unused data
                if(isset($data['to_del']))
                    $this->db->where_in('id_rb_prioritas', $data['to_del'])
                                ->delete('rb_prioritas');
                
            } else {
                $this->db->delete('rb_prioritas', "id_laporan = $id_laporan");
            }
            
        } else if($table == 'rb_prioritas_sasaran') {
            if($data != NULL){
                // new data
                for($i = 0; $i < sizeof(reset($data['new'])); $i+=1){
                    array_push($insdata, array(
                        'id_rb_prioritas' => $data['new']['id_rb_prioritas'][$i],
                        'sasaran' => $data['new']['sasaran'][$i],
                        'nama_program' => $data['new']['nama_program'][$i]
                    ));
                }
                
                if($insdata != NULL){
                    $this->db->insert_batch('rb_prioritas_sasaran', $insdata);
                }
                unset($data['new']);
                
                // updated data
                if(isset($data['id_rb_prioritas_sasaran'])){
                    for($i = 0; $i < sizeof($data['id_rb_prioritas_sasaran']); $i+=1){
                        array_push($updata, array(
                            'id_rb_prioritas_sasaran' => $data['id_rb_prioritas_sasaran'][$i],
                            'id_rb_prioritas' => $data['new']['id_rb_prioritas'][$i],
                            'sasaran' => $data['new']['sasaran'][$i],
                            'nama_program' => $data['new']['nama_program'][$i]
                        ));
                    }
                    $this->db->update_batch('_sasaran', $updata, 'id_rb_prioritas_sasaran');
                }
                
                // unused data
                if(isset($data['to_del']))
                    $this->db->where_in('id_rb_prioritas_sasaran', $data['to_del'])
                                ->delete('rb_prioritas_sasaran');
                
            } else {
                // $this->db->delete('rb_prioritas', "id_laporan = $id_laporan");
            }
        } else if($table == 'rb_prioritas_kegiatan') {
            $tmp = $data['id_rb_prioritas_sasaran'];
            unset($data['id_rb_prioritas_sasaran']);
            if($data != NULL){
                foreach($tmp as $idx){
                    
                    if(isset($data['nama_kegiatan'][$idx])){
                        
                        for($i=0; $i < sizeof($data['nama_kegiatan'][$idx]); $i+=1){
                            array_push($insdata, array(
                                        'id_rb_prioritas_sasaran' => $idx,
                                        'nama_kegiatan' => $data['nama_kegiatan'][$idx][$i],
                                        'indikator'=> $data['indikator'][$idx][$i],
                                        'target_output'=> $data['target_output'][$idx][$i],
                                        'realisasi_output'=> $data['realisasi_output'][$idx][$i],
                                        'target_waktu'=> $data['target_waktu'][$idx][$i],
                                        'realisasi_waktu'=> $data['realisasi_waktu'][$idx][$i],
                                        'target_anggaran'=> $data['target_anggaran'][$idx][$i],
                                        'realisasi_anggaran'=> $data['realisasi_anggaran'][$idx][$i],
                                        'capaian'=> $data['capaian'][$idx][$i],
                                        'ket'=> $data['ket'][$idx][$i]
                            ));
                        }
                        
                    }
                }
                // var_dump($insdata); die();
                $this->db->where_in('id_rb_prioritas_sasaran', $tmp)
                            ->delete('rb_prioritas_kegiatan');
                            // printf("<pre>%s</pre>", json_encode($insdata, JSON_PRETTY_PRINT)); die();
                if($insdata != NULL)
                    $this->db->insert_batch('rb_prioritas_kegiatan', $insdata);
            }
        }
        $this->db->trans_complete();
    }

    public function delete_data($id_laporan)
    {
        $this->db->trans_begin();
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan_rb');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        $this->db->trans_complete();
    }
}