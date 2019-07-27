<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipelaporan_model extends CI_Model
{
    public function gets()
    {
        return $this->db->get('tipe_laporan')->result_array();
    }

    public function gets_as_object()
    {
        return $this->db->get('tipe_laporan')->result();
    }

    public function get_namalaporan($id_tipe)
    {
        if ($id_tipe == NULL)
            return NULL;
        $ret = $this->db->get_where('tipe_laporan', array('id_tipe' => $id_tipe))->result();
        return $ret;
    }

    public function get_idtipe_by_kodetipe($namalaporan)
    {
        $ret = $this->db->get_where('tipe_laporan', array('kode_tipelaporan' => strtolower($namalaporan)))->result();
        if($ret != NULL)
            return $ret[0]->id_tipe;
        return NULL;
    }

}
