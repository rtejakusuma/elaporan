<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekaptender_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('rekap_tender');
        if($id_opd != NULL){
            $this->db->where('rekap_tender.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('rekap_tender.id_laporan', $id_laporan);
        }
        $this->db->join('detail_rekap_tender', 'rekap_tender.id_laporan = detail_rekap_tender.id_laporan')
                    ->join('paket_kerja', 'detail_rekap_tender.id_paket_kerja = paket_kerja.id_paket_kerja');
        
        return $this->db->get()->result();
    }

    public function get_data_by_id($id)
    {
        $rtdata = $this->db->get_where('rekap_tender', ['id_laporan' => $id])->result_array()[0];
        $drtdata = $this->db->select('detail_rekap_tender.*, opd.nama_opd')
                            ->from('detail_rekap_tender')
                            ->join('opd', 'detail_rekap_tender.id_opd = opd.id_opd')
                            // ->join('paket_kerja', 'detail_rekap_tender.id_paket_kerja = paket_kerja.id_paket_kerja')
                            ->where('id_laporan', $id)->get()->result_array();
                            // var_dump($drtdata); die();
        return array('rt' => $rtdata, 'drt' => $drtdata);
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
        $this->db->insert('rekap_tender', $datalaporan);
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
        if($table == 'rekap_tender'){
            if($data != NULL){
                $this->db->update('rekap_tender', $data, "id_laporan = $id_laporan");
            }
        }
        elseif($table == 'detail_rekap_tender'){
            $tmp = $data['id_laporan'];
            unset($data['id_laporan']);
            if($data != NULL){
                foreach($tmp as $idx){
                    
                    if(isset($data['nilai_hps'][$idx])){
                        for($i=0; $i < sizeof($data['nilai_hps'][$idx]); $i += 1){
                            // if($data['rekomendasi'][$idx][$i] == "" && $data['status_rekomendasi'][$idx][$i]=="" &&$data['tindak_lanjut'][$idx][$i]==""&&
                            //     $data['status_tindak_lanjut'][$idx][$i]==""&&$data['catatan_bpk'][$idx][$i]==""
                            // )
                            //     continue;
                            array_push($insdata, array(
                                'id_laporan' => $idx,
                                'id_opd' => $data['id_opd'][$idx][$i],
                                // 'id_paket_kerja' => $data['id_paket_kerja'][$idx][$i],
                                'nilai_hps' => $data['nilai_hps'][$idx][$i],
                                'pemenang' => $data['pemenang'][$idx][$i],
                                'harga_kontrak' => $data['harga_kontrak'][$idx][$i],
                                'presentase_kontrak_thd_hps' => $data['presentase_kontrak_thd_hps'][$idx][$i],
                                'ket' => $data['ket'][$idx][$i]
                            ));
                        }
                        
                    }
                }
                $this->db->where_in('id_laporan', $tmp)
                            ->delete('detail_rekap_tender');
                            // printf("<pre>%s</pre>", json_encode($insdata, JSON_PRETTY_PRINT)); die();
                if($insdata != NULL)
                    $this->db->insert_batch('detail_rekap_tender', $insdata);
            }
            
        } 
        $this->db->trans_complete();
    }

    public function delete_data($id_laporan)
    {
        $this->db->trans_begin();
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('rekap_tender');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        $this->db->trans_complete();
    }


}