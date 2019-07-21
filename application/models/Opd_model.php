<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd_model extends CI_Model
{
    public function gets()
    {
        return $this->db->get('opd')->result();
    }

    public function get_namaopd($id)
    {
        $ret = $this->db->get_where('opd', array('id_opd' => $id))->result();
        if($ret != NULL)
            return $ret[0]->nama_opd;
        else return NULL;
    }

}

