<?php 
	class Admin {
		private $id;
		private $username;
		private $password;
		
		function __construct($id=NULL,$username=NULL,$password=NULL) {
			$this->id = $id;
			$this->username = $username;
			$this->password = $password;
		}
		
		public function getUserID() {
			return $this->id;
		}
		public function setUserID($user_id){
			$this->id = $user_id;
		}
		
		public function getUserName() {
			return $this->username;
		}
		
		public function getPassword() {
			return $this->password;	
		}
		
		
	}
?>