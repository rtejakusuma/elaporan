<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipesuratopd_model extends CI_Model
{
    public function gets()
    {
        return $this->db->select('tipesurat_per_opd')->result();
    }

    public function get_tipesurat_per_opd($id_opd)
    {
        return $this->db->get_where('tipesurat_per_opd', array('id_opd' => $id_opd))->result();
    }

    public function update_tipesurat_per_opd($id_opd, $data)
    {
        $this->db->update('tipesurat_per_opd', $data, array('id_opd' => $id_opd));
    }

}

