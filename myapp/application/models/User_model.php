<?php

	class User_model extends CI_Model{


		public function __construct(){
			
			parent::__construct();

		}


		public function validate($email,$pass){
			
			$this->db->where('user_email',$email);
			$this->db->where('user_password',$pass);
			$result = $this->db->get('users', 1);
			return $result;

		}


		public function checkForUser($email){
			
			$this->db->where('user_email',$email);
			$result = $this->db->get('users', 1);
			return $result;

		}


		public function register($email, $pass){
    		
    		$data = array(
        	'user_email' 	=> $email,
        	'user_password' => $pass,
        	'user_level'	=> 3
    		);

    		$result = $this->db->insert('users',$data);
			return $result;

		}


		public function update($email, $pass, $org){
    		
    		$data = array(
        	'user_password' => $pass,
    		'user_org' 		=> $org
    		);

    		$this->db->where('user_email', $email);
    		$result = $this->db->update('users', $data);

    		return true;

		}


	}