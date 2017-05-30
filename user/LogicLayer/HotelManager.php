<?php 
	require_once("../DataLayer/DB.php");
	require_once("Hotel.php");
	
	class HotelManager {
		
		public static function getAllHotels () {
			$db = new DB();
			$result = $db->getDataTable("select * from hotel ");
			
			$allHotels = array();
			
			while($row = $result->fetch_assoc()) {
				$hotel = new Hotel($row["ID"], $row["Name"], $row["Address"], $row["State"], $row["Phone"], $row["Description"]);
				array_push($allHotels, $hotel);
			}
			
			return $allHotels;
		}
		
		public static function getHotel($id){
			
			$db = new DB();
			$sql = "select * from hotel where ID=" .$id;
			$result = $db->getDataTable($sql);
			$row = $result->fetch_assoc();
			if($row){
				$hotel = new Hotel($row["ID"], $row["Name"], $row["Address"], $row["State"], $row["Phone"], $row["Description"]);
				return $hotel;
			}
			else 
				return null;
		
		}
	}
?>