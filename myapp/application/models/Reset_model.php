<?php

	class Reset_model extends CI_Model{


		public function __construct(){
			parent::__construct();
		}


		public function storeResetLink($email, $id){
	    		$data = array(
	        	'user_email' 	=> $email,
	        	'reset_id' 		=> $id
	    		);
	
	    		$result = $this->db->insert('reset_urls',$data);
			return $result;
		}


		public function deleteResetLink($id){
			$this->db->where('reset_id',$id);
			$result = $this->db->delete('reset_urls');
			return $result;
		}


		public function validateResetLink($email, $id){
			$this->db->where('user_email',$email);
			$this->db->where('reset_id',$id);
			$result = $this->db->get('reset_urls', 1);
			return $result;
		}

}
