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

    public function updateopdtipe($id_opd)
    {
        $this->data['contents'] = APPPATH . "views/admin/database/form/form_akses_laporan.php";

        $this->load->model('dbf_model');
        $this->data['rawdata'] = $this->dbf_model->get_tipe_laporan();
        $this->data['selected'] = $this->dbf_model->get_tipelaporan_per_opd($id_opd);
        $this->data['id_opd'] = $id_opd;

        $nama = $this->dbf_model->get_opd($id_opd);
        $nama = $nama['nama_opd'];

        $this->data['title'] = 'Edit Akses Laporan ' . $nama;

        $this->load->view('template/index_admin', ['data' => $this->data]);
    }
}

/* End of file Database.php */
