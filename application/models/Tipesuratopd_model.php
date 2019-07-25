<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipesuratopd_model extends CI_Model
{
    public function gets()
    {
        return $this->db->select('tipesurat_per_opd')->result();
    }

    public function get_opd_namatipesurat($id_opd=NULL)
    {
        if($id_opd != NULL){
            $this->db->select('id_opd, tipe_surat.*')
                        ->from('tipesurat_per_opd')
                        ->where('id_opd', $id_opd)
                        ->join('tipe_surat', 'tipesurat_per_opd.id_tipe = tipe_surat.id_tipe'); 
        } else {
            $this->db->select('id_opd, tipe_surat.*')
                        ->from('tipesurat_per_opd')
                        ->join('tipe_surat', 'tipesurat_per_opd.id_tipe = tipe_surat.id_tipe');
        }
        return $this->db->get()->result();
    }

    public function get_tipesurat_by_idopd($id_opd)
    {
        $this->db->select('*')
                    ->from('tipesurat_per_opd')
                    ->where('tipesurat_per_opd.id_opd = ' . $id_opd)
                    ->join('tipe_surat', 'tipesurat_per_opd.id_tipe = tipe_surat.id_tipe');
        return $this->db->get()->result();
    }

    public function get_idtipe_per_opd($id_opd)
    {
        $temp = $this->db->get_where('tipesurat_per_opd', array('id_opd' => $id_opd))->result();
        $idtipe = array();
        foreach ($temp as $row) {
            array_push($idtipe, $row->id_tipe);
        }
        if (sizeof($idtipe) > 0)
            return $idtipe;
        else return NULL;
    }

    public function update_tipesurat_per_opd($id_opd, $data)
    {
        $this->db->update('tipesurat_per_opd', $data, array('id_opd' => $id_opd));
    }
}
