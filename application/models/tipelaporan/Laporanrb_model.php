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
}