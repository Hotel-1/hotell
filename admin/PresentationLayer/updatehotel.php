<?php
session_start();
$id=$_GET["id"];

require("../LogicLayer/HotelManager.php");


// get book information
$row = HotelManager::getHotel($id);
$_name=$row->getName();
$_address=$row->getAddress();
$_state=$row->getState();
$_phone=$row->getPhone();
$_description=$row->getDescription();

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

$hotel = new Hotel($id,$_POST["Name"],$_POST["Address"],$_POST["State"],$_POST["Phone"],$_POST["Description"]);
$res = HotelManager::updateHotel($hotel);
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


<form action='updatehotel.php?id=<?php echo $_GET['id'];?>' method="post" enctype="multipart/form-data" name="formname" >
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Hotel  
<button type="submit" class="btn btn-success" name="update" id="update" >Update</button>
<a href="javascript://" onclick="javascript:window.close();" >  <button type="button" class="btn btn-danger">Cancel</button></a> 
            </div>
  
                <div class="panel-body">
					<div class="form-group col-lg-12">
						<label>Name</label>
						<input type="text" name="Name" class="form-control"  id="" value="<?php echo $_name ?>" required>
					</div>
					<div class="form-group col-lg-12">
						<label>Address</label>
						<input type="text" name="Address" class="form-control" id="" value="<?php echo $_address ?>" required>
					</div>
					<div class="form-group col-lg-12">
						<label>State</label>
						<input type="text" name="State" class="form-control"  id="" value="<?php echo $_state ?>" required>
					</div>
					<div class="form-group col-lg-12">
						<label>Phone</label>
						<input type="text" name="Phone" class="form-control"  id="" value="<?php echo $_phone ?>" required>
					</div>
					<div class="form-group col-lg-12">
						<label>Description</label>
						<input type="text" name="Description" class="form-control"  id="" value="<?php echo $_description ?>" required>
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