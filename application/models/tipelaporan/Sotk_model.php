<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sotk_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('sotk');
        if($id_opd != NULL){
            $this->db->where('sotk.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('sotk.id_laporan', $id_laporan);
        }
        $this->db->join('sotk_opd', 'sotk.id_laporan = sotk_opd.id_laporan')
                    ->join('opd', 'opd.id_opd = sotk_opd.id_opd');
        // var_dump($this->db->get_compiled_select()); die();
        return $this->db->get()->result();
    }
}