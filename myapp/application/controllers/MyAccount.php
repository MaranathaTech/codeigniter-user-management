<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MyAccount extends CI_Controller {


	public function __construct(){
		
		parent::__construct();

		if($this->session->userdata('logged_in') !== TRUE){
			redirect('user');
    		}

    		$this->load->model('User_model');
    	
	}


	public function index(){
		
		//check user permissions to load admin header
		if($this->session->userdata('level') == 1){
			
			$this->load->view('templates/admin-header');

		}
		//check user permissions to load standard user
		else if($this->session->userdata('level') == 3){

			$this->load->view('templates/user-header');

		}
		//check user permissions to load base header
		else{

			$this->load->view('templates/header');

		}

		$this->load->view('pages/account');
		$this->load->view('templates/footer');	

    }

	//function to process update form submissions
	public function update(){
		
		$email = $this->session->userdata('email');
		$org = $this->input->post('user_org', TRUE);
		$pass = md5($this->input->post('user_password', TRUE));

		$validate = $this->User_model->update($email, $pass, $org);
		
		if($validate === TRUE ){//update successful
				
			echo $this->session->set_flashdata('msg','Account information updated successfully!');
			redirect('myaccount');

		}
		else{//update failed
				
			echo $this->session->set_flashdata('msg','Account update failed! Please contact support.');
			redirect('myaccount');

		}
		
	}


}
