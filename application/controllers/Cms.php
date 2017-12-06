<?php
class Cms extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        //load database
        $this->load->database();
        //load library
        $this->load->library('form_validation');
        //load helpers
        $this->load->helpers('url', 'form');
        //load model
        //$this->load->model('cms');
    }
    
    public function index()
    {
        if(!$this->loggedIn()){
            redirect('login');
        }else{
            $this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('HTTP_REFFERER');
        }
    }
    
    public function add_cms()
    {
        
    }
    
    public function edit_cms($id = null)
    {
        
    }
}
