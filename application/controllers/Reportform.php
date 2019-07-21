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

    public function f($formname) // create
    {
        $this->load->model('surat_model');
        $data['fielddata'] = $this->surat_model->get_fielddata($formname);
        $data['formname'] = $formname;
        $this->load->view('reportform', array('data' => $data));
    }

    public function e($id) // edit
    {
        $this->load->model('surat_model', 'surat');
        $data = $this->surat->get_surat_data($id);
        $this->load->view('reportform', array('data' => data));
    }

    public function submit($id = NULL)
    {
        $this->load->model('surat_model', 'surat');
        $data = $this->input->post();
        // metadata needed:
        // - nama tipe surat
        if ($id == NULL) { // new data
            $this->surat->add_data($data);
        } else { // editted data
            $this->surat->update_data($id, $data);
        }

        // redirect('opd','refresh');

    }

    private function sess_ver()
    {
        if ($this->session->tempdata() == NULL) {
            redirect('auth/login');
        }
    }
}
