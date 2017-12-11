<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CMS extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        //load database
        $this->load->database();
        //load validation library
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language', 'form'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        //load model ion_auth_model and rename this with person name
        $this->load->model('cms_model', 'cms');     
    }
    
    public function index()
    {
        if (!$this->loggedIn) {
            redirect('login');
        }
        
        
        $this->data['pagename'] = 'cms';
        //create header and footer with page_construct method and load view page plans
        $bc = array(array('link' => base_url(), 'page' => 'home', array('link' => '#', 'page' => 'CMS')));
        $meta = array('page_title' => 'CMS', 'bc' => $bc);
        $this->page_construct('cms/index', $meta, $this->data);
        
    }
    
    public function get_cms(){
        $results = $this->cms->get_all_cms($search_val = $this->input->post('sSearch'));
        $data = array();
        
        if(!empty($results['data']))
        {
            foreach($results['data'] as $result)
            {
                $nestedData = array();
                $id = $result['cms_id'];
                
                if ($result['cms_status'] == 1) {
                    $status = '<span class="label label-success"><i class="fa fa-check"></i> Active</span>';
                } else {
                    $status = '<span class="label label-danger"><i class="fa fa-times"></i> Inactive</span>';
                }
                
                $delete_link = base_url('cms/delete_cms');
                // $edit = '<a class="btn btn-sm btn-primary"  type="button"  title="Edit" onclick="edit_person('.$result['id'].')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';

                $edit = '<a class="btn btn-info btn-xs edit_user"  type="button" data-toggle="modal" data-target="#Modal" title="Edit" href="' . site_url("cms/edit_cms/$id") . '"  ><i class="fa fa-pencil"></i> Edit</a>';
                $delete = '<a class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#removeCMSModal"  title="Hapus" onclick="delete_cms('.$id.')"><i class="fa fa-trash-o"></i> Delete</a>';
                $action = $edit . ' ' . $delete;
                
                $nestedData[] = $id;
                //$nestedData[] = $result['cms_type'];
                $nestedData[] = $result['cms_title'];
                $nestedData[] = $result['cms_description'];
                $nestedData[] = $result['cms_added_date'];
                $nestedData[] = $result['cms_modified_date'];
                $nestedData[] = $status;
                $nestedData[] = $action;
                
                $data[] = $nestedData;
            }
                $json_data = array("draw" => isset($requestData['draw']) ? intval($requestData['draw']) : 0, // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
                                "recordsTotal" => $results['totalRecords'] ? intval($results['totalRecords']) : 0, // total number of records
                                "recordsFiltered" => $results['totalRecords'] ? intval($results['totalRecords']) : 0, // total number of records after searching, if there is no searching then totalFiltered = totalData
                                "data" => $data  // total data array
                            );
        }    
        
        else
        {
            $data = array('No result found');
            $results['totalRecords'] = 0;
            $json_data = array("draw" => isset($requestData['draw']) ? intval($requestData['draw']) : 0, // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
                            "recordsTotal" => $results['totalRecords'] ? intval($results['totalRecords']) : 0, // total number of records
                            "recordsFiltered" => $results['totalRecords'] ? intval($results['totalRecords']) : 0, // total number of records after searching, if there is no searching then totalFiltered = totalData
                            "data" => $data  // total data array
                        );
        }    
        echo json_encode($json_data);
        
    }
    
    public function add_cms()
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        //define form_validation rules
        $this->form_validation->set_rules('cms_type','CMS Type','trim|required');
        $this->form_validation->set_rules('cms_title', 'CMS Title', 'trim|required');
        $this->form_validation->set_rules('cms_description','CMS Description','trim|required');
        
        if($this->form_validation->run() === TRUE){
            $data = array(
                    'cms_type'           => $this->input->post('cms_type'),
                    'cms_title'          => $this->input->post('cms_title'),
                    'cms_description'    => $this->input->post('cms_description'),
                    'cms_status'         => $this->input->post('cms_status')
                );
        }
        
        if ($this->form_validation->run() === TRUE && $this->cms->add_cms($data)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', 'CMS added successfully');
            redirect("cms", 'refresh');
        } else {
            //validation error message
            $this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
        }
        
        $this->data['cms_types'] = $this->cms_type();
        $bc = array(array('link' => base_url(), 'page' => 'home', array('link' => '#', 'page' => 'CMS')));
        $meta = array('page_title' => 'Add CMS', 'bc' => $bc);
        $this->page_construct('cms/add_cms', $meta, $this->data);
    }
    
    public function edit_cms($id = null)
    {
        $this->data['pagename'] = 'cms';
        $bc = array(array('link' => base_url(), 'page' => 'home', array('link' => '#', 'page' => 'CMS')));
        $meta = array('page_title' => 'Edit CMS', 'bc' => $bc);
        $this->page_construct('cms/edit_cms', $meta, $this->data);
    }
    
 
    
    public function delete_cms($id)
    {   
        if($this->cms->delete_cms_by_id($id)){
            $output['success'] = TRUE;
            $output['message'] = 'Successfully deleted';
        }
        else
        {
            $output['success'] = FALSE;
            $output['message'] = 'Error while deleting cms information';
        }
    }
    
    public function cms_type(){
        return $cms_types = array(
            ''                      => '-- Select cms type --',
            'about_us'              => 'About Us',
            'privacy_policy'        => 'Privacy Policy',
            'terms_of_use'          => 'Terms of use',
            'refund_cancellation'   => 'Refund & Cancellation',
            'how_it_work'           => 'How it works',
            'claim_process'         => 'Claim Process',
        );
    }
}
