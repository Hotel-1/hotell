<?php
session_start();
$id=$_GET["id"];

require("../LogicLayer/UserManager.php");


// get book information
$row = UserManager::getUser($id);
$_name=$row->getUserFirstName();
$_surname=$row->getUserLastName();
$_username=$row->getUserUserName();
$_address=$row->getUserAddress();
$_email=$row->getUserEmail();
$_password=$row->getUserPassword();
$_phone=$row->getUserPhoneNumber();
$_credit=$row->getUserCreditCardNo();

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


<a class="btn btn-block btn-primary">User Information</a>
<div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" data-show-refresh="true" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
											<th>ID</th>
											<th>Name</th>
											<th>Surname</th>
											<th>Username</th>
											<th>Address</th>
											<th>Email</th>
											<th>Password</th>
											<th>PhoneNo</th>
											<th>CreditCardNo</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<tr>
				<td><?php echo $id ?></td>
				<td><?php echo $_name ?></td>
				<td><?php echo $_surname ?></td>
				<td><?php echo $_username?></td>
				<td><?php echo $_address ?></td>
				<td><?php echo $_email ?></td>
				<td><?php echo $_password ?></td>
				<td><?php echo $_phone ?></td>
				<td><?php echo $_credit ?></td>
		  </tr>
		        </tbody>
                                </table>
                            </div>
					
<script>
	window.onunload = refreshParent;
	function refreshParent(){
		window.opener.location.reload();
	}
</script>