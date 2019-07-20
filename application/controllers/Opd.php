<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends CI_Controller
{
    private $tipesurat;

    public function __construct()
    {
        parent::__construct();
        $this->sess_ver();
        $this->get_tipesurat($this->session->tempdata('id_opd'));
    }

    public function get_tipesurat($id_opd)
    {
        $this->load->model('tipesurat_model', 'ts');
        $this->load->model('tipesuratopd_model', 'tso');
        $idtipe = $this->tso->get_idtipe_per_opd($id_opd);
        $this->tipesurat = $this->ts->get_namasurat($idtipe); // id_tipe + nama_surat
    }

    public function get_list_tipesurat()
    {
        return $this->tipesurat;
    }

    public function index()
    {
        $data['contents'] = 'opd/dashboard';
        $data['sidebar'] = $this->tipesurat;
        $this->load->view('template/index_admin', $data);
    }

    public function f($formname)
    {
        $formname = str_replace(' ', '', strtolower($formname));
        $data['contents'] = file_get_contents(APPPATH . "views/formtemplate/$formname.php");
        $data['sidebar'] = $this->tipesurat;
        $this->load->view('template/index_admin', $data);
    }

    private function sess_ver()
    {
        if ($this->session->tempdata() == NULL) {
            redirect('auth/login');
        }
    }
}

/* End of file Opd.php */
