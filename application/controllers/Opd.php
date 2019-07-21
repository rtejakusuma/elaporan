<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends CI_Controller
{
    private $tipesurat;
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->sess_ver();
        $this->get_tipesurat($this->session->tempdata('id_opd'));
        $this->data['sidebar'] = $this->tipesurat;
        $this->data['user'] = array(
                                'id_opd' => $this->session->tempdata('id_opd'),
                                'nama_opd' => $this->session->tempdata('nama_opd')
                                );
    }

    public function get_tipesurat($id_opd)
    {
        $this->load->model('tipesurat_model', 'ts');
        $this->load->model('tipesuratopd_model', 'tso');
        $idtipe = $this->tso->get_idtipe_per_opd($id_opd);
        $this->tipesurat = array();
        foreach($idtipe as $id){
            // var_dump($this->ts->get_namasurat($id)[0]); echo "<br/>";
            array_push($this->tipesurat, $this->ts->get_namasurat($id)[0]);
        }
    }

    public function get_list_tipesurat()
    {
        return $this->tipesurat;
    }

    public function index()
    {
        $this->data['contents'] = 'opd/dashboard';
        $this->load->view('template/index_admin', array('data' => $this->data));
    }

    public function f($formname)
    {
        $formname = str_replace(' ', '', strtolower($formname));
        $this->data['contents'] = file_get_contents(APPPATH . "views/formtemplate/$formname.php");
        $this->data['sidebar'] = $this->tipesurat;
        $this->load->view('template/index_admin', array('data' => $this->data));
    }

    public function e($id)
    {
        $this->load->model('surat_model', 'surat');
        $this->data['value'] = $this->surat->get_surat_data($id);
        $formname = $this->surat->get_tipe_surat($id);
        $this->data['contents'] = file_get_contents(APPPATH . "views/formtemplate/$formname.php");
        $this->data['sidebar'] = $this->tipesurat;
        $this->load->view('template/index_admin', array('data' => $this->data));
    }

    public function get_riwayat_laporan()
    {
        $id_opd = $this->session->tempdata('id_opd');
        $this->load->model('surat_model', 'surat');
        
    }

    private function sess_ver()
    {
        if ($this->session->tempdata() == NULL) {
            redirect('auth');
        }
    }
}

/* End of file Opd.php */
