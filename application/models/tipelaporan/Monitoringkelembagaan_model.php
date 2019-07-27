<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoringkelembagaan_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('monitoring_kelembagaan');
        if($id_opd != NULL){
            $this->db->where('monitoring_kelembagaan.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('monitoring_kelembagaan.id_laporan', $id_laporan);
        }
        $this->db->join('permasalahan_kelembagaan', 'monitoring_kelembagaan.id_laporan = permasalahan_kelembagaan.id_laporan')
                    ->join('opd', 'opd.id_opd = permasalahan_kelembagaan.id_opd');
                    
        return $this->db->get()->result();
    }
}