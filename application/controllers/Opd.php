<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->sess_ver();
    }


    public function index()
    {
        $this->load->view('opd/dashboard');
    }

    public function f($formname)
    {
        $data['contents'] = file_get_contents(APPPATH . "views/formtemplate/$formname.php");
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
