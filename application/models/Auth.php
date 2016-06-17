<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model {


	public function __construct(){

		parent::__construct();

		$this->load->model('googlecalendar');

		$this->load->library('session');

		if(!$this->googlecalendar->isLogin()){

			$this->session->sess_destroy();

			redirect('/auth/login','refresh');
			
			exit;

		}

	}



}