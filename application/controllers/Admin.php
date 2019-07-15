<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->sess_ver();
    }


    public function index()
    {
        $data['contents'] = 'admin/dashboard';
        $this->load->view('template/index_admin', $data);
    }

    public function f($formname)
    {
        $data['contents'] = file_get_contents(APPPATH . "libraries/formtemplate/$formname.php");
        $this->load->view('template/index_admin', $data);
    }

    private function sess_ver()
    {
        if ($this->session->tempdata() == NULL) {
            redirect('auth/login');
        }
    }
}

/* End of file Admin.php */
