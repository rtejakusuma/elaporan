<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dbf_model');
        $this->data['user'] = array(
            'id_opd' => $this->session->tempdata('id_opd'),
            'nama_opd' => $this->session->tempdata('nama_opd')
        );
    }


    public function opd()
    {
        $this->data['title'] = 'OPD';
        $this->data['rawdata'] = $this->dbf_model->get_opd();

        $this->data['contents'] = APPPATH . "views/admin/database/db_opd.php";

        $this->load->view('template/index_admin', ['data' => $this->data]);
    }

    public function user()
    {
        $this->data['title'] = 'User';
        $this->data['rawdata'] = $this->dbf_model->get_user();

        $this->data['contents'] = APPPATH . "views/admin/database/db_user.php";

        $this->load->view('template/index_admin', ['data' => $this->data]);
    }

    public function opdtipe()
    {
        $this->data['title'] = 'Tipe Laporan OPD';
        $this->data['rawdata'] = $this->dbf_model->get_opd_tipe();

        $this->load->model('tipelaporan_model');
        $this->data['pil'] = $this->tipelaporan_model->gets();

        $this->data['contents'] = APPPATH . "views/admin/database/db_opdtipe.php";

        $this->load->view('template/index_admin', ['data' => $this->data]);
    }

    public function updateopdtipe()
    {
        var_dump($this->input->post());
    }
}

/* End of file Database.php */
