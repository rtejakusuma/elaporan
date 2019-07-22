<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private function isAuth()
    {
        if ($this->session->tempdata() != NULL) {
            $this->_roledirect($this->session->tempdata('id_opd'));
        }
    }
    public function index()
    {
        $this->isAuth();
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // Jika Validasi sesuai jalankan login
            $this->_login();
        } else {
            // Jika Validasi salah
            $data['title'] = 'Login';

            $this->load->view('template/header_admin', array('data' => $data));

            $this->load->view('auth/login_view');

            $this->load->view('template/footer_admin');
        }
    }

    public function showregis()
    {
        $this->isAuth();
        echo form_open('auth/register');
        echo form_input('username', 'Username');
        echo form_input('password', 'Password');
        $options = array();
        $this->load->model('opd_model', 'opd');
        $data = $this->opd->gets();
        foreach ($data as $row) {
            $options[$row->id_opd] = $row->nama_opd;
        }
        echo form_dropdown('opd', $options);
        echo form_submit('submit', 'Add');
        echo form_close();
    }

    public function register()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
            'id_opd' => $this->input->post('opd', true)
        ];

        $this->load->model('user_model');
        $this->user_model->insert($data);

        redirect('auth', 'refresh');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

    private function _login()
    {
        $this->load->model('user_model');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->user_model->get_login($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->_sessionbuilder($user);
                $this->user_model->last_login($this->session->tempdata('id'));
                $this->_roledirect($user['id_opd']);
            } else {
                echo 'password salah';
            }
        } else {
            echo 'gagal';
        }
    }

    private function _sessionbuilder($user)
    {
        $this->load->model('opd_model', 'opd');
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'id_opd' => $user['id_opd'],
            'nama_opd' => $this->opd->get_namaopd($user['id_opd'])
        ];

        $this->session->set_tempdata($data, NULL, 7200);
    }

    private function _roledirect($id_opd)
    {
        if ($id_opd == '1') {
            redirect('admin', 'refresh');
        } elseif ($id_opd != '1') {
            redirect('opd', 'refresh');
        }
    }
}
