<?php 
	class Room {
		private $ID;
		private $Hotel_ID;
		private $Description;
		private $Image;
		private $Name;
		private $Type_ID;
		
		function __construct($ID = NULL, $Hotel_ID = NULL, $Description = NULL,$Image = NULL,$Name = NULL,$Type_ID = NULL) {
			$this->ID = $ID;
			$this->Hotel_ID = $Hotel_ID;
			$this->Description = $Description;
			$this->Image = $Image;
			$this->Name = $Name;
			$this->Type_ID = $Type_ID;
		}
		
		public function getID() {
			return $this->ID;
		}
		
		public function getHotel_ID() {
			return $this->Hotel_ID;
		}
		
		public function getDescription() {
			return $this->Description;	
		}
		
		public function getImage() {
			return $this->Image;	
		}
		
		public function getName() {
			return $this->Name;	
		}
		
		public function getType_ID() {
			return $this->Type_ID;	
		}
	}
?>