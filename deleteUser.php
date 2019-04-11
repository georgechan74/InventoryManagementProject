<?php
	include_once('connection.php');
	// include('function.php');
	$output = array('error' => false);

	echo 'test';

	$database = new Connection();
	$db = $database->open();
	try{

		//variable issue - variables 
		$oldUID = $_POST['roleUID_delete'];
		$oldROLE = $_POST['roleROLE_delete'];
		$uid = $_POST['uid'];
		$role  = $_POST["role"];

		//testing
		$oldUID1 = '123';
		$oldROLE1 = '456';
		//	$sql = "UPDATE ROLES SET UID = '$uid', ROLE = '$role' WHERE UID = '$oldUID' AND ROLE = '$oldROLE'"; //where statement?

		echo 'test';
		echo $oldUID1;
		echo $oldROLE1;

		echo $oldUID;
		echo $oldROLE;
		echo $uid;
		echo $role;

		//switch to prepare stmt
		//$sql = "DELETE FROM ROLES WHERE UID = '$oldUID1' AND ROLE = '$oldROLE1'";
		$sql = "DELETE FROM ROLES WHERE UID = '$oldUID' AND ROLE = '$oldROLE'"; //where statement?
		//if-else statement in executing our query
		if($db->exec($sql)){
			$output['message'] = 'User role deleted successfully';
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