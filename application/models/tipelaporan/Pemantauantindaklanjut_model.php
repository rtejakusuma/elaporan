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
}