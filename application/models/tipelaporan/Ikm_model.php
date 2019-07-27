<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ikm_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('ikm');
        if($id_opd != NULL){
            $this->db->where('ikm.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('ikm.id_laporan', $id_laporan);
        }        
        $this->db->join('ikm_opd', 'ikm.id_laporan = ikm_opd.id_laporan')
                    ->join('opd', 'opd.id_opd = ikm_opd.id_opd');
        
        return $this->db->get()->result();
    }
}