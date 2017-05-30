<?php 
	require_once("../DataLayer/DB.php");
	require_once("Admin.php");
	
	class AdminManager {
		
		
		public static function controlAdmin($admin){
			
			$db = new DB();
			$sql = "select * from admin where (username='".$admin->getUserName()."' and password='".$admin->getPassword()."')";
			$result = $db->getDataTable($sql);
			
			
			while($row = $result->fetch_assoc()) {
				$admin->setUserID( $row["ID"] );
				return true;}
			
		}
		
	}
?>