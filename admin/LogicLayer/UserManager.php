<?php 

	require_once("../DataLayer/DB.php");
	require_once("User.php");
	
	class UserManager {
		
		public static function getAllUsers () {
			$db = new DB();
			$result = $db->getDataTable("select * from user order by ID");
			
			$allUsers = array();
			
			while($row = $result->fetch_assoc()) {
				$userObj = new User($row["ID"], $row["UserName"], $row["UserSurname"], $row["Password"], $row["Email"]);
				array_push($allUsers, $userObj);
			}
			
			return $allUsers;
		}
		
		
		public static function getUser($ID){
			
			$db = new DB();
			$sql = "select * from user where ID=" .$ID;
			$result = $db->getDataTable($sql);
			$row = $result->fetch_assoc();
			if($row){
				$user = new User($row["ID"], $row["UserName"], $row["UserSurname"], $row["Password"], $row["Email"]);
				return $user;
			}
			else 
				return null;
		
		}
		
		
		public static function controlUser($user){
			
			$db = new DB();
			$sql = "select * from user where (Email='".$user->getEmail()."' and Password='".$user->getPassword()."')";
			$result = $db->getDataTable($sql);
			
			
			while($row = $result->fetch_assoc()) 
			{
				$user->setUserID( $row["ID"] );
				return true;
			}
			
		}
		
		public static function addNewUser($user) {
			$db = new DB();
			$sql = "insert into user values(NULL,'".$user->getUserName()."','".$user->getUserSurname()."','".$user->getPassword()."','".$user->getEmail()."')";
			return $db->getDataTable($sql);
		}
		
		public static function updateUser($user){
			$db = new DB();
			$sql = "update user set UserName='".$user->getUserName()."',UserSurname='".$user->getUserSurname()."',Password='".$user->getPassword()."',Email='".$user->getEmail();
			return $db->getDataTable($sql);
			$row = $result->fetch_assoc();
		}
		
		public static function deleteUser($user_id){
			$db = new DB();
			$sql = "delete from user where ID=".$user_id;
			return $db->getDataTable($sql);
		}
		
	}
?>