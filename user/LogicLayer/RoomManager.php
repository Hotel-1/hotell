<?php
	require_once("../DataLayer/DB.php");
	require_once("Room.php");

	class RoomManager {

		public static function getAllRooms () {
			$db = new DB();
			$result = $db->getDataTable("select * from room ");

			$allHotels = array();

			while($row = $result->fetch_assoc()) {
				$hotel = new Room($row["ID"], $row["Name"], $row["Hotel_ID"], $row["Description"]);
				array_push($allHotels, $hotel);
			}

			return $allHotels;
		}

    public static function getHotelRooms ($id) {
      $db = new DB();
      $sql = "select * from room where Hotel_ID=" .$id;
      $result = $db->getDataTable($sql);

      $allHotels = array();
      while($row = $result->fetch_assoc()) {
        $hotel = new Room($row["ID"], $row["Hotel_ID"], $row["Description"], $row["Image"], $row["Name"], $row["Type_ID"]);
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
