<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Dashboard extends MY_controller{

	public function __consturct(){
		parent::__consturct();
		$this->load->library('session');
	}

	
	public function index(){
            $this->load->view('dashboard');
//            if (!$this->loggedIn) {
//                redirect('login');
//            }
//            $this->data['name'] = 'Dashboard';
//            $bc = array(array('link' => base_url(), 'page' => 'home', array('link' => '#', 'page' => 'dashboard')));
//            $meta = array('page_title' => 'Dashboard', 'bc' => $bc);
//            $this->page_construct('dashboard', $meta, $this->data);
	}

	
}
