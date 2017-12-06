<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
        //load database
        $this->load->database();
        //load library and helpers
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        //load model
        $this->load->model('plans_model', 'plans');
    }

    /**
     * Redirect if needed, otherwise display the plan list
     */
    public function index()
    {
        if(!$this->loggedIn){
            redirect('login');
        }
        else
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        }
        
        //create header and footer with page_construct method and load view page plans
        $bc = array(array('link' => base_url(), 'page' => 'home', array('link' => '#', 'page' => 'plans')));
        $meta = array('page_title' => 'Plans', 'bc' => $bc);
        $this->page_construct('plans/index.php', $meta, $this->data);
    }
    
    public function plan_details()
    {
        $results = $this->plans->get_all_plan($search_val = $this->input->post('sSearch'));
        
        $data = array();
        if(!empty($results['data']))
        {
            foreach($results['data'] as $result)
            {
                $nestedData = array();
                $id = $result['plan_id'];
                
                if ($result['plan_status'] == 1) {
                    $status = '<span class="label label-success"><i class="fa fa-check"></i> Active</span>';
                } else {
                    $status = '<span class="label label-danger"><i class="fa fa-times"></i> Inactive</span>';
                }
                
                $delete_link = base_url('auth/delete_user');
                // $edit = '<a class="btn btn-sm btn-primary"  type="button"  title="Edit" onclick="edit_person('.$result['id'].')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';

                $edit = '<a class="btn btn-info btn-xs edit_user"  type="button" data-toggle="modal" data-target="#Modal" title="Edit" href="' . site_url("plan/edit_plan/$id") . '"  ><i class="fa fa-pencil"></i> Edit</a>';
                $delete = '<a class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#removePlanModal"  title="Hapus" onclick="delete_plan('.$id.')"><i class="fa fa-trash-o"></i> Delete</a>';
                $action = $edit . ' ' . $delete;
                
                $nestedData[] = $id;
                $nestedData[] = $result['plan_title'];
                $nestedData[] = $result['plan_type'];
                $nestedData[] = $result['sku_prod_no'];
                $nestedData[] = $result['plan_price'];
                $nestedData[] = $result['modified_date'];
                $nestedData[] = $status;
                $nestedData[] = $action;
                
                $data[] = $nestedData;
            }
            
            $json_data = array("draw" => isset($requestData['draw']) ? intval($requestData['draw']) : 0, // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => $results['totalRecords'] ? intval($results['totalRecords']) : 0, // total number of records
            "recordsFiltered" => $results['totalRecords'] ? intval($results['totalRecords']) : 0, // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data  // total data array
        );

        echo json_encode($json_data);
        }
    }
    
    //Add Plan info
    public function add_plan()
    {
        //add values
        $this->data['pagename'] = 'Add Plan';
        //create header and footer with page_construct method and load view page add plan 
        $bc = array(array('link' => base_url(), 'page' => 'home', array('link' => '#', 'page' => 'plans')));
        $meta = array('page_title' => 'Add Plan', 'bc' => $bc);
        $this->page_construct('plans/add_plan', $meta, $this->data);
    }
    
    //Edit Plan Infor
    public function edit_plan($id=NULL)
    {
        $this->data['pagename'] = 'Edit Plan ';
        //create header and footer with page_construct method and load view page edit plans
        $bc = array(array('link' => base_url(), 'page' => 'home', array('link' => '#', 'page' => 'plans')));
        $meta = array('page_title' => 'Edit Plan', 'bc' => $bc);
        $this->page_construct('plans/edit_plan', $meta, $this->data);
    }
    
    public function delete_plan($id = NULL)
    {
        
    }
    
    
    
    //for pdf generation
    public function pdf($id = null, $view = null, $save_bufffer = null)
    {
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['message'] = '';
        $message = '';
//        
//        $this->data['barcode'] = "<img src='" . site_url('products/gen_barcode/' . $inv->reference_no) . "' alt='" . $inv->reference_no . "' class='pull-left' />";
//        $this->data['customer'] = $this->site->getCompanyByID($inv->customer_id);
//        $this->data['payments'] = $this->sales_model->getPaymentsForSale($id);
//        $this->data['biller'] = $this->site->getCompanyByID($inv->biller_id);
//        $this->data['user'] = $this->site->getUser($inv->created_by);
//        $this->data['warehouse'] = $this->site->getWarehouseByID($inv->warehouse_id);
//        $this->data['inv'] = $inv;
//        $this->data['rows'] = $this->sales_model->getAllInvoiceItems($id);
//        $this->data['return_sale'] = $inv->return_id ? $this->sales_model->getInvoiceByID($inv->return_id) : NULL;
//        $this->data['return_rows'] = $inv->return_id ? $this->sales_model->getAllInvoiceItems($inv->return_id) : NULL;
//        //$this->data['paypal'] = $this->sales_model->getPaypalSettings();
//        //$this->data['skrill'] = $this->sales_model->getSkrillSettings();
//
//        $name = lang("sale") . "_" . str_replace('/', '_', $inv->reference_no) . ".pdf";
//        $html = $this->load->view($this->theme . 'sales/pdf', $this->data, true);
//        
        
        $data = [];
        //load the view and saved it into $html variable
        $html=$this->load->view('plans/index', $data, true);
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "plans.pdf";
 
        //load mPDF library
        $this->load->library('pdf');
 
       //generate the PDF from the given html
        $this->sma->pdf->WriteHTML($html);
 
        //download it.
        $this->sma->pdf->Output($pdfFilePath, "D");  
        

//        if ($view) {
//            $this->load->view($this->theme . 'sales/pdf', $this->data);
//        } elseif ($save_bufffer) {
//            return $this->sma->generate_pdf($html, $name, $save_bufffer, $this->data['biller']->invoice_footer);
//        } else {
//            $this->sma->generate_pdf($html, $name, false, $this->data['biller']->invoice_footer);
//        }
    }
}

