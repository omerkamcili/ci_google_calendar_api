<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googlecalendar extends CI_Model
{

    public function __construct()
    {

        parent::__construct();
        $this->load->library('session');
        $this->load->library('googleplus');
        $this->calendar = new Google_Service_Calendar($this->googleplus->client());

    }


    public function isLogin()
    {


        $token = $this->session
            ->userdata('google_calendar_access_token');


        if ($token) {

            $this->googleplus
                ->client
                ->setAccessToken($token);

        }

        if ($this->googleplus->isAccessTokenExpired()) {

            return false;

        }

        return $token;

    }


    public function loginUrl()
    {

        return $this->googleplus
            ->loginUrl();

    }


    public function login($code)
    {

        $login = $this->googleplus
            ->client
            ->authenticate($code);

        if ($login) {

            $token = $this->googleplus
                ->client
                ->getAccessToken();

            $this->session
                ->set_userdata('google_calendar_access_token', $token);

            return true;

        }

    }


    public function getUserInfo()
    {

        return $this->googleplus->getUser();

    }


    public function getEvents($calendarId = 'primary', $timeMin = false, $timeMax = false, $maxResults = 10)
    {


        if ( ! $timeMin) {

            $timeMin = date("c", strtotime(date('Y-m-d ').' 00:00:00'));

        } else {

            $timeMin = date("c", strtotime($timeMin));

        }


        if ( ! $timeMax) {

            $timeMax = date("c", strtotime(date('Y-m-d ').' 23:59:59'));

        } else {

            $timeMax = date("c", strtotime($timeMax));

        }


        $optParams = array(
            'maxResults'   => $maxResults,
            'orderBy'      => 'startTime',
            'singleEvents' => true,
            'timeMin'      => $timeMin,
            'timeMax'      => $timeMax,
            'timeZone'     => 'Europe/Istanbul',

        );

        $results = $this->googlecalendar->calendar->events->listEvents($calendarId, $optParams);


        $data = array();

        foreach ($results->getItems() as $item) {

            $start = date('d-m-Y H:i', strtotime($item->getStart()->dateTime));

            array_push(

                $data,
                array(

                    'id'          => $item->getId(),
                    'summary'     => $item->getSummary(),
                    'description' => $item->getDescription(),
                    'creator'     => $item->getCreator(),
                    'start'       => $item->getStart()->dateTime,
                    'end'         => $item->getEnd()->dateTime,


                )

            );

        }

        return $data;

    }


    public function addEvent($calendarId = 'primary', $data)
    {


        //date format is => 2016-06-18T17:00:00+03:00

        $event = new Google_Service_Calendar_Event(
            array(
                'summary'     => $data['summary'],
                'description' => $data['description'],
                'start'       => array(
                    'dateTime' => $data['start'],
                    'timeZone' => 'Europe/Istanbul',
                ),
                'end'         => array(
                    'dateTime' => $data['start'],
                    'timeZone' => 'Europe/Istanbul',
                ),
                'attendees'   => array(
                    array('email' => 'omerkamcili@gmail.com'),
                ),
            )
        );


        return $this->calendar->events->insert($calendarId, $event);


    }


}