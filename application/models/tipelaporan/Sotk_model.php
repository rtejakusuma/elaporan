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

    public function init_insert($id_opd, $datalaporan, $data)
    {
        $this->db->trans_start();
        $this->load->model('laporan_model', 'lp');
        $this->db->insert('laporan', 
                    [
                        'id_opd' => $datalaporan['id_opd'],
                        'id_tipe' => $datalaporan['id_tipe'],
                        'created_at' => date('Y-m-d H:i:s', time()),
                        'updated_at' => date('Y-m-d H:i:s', time()),
                    ]);
        $this->db->order_by('updated_at', 'DESC');
        $datalaporan = $this->db->get_where('laporan', ['id_opd' => $datalaporan['id_opd'], 'id_tipe' => $datalaporan['id_tipe'],])->result_array()[0];
        $datalaporan['tgl'] = $data['tgl'];
        $this->db->insert('sotk', $datalaporan);
        // insert second etc. table data here

        // end
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return NULL;
        }
        return $datalaporan['id_laporan'];
    }

    public function update_data($id_laporan, $data)
    {
        
    }

}