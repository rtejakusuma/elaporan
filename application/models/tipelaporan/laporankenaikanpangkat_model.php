<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporankenaikanpangkat_model extends CI_Model
{
    public function get_data($id_laporan = NULL, $id_opd = NULL)
    {
        $ret = NULL;
        $temp = NULL;
        $this->db->select('laporan_kenaikan_pangkat.*, laporan_kenaikan_pangkat.id_opd,
         opd.nama_opd')->from('laporan_kenaikan_pangkat');
        if ($id_opd != NULL) { // per opd
            $this->db->where('laporan_kenaikan_pangkat.id_opd', $id_opd);
        }
        if ($id_laporan != NULL) { // laporan spesifik
            $this->db->where('laporan_kenaikan_pangkat.id_laporan', $id_laporan);
        }
        $this->db->join('laporan_kenaikan_pangkat_opd', 'laporan_kenaikan_pangkat.id_laporan = laporan_kenaikan_pangkat_opd.id_laporan')
            ->join('opd', 'opd.id_opd = laporan_kenaikan_pangkat_opd.id_opd');
        return $this->db->get()->result_array();
    }

    public function get_data_by_id($id)
    {
        $lkpdata = $this->db->get_where('laporan_kenaikan_pangkat', ['id_laporan' => $id])->result_array()[0];
        $lkpopddata = $this->db->select('laporan_kenaikan_pangkat_opd.*, opd.nama_opd')
            ->from('laporan_kenaikan_pangkat_opd')
            ->join('opd', 'opd.id_opd = laporan_kenaikan_pangkat_opd.id_opd')
            ->where('laporan_kenaikan_pangkat_opd.id_laporan', $id)
            ->order_by('nama_opd')
            ->get()->result_array();
        return array('laporankenaikanpangkat' => $lkpdata, 'lkpopd' => $lkpopddata);
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
        $this->db->insert('laporan_kenaikan_pangkat', $datalaporan);
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
                    'nomor' => $data['no'][$i],
                    'nama' => $data['nama'][$i]
                    'NIP' => $data['nip'][$i]
                    'Jabatan' => $data['jabatan'][$i]
                    'Instansi' => $data['Instansi'][$i]
                ));
            }
        }
        $this->db->trans_begin();
        if ($table == 'laporan_kenaikan_pangkat_opd') {
            $this->db->delete('laporan_kenaikan_pangkat_opd', "id_laporan = $id_laporan");
            activity_log();

            if ($data != NULL) {
                $this->db->insert_batch('laporan_kenaikan_pangkat_opd', $insdata);
                activity_log();
            }
        }
        $this->db->trans_complete();
    }

    public function delete_data($id_laporan)
    {
        $this->db->trans_begin();
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan_kenaikan_pangkat');
        activity_log();
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        activity_log();
        $this->db->trans_complete();
    }
}
