<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {


	public function __construct(){


		parent::__construct();
		
		$this->load->model('auth');

		$this->load->model('googlecalendar');

		//echo date('Y-m-d\TH:i:sP');


	}


	public function addEvent(){


		//date format is => 2016-06-18T17:00:00+03:00

		$post = $this->input->post();


		$data = array();


		if($post){


			$event = array(
							'summary' 		=> $post['summary'],
							'start' 		=> $post['startDate'] . 'T' . $post['startTime'] . ':00+03:00',
							'end' 			=> $post['endDate'] . 'T' . $post['endTime'] . ':00+03:00',
							'description' 	=> $post['description']

						 );




			$foo = $this->googlecalendar
						->addEvent('primary',$event);



			if($foo->status == 'confirmed'){


				$data['message'] = '<div class="alert alert-success">Events created.</div>';


			}


		}

		$this->load->helper('form');


		$this->load->view( 'addevent' ,$data);


	}


	public function eventList(){


		$get = $this->input->get();

		if($get){

			$start 	= $get['start'] . ' 00:00:00';

			$end 	= $get['end'] . ' 23:59:59';

			$data['title'] = 'Events of between ' . $get['start'] . " and  " . $get['end'];

		}else{

			$start = false;

			$end   = false;

			$data['title'] = 'Events of today';

		}

		$data['events'] = $this->googlecalendar
							   ->getEvents('primary',$start,$end,40);



		$this->load->view('eventlist',$data);



	}

}