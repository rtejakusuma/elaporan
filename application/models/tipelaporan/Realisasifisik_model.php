<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasifisik_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('realisasi_fisik');
        if($id_opd != NULL){
            $this->db->where('realisasi_fisik.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('realisasi_fisik.id_laporan', $id_laporan);
        }
        $this->db->join('program', 'realisasi_fisik.id_laporan = program.id_laporan')
                    ->join('capaian', 'program.kode_program = capaian.kode_program')
                    ->join('kegiatan', 'program.kode_program = kegiatan.kode_program')
                    ->join('keluaran', 'kegiatan.kode_kegiatan = keluaran.kode_kegiatan')
                    ->join('hasil', 'kegiatan.kode_kegiatan = hasil.kode_kegiatan');
        
        return $this->db->get()->result_array();
    }

    public function insert_fetch($data_lp, $data_rf, $data_prog, $data_kg)
    {
        // var_dump($data_prog);
        $this->db->trans_begin();
        // $this->load->model('laporan_model', 'lp');
        // $this->lp->add_data($data_lp);
        $this->db->insert('realisasi_fisik', $data_rf);
        foreach(reset($data_prog) as $prog){
            if($this->db->get_where('program', ['kode_program' => $prog['kode_program']])->result_array() == NULL){
                $this->db->insert('program', $prog);
            }
        }
        foreach($data_kg as $key => $value){
            if($value == NULL || sizeof($value) <= 0 || $value == []) continue;
            $this->db->insert_batch('kegiatan',$value);
        }
        $this->db->trans_complete();
    }

    public function insert_index($data)
    {
        $this->db->insert('realisasi_fisik', $data);
    }

    public function insert_program($data)
    {
        if($this->db->get_where('program', ['kode_program' => $data['kode_program']])->result_array() != NULL){
            // $this->db->update('program', ['kode_program' => $data['kode_program']]);
        } else {
             $this->db->insert('program', $data);
        }
    }

    public function insert_kegiatan($data)
    {
        if($data == NULL || $data == []) return;
        $this->db->insert_batch('kegiatan',$data);
    }
}