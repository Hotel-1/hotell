<?php
require("../LogicLayer/UserManager.php");
if(isset($_POST["add"])){
	$user = new User(0,$_POST["name"],$_POST["surname"],$_POST["email"],$_POST["password"]);
	$res = UserManager::addNewUser($user);
	if (!$res) { 
		echo '<script language="javascript">';
		echo 'alert("Add failed.Try again..")';
		echo '</script>';
		header("Refresh: 0; url=../index.php");
	}
	else{
	    echo '<script language="javascript">';
		echo 'alert("Add success!")';
		echo '</script>';
		echo '<script language="javascript">';
		echo 'window.close()';
		echo '</script>';
		header("Refresh: 0; url=../index.php");
	}
}
require("style.php");
?>

	<form method="POST" action="adduser.php" enctype="multipart/form-data">
	 <div class="panel-heading"> 
                    </div>
				<div class="form-group col-lg-12">
					<label>Name</label>
					<input type="text" name="name" class="form-control"  required>
				</div>
				<div class="form-group col-lg-12">
					<label>Surname</label>
					<input type="text" name="surname" class="form-control" required>
				</div>
				<div class="form-group col-lg-12">
					<label>Email</label>
					<input type="text" name="email" class="form-control"  required>
				</div>
				<div class="form-group col-lg-12">
					<label>Password</label>
					<input type="text" name="password" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-success" name="add" id="add" onclick="location.href='login.php';">Register Me</button>
                <a href="javascript://" onclick="location.href='login.php';">  <button type="button" class="btn btn-danger">Cancel</button></a> 
</form>


<script>
	window.onunload = refreshParent;
	function refreshParent(){
		window.opener.location.reload();
	}
</script>