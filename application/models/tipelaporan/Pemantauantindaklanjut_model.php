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

    public function get_data_by_id($id)
    {
        $ptldata = $this->db->get_where('pemantauan_tindak_lanjut', ['id_laporan' => $id])->result_array()[0];
        $temuandata = $this->db->get_where('temuan', "id_laporan = $id")->get()->result_array();
        $htemuan = array();
        if($temuandata != NULL){
            foreach($temuandata as $d){
                $htemuan[$d['id_temuan']] = $this->db->get_where('hasil_temuan', "id_temuan = $d[id_temuan]");
            }
        }
        return array('ptl' => $ptldata, 'temuan' => $temuandata, 'htemuan' => $htemuan);
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
        $insdata = array();
        
        $this->db->trans_begin();
        if($table == 'temuan'){
            if($data != NULL){
                for($i = 0; $i < sizeof(reset($data)); $i+=1){
                    array_push($insdata, array(
                                'id_laporan' => $id_laporan,
                                'id_jadwal_pelaksanaan_opd' => $data['id_jadwal_pelaksanaan_opd'][$i], 
                                'id_opd' => $data['id_opd'][$i],
                                'jenis_pengawasan' => $data['jenis_pengawasan'][$i],
                                'rmp' => $data['rmp'][$i],
                                'rpl' => $data['rpl'][$i],
                                'otuput_lhp' => $data['output_lhp'][$i],
                                'hari_pengawasan' => $data['hari_pengawasan'][$i],
                                'keterangan' => $data['keterangan'][$i],
                    ));
                }
                $this->db->update_batch('jadwal_pelaksanaan_opd', $insdata, 'id_jadwal_pelaksanaan_opd');
                $this->db->where_not_in('id_jadwal_pelaksanaan_opd', $data['id_jadwal_pelaksanaan_opd']);
                $this->delete('jadwal_pelaksanaan_opd');
            } else {
                $this->db->delete('jadwal_pelaksanaan_opd', "id_laporan = $id_laporan");
            }
            
        } else if($table == 'auditor') {
            if($data != NULL){
                for($i = 0; $i < sizeof(reset($data)); $i+=1){
                    array_push($insdata, array(
                                'id_jadwal_pelaksanaan_opd' => $data['id_jadwal_pelaksanaan_opd'][$i],
                                'nama_auditor' => $data['nama_auditor'][$i],
                                'jabatan' => $data['jabatan'][$i]
                    ));
                }
                $this->db->update_batch('auditor', $insdata, "id_jadwal_pelaksanaan_opd");
            }
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