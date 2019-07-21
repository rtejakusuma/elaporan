<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_Model
{
    public function gets()
    {
        return $this->db->select('surat')->result();
    }

    public function get_surat($id) // get Surat berdasarkan ID
    {
        $table = $this->get_tipe_surat($id);
        $temp = $this->db->get($table)->row_array();
        if ($temp == NULL) {
            return -1; // error code
        }
        return $temp;
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('surat', array('id_surat' => $id))->result()[0]->id_tipe;
    }

    public function get_tipe_surat($id)
    {
        $res = $this->get_by_id($id);
        return $this->_get_nama_surat($res);
    }

    public function get_fielddata($name)
    {
        return $this->db->field_data($name);
    }

    public function get_surat_data($id)
    {
        $tipe = $this->get_tipe_surat($id);
        return $this->db->get_where($tipe, array('id_surat' => $id))->result[0];
    }

    private function _get_nama_surat($id)
    {
        $temp = $this->db->get_where('tipe_surat', array('id_tipe' => $id))->result();
        return $temp[0]->nama_surat;
    }

    public function add_data($namasurat, $data)
    {
        $this->db->insert($namasurat, $data);
        // redirect('opd','refresh');
    }

    public function update_data($id, $data)
    {
        $namasurat = $this->_get_nama_surat($id);
        $this->db->update($namasurat, $data, array('id_surat' => $id));
        // redirect('opd', 'refresh');
    }
}

/* End of file Surat_model.php */
