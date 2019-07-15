<?php
defined('BASEPATH') or exit('No direct script access allowed');

<<<<<<< HEAD
class Reportform extends CI_Controller
{
    private function isAuth()
    {
        if ($this->session->tempdata('credential') == NULL) {
            redirect('login');
        }
=======
class Reportform extends CI_Controller {
    private function isAuth(){
        if($this->session->tempdata() == NULL){
			redirect('auth');
		}
>>>>>>> b1a2ad49bd607f7cdb1a983a6c22558e42db296d
    }

    public function index()
    {
        $this->isAuth();
        $this->load->view('reportform', array('formname' => NULL));
    }

    public function f($formname)
    {
        $this->isAuth();
        $this->load->view('reportform', array('formname' => $formname));
    }
}
