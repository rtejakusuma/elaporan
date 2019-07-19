<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportform extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->sess_ver();
    }


    public function index()
    {
        $this->load->view('reportform', array('formname' => NULL));
    }

    public function f($formname)
    {
        $this->load->model('surat_model');
        $data['fielddata'] = $this->surat_model->get_fielddata($formname);
        $data['formname'] = $formname;
        $this->load->view('reportform', array('data' => $data));
    }

    private function sess_ver()
    {
        if ($this->session->tempdata() == NULL) {
            redirect('auth/login');
        }
    }
}
