<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanel extends CI_Controller {


	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in') !== TRUE){
	    		redirect('user');
	    	}
    
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

		$this->load->view('pages/control-panel');
		$this->load->view('templates/footer');	

	}

}
