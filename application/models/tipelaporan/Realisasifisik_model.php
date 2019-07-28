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
        
        return $this->db->get()->result();
    }

    public function insert_index($data)
    {
        $this->db->trans_start();
        $this->db->insert('realisasi_fisik', $data);
    }

    public function insert_program($data)
    {
        $this->db->insert($data);
    }

    public function insert_kegiatan($data)
    {
        $this->db->insert($data);
        $this->db->trans_complete();
    }
}