<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanrb_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('laporan_rb');
        if($id_opd != NULL){
            $this->db->where('laporan_rb.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('laporan_rb.id_laporan', $id_laporan);
        }
        $this->db->join('jenis_rb', 'jenis_rb.id_laporan = laporan_rb.id_laporan')
                    ->join('program_rb', 'program_rb.id_jenis_rb = jenis_rb.id_jenis_rb')
                    ->join('kegiatan_rb', 'kegiatan_rb.id_program_rb = program_rb.id_program_rb');
        
        return $this->db->get()->result();
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
        $this->db->insert('laporan_rb', $datalaporan);
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