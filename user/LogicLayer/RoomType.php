<?php 
	class RoomType {
		private $ID;
		private $Name;
		private $Description;
		private $Price;
		
		function __construct($ID = NULL, $Name = NULL, $Description = NULL,$Price = NULL) {
			$this->ID = $ID;
			$this->Name = $Name;
			$this->Description = $Description;
			$this->Price = $Price;
		}
		
		public function getID() {
			return $this->ID;
		}
		
		public function getName() {
			return $this->Name;
		}
		
		public function getDescription() {
			return $this->Description;	
		}
		
		public function getPrice() {
			return $this->Price;	
		}
	}
?>