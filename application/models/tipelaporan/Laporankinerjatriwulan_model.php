<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporankinerjatriwulan_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('laporan_kinerja_triwulan');
        if($id_opd != NULL){
            $this->db->where('laporan_kinerja_triwulan.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('laporan_kinerja_triwulan.id_laporan', $id_laporan);
        }
        return $this->db->get()->result();
    }
}