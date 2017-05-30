<?php
	header("Access-Control-Allow-Origin: *");

	$response['result'] = "success";
	$response['msg'] = 'Available dates.';
	echo json_encode($response);

?>
