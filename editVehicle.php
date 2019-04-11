<?php

include "connection.php";
include "function.php";
$database = new Connection();
$db = $database->open();
 
$output = array('error' => false);

	// $database = new Connection();
	// $db = $database->open();

	
	   $emploeeImage = upload_image();
	   $vehicleImage = upload2_image();
	   $locationImage = upload3_image();
		$statement = $db->prepare(
			"UPDATE vehicle 
			SET VNO = :vno, ASSIGNEDTO = :assigned, LICENSE = :license, MAKE = :make, MODEL = :model, YEAR = :year, HOUSED = :housed, VIN = :vin, UNIT = :unit, DESCRIPTION = :description, BUREAU = :bureau, FUNDINGORG = :funding, VEHICLE_IMAGE = :vehicleImage, EMPLOYEE_IMAGE = :emploeeImage, LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':vno'	=>	$_POST["vno"],
				':assigned'	=>	$_POST["assigned"],
				':license'	=>	$_POST["license"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':year'	 =>	$_POST["year"],
				':housed' =>	$_POST["housed"],
				':vin'	=>	$_POST["vin"],
				':unit'	=>	$_POST["unit"],
				':description'	=>	$_POST["description"],
				':bureau'	=>	$_POST["bureau"],
				':funding'	=>	$_POST["funding"],
				':vehicleImage' =>	$vehicleImage,
				':emploeeImage' =>	$emploeeImage,
				':locationImage' =>	$locationImage,
				':id' =>	$_POST["id"]
			)
		);

		$database->close();

	// include_once('connection.php');

	// $output = array('error' => false);

	// $database = new Connection();
	// $db = $database->open();
	// try{
	// 	 $id = $_POST['id'];
	// 	  $vno  = $_POST["vno"];
	// 	  $assigned = $_POST["assigned"];
	// 	  $license = $_POST["license"];
	// 	  $make  = $_POST["make"];
	// 	  $model  = $_POST["model"];
	// 	  $year = $_POST["year"];
	// 	  $housed  = $_POST["housed"];
	// 	  $vin    = $_POST["vin"];
	// 	  $unit = $_POST["unit"];
	// 	  $description  = $_POST["description"];
	// 	  $bureau    = $_POST["bureau"];
 //  		  $funding = $_POST["funding"];

	// 	$sql = " UPDATE VEHICLE SET VNO = '$vno', ASSIGNEDTO = '$assigned', LICENSE = '$license', MAKE = '$make', MODEL = '$model', YEAR = '$year', HOUSED = '$housed', VIN = '$vin', UNIT = '$unit', DESCRIPTION = '$description', BUREAU = '$bureau', FUNDINGORG = '$funding' WHERE GUID = '$id' ";
	// 	//if-else statement in executing our query
	// 	if($db->exec($sql)){
	// 		$output['message'] = 'Vehicle updated successfully';
	// 	} 
	// 	else{
	// 		$output['error'] = true;
	// 		$output['message'] = 'Something went wrong. Cannot update vehicle';
	// 	}

	// }
	// catch(PDOException $e){
	// 	$output['error'] = true;
	// 	$output['message'] = $e->getMessage();
	// }

	// //close connection
	// $database->close();

	// echo json_encode($output);
	
?>