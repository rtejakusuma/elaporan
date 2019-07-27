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
}