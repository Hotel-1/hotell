<?php
session_start();
$id=$_GET["id"];

require("../LogicLayer/RoomTypeManager.php");

$row = RoomTypeManager::getRoomType($id);
$_name=$row->getName();
$_description=$row->getDescription();
$_price=$row->getPrice();


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

$roomtype = new RoomType($id,$_POST["Name"],$_POST["Description"],$_POST["Price"]);
$res = RoomTypeManager::updateRoomType($roomtype);
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


<form action='updateroomtype.php?id=<?php echo $_GET['id'];?>' method="post" enctype="multipart/form-data" name="formname" >
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit RoomType  
<button type="submit" class="btn btn-success" name="update" id="update" >Update</button>
<a href="javascript://" onclick="javascript:window.close();" >  <button type="button" class="btn btn-danger">Cancel</button></a> 
            </div>
  
                <div class="panel-body">
					<div class="form-group col-lg-12">
						<label>Name</label>
						<input type="text" name="Name" class="form-control"  id="" value="<?php echo $_name ?>" required>
					</div>
					<div class="form-group col-lg-12">
						<label>Description</label>
						<input type="text" name="Description" class="form-control" id="" value="<?php echo $_description ?>" required>
					</div>
					<div class="form-group col-lg-12">
						<label>Price</label>
						<input type="text" name="Price" class="form-control"  id="" value="<?php echo $_price ?>" required>
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