<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ikm_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $ret = NULL; $temp = NULL;
        $this->db->select('ikm.*, opd.id_opd, opd.nama_opd')->from('ikm');
        if($id_opd != NULL){ // per opd
            $this->db->where('ikm.id_opd', $id_opd);
        }
        if($id_laporan != NULL){ // laporan spesifik
            $this->db->where('ikm.id_laporan', $id_laporan);
        }
        $this->db->join('ikm_opd', 'ikm.id_laporan = ikm_opd.id_laporan')
                    ->join('opd', 'opd.id_opd = ikm_opd.id_opd');
        return $this->db->get()->result_array();
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
        $this->db->insert('ikm', $datalaporan);
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