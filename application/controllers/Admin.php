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
        redirect('admin/riwayatsurat','refresh');   
        // $this->data['contents'] = APPPATH . "views/admin/dashboard.php";
        // $this->load->view('template/index_admin', ['data' => $this->data]);
    }

    public function f($formfilename = NULL)
    {
        if ($formfilename == NULL || !file_exists(APPPATH . "views/formtemplate/$formfilename.php")) {
            redirect('admin', 'refresh');
            return;
        }

        $this->data['contents'] = APPPATH . "views/formtemplate/$formfilename.php";

        // data to send to view for option
        if ($formfilename == 'registrationform') {
            $this->load->model('opd_model', 'opd');
            $data = $this->opd->gets_as_object();
            $this->data['opsi_opd'] = array();
            // var_dump($data); die();
            foreach ($data as $row) {
                if ($row->id_opd == '1') // id_opd admin
                    continue;
                array_push($this->data['opsi_opd'],  $row);
            }
            $this->data['tipe_opsi'] = 'register';
        } elseif ($formfilename == 'resetpasswordform') {
            $this->load->model('user_model', 'user');
            $data = $this->user->gets_as_object();
            $this->data['opsi_user'] = array();
            foreach ($data as $row) {
                array_push($this->data['opsi_user'],  $row);
            }
            $this->data['tipe_opsi'] = 'reset';
        } elseif ($formfilename == 'tipesuratopdform') {
            // load list OPD
            $this->load->model('opd_model', 'opd');
            $data = $this->opd->gets_as_object();
            $this->data['opsi_opd'] = array();
            foreach ($data as $row) {
                array_push($this->data['opsi_opd'],  $row);
            }
            // load seluruh tipesurat
            $this->load->model('tipesurat_model', 'tipesurat');
            $data = $this->tipesurat->gets_as_object();
            $this->data['opsi_tipesurat'] = array();
            foreach ($data as $row) {
                array_push($this->data['opsi_tipesurat'],  $row);
            }
            
            $this->data['tipe_opsi'] = 'tipesurat';
        } else {
            redirect('admin', 'refresh');
            return;
        }

        $this->load->view('template/index_admin', array('data' => $this->data));
    }

    public function riwayatsurat($page_number = 1)
    {
        if($this->input->get() != NULL){
            return $this->carisurat();
        }
        $this->load->model('surat_model', 'surat');
        $datasurat = $this->surat->get_allsurat($page_number);
        $this->data['list_surat'] = $datasurat;
        $this->load->model('opd_model', 'opd');
        $this->data['opsi_opd'] = $this->opd->gets_as_object();
        unset($this->data['opsi_opd'][0]);
        $this->load->model('tipesuratopd_model', 'tso');
        $this->data['opsi_surat'] = $this->tso->get_opd_namatipesurat();
        $this->data['contents'] = APPPATH . "views/admin/riwayatsurat.php";
        $this->load->view('template/index_admin', array('data' => $this->data));
    }

    public function carisurat()
    {
        $getdata = $this->input->get();
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
            redirect('admin/f/registrationform', 'refresh');
        } elseif ($flag_option == 'reset') {
            $this->reset_password();
            redirect('admin/f/resetpasswordform', 'refresh');
        } elseif ($flag_option == 'tipesurat') {
            $this->update_tipesurat_per_opd();
            redirect('admin/f/tipesuratopdform', 'refresh');
        }
    }

    private function sess_ver()
    {
        if ($this->session->tempdata() == NULL or $this->session->tempdata('id_opd') != '1') {
            redirect('auth');
        }
    }
}

/* End of file Admin.php */
