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
        $this->data['formfilename'] = '../admin/dashboard';
        $this->load->view('template/index_admin', ['data' => $this->data]);
    }

    public function f($formfilename = NULL)
    {
        if ($formfilename == NULL || !file_exists(APPPATH . "views/formtemplate/$formfilename.php")) {
            redirect('admin', 'refresh');
            return;
        }
        
        $this->data['formfilename'] = $formfilename;

        // data to send to view for option
        if ($formfilename == 'registrationform') {
            $this->load->model('opd_model', 'opd');
            $data = $this->opd->gets();
            $this->data['opsi_opd'] = array();
            foreach ($data as $row) {
                if ($row->id_opd == '1') // id_opd admin
                    continue;
                array_push($this->data['opsi_opd'],  $row);
            }
            $this->data['tipe_opsi'] = 'register';
        } elseif ($formfilename == 'resetpasswordform') {
            $this->load->model('user_model', 'user');
            $data = $this->user->gets();
            $this->data['opsi_user'] = array();
            foreach ($data as $row) {
                array_push($this->data['opsi_user'],  $row);
            }
            $this->data['tipe_opsi'] = 'reset';
        } elseif ($formfilename == 'tipesuratopdform') {
            $this->data['opsi_tipesurat'] = null;
            $this->data['tipe_opsi'] = 'tipesurat';
        } else {
            redirect('admin', 'refresh');
            return;
        }

        $this->load->view('template/index_admin', array('data' => $this->data));
    }

    public function add_user()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
            'id_opd' => $this->input->post('id_opd', true)
        ];

        $this->load->model('user_model');
        $this->user_model->insert($data);

        redirect('admin/f/registrationform', 'refresh');
    }

    public function update_tipesurat_per_opd()
    {
        $id_opd = $this->session->tempdata('id_opd');
        $data = $this->input->post(); // data from chekbox in form
        $this->load->model('tipesuratperopd_model', 'tipesurat');
        $this->tipesurat->update_tipesurat_per_opd($id_opd, $data);
    }

    public function reset_password()
    {
        $this->load->model('user_model');
        $this->user_model->reset_password($this->input->post('id'), $this->input->post('password'));
    }

    public function submit()
    {
        $flag_option = $this->input->post('tipe_opsi'); // tipe_opsi from form hidden attribute
        if ($flag_option == 'register') {
            $this->add_user();
            redirect('admin/f/registrationform','refresh');
        } elseif ($flag_option == 'reset'){
            $this->reset_password();
            redirect('admin/f/resetpasswordform','refresh');
        } elseif ($flag_option == 'tipesurat'){
            $this->update_tipesurat_per_opd();
            redirect('admin/f/tipesuratopdform', 'refresh');
        }
    }

    private function sess_ver()
    {
        if ($this->session->tempdata() == NULL) {
            redirect('auth');
        }
    }

    public function table()
    {
        $this->data['title'] = 'Rekap Disposisi';
        $this->data['contents'] = APPPATH . "views/admin/rekap_disposisi.php";
        $this->load->view('template/index_admin', ['data' => $this->data]);
    }

    public function show_disposisi()
    {
        $this->data['title'] = 'Form Input Disposisi';
        $this->data['contents'] = APPPATH . "views/admin/form_disposisi.php";

        $this->load->model('Opd_model', 'opd');
        $this->data['raw_data'] = $this->opd->gets();

        $this->load->view('template/index_admin', ['data' => $this->data]);
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

        redirect('home', 'refresh');
    }
}

/* End of file Admin.php */
