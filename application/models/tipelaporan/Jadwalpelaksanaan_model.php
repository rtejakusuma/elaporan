<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwalpelaksanaan_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('jadwal_pelaksanaan');
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
}