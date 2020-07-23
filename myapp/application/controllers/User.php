<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct(){
		
		parent::__construct();

    	$this->load->model('User_model');
    	$this->load->model('Reset_model');

	}


	public function index(){
		
		if($this->session->userdata('logged_in') === TRUE){
			redirect('controlpanel');
    	}

		//check user permissions to load admin header
		if($this->session->userdata('level')=== 1){
			
			$this->load->view('templates/admin-header');

		}
		//check user permissions to load standard user
		else if($this->session->userdata('level')=== 3){

			$this->load->view('templates/user-header');

		}
		//check user permissions to load base header
		else{

			$this->load->view('templates/header');

		}

		$this->load->view('pages/user');
		$this->load->view('templates/footer');	

	}


	private function generateID(){
		
		$dt = new DateTime();
		$ts =  $dt->getTimestamp(); 
		$id = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'),1,20) . $ts . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'),1,20);

		return $id;

	}


	public function reset(){
		//generate email to reset password

        $this->load->config('email');
        $this->load->library('email');

	$id = $this->generateID();
        
        $from = $this->config->item('smtp_user');
        $to = $this->input->post('user_email');
        $subject = 'Password Reset Confirmation';

        $resetURL = "https://" . $_SERVER['SERVER_NAME'] . '/user/reset_confirmation?id=' . $id . '&email=' . $to;

        $message = 'This password reset email was requested via our website. Please use the link below to reset your password. /r/r';
        $message .= $resetURL . '/r/r';
        $message .= 'If you did not request this email, please contact us.';

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        //write reset link to db
	$this->Reset_model->storeResetLink($to, $id);

        if ($this->email->send()) {
			
		echo $this->session->set_flashdata('msg','Your password reset email has been sent. Please check your email for the link to finish the password reset.');

		redirect('user');

        } else {
            
		show_error($this->email->print_debugger());

        }

	}


	public function reset_confirmation(){
		
		$email = $this->input->get('email', TRUE);
		$id = $this->input->get('id', TRUE);

		//check to see if reset id exists in database
		$check = $this->Reset_model->validateResetLink($email, $id);
				
		if($check->num_rows() > 0){//reset id exists
			
			//trash reset link
			$this->Reset_model->deleteResetLink($id);

			//log user in
			$sessionData = array(
				'email'		=> $email,
				'level'		=> 3,
				'logged_in'	=> TRUE
			);

			$this->session->set_userdata($sessionData);

			//redirect to page that allows for password reset
			redirect('myaccount');

		}
		else{//invalid request
			
			echo $this->session->set_flashdata('msg','Reset link expired or doesn\'t exist! Please try to reset again or contact support.');
			redirect('user');

		}

	}


	//function to process registraion form submissions
	public function register(){
		
		$email = $this->input->post('user_email', TRUE);
		$pass = md5($this->input->post('user_password', TRUE));

		//check to see if user exists in database already
		$check = $this->User_model->checkForUser($email);
		
		
		if($check->num_rows() > 0){//user exists
			
			echo $this->session->set_flashdata('msg','User already exists! Please try to log in or reset your password.');
			redirect('user');

		}
		else {//no user exists, proceed to registration

			$validate = $this->User_model->register($email, $pass);
		
			if($validate === TRUE ){//registration successful
				
				$userData = [];
				$email = $userData['user_email'];
				$level = 3; //restrict base registration function to standard user

				$sessionData = array(
					'email'		=> $email,
					'level'		=> $level,
					'logged_in'	=> TRUE
				);

				$this->session->set_userdata($sessionData);
				redirect('controlpanel');

			}
			else{//registration failed
				
				echo $this->session->set_flashdata('msg','User registration failed! Please contact support.');
				redirect('user');

			}
		}
	}


	//function to process login form submissions
	public function login(){
		
		$email = $this->input->post('user_email', TRUE);
		$pass = md5($this->input->post('user_password', TRUE));
		$validate = $this->User_model->validate($email, $pass);

		if($validate->num_rows() > 0){//login success
			
			$userData = $validate->row_array();
			$email = $userData['user_email'];
			$level = $userData['user_level'];

			$sessionData = array(
				'email'		=> $email,
				'level'		=> $level,
				'logged_in'	=> TRUE
			);

			$this->session->set_userdata($sessionData);
			redirect('controlpanel');

		}
		else{//login failed
			
			echo $this->session->set_flashdata('msg','Username or Password is incorrect.');
			redirect('user');

		}
	}


	public function logout(){
		
    	$this->session->set_userdata('logged_in', FALSE);
		$this->session->sess_destroy();

		redirect('user');

	}

}

