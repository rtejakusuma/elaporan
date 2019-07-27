<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayananpublik_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('pelayanan_publik');
        if($id_opd != NULL){
            $this->db->where('pelayanan_publik.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('pelayanan_publik.id_laporan', $id_laporan);
        }
        $this->db->join('pelayanan_publik_opd', 'pelayanan_publik.id_laporan = pelayanan_publik_opd.id_laporan')
                    ->join('opd', 'opd.id_opd = pelayanan_publik_opd.id_opd');
        
        return $this->db->get()->result();
    }
}