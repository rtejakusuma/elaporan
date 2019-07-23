<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_model extends CI_Model
{
    public function get()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('opd', 'opd.id_opd = disposisi.surat_dari');
        return $this->db->get()->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('disposisi', $data);
    }
}

/* End of file Disposisi_model.php */
