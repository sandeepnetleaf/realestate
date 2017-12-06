<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicecenters_model extends MY_Model
{
    protected $messages;

    /**
     * error message (uses lang file)
     *
     * @var string
     * */
    protected $errors;

    /**
     * error start delimiter
     *
     * @var string
     * */
    protected $error_start_delimiter;

    /**
     * error end delimiter
     *
     * @var string
     * */
    protected $error_end_delimiter;

    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->config('ion_auth', TRUE);
        
        // initialize messages and error
        $this->messages = array();
        $this->errors = array();
    }
    
    public function getCategories()
    {
        $query = $this->db->select('id', 'cat_name')
                        ->from(array('categories'))
			->where('status = 1')
			->order('cat_name');
				
	
    }
    
}
