<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CMS_Model extends MY_Model
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
         
        // initialize messages and error
        $this->messages = array();
        $this->errors = array();
    }
    
    public function get_all_cms($search = NULL){
        $query = $this->db->get('cms');
        
        $data = array();
        $results = array();
        if($query->num_rows() > 0){
            foreach($query->result() as $result){
                $data[] = array(
                    'cms_id'                => $result->cms_id,
                    'cms_type'              => $result->cms_type,
                    'cms_title'             => $result->cms_title,
                    'cms_description'       => $result->cms_description,
                    'cms_status'            => $result->cms_status,
                    'cms_added_date'        => $result->cms_added_date,
                    'cms_modified_date'     => $result->cms_modified_date
                );
            }
            $results['data']            = $data;
            $results['totalRecords']    = $query->num_rows(); 
        }
        return $results;
    }
    
    public function add_cms($data = array())
    {
        if(!empty($data)){
            $this->db->insert('cms', $data);
            $id = $this->db->insert_id();
            
            return (isset($id)) ? $id : FALSE;
        }
    }
    
    public function delete_cms_by_id($id)
    {
        $this->db->where('cms_id',$id);
        $result = $this->db->delete('cms');
        if($result)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}


