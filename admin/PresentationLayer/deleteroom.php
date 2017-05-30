<?php

if(isset($_POST["delete"])){
require("../LogicLayer/RoomManager.php");
$res = RoomManager::deleteRoom($_GET["id"]);
	if (!$res) { 
		echo '<script language="javascript">';
		echo 'alert("Deletion failed.Try again..")';
		echo '</script>';
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Hotel was successfully deleted.")';
		echo '</script>';
		echo '<script language="javascript">';
		echo 'window.close()';
		echo '</script>';
	}



}



?>

<form action='deleteroom.php?id=<?php echo $_GET['id'];?>' method="post">
<div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            Delete Room
                        </div>
                        <div class="panel-body">
                            <p>Are you sure you wish to delete this Room?</p>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-success" name="delete" id="delete">Delete</button>
                          <a href="javascript://" onclick="javascript:window.close();">  <button type="button" class="btn btn-danger">Cancel</button></a> 
                        </div>
                    </div>
</form>

<script>
	window.onunload = refreshParent;
	function refreshParent(){
		window.opener.location.reload();
	}
</script>