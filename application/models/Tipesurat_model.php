<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipesurat_model extends CI_Model
{
    public function gets()
    {
        return $this->db->get('tipe_surat')->result();
    }

    public function get_namasurat($id_tipe)
    {
        if ($id_tipe == NULL)
            return NULL;
        $ret = $this->db->get_where('tipe_surat', array('id_tipe' => $id_tipe))->result();
        return $ret;
    }

    public function get_idtipe_by_kodetipe($namasurat)
    {
        $ret = $this->db->get_where('tipe_surat', array('kode_tipesurat' => strtolower($namasurat)))->result();
        if($ret != NULL)
            return $ret[0]->id_tipe;
        return NULL;
    }
}
