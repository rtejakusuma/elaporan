<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dbf_model extends CI_Model
{
    public function get_tipelaporan_per_opd($id = NULL)
    {
        $this->db->from('tipelaporan_per_opd');
        $this->db->join('opd', 'tipelaporan_per_opd.id_opd = opd.id_opd', 'left');
        $this->db->join('tipe_laporan', 'tipe_laporan.id_tipe = tipelaporan_per_opd.id_tipe', 'left');

        if ($id) {
            $this->db->where('tipelaporan_per_opd.id_opd = ', $id);
        }

        return $this->db->get()->result_array();
    }

    public function del_tipelaporan_per_opd($id)
    {
        foreach ($id as $id_tipe) {
            $this->db->or_where('tipelaporan_per_opd.id_tipe !=', $id_tipe);
        }
        return $this->db->delete('tipelaporan_per_opd');
    }

    public function get_opd($id = NULL)
    {
        $this->db->from('opd');
        $this->db->where('opd.id_opd != 1');

        if ($id) {
            $this->db->where('opd.id_opd = ', $id);
        }

        return $this->db->get()->result_array();
    }

    public function get_laporan($id = NULL)
    {
        $this->db->from('laporan');
        $this->db->join('opd', 'laporan.id_opd = opd.id_opd', 'left');
        $this->db->join('tipe_laporan', 'laporan.id_tipe = tipe_laporan.id_tipe', 'left');

        if ($id) {
            $this->db->where('laporan.id_laporan = ', $id);
        }

        return $this->db->get()->result_array();
    }

    public function get_user()
    {
        $this->db->from('user');
        $this->db->join('opd', 'opd.id_opd = user.id_opd', 'left');

        return $this->db->get()->result_array();
    }

    public function get_opd_tipe()
    {
        $data = $this->get_opd();

        $i = 0;
        foreach ($data as $row) {
            $tipe = $this->get_tipelaporan_per_opd($row['id_opd']);
            $data[$i]['tipe_laporan'] = array();

            foreach ($tipe as $push) {
                array_push($data[$i]['tipe_laporan'], $push);
            }

            $tipe = NULL;
            $i++;
        }

        return $data;
    }
}

/* End of file Dbf_model.php */
