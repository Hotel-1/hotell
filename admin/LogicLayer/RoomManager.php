<?php 
	require_once("../DataLayer/DB.php");
	require_once("Room.php");
	
	class RoomManager {
		
		public static function getAllRooms () {
			$db = new DB();
			$result = $db->getDataTable("select * from room ");
			
			$allRooms = array();
			
			while($row = $result->fetch_assoc()) {
				$room = new Room($row["ID"], $row["Hotel_ID"], $row["Description"], $row["Image"], $row["Name"], $row["Type_ID"]);
				array_push($allRooms, $room);
			}
			
			return $allRooms;
		}
		
		public static function getRoom($id){
			
			$db = new DB();
			$sql = "select * from room where ID=" .$id;
			$result = $db->getDataTable($sql);
			$row = $result->fetch_assoc();
			if($row){
				$room = new Room($row["ID"], $row["Hotel_ID"], $row["Description"], $row["Image"], $row["Name"], $row["Type_ID"]);
				return $room;
			}
			else 
				return null;
		
		}
		
		public static function insertRoom($room){
			$db = new DB();
			$sql = "insert into room values(NULL,'".$room->getHotel_ID()."','".$room->getDescription()."','".$room->getImage()."','".$room->getName()."','".$room->getType_ID()."')";
			return $db->getDataTable($sql);
		}
		
		public static function updateRoom($room){
			$db = new DB();
			$sql = "update room set Hotel_ID='".$room->getHotel_ID()."',Description='".$room->getDescription()."',Image='".$room->getImage()."',Name='".$room->getName()."',Type_ID='".$room->getType_ID()."' where ID = ".$room->getID();
			return $db->getDataTable($sql);
		}
		
		public static function deleteRoom($id){
			$db = new DB();
			$sql = "delete from room where ID=".$id;
			return $db->getDataTable($sql);
		}
		
		
	}
?>