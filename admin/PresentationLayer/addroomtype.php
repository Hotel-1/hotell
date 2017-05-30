<?php
require("../LogicLayer/RoomTypeManager.php");
if(isset($_POST["add"])){
	$roomtype = new RoomType(0,$_POST["Name"],$_POST["Description"],$_POST["Price"]);
	$res = RoomTypeManager::insertRoomType($roomtype);
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

	<form method="POST" action="addroomtype.php" enctype="multipart/form-data">
	 <div class="panel-heading"> 
<button type="submit" class="btn btn-success" name="add" id="add">Add</button>
                          <a href="javascript://" onclick="javascript:window.close();">  <button type="button" class="btn btn-danger">Cancel</button></a> 
                    </div>
				<div class="form-group col-lg-12">
					<label>Name</label>
					<input type="text" name="Name" class="form-control"  required>
				</div>
				<div class="form-group col-lg-12">
					<label>Description</label>
					<input type="text" name="Description" class="form-control" required>
				</div>
				<div class="form-group col-lg-12">
					<label>Price</label>
					<input type="text" name="Price" class="form-control"  required>
				</div>
</form>


<script>
	window.onunload = refreshParent;
	function refreshParent(){
		window.opener.location.reload();
	}
</script>