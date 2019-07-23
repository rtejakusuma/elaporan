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
}
