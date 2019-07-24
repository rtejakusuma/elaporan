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
        $this->data['title'] = "E-Laporan " . strtoupper($this->session->tempdata('nama_opd'));
    }

    public function get_tipesurat($id_opd)
    {
        $this->load->model('tipesurat_model', 'ts');
        $this->load->model('tipesuratopd_model', 'tso');
        $idtipe = $this->tso->get_idtipe_per_opd($id_opd);
        $this->tipesurat = array();
        // GARAI INVITE LOOP ASUUUUWWW
        if($idtipe == NULL)
            return;
        foreach ($idtipe as $id) {
            array_push($this->tipesurat, $this->ts->get_namasurat($id)[0]);
        }
    }

    public function get_list_tipesurat()
    {
        return $this->tipesurat;
    }

    public function index()
    {
        // sementara
        // return $this->get_riwayat_laporan();
        $this->data['contents'] = APPPATH . 'views/opd/dashboard.php';
        $this->load->view('template/index_opd', array('data' => $this->data));
    }

    public function f($formname)
    {
        $formfilename = str_replace(' ', '', strtolower($formname));
        $this->data['sidebar'] = $this->tipesurat;
        $this->data['contents'] = APPPATH . "views/formtemplate/$formfilename.php";
        $this->load->view('template/index_admin', array('data' => $this->data));
    }

    public function e($id)
    {
        $this->load->model('surat_model', 'surat');
        $this->data['value'] = $this->surat->get_surat_data($id);
        $formname = $this->surat->get_tipe_surat($id);
        // $this->data['contents'] = file_get_contents(APPPATH . "views/formtemplate/$formname.php");
        $this->data['sidebar'] = $this->tipesurat;
        $this->data['formname'] = $formname;
        $this->data['contents'] = APPPATH . "views/formtemplate/" . str_replace(' ', '', strtolower($formname)) . ".php";
        $this->data['id_surat'] = $id;
        $this->load->view('template/index_admin', array('data' => $this->data));
    }

    //sementara
    public function riwayatsurat($page_number = 1)
    {
        return $this->get_riwayat_laporan($page_number);
    }

    public function get_riwayat_laporan($page_number)
    {
        $id_opd = $this->session->tempdata('id_opd');
        $this->load->model('surat_model', 'surat');
        $this->data['list_surat'] = $this->surat->get_listsurat_by_idopd($id_opd, $page_number);
    }

    public function submit()
    {
        $id_surat = NULL;
        if ($this->input->post('id_surat') != NULL) {
            $id_surat = $this->input->post('id_surat');
        }
        $data = $this->input->post();
        if ($id_surat == NULL) { // new data
            $this->surat->add_data($data);
        } else { // editted data
            $this->surat->update_data($id, $data);
        }
    }

    public function rekap_disposisi()
    {
        $this->load->model('disposisi_model');
        $this->data['rawdata'] = $this->disposisi_model->get('rekap');

        $this->data['title'] = 'Rekap Disposisi';
        $this->data['contents'] = APPPATH . "views/opd/rekap_disposisi.php";
        $this->load->view('template/index_opd', ['data' => $this->data]);
    }

    public function show_disposisi()
    {
        $this->data['title'] = 'Form Input Disposisi';
        $this->data['contents'] = APPPATH . "views/opd/form_disposisi.php";

        $this->load->model('Opd_model', 'opd');
        $this->data['raw_data'] = $this->opd->gets();

        $this->load->view('template/index_opd', ['data' => $this->data]);
    }

    public function show_lampiran_disposisi()
    {
        $this->data['title'] = 'Lampiran Disposisi';
        $this->data['contents'] = APPPATH . "views/opd/lampiran_disposisi.php";

        $this->load->model('disposisi_model');
        $this->data['rawdata'] = $this->disposisi_model->get('rekap');

        $this->load->view('template/index_opd', ['data' => $this->data]);
    }

    public function input_disposisi()
    {
        $data = [
            'id_opd' => $this->session->tempdata('id_opd'),
            'surat_dari' => htmlspecialchars($this->input->post('surat_dari', TRUE)),
            'tgl_surat' => date('Y-m-d', strtotime($this->input->post('tgl_surat', TRUE))),
            'tgl_masuk' => date('Y-m-d', strtotime($this->input->post('tgl_masuk', TRUE))),
            'no_surat' => htmlspecialchars($this->input->post('no_surat', TRUE)),
            'no_agenda' => htmlspecialchars($this->input->post('no_agenda', TRUE)),
            'perihal' => htmlspecialchars($this->input->post('perihal', TRUE)),
            'diteruskan' => htmlspecialchars($this->input->post('diteruskan', TRUE)),
            'isi' => htmlspecialchars($this->input->post('isi', TRUE))
        ];

        $this->load->model('disposisi_model');
        $this->disposisi_model->insert($data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert" style="margin">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><strong>×</strong></span>
            </button>
            <center>
              Berhasil <strong>menambah</strong> disposisi (' . $data['no_surat'] . ')
            </center>
          </div>');

        redirect('opd/rekap_disposisi', 'refresh');
    }

    public function deldis($id)
    {
        $this->load->model('disposisi_model');
        $this->disposisi_model->delete($id);

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert" style="margin">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><strong>×</strong></span>
            </button>
            <center>
              Disposisi berhasil <strong>hapus!</strong>
            </center>
          </div>');

        redirect('opd/rekap_disposisi', 'refresh');
    }

    private function sess_ver()
    {
        if ($this->session->tempdata() == NULL or $this->session->tempdata('id_opd') == '1') {
            redirect('auth');
        }
    }
}

/* End of file Opd.php */
