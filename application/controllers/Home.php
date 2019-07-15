<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->sess_ver();
	}
	public function index()
	{
		var_dump($this->session->tempdata());

		$this->load->view('home');
	}
	private function sess_ver(){
		if($this->session->tempdata() == NULL){
			redirect('auth/login');
		}
	}
}
