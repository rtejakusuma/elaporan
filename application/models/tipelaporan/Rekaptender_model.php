<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekaptender_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('rekap_tender');
        if($id_opd != NULL){
            $this->db->where('rekap_tender.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('rekap_tender.id_laporan', $id_laporan);
        }
        $this->db->join('detail_rekap_tender', 'rekap_tender.id_laporan = detail_rekap_tender.id_laporan')
                    ->join('paket_kerja', 'detail_rekap_tender.id_paket_kerja = paket_kerja.id_paket_kerja');
        
        return $this->db->get()->result();
    }
}