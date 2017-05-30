<?php
require("../LogicLayer/RoomManager.php");
if(isset($_POST["add"])){
	$target = "images/".basename($_FILES['image']['name']);
	$room = new Room(0,$_POST["Hotel_ID"],$_POST["Description"],$_FILES['image']['name'],$_POST["Name"],$_POST["Type_ID"]);
	$res = RoomManager::insertRoom($room);
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
require("style.php");
?>

	<form method="POST" action="addroom.php" enctype="multipart/form-data">
	<input type="hidden" name="size" value=1000000>
	 <div class="panel-heading"> 
		<button type="submit" class="btn btn-success" name="add" id="add">Add</button>
                          <a href="javascript://" onclick="javascript:window.close();">  <button type="button" class="btn btn-danger">Cancel</button></a> 
                    </div>
				<div class="form-group col-lg-12">
					<label>Hotel_ID</label>
					<input type="text" name="Hotel_ID" class="form-control"  required>
				</div>
				<div class="form-group col-lg-12">
					<label>Description</label>
					<input type="text" name="Description" class="form-control" required>
				</div>
				<div class="form-group col-lg-12">
					<label>Image</label>
					<input type="file" name="image" class="form-control"  required>
				</div>
				<div class="form-group col-lg-12">
					<label>Name</label>
					<input type="text" name="Name" class="form-control"  required>
				</div>
				<div class="form-group col-lg-12">
					<label>Type_ID</label>
					<input type="text" name="Type_ID" class="form-control" required>
				</div>
</form>


<script>
	window.onunload = refreshParent;
	function refreshParent(){
		window.opener.location.reload();
	}
</script>