<?php
$id =  $_GET['id'];
require_once("../LogicLayer/HotelManager.php");
$hotel = HotelManager::getHotel($id);
require_once("../LogicLayer/RoomManager.php");
$rooms = RoomManager::getHotelRooms($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hotel</title>
	<?php
		require("style.php");
	?>
</head>

<body>
<div class="col-md-4">
	<a class="btn pull-right" href="javascript://" onclick="location.href='userprofile.php';">
	<i class="fa fa-user"></i> My Profile</a>
</div>
<div class="col-md-4" >
				<a class="btn pull-right" href="javascript://" onclick="location.href='../logout.php';">Log Out</a>
</div>

</br></br></br>
<div class="row">
  <div class="col-md-12">
    <div class="form form-body form-horizontal">
      <div class="col-md-12" style="margin-bottom:20px;">
        <div id="dropdowns">
          <label class="col-md-1">Hotel : </label>
		<div id="center" class="col-md-2">
		<?php echo $hotel->getName(); ?>
		 </div>
		 </div>
      </div>
    </div>
  </div>
</div>
</br></br>
<a class="btn btn-block btn-primary disabled">List of Rooms</a>                           
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
											<th>Name</th>	
											<th>Description</th>
											<th>Image</th>
											<th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 

		require_once("../LogicLayer/RoomManager.php");
		require_once("../LogicLayer/RoomTypeManager.php");
		foreach($rooms as $row){
   ?>
		 <tr>
				<?php
				$roomtype = RoomTypeManager::getRoomType($row->getType_ID());?>
				<td><?php echo $roomtype->getName();?></td>
				<td><?php echo $row->getDescription();?></td>
				<td><?php
					echo "<img height='100' width='100' src='../../admin/PresentationLayer/images/".$row->getImage()."'>";
				?></td>
				<td><?php echo $roomtype->getPrice();?></td>
    <br/>
           <?php } ?>
		   
		   
                                    </tbody>
                                </table>
                            </div>
</body>

<footer>

<footer>

</html>


<script>
$(document).ready(function(){
    $("select#drop1").change(function(){
        var hotel_id = $("select#drop1 option:selected").attr('value');
         $("#rooms").html( "" );
         if (hotel_id.length > 0 ) {
           $.ajax({
           type: "POST",
           url: "getRooms.php?id=" + hotel_id,
           cache: false,
           success: function(data) {
           $("#rooms").html( data );
           }
           });
         }
    });
});

<!--WEB SERVICE-->
function checkReservation() {
  var obj = {};
  obj.hotel_id = $("select#drop1 option:selected").attr('value');
  obj.room_id = $("select#drop2 option:selected").attr('value');
  obj.startDate = $("#startDate").val();
  obj.endDate = $("#endDate").val();  
  $.ajax({
    type:"POST",
    url: "checkReservation.php",
    data: JSON.stringify(obj),
    dataType: "json",
    contentType: "application/json",
    cache: false,
    success: function(data){
      console.log(data.msg);
    }
  });
}
</script>
