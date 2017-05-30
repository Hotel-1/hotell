<?php
session_start();
$id=$_GET["id"];

require("../LogicLayer/UserManager.php");


// get book information
$row = UserManager::getUser($id);
$_name=$row->getUserName();
$_surname=$row->getUserSurname();
$_email=$row->getEmail();
$_password=$row->getPassword();

?>
 <!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
		require("style.php");
	?>


</head>
<?php

if(isset($_POST["update"])){

$user = new User($id,$_POST["name"],$_POST["surname"],$_POST["email"],$_POST["password"]);
$res = UserManager::updateUser($user);
	if (!$res) { 
		echo '<script language="javascript">';
		echo 'alert("Update failed.Try again..")';
		echo '</script>';
	}
	else{
	    echo '<script language="javascript">';
		echo 'alert("Update success!")';
		echo '</script>';
		echo '<script language="javascript">';
		echo 'window.close()';
		echo '</script>';
	}
}

?>


<form action='updateuser.php?id=<?php echo $_GET['id'];?>' method="post" enctype="multipart/form-data" name="formname" >
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Update Profile 
<button type="submit" class="btn btn-success" name="update" id="update" >Update</button>
<a href="javascript://" onclick="javascript:window.close();" >  <button type="button" class="btn btn-danger">Cancel</button></a> 
                    </div>
  
                        <div class="panel-body">
				<div class="form-group col-lg-12">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo $_name ?>" required>
				</div>
				<div class="form-group col-lg-12">
					<label>Surname</label>
					<input type="text" name="surname" class="form-control" value="<?php echo $_surname ?>" required>
				</div>
				<div class="form-group col-lg-12">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo $_email ?>" required>
				</div>
				<div class="form-group col-lg-12">
					<label>Password</label>
					<input type="text" name="password" class="form-control" value="<?php echo $_password ?>" required>
				</div>
				</div>
			</div>	

                        </div>
                       
                    </div>
                    </form>
                    </body>
					
					
<script>
	window.onunload = refreshParent;
	function refreshParent(){
		window.opener.location.reload();
	}
</script>