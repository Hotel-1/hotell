<?php 
session_start();

if(!isset($_SESSION["login"]))
	echo "No Session!";
else 
	echo 'There is session';
?>