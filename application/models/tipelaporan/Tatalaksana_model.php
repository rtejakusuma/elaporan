<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tatalaksana_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('tatalaksana');
        if($id_opd != NULL){
            $this->db->where('tatalaksana.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('tatalaksana.id_laporan', $id_laporan);
        }
        $this->db->join('tatalaksana_opd', 'tatalaksana.id_laporan = tatalaksana_opd.id_laporan')
                    ->join('opd', 'opd.id_opd = tatalaksana_opd.id_opd');

        return $this->db->get()->result();
    }
}