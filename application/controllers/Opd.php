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
    }

    public function get_tipesurat($id_opd)
    {
        $this->load->model('tipesurat_model', 'ts');
        $this->load->model('tipesuratopd_model', 'tso');
        $idtipe = $this->tso->get_idtipe_per_opd($id_opd);
        $this->tipesurat = array();
        foreach ($idtipe as $id) {
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

    private function sess_ver()
    {
        if ($this->session->tempdata() == NULL) {
            redirect('auth/login');
        }
    }
}

/* End of file Opd.php */
