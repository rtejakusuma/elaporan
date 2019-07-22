<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->sess_ver();

        $this->data['user'] = array(
            'id_opd' => $this->session->tempdata('id_opd'),
            'nama_opd' => $this->session->tempdata('nama_opd')
        );
        $this->data['title'] = "E-Laporan " . strtoupper($this->session->tempdata('nama_opd'));
    }

    public function index()
    {
        $this->data['contents'] = 'admin/dashboard';
        $this->load->view('template/index_admin', ['data' => $this->data]);
    }

    public function f($formname)
    {
        $this->data['contents'] = file_get_contents(APPPATH . "views/formtemplate/$formname.php");
        $this->load->view('template/index_admin', ['data' => $this->data]);
    }

    public function add_user($data)
    {
        $this->load->model('user_model', 'user');
        $this->user->insert($data);
    }

    public function update_tipesurat_per_opd($id_opd, $data)
    {
        $this->load->model('tipesuratperopd_model', 'tipesurat');
        $this->tipesurat->update_tipesurat_per_opd($id_opd, $data);
    }

    public function reset_password($id)
    {
        $this->load->model('user_model');
        $this->user_model->reset_password($id);
    }

    private function sess_ver()
    {
        if ($this->session->tempdata() == NULL) {
            redirect('auth/login');
        }
    }

    public function table()
    {
        $this->data['contents'] = file_get_contents(APPPATH . "views/admin/test_table.php");
        $this->load->view('template/index_admin', ['data' => $this->data]);
    }
}

/* End of file Admin.php */
