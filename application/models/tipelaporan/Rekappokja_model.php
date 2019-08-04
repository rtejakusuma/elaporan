<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekappokja_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('rekap_pokja');
        if($id_opd != NULL){
            $this->db->where('rekap_pokja.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('rekap_pokja.id_laporan', $id_laporan);
        }
        $this->db->join('paket_kerja', 'rekap_pokja.id_laporan = paket_kerja.id_laporan');
        
        return $this->db->get()->result();
    }

    public function get_data_by_id($id)
    {
        $rpdata = $this->db->get_where('rekap_pokja', ['id_laporan' => $id])->result_array()[0];
        $drpdata = $this->db->get_where('detail_rekap_pokja', "id_laporan = $id")->result_array();
        $pkdata = array();
        if($drpdata != NULL){
            foreach($drpdata as $d){
                $pkdata[$d['id_detail_rekap_pokja']] = $this->db->get_where('paket_kerja', "id_detail_rekap_pokja = $d[id_detail_rekap_pokja]")->result_array();
            }
        }
        return array('rp' => $rpdata, 'drp' => $drpdata, 'pk' => $pkdata);
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
        $this->db->insert('rekap_pokja', $datalaporan);
        // insert second etc. table data here

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
        if($table == 'detail_rekap_pokja'){
            if($data != NULL){
                // new data
                if(isset($data['new'])){
                    foreach($data['new'] as $newdata){
                        if($newdata == "") continue;
                        array_push($insdata, array(
                                    'id_laporan' => $id_laporan,
                                    'nama' => $newdata['nama'],
                                    'jabatan' => $newdata['jabatan'],
                                    'ket' => $newdata['ket']
                        ));
                    }
                }
                if($insdata != NULL){
                    $this->db->insert_batch('detail_rekap_pokja', $insdata);
                }
                unset($data['new']);
                // updated data
                if($data['id_detail_rekap_pokja'] != NULL){
                    foreach($data['id_detail_rekap_pokja'] as $idx){
                        array_push($updata, array(
                                    'id_laporan' => $id_laporan,
                                    'id_detail_rekap_pokja' => $data['id_detail_rekap_pokja'][$idx], 
                                    'nama' => $data['nama'][$idx],
                                    'jabatan' => $data['jabatan'][$idx],
                                    'ket' => $data['ket'][$idx],
                        ));
                    }
                    $this->db->update_batch('detail_rekap_pokja', $updata,'id_detail_rekap_pokja');
                }
                
                // unused data
                if(isset($data['to_del']))
                    $this->db->where_in('id_detail_rekap_pokja', $data['to_del'])
                                ->delete('detail_rekap_pokja');
                
            } else {
                $this->db->delete('id_detail_rekap_pokja', "id_laporan = $id_laporan");
            }
        
        } else if($table == 'paket_kerja') {
            if($data != NULL){
                // new data 
                if(isset($data['new']) && isset($data['new']['id_detail_rekap_pokja'])){
                    $idx_drp = $data['new']['id_detail_rekap_pokja'];
                    foreach($data['new']['id_detail_rekap_pokja'] as $newdata){
                        if($newdata == "") continue;
                        array_push($insdata, array(
                                    'id_detail_rekap_pokja' => $id_laporan,
                                    'nama' => $newdata['nama'],
                                    'jabatan' => $newdata['jabatan'],
                                    'ket' => $newdata['ket']
                        ));
                    }
                }
                if($insdata != NULL){
                    $this->db->insert_batch('detail_rekap_pokja', $insdata);
                }
                unset($data['new']);
                // updated data
                if($data['id_detail_rekap_pokja'] != NULL){
                    foreach($data['id_detail_rekap_pokja'] as $idx){
                        array_push($updata, array(
                                    'id_laporan' => $id_laporan,
                                    'id_detail_rekap_pokja' => $data['id_detail_rekap_pokja'][$idx], 
                                    'nama' => $data['nama'][$idx],
                                    'jabatan' => $data['jabatan'][$idx],
                                    'ket' => $data['ket'][$idx],
                        ));
                    }
                    $this->db->update_batch('detail_rekap_pokja', $updata,'id_detail_rekap_pokja');
                }
                
                // unused data
                if(isset($data['to_del']))
                    $this->db->where_in('id_detail_rekap_pokja', $data['to_del'])
                                ->delete('detail_rekap_pokja');
                
            } else {
                $this->db->delete('id_detail_rekap_pokja', "id_laporan = $id_laporan");
            }
        
        }
        $this->db->trans_complete();
    }

    public function delete_data($id_laporan)
    {
        $this->db->trans_begin();
        // nunggu update pdm
        // cek pdm untuk memastikan keutuhan data
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('detail_rekap_pokja');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('rekap_pokja');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        $this->db->trans_complete();
    }

}