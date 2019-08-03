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
        $temuandata = $this->db->get_where('temuan', "id_laporan = $id")->result_array();
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
        $updata = array();
        
        $this->db->trans_begin();
        if($table == 'temuan'){
            if($data != NULL){
                $offset = sizeof($data['nama_temuan']);
                if(isset($data['id_temuan']) && $data['id_temuan'] != NULL){
                    $offset = sizeof($data['temuan']) - sizeof($data['id_temuan']);
                }
                // new data
                for($i = 0; $i < $offset; $i+=1){
                    array_push($insdata, array(
                                'id_laporan' => $id_laporan,
                                'nama_temuan' => $data['nama_temuan'][$i]
                    ));
                }
                if($insdata != NULL){
                    $this->db->insert_batch('temuan', $insdata);
                }
                
                // updated data
                if($offset != sizeof($data['nama_temuan'])){
                    for($i = $offset; $i < sizeof($data['nama_temuan']); $i+=1){
                        array_push($updata, array(
                                    'id_laporan' => $id_laporan,
                                    'id_temuan' => $data['id_temuan'][$i], 
                                    'nama_temuan' => $data['nama_temuan'][$i]
                        ));
                    }
                    $this->db->update_batch('temuan', $updata,'id_temuan');
                }
                
                // unused data
                if(isset($data['to_del']))
                    $this->db->where_in('id_temuan', $data['to_del'])->delete('temuan');
                
            } else {
                $this->db->delete('temuan', "id_laporan = $id_laporan");
            }
            
        } else if($table == 'hasil_temuan') {
            $tmp = $data['id_temuan'];
            unset($data['id_temuan']);
            if($data != NULL){
                foreach($tmp as $idx){
                    if(isset($data['rekomendasi'][$idx])){
                        array_push($insdata, array(
                                    'id_temuan' => $idx,
                                    'rekomendasi' => $data['rekomendasi'][$idx],
                                    'status_rekomendasi' => $data['status_rekomendasi'][$idx],
                                    'tindak_lanjut' => $data['tindak_lanjut'][$idx],
                                    'status_tindak_lanjut' => $data['status_tindak_lanjut'][$idx],
                                    'catatan_bpk' => $data['catatan_bpk'][$idx]
                        ));
                    }
                }
                $this->db->where_in('id_temuan', $tmp)
                            ->delete('hasil_temuan');
                $this->db->insert_batch('hasil_temuan', $insdata);
            }
        }
        $this->db->trans_complete();
    }

    public function delete_data($id_laporan)
    {
        $this->db->trans_begin();
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('pemantauan_tindak_lanjut');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        $this->db->trans_complete();
    }
}