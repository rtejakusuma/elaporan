<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_Model
{
    public function gets()
    {
        return $this->db->select('surat')->result();
    }

    public function get_allsurat($page_number, $id_opd=NULL, $limit=20)
    {
        if($id_opd == NULL || $id_opd == '1'){
            $this->db->select('id_surat, nama_opd, nama_surat, created_at')
                        ->from('surat')
                        ->join('tipe_surat', 'surat.id_tipe = tipe_surat.id_tipe')
                        ->join('opd', 'surat.id_opd = opd.id_opd')
                        ->order_by('created_at', 'desc')
                        ->limit($limit, ($page_number-1) * $limit);
        } else {
            $this->db->select('id_surat, nama_opd, nama_surat, created_at')
                    ->from('surat')
                    ->where('surat.id_opd = ' . $id_opd)
                    ->join('tipe_surat', 'surat.id_tipe = tipe_surat.id_tipe')
                    ->join('opd', 'surat.id_opd = opd.id_opd')
                    ->order_by('created_at', 'desc')
                    ->limit($limit, ($page_number-1) * $limit);    
        }
        return $this->db->get()->result();
    }

    public function search($cond)
    {
        $this->db->from('surat');
        foreach($cond as $key => $value){
            if($key != "start_date" && $key != "end_date" && $value != NULL)
                $this->db->where("surat.$key = $value");
        }
        // check date
        if(strtotime($cond['start_date']) > strtotime($cond['end_date'])){
            $tmp = $cond['start_date'];
            $cond['start_date'] = $cond['end_date'];
            $cond['end_date'] = $tmp;
        }
        $this->db->where("created_at >= ", $cond['start_date'] . ' 00:00:00')
                    ->where("created_at <= ", $cond['end_date'] . ' 23:59:59');
        $this->db->join('tipe_surat', 'tipe_surat.id_tipe = surat.id_tipe');
        // var_dump($this->db->get()->result()); die();
        return $this->db->get()->result();
    }

    public function get_idtipe_by_idsurat($id)
    {
        $ret = $this->db->get_where('surat', array('id_surat' => $id))->result();
        if($ret != NULL)
            return $ret[0]->id_tipe;
        return NULL;
    }

    public function get_surat($id) // get Surat berdasarkan ID Surat
    {
        $table = $this->get_tipe_surat($id);
        $temp = $this->db->get($table)->row_array();
        if ($temp == NULL) {
            return -1; // error code
        }
        return $temp;
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('surat', array('id_surat' => $id))->result()[0]->id_tipe;
    }

    public function get_tipe_surat($id)
    {
        $res = $this->get_by_id($id);
        return $this->_get_nama_surat($res);
    }

    public function get_fielddata($name)
    {
        return $this->db->field_data($name);
    }

    public function get_surat_data($id)
    {
        $tipe = $this->get_tipe_surat($id);
        return $this->db->get_where($tipe, array('id_surat' => $id))->result[0];
    }

    private function _get_nama_surat($id)
    {
        $temp = $this->db->get_where('tipe_surat', array('id_tipe' => $id))->result();
        return $temp[0]->nama_surat;
    }

    public function add_data($namasurat, $data)
    {
        var_dump($namasurat, $data); die();
        $this->db->insert($namasurat, $data);
        // redirect('opd','refresh');
    }

    public function update_data($id, $data)
    {
        $namasurat = $this->_get_nama_surat($id);
        $this->db->update($namasurat, $data, array('id_surat' => $id));
        // redirect('opd', 'refresh');
    }
}

/* End of file Surat_model.php */
