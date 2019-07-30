<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd_model extends CI_Model
{
    public function gets()
    {
        $this->db->from('opd')->order_by('nama_opd','ASC');
        return $this->db->get()->result_array();
    }

    public function insert($data)
    {
        $this->db->insert_batch('opd', $data);
    }

    public function get_namaopd($id)
    {
        $ret = $this->db->get_where('opd', array('id_opd' => $id))->result();
        if ($ret != NULL)
            return $ret[0]->nama_opd;
        else return NULL;
    }

    public function get_idebud($id_opd = NULL, $nama_opd = NULL)
    {
        if($id_opd){
            $ret = $this->db->get_where('opd', ['id_opd' => $id_opd])->result_array();
            if($ret) return $ret[0]['kode_ebud'];
            else return NULL;
        } elseif($nama_opd) {
            $ret = $this->db->get_where('opd', ['nama_opd' => strtoupper($nama_opd)])->result_array();
            if($ret) return $ret[0]['id_ebud'];
            else return NULL;
        } else {
            $this->db->select('id_ebud')->from('opd');
            return $this->db->get()->result_array();
        }
    }

    public function get_idopd_by_name($name)
    {
        $ret = $this->db->get_where('opd', array('nama_opd' => $name))->result();
        if ($ret != NULL)
            return $ret[0]->nama_opd;
        else return NULL;
    }

    public function get_id_from_ebud($kode_ebud)
    {
        if($kode_ebud == NULL){
            return NULL;
        }
        $ret = $this->db->get_where('opd', ['kode_ebud' => $kode_ebud])->result_array();
        if($ret != NULL){
            return $ret[0]['id_opd'];
        }
        return NULL;
    }
}
