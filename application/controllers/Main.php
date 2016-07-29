<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('auth');

	}

	public function index(){

		$this->load->model('googlecalendar');
		$data['user'] = $this->googlecalendar->getUserInfo();
		$data['events'] = $this->googlecalendar->getEvents();
		$data['todayEventsCount'] = count($data['events']);
		$this->load->view('dashboard',$data);
	
	}

}
