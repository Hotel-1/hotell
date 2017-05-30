<?php
session_start();
$id=$_GET["id"];

require("../LogicLayer/RoomManager.php");

$row = RoomManager::getRoom($id);
$_hotelid=$row->getHotel_ID();
$_description=$row->getDescription();
$_image=$row->getImage();
$_name=$row->getName();
$_typeid=$row->getType_ID();


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
	
	$target = "images/".basename($_FILES['image']['name']);
	
	$room = new Room($id,$_POST["Hotel_ID"],$_POST["Description"],$_FILES['image']['name'],$_POST["Name"],$_POST["Type_ID"]);
	$res = RoomManager::updateRoom($room);
	$msg="";
	if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
		$msg = "oldu";
	}else{
		$msg = "olmadi";
	}
	
	if (!$res) { 
		echo '<script language="javascript">';
		echo 'alert("Add failed.Try again..")';
		echo '</script>';
	}
	else{
	    echo '<script language="javascript">';
		echo 'alert("Add success!")';
		echo '</script>';
		echo '<script language="javascript">';
		echo 'window.close()';
		echo '</script>';
	}
}

?>

<form action='updateroom.php?id=<?php echo $_GET['id'];?>' method="post" enctype="multipart/form-data" name="formname" >
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Room  
<button type="submit" class="btn btn-success" name="update" id="update" >Update</button>
<a href="javascript://" onclick="javascript:window.close();" >  <button type="button" class="btn btn-danger">Cancel</button></a> 
            </div>
  
                <div class="panel-body">
					<div class="form-group col-lg-12">
						<label>Hotel ID</label>
						<input type="text" name="Hotel_ID" class="form-control"  id="" value="<?php echo $_hotelid ?>" required>
					</div>
					<div class="form-group col-lg-12">
						<label>Description</label>
						<input type="text" name="Description" class="form-control" id="" value="<?php echo $_description ?>" required>
					</div>
					
					
					
					<div class="form-group col-lg-12">
					<?php echo "<img height='100' width='100' src='images/".$row->getImage()."'>";?>
					<label>Image</label>
					<input type="file" name="image" class="form-control" required>
					</div>
					<div class="form-group col-lg-12">
						<label>Name</label>
						<input type="text" name="Name" class="form-control"  id="" value="<?php echo $_name ?>" required>
					</div>
					<div class="form-group col-lg-12">
						<label>Type ID</label>
						<input type="text" name="Type_ID" class="form-control"  id="" value="<?php echo $_typeid ?>" required>
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