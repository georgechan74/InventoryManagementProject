<?php
	include_once('connection.php');
	include('function.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$stmt0 = $db->prepare("SELECT UID FROM ROLES WHERE UID = :uid AND ROLE = :role");
		if ($stmt0->execute(array( ':uid' => $_POST['uid'] , ':role' => $_POST['role']))){
			$count = $result->rowCount();

			if($count > 0)
			{
    			$result = $result->fetch();
				 //$output['message'] = 'Username with this role already in use.';
				 alert("Username with this role already in use.");
 				exit();
			 }	
			 else
			 {
				//make use of prepared statement to prevent sql injection
				$stmt = $db->prepare("INSERT INTO ROLES (UID, ROLE) VALUES (:uid, :role)");
				//if-else statement in executing our prepared statement
				if ($stmt->execute(array( ':uid' => $_POST['uid'] , ':role' => $_POST['role']))){
					$output['message'] = 'User role added successfully';
					}
				else{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add user role.';
			} 
		}	
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot add user role.';
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
