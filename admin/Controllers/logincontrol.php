<?php
session_start();
require("../LogicLayer/Admin.php");
include("../LogicLayer/AdminManager.php");
$user = new Admin(0,$_POST['username'],$_POST['password']);
$flag = AdminManager::controlAdmin($user);
if($flag==true){
	echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
	echo "<center><font color='GREEN' size=10><strong>Hello ".$user->getUserName()."</strong></font></center>" . "<br/>";
	$_SESSION["login"] = "true";
	$_SESSION["Username"] = $user->getUserName();
	$_SESSION["Password"] = $user->getPassword();
	$_SESSION["MemberID"] = $user->getUserID();
	echo "<center><font color='GREEN' size=8><strong>REDIRECTING TO THE ADMIN PANEL</strong></font></center>";
	header("Refresh: 4 ; url= ../PresentationLayer/admin.php");
}
else {
	echo "<center><font color='red'>Hata!.. Kullanici adi veya Sifre yanlis.</font></center>";
	header("Refresh: 4; url=../index.php");
}
?>