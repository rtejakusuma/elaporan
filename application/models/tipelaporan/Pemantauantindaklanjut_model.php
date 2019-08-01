<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemantauantindaklanjut_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('pemantauan_tindak_lanjut');
        if($id_opd != NULL){
            $this->db->where('pemantauan_tindak_lanjut.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('pemantauan_tindak_lanjut.id_laporan', $id_laporan);
        }
        $this->db->join('temuan', 'temuan.id_laporan = pemantauan_tindak_lanjut.id_laporan')
                    ->join('hasil_temuan', 'hasil_temuan.id_temuan = temuan.id_temuan');
        
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
        $this->db->insert('pemantauan_tindak_lanjut', $datalaporan);
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
        $table = $data['nama_tabel'];
        unset($data['nama_tabel']);
        $this->db->trans_begin();
        if($table == 'detail_rekap_tender'){
            $this->db->delete('detail_rekap_tender', "id_laporan = $id_laporan");
            $this->db->insert_batch('detail_rekap_tender', $data);
        }
        $this->db->trans_complete();
    }

    public function delete_data($id_laporan)
    {
        $this->db->trans_begin();
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('detail_rekap_tender');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('rekap_tender');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        $this->db->trans_complete();
    }
}