<?php
	include_once('connection.php');
	// include('function.php');
	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		 $uid = $_POST['id'];
		 $role  = $_POST["role"];


		$sql = "UPDATE ROLES SET UID = '$uid', ROLE = '$role' WHERE UID = '$uid' "; //where statement?
		//if-else statement in executing our query
		if($db->exec($sql)){
			$output['message'] = 'User role updated successfully';
		} 
		else{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot update user role';
		}

	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	//close connection
	$database->close();

	echo json_encode($output);
	
?>
