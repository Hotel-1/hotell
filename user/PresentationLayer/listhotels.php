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

<body>
<div class="col-md-4">
	<a class="btn pull-right" href="javascript://" onclick="location.href='userprofile.php';">
	<i class="fa fa-user"></i> My Profile</a>
</div>
<div class="col-md-4" >
				<a class="btn pull-right" href="javascript://" onclick="location.href='../logout.php';">Log Out</a>
</div>
<?php
require_once("../LogicLayer/HotelManager.php");
$hotels = HotelManager::getAllHotels();
require_once("../LogicLayer/RoomManager.php");
$rooms = RoomManager::getAllRooms();
?>
</br></br></br>
<div class="row">
  <div class="col-md-12">
    <div class="form form-body form-horizontal">
      <div class="col-md-12" style="margin-bottom:20px;">
        <div id="dropdowns">
          <label class="col-md-1">Hotel</label>
 <div id="center" class="col-md-2">

          <select name="country" id = "drop1" class="form-control">
            <option value="">Please Select</option>
              <?php foreach($hotels as $row){ ?>
                <option value="<?php echo $row->getID(); ?>"><?php echo $row->getName(); ?></option>
                <?php } ?>
              </select>
 </div>
 </div>

      </div>
      <div class="col-md-12" style="margin-bottom:20px;">
        <label class="col-md-1">Room</label>
          <div class="col-md-2" id="rooms"></div>
      </div>
      <div class="col-md-12" style="margin-bottom:20px;">
        <label class="col-md-1">Start Date</label>
        <div class="col-md-2">
          <input type="date" id="startDate" class="form-control" name="startDate" placeholder="Start Date"/>
        </div>
      </div>
      <div class="col-md-12" style="margin-bottom:20px;">
        <label class="col-md-1">End Date</label>
        <div class="col-md-2">
          <input type="date" id="endDate" class="form-control" name="endDate" placeholder="End Date"/>
        </div>
      </div>
      <div class="col-md-12">
        <a href="javascript:;" onclick="checkReservation()" class="btn btn-default"><i class="fa fa-search"></i> Search</a>
      </div>
    </div>
  </div>
</div>
</br></br>
<a class="btn btn-block btn-primary disabled">List of Hotels</a>

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
											<th >Address</th>
											<th>Region</th>
											<th>Phone</th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

		foreach($hotels as $row){
   ?>
		 <tr>
				<td><?php echo $row->getName();?></td>
				<td><?php echo $row->getDescription();?></td>
				<td><?php echo $row->getAddress();?></td>
				<td><?php echo $row->getState();?></td>
				<td><?php echo $row->getPhone();?></td>
				<td><a href="javascript://"onclick="location.href='listrooms.php?id=<?php echo $row->getID();?>';"><i class="fa fa-arrow-right fa-fw"></i></a></td>
		  </tr>
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
