<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activitylog extends CI_Model
{

    public function save_log($data)
    {
        $this->db->insert('activitylog', $data);
        return $this->db->affected_rows();
    }
}

/* End of file Activitylog.php */
