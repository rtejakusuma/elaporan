<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sotk_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('sotk');
        if($id_opd != NULL){
            $this->db->where('sotk.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('sotk.id_laporan', $id_laporan);
        }
        $this->db->join('sotk_opd', 'sotk.id_laporan = sotk_opd.id_laporan')
                    ->join('opd', 'opd.id_opd = sotk_opd.id_opd')
                    ->order_by('sotk.id_laporan', 'ASC');
        $res = $this->db->get()->result_array();
        $current_id = $res[0]['id_laporan'];
        $ret = [];
        foreach($res as $row){
            if($current_id != $row['id_laporan']){
                $current_id = $row['id_laporan'];
                $ret['id_laporan'] = $row['id_laporan'];
                $ret['id_opd'] = $row['id_opd'];
                $ret['id_tipe'] = $row['id_tipe'];
                $row['created_at'] = $row['created_at'];
                $row['updated_at'] = $row['updated_at'];
                $row['tahun'] = $row['tahun'];
                $row['sotk_opd'] = [];
            }

        }
    }
}