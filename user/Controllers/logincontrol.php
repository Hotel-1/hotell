<?php
session_start();
require("../LogicLayer/User.php");
include("../LogicLayer/UserManager.php");
$user = new UserControl(0,$_POST['email'],$_POST['password']);
$flag = UserManager::controlUser($user);
if($flag==true){
	$_SESSION["login"] = "true";
	$_SESSION["Email"] = $user->getEmail();
	$_SESSION["Password"] = $user->getPassword();
	$_SESSION["ID"] = $user->getUserID();
	echo "<center><font color='green'>İÇERDEMA</font></center>";
	header("Refresh: 0 ; url= ../PresentationLayer/listhotels.php");
}
else {
	echo "<center><font color='red'>Hata!.. Kullanici adi veya Sifre yanlis.</font></center>";
	header("Refresh: 0; url=../index.php");
}
?>