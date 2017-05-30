<?php 
	class Hotel {
		private $ID;
		private $Name;
		private $Address;
		private $State;
		private $Phone;
		private $Description;
		
		function __construct($ID = NULL, $Name = NULL, $Address = NULL,$State = NULL,$Phone = NULL,$Description = NULL) {
			$this->ID = $ID;
			$this->Name = $Name;
			$this->Address = $Address;
			$this->State = $State;
			$this->Phone = $Phone;
			$this->Description = $Description;
		}
		
		public function getID() {
			return $this->ID;
		}
		
		public function getName() {
			return $this->Name;
		}
		
		public function getAddress() {
			return $this->Address;	
		}
		
		public function getState() {
			return $this->State;	
		}
		
		public function getPhone() {
			return $this->Phone;	
		}
		
		public function getDescription() {
			return $this->Description;	
		}
	}
?>