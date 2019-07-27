<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipelaporanopd_model extends CI_Model
{
    public function gets()
    {
        return $this->db->select('tipelaporan_per_opd')->result();
    }

    public function get_opd_namatipelaporan($id_opd=NULL)
    {
        if($id_opd != NULL){
            $this->db->select('id_opd, tipe_laporan.*')
                        ->from('tipelaporan_per_opd')
                        ->where('id_opd', $id_opd)
                        ->join('tipe_laporan', 'tipelaporan_per_opd.id_tipe = tipe_laporan.id_tipe'); 
        } else {
            $this->db->select('id_opd, tipe_laporan.*')
                        ->from('tipelaporan_per_opd')
                        ->join('tipe_laporan', 'tipelaporan_per_opd.id_tipe = tipe_laporan.id_tipe');
        }
        return $this->db->get()->result();
    }

    public function get_tipelaporan_by_idopd($id_opd)
    {
        $this->db->select('*')
                    ->from('tipelaporan_per_opd')
                    ->where('tipelaporan_per_opd.id_opd = ' . $id_opd)
                    ->join('tipe_laporan', 'tipelaporan_per_opd.id_tipe = tipe_laporan.id_tipe');
        return $this->db->get()->result();
    }

    public function get_idtipe_per_opd($id_opd)
    {
        $temp = $this->db->get_where('tipelaporan_per_opd', array('id_opd' => $id_opd))->result();
        $idtipe = array();
        foreach ($temp as $row) {
            array_push($idtipe, $row->id_tipe);
        }
        if (sizeof($idtipe) > 0)
            return $idtipe;
        else return NULL;
    }

    public function update_tipelaporan_per_opd($id_opd, $data)
    {
        $this->db->update('tipelaporan_per_opd', $data, array('id_opd' => $id_opd));
    }
}
