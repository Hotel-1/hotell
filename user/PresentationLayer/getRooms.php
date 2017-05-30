<?php
$id =  $_GET['id'];
require_once("../LogicLayer/RoomManager.php");
$rooms = RoomManager::getHotelRooms($id);
echo '
          <select name="country" id = "drop2" class="col-md-4 form-control">
            <option value="">Please Select</option>';
              foreach($rooms as $row){
                echo '<option value="'.$row->getID().'">'.$row->getName().'</option>';
              }
              echo '</select></div>';
?>
