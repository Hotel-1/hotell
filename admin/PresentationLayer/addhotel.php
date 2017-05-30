<?php
require("../LogicLayer/HotelManager.php");
if(isset($_POST["add"])){
	$hotel = new Hotel(0,$_POST["Name"],$_POST["Address"],$_POST["State"],$_POST["Phone"],$_POST["Description"]);
	$res = HotelManager::insertHotel($hotel);
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

	<form method="POST" action="addhotel.php" enctype="multipart/form-data">
	 <div class="panel-heading"> 
<button type="submit" class="btn btn-success" name="add" id="add">Add</button>
                          <a href="javascript://" onclick="javascript:window.close();">  <button type="button" class="btn btn-danger">Cancel</button></a> 
                    </div>
				<div class="form-group col-lg-12">
					<label>Name</label>
					<input type="text" name="Name" class="form-control"  required>
				</div>
				<div class="form-group col-lg-12">
					<label>Address</label>
					<input type="text" name="Address" class="form-control" required>
				</div>
				<div class="form-group col-lg-12">
					<label>State</label>
					<input type="text" name="State" class="form-control"  required>
				</div>
				<div class="form-group col-lg-12">
					<label>Phone</label>
					<input type="text" name="Phone" class="form-control"  required>
				</div>
				<div class="form-group col-lg-12">
					<label>Description</label>
					<input type="text" name="Description" class="form-control" required>
				</div>
</form>


<script>
	window.onunload = refreshParent;
	function refreshParent(){
		window.opener.location.reload();
	}
</script>