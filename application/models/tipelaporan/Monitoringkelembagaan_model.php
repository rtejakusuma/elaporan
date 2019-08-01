<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoringkelembagaan_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('monitoring_kelembagaan');
        if($id_opd != NULL){
            $this->db->where('monitoring_kelembagaan.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('monitoring_kelembagaan.id_laporan', $id_laporan);
        }
        $this->db->join('permasalahan_kelembagaan', 'monitoring_kelembagaan.id_laporan = permasalahan_kelembagaan.id_laporan')
                    ->join('opd', 'opd.id_opd = permasalahan_kelembagaan.id_opd');
                    
        return $this->db->get()->result();
    }

    public function get_data_by_id($id)
    {
        $mkdata = $this->db->get_where('monitoring_kelembagaan', ['id_laporan' => $id])->result_array()[0];
        $pkdata = $this->db->select('permasalahan_kelembagaan.*, opd.nama_opd')
                            ->from('permasalahan_kelembagaan')
                            ->join('opd', 'permasalahan_kelembagaan.id_opd = opd.id_opd')
                            ->where('id_laporan', $id)->get()->result_array();
        return array('mk' => $mkdata, 'pk' => $pkdata);
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
        $this->db->insert('monitoring_kelembagaan', $datalaporan);
        // insert second etc. table data here
        // no api
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
        $table = $data['nama_tabel'];
        unset($data['nama_tabel']);
        $this->db->trans_begin();
        if($table == 'permasalahan_kelembagaan'){
            $this->db->delete('permasalahan_kelembagaan', "id_laporan = $id_laporan");
            $this->db->insert_batch('permasalahan_kelembagaan', $data);
        }
        $this->db->trans_complete();
    }

    public function delete_data($id_laporan)
    {
        $this->db->trans_begin();
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('permasalahan_kelembagaan');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('monitoring_kelembagaan');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        $this->db->trans_complete();
    }
}