<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servicecenters extends MY_Controller {

    public function __construct() {
        parent::__construct();
        //load database
        $this->load->database();
        //load library and helpers
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        //load model
        $this->load->model('servicecenters_model', 'servicecenters');
    }
    
    public function index(){
        if(!$this->loggedIn){
            redirect('login');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->data['pagename'] = 'Service Centers';
        //create header and footer with page_construct method and load view page plans
        $bc = array(array('link' => base_url(), 'page' => 'home', array('link' => '#', 'page' => 'servicecenters')));
        $meta = array('page_title' => 'Service Centers', 'bc' => $bc);
        $this->page_construct('servicecenters', $meta, $this->data);
    }
    
    public function service_center_details()
    {
        
    }
    
    public function add_servicecenter()
    {
        $this->data['pagename'] = 'Add Service Center';
        
        $this->data['regions'] = $this->getRegions();
        $this->data['times'] = $this->getTimes();;
        $this->data['days'] = $this->getDays();
        //create header and footer with page_construct method and load view page add service center
        $bc = array(array('link' => base_url(), 'page' => 'home', array('link' => '#', 'page' => 'Service Centers')));
        $meta = array('page_title' => 'Add Service Centers', 'bc' => $bc);
        $this->page_construct('servicecenters/add_servicecenter', $meta, $this->data);
    }
    
    public function edit_servicecenter()
    {
        $this->data['pagename'] = 'Edit Service Center';
        //create header and footer with page_construct method and load view page edit service center
        $bc = array(array('link' => base_url(), 'page' => 'home', array('link' => '#', 'page' => 'Service Centers')));
        $meta = array('page_title' => 'Edit Service Centers', 'bc' => $bc);
        $this->page_construct('servicecenters/edit_servicecenter', $meta, $this->data);
    }
    
    
    
    public function getRegions()
    {
        $region = array(1=>'East', 2=>'West', 3=>'North', 4=>'South');
        return $region;
    }
    
    public function getDays()
    {
        $days = array(
                date('N', strtotime('Monday')) => 'Monday',
                date('N', strtotime('Tuesday')) => 'Tuesday',
                date('N', strtotime('Wednesday')) => 'Wednesday',
                date('N', strtotime('Thursday')) => 'Thursday',
                date('N', strtotime('Friday')) => 'Friday',
                date('N', strtotime('Saturday')) => 'Saturday',
                date('N', strtotime('Sunday')) => 'Sunday'
            );
        return $days;
    }
    
    public function getTimes()
    {
	$times = array(
                    '00:00' => '12:00 AM',
                    '00:30' => '12:30 AM',
                    '01:00' => '01:00 AM',
                    '01:30' => '01:30 AM',
                    '02:00' => '02:00 AM',
                    '02:30' => '02:30 AM',
                    '03:00' => '03:00 AM',
                    '03:30' => '03:30 AM',
                    '04:00' => '04:00 AM',
                    '04:30' => '04:30 AM',
                    '05:00' => '05:00 AM',
                    '05:30' => '05:30 AM',
                    '06:00' => '06:00 AM',
                    '06:30' => '06:30 AM',
                    '07:00' => '07:00 AM',
                    '07:30' => '07:30 AM',
                    '08:00' => '08:00 AM',
                    '08:30' => '08:30 AM',
                    '09:00' => '09:00 AM',
                    '09:30' => '09:30 AM',
                    '10:00' => '10:00 AM',
                    '10:30' => '10:30 AM',
                    '11:00' => '11:00 AM',
                    '11:30' => '11:30 AM',
                    '12:00' => '12:00 PM',
                    '12:30' => '12:30 PM',
                    '13:00' => '01:00 PM',
                    '13:30' => '01:30 PM',
                    '14:00' => '02:00 PM',
                    '14:30' => '02:30 PM',
                    '15:00' => '03:00 PM',
                    '15:30' => '03:30 PM',
                    '16:00' => '04:00 PM',
                    '16:30' => '04:30 PM',
                    '17:00' => '05:00 PM',
                    '17:30' => '05:30 PM',
                    '18:00' => '06:00 PM',
                    '18:30' => '06:30 PM',
                    '19:00' => '07:00 PM',
                    '19:30' => '07:30 PM',
                    '20:00' => '08:00 PM',
                    '20:30' => '08:30 PM',
                    '21:00' => '09:00 PM',
                    '21:30' => '09:30 PM',
                    '22:00' => '10:00 PM',
                    '22:30' => '10:30 PM',
                    '23:00' => '11:00 PM',
                    '23:30' => '11:30 PM'
                );
		
	return $times;
    }
    //end class Service center
}