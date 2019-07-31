<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasifisik_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('realisasi_fisik');
        if($id_opd != NULL){
            $this->db->where('realisasi_fisik.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('realisasi_fisik.id_laporan', $id_laporan);
        }
        $this->db->join('program', 'realisasi_fisik.id_laporan = program.id_laporan')
                    ->join('capaian', 'program.kode_program = capaian.kode_program')
                    ->join('kegiatan', 'program.kode_program = kegiatan.kode_program')
                    ->join('keluaran', 'kegiatan.kode_kegiatan = keluaran.kode_kegiatan')
                    ->join('hasil', 'kegiatan.kode_kegiatan = hasil.kode_kegiatan');
        
        return $this->db->get()->result_array();
    }

    public function get_data_by_id($id)
    {
        $rfdata = $this->db->get_where('realisasi_fisik', ['id_laporan' => $id])->result_array()[0];
        $progdata = $this->db->from('program')->like('kode_program', $id, 'after')->get()->result_array();
        $kgdata = array();
        foreach($progdata as $d){
            $kgdata[$d['kode_program']] = $this->db->from('kegiatan')->select('program.nama_program,kegiatan.*')
                    ->join('program', 'program.kode_program = kegiatan.kode_program')
                    ->like('kode_kegiatan', $d['kode_program'], 'after')->get()->result_array();
        }
        return array('rf' => $rfdata, 'prog' => $progdata, 'kg' => $kgdata);
        // printf("<pre>%s</pre>", json_encode($ret, JSON_PRETTY_PRINT)); die();
    }

    public function insert_fetch($data_rf, $data_prog, $data_kg)
    {
        $this->db->trans_begin();
        $this->db->insert('realisasi_fisik', $data_rf);
        $this->db->insert_batch('program', $data_prog);
        $this->db->insert_batch('kegiatan',$data_kg);
        $this->db->trans_complete();
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
        $this->db->insert('realisasi_fisik', $datalaporan);
        $this->load->model('api_sipp_model', 'sipp');
        $fet = $this->sipp->api_fetch_data($id_opd, $datalaporan,date('Y', strtotime($data['tgl'])));
        $this->db->insert_batch('program', $fet['prog']);
        $this->db->insert_batch('kegiatan',$fet['kg']);
        $this->db->trans_complete();
        return $datalaporan['id_laporan'];
    }

    public function update_data($id_laporan, $data)
    {
        $table = $data['nama_tabel'];
        unset($data['nama_tabel']);
        if($table == 'program'){
            $this->db->update($table, $data, "kode_program like '$id_laporan'");
        } else if($table == 'kegiatan'){
            $this->db->update($table, $data, "kode_kegiatan like '$id_laporan'");
        }
    }

    public function insert_program($data)
    {
        if($this->db->get_where('program', ['kode_program' => $data['kode_program']])->result_array() != NULL){
            // $this->db->update('program', ['kode_program' => $data['kode_program']]);
        } else {
             $this->db->insert('program', $data);
        }
    }

    public function insert_kegiatan($data)
    {
        if($data == NULL || $data == []) return;
        $this->db->insert_batch('kegiatan',$data);
    }
}