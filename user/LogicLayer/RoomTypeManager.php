<?php 
	require_once("../DataLayer/DB.php");
	require_once("RoomType.php");
	
	class RoomTypeManager {
		
		public static function getAllRoomTypes () {
			$db = new DB();
			$result = $db->getDataTable("select * from room_type ");
			
			$allRoomTypes = array();
			
			while($row = $result->fetch_assoc()) {
				$roomtype = new RoomType($row["ID"], $row["Name"], $row["Description"], $row["Price"]);
				array_push($allRoomTypes, $roomtype);
			}
			
			return $allRoomTypes;
		}
		
		public static function getRoomType($id){
			
			$db = new DB();
			$sql = "select * from room_type where ID=" .$id;
			$result = $db->getDataTable($sql);
			$row = $result->fetch_assoc();
			if($row){
				$roomtype = new RoomType($row["ID"], $row["Name"], $row["Description"], $row["Price"]);
				return $roomtype;
			}
			else 
				return null;
		
		}
		
		public static function insertRoomType($roomtype){
			$db = new DB();
			$sql = "insert into room_type values(NULL,'".$roomtype->getName()."','".$roomtype->getDescription()."','".$roomtype->getPrice()."')";
			return $db->getDataTable($sql);
		}
		
		public static function updateRoomType($roomtype){
			$db = new DB();
			$sql = "update room_type set Name='".$roomtype->getName()."',Description='".$roomtype->getDescription()."',Price='".$roomtype->getPrice()."' where ID = ".$roomtype->getID();
			return $db->getDataTable($sql);
		}
		
		public static function deleteRoomType($id){
			$db = new DB();
			$sql = "delete from room_type where ID=".$id;
			return $db->getDataTable($sql);
		}
		
		
	}
?>