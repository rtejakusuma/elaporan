<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('disposisi')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('disposisi', $data);
    }
}

/* End of file Disposisi_model.php */
