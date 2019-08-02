<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwalpelaksanaan_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->select("*")->from('jadwal_pelaksanaan');
        if($id_opd != NULL){
            $this->db->where('jadwal_pelaksanaan.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('jadwal_pelaksanaan.id_laporan', $id_laporan);
        }
        $this->db->join('jadwal_pelaksanaan_opd', 'jadwal_pelaksanaan.id_laporan = jadwal_pelaksanaan_opd.id_laporan')
                    ->join('opd', 'opd.id_opd = jadwal_pelaksanaan_opd.id_opd')
                    ->join('auditor', 'jadwal_pelaksanaan_opd.id_jadwal_pelaksanaan_opd = auditor.id_jadwal_pelaksanaan_opd');
        return $this->db->get()->result();
    }

    public function get_data_by_id($id)
    {
        $jpdata = $this->db->get_where('jadwal_pelaksanaan', ['id_laporan' => $id])->result_array()[0];
        $jpopddata = $this->db->select('jadwal_pelaksanaan_opd.*, opd.nama_opd')
                                ->from('jadwal_pelaksanaan_opd')
                                ->join('opd', 'jadwal_pelaksanaan_opd.id_opd = opd.id_opd')
                                ->order_by('nama_opd')
                                ->where('id_laporan', $id)->get()->result_array();
        $adata = array();
        if($jpopddata != NULL){
            foreach($jpopddata as $d){
                $adata[$d['id_jadwal_pelaksanaan_opd']] = $this->db->get_where('auditor', "auditor.id_jadwal_pelaksanaan_opd = $d[id_jadwal_pelaksanaan_opd]");
            }
        }
        return array('jp' => $jpdata, 'jpopd' => $jpopddata, 'adata' => $adata);
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
        $this->db->insert('jadwal_pelaksanaan', $datalaporan);
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
        if($data != NULL){
            for($i = 0; $i < sizeof(reset($data)); $i+=1){
                array_push($insdata, array(
                            'id_laporan' => $id_laporan,
                            'uraian' => $data['uraian'][$i],
                            'indikator_kinerja' => $data['indikator_kinerja'][$i],
                            'target' => $data['target'][$i],
                            'realisasi_target' => $data['realisasi_target'][$i],
                            'program' => $data['program'][$i],
                            'anggaran' => $data['anggaran'][$i],
                            'capaian_realisasi_keuangan' => $data['capaian_realisasi_keuangan'][$i],
                ));
            }
        }
        $this->db->trans_begin();
        if($table == 'jadwal_pelaksanaan_opd'){
            $this->db->update_batch('jadwal_pelaksanaan_opd', $data, "id_laporan = $id_laporan");
        } else if($table == 'auditor') {
            $this->db->update_batch('auditor', $data, "id_jadwal_pelaksanaan_opd = $id_laporan");
        }
        $this->db->trans_complete();
    }

    public function delete_data($id_laporan)
    {
        $this->db->trans_begin();
        // cek pdm / on delete cascade di tabel auditor / buat jadwal_pelaksanaan_opd have at least one (auditor strong entity)
        // $this->db->where('id_laporan', $id_laporan);
        // $this->db->delete('auditor');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('jadwal_pelaksanaan_opd');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('jadwal_pelaksanaan');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        $this->db->trans_complete();
    }
}