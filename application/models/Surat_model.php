<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_Model
{
    public function gets()
    {
        return $this->db->get_where('surat')->result();
    }

    public function get_surat($id)
    {
        return $this->db->get_where($this->_get_tipe_surat($id))->result();
    }

    private function _get_tipe_surat($id)
    {
        return $this->db->select('tipe_surat')->get_where('tipe_surat')->result();
    }
}

/* End of file Surat_model.php */
