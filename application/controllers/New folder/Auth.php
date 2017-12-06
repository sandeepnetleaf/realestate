<?php defined('BASEPATH') OR exit('No direct sceipt access allowed');
class Auth extends MY_Controller{
	function __construct(){
		parent::__construct();
		//load database 
		$this->load->model('auth_model');

	}

	//show login page
	public function index(){
		$this->load->view('auth/login');
	}

	//check for user login process
	function login($m = NULL)
	{
		//Fetch from input value submitted by user
		$userName = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));

		//echo '<pre>'; print_r($password); die;
		
		//Fetch information from database by username and password
		$query = $this->auth_model->login($userName, $password);

		//Set validation rules for username and password field
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password','trim|required');

		//Set error message
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		//$this->form_validation->set_message('required', 'Enter %s');

		if($this->form_validation->run() == TRUE){
			
			if($query){
				$query = $query->result();
				$user = array('USER_ID'=>$query[0]->id,
							'USER_NAME'=>$query[0]->username,
							'EMAIL'=>$query[0]->email);
				$this->session->set_userdata($user);
				redirect('dashboard');
			}
			//redirect(base_url());
		}
		else
		{
			$this->load->view('auth/login');
		}
	}

	//custom validation method
	/*
	public function validateUser($userName, $recordCount){
		if($recordCount !=0){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('validateuser', 'Invalid %s or Password');
			return FALSE;
		}
	}
*/
	function logout($m = NULL){
		$this->session->unset_userdata($user);
		redirect(base_url());
	}

}