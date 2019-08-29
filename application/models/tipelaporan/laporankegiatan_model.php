<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporankegiatan_model extends CI_Model
{
    public function get_data($id_laporan = NULL, $id_opd = NULL)
    {
        $ret = NULL;
        $temp = NULL;
        $this->db->select('laporankegiatan.*, opd.id_opd, opd.nama_opd')->from('laporankegiatan');
        if ($id_opd != NULL) { // per opd
            $this->db->where('laporankegiatan.id_opd', $id_opd);
        }
        if ($id_laporan != NULL) { // laporan spesifik
            $this->db->where('laporankegiatan.id_laporan', $id_laporan);
        }
        $this->db->join('detail_laporankegiatan', 'laporankegiatan.id_laporan = detail_laporankegiatan.id_laporan')
            ->join('opd', 'opd.id_opd = detail_laporankegiatan.id_opd');
        return $this->db->get()->result_array();
    }

    public function get_data_by_id($id)
    {
        $laporankegiatandata = $this->db->get_where('laporankegiatan', ['id_laporan' => $id])->result_array()[0];
        $laporankegiatanopddata = $this->db->select('detail_laporankegiatan.*, opd.nama_opd')
            ->from('detail_laporankegiatan')
            ->join('opd', 'opd.id_opd = detail_laporankegiatan.id_opd')
            ->where('detail_laporankegiatan.id_laporan', $id)
            ->order_by('nama_opd')
            ->get()->result_array();
        return array('laporankegiatan' => $laporankegiatandata, 'laporankegiatanopd' => $laporankegiatanopddata);
    }

    public function init_insert($id_opd, $datalaporan, $data)
    {
        $this->db->trans_start();
        $this->load->model('laporan_model', 'lp');
        $this->db->insert(
            'laporan',
            [
                'id_opd' => $datalaporan['id_opd'],
                'id_tipe' => $datalaporan['id_tipe'],
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        );
        activity_log();
        $this->db->order_by('updated_at', 'DESC');
        $datalaporan = $this->db->get_where('laporan', ['id_opd' => $datalaporan['id_opd'], 'id_tipe' => $datalaporan['id_tipe'],])->result_array()[0];
        $datalaporan['tgl'] = $data['tgl'];
        $this->db->insert('laporankegiatan', $datalaporan);
        activity_log();
        // insert second etc. table data here
        // no api
        // end
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return NULL;
        }
        return $datalaporan['id_laporan'];
    }

    public function update_data($id_laporan, $data)
    {
        $table = $data['nama_tabel'];
        unset($data['nama_tabel']);
        $insdata = array();
        if ($data != NULL) {
            for ($i = 0; $i < sizeof(reset($data)); $i += 1) {
                array_push($insdata, array(
                    'id_laporan' => $id_laporan,
                    'id_opd' => $data['id_opd'][$i],
                    'kode_rekening' => $data['kode_rekening'][$i],
                    'program' => $data['program'][$i],
                    'uraian_kegiatan' => $data['uraian_kegiatan'][$i],
                    'pagu_anggaran' => $data['pagu_anggaran'][$i]
                ));
            }
        }
        $this->db->trans_begin();
        if ($table == 'detail_laporankegiatan') {
            $this->db->delete('detail_laporankegiatan', "id_laporan = $id_laporan");
            activity_log();

            if ($data != NULL) {
                $this->db->insert_batch('detail_laporankegiatan', $insdata);
                activity_log();
            }
        }
        $this->db->trans_complete();
    }

    public function delete_data($id_laporan)
    {
        $this->db->trans_begin();
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('detail_laporankegiatan');
        activity_log();
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        activity_log();
        $this->db->trans_complete();
    }
}
