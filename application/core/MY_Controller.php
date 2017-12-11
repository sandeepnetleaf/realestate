<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	function __construct(){
            parent::__construct();

            $this->loggedIn = $this->sma->logged_in();

            $this->theme = '';
            
            $this->load->helper('ckeditor');
	}

	function page_construct($page, $meta = array(), $data = array())
	{
            $meta['message'] 	= isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
            $meta['error'] 		= isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
            $meta['warring'] 	= isset($data['warring']) ? $data['warring'] : $this->session->flashdata('warring');
            //$meta['assets'] 	= $data['assets'];
            $this->load->view('header', $meta);
            $this->load->view('side-menu', $meta);
            $this->load->view($page, $data);
            $this->load->view('footer');
	}
}