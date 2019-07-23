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

    public function f($formfilename=NULL)
    {
        if($formfilename == NULL || !file_exists(APPPATH . "views/formtemplate/$formfilename.php"))
        {
            redirect('admin','refresh');
            return;
        }
        $this->data['formfilename'] = $formfilename;

        // data to send to view for option
        if($formfilename == 'registrationform'){
            $this->load->model('opd_model', 'opd');
            $data = $this->opd->gets();
            $this->data['opsi_opd'] = array();
            foreach ($data as $row) {
                if($row->id_opd == '1') // id_opd admin
                    continue;
                array_push($this->data['opsi_opd'],  $row);
            }
            $this->data['tipe_opsi'] = 'register';
        } elseif ($formfilename == 'resetpasswordform') {
            $this->data['opsi_user'] = null;
            $this->data['tipe_opsi'] = 'reset';
        } elseif ($formfilename == 'tipesuratopdform'){
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
        $this->load->model('opd_model', 'opd');
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
            'id_opd' => $this->opd->get_idopd_by_name( $this->input->post('opd', true) )
        ];

        $this->load->model('user_model');
        $this->user_model->insert($data);

        redirect('auth', 'refresh');
    }

    public function update_tipesurat_per_opd()
    {
        $id_opd = $this->session->tempdata('id_opd');
        $data = $this->input->post(); // data from chekbox in form
        $this->load->model('tipesuratperopd_model', 'tipesurat');
        $this->tipesurat->update_tipesurat_per_opd($id_opd, $data);
    }

    public function reset_password($id)
    {
        $this->load->model('user_model');
        $this->user_model->reset_password($id);
    }

    public function submit()
    {
        $flag_option = $this->input->post('tipe_opsi'); // tipe_opsi from form hidden attribute
        if($flag_option == 'register'){
            $this->add_user();
            redirect('admin/f/registrationform','refresh');
        } elseif ($flag_option == 'reset'){
            $this->reset_password(1); // diskusi dulu, data post langsung diambil dari input ato passing parameter?
            redirect('admin/f/resetpasswordform','refresh');
        } elseif ($flag_option == 'tipesurat'){
            $this->update_tipesurat_per_opd();
            redirect('admin/f/tipesuratopdform','refresh');
        }

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
