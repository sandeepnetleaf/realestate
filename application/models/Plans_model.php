<?php

class Plans_model extends MY_Model
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
        //$this->load->config('ion_auth', TRUE);
        $this->load->helper('date');
        
        // initialize messages and error
        $this->messages = array();
        $this->errors = array();
        
        
        
    }
    public function get_all_plan()
    {
        $query = $this->db->select('plan_id, plan_title, plan_type, sku_prod_no, plan_price,  modified_date, plan_status ')
                          ->from('plans')
                          ->get();
        
        $data = array();
        $results = array();
        
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $result)
            {
                $data[] = array(
                                'plan_id'       => $result->plan_id,
                                'plan_title'    => $result->plan_title,
                                'plan_type'     => $result->plan_type,
                                'sku_prod_no'   => $result->sku_prod_no,
                                'plan_price'    => $result->plan_price,
                                'modified_date' => $result->modified_date,
                                'plan_status'   => $result->plan_status
                            );
            }
            
            $results['data']            = $data;
            $results['totalRecords']    = $query->num_rows();
        }
        return $results;
    }
    
    
}
