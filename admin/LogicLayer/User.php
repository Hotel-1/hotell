<?php 
	class User {
		private $ID;
		private $UserName;
		private $UserSurname;
		private $Email;
		private $Password;

		
		function __construct($ID=NULL,$UserName=NULL,$UserSurname=NULL,$Email=NULL,$Password=NULL) {
			$this->ID = $ID;
			$this->UserName = $UserName;
			$this->UserSurname = $UserSurname;
			$this->Email = $Email;
			$this->Password = $Password;
		}
		public function getUserID() {
			return $this->ID;
		}
		public function setUserID($ID){
			$this->ID = $ID;
		}
		
		public function getUserName() {
			return $this->UserName;
		}
		
		public function getUserSurname() {
			return $this->UserSurname;
		}

		public function getPassword() {
			return $this->Password;
		}
		
		public function getEmail() {
			return $this->Email;
		}
		
	}
	class UserControl {
		private $ID;
		private $Email;
		private $Password;
		
		function __construct($ID=NULL,$Email=NULL,$Password=NULL) {
			$this->ID = $ID;
			$this->Email = $Email;
			$this->Password = $Password;
		}
		public function getUserID() {
			return $this->ID;
		}
		public function setUserID($ID){
			$this->ID = $ID;
		}
		
		public function getEmail() {
			return $this->Email;
		}
		public function getPassword() {
			return $this->Password;	
		}
	}
?>