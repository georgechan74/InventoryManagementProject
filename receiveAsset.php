<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
    try
	{
		//make use of prepared statement to prevent sql injection
		$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
		VALUES (:location, :assignee, :description, :make, :model, :s1, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
		//if-else statement in executing our prepared statement
		if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
		':model' => $_POST['model'], ':s1' => $_POST['s1'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
		':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
		{
			$output['message'] = 'asset added successfully';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot add asset';
		} 
	}
    catch(PDOException $e)
    {
		$output['error'] = true;
 		$output['message'] = $e->getMessage();
	}

	//close connection
	$database->close();

	echo json_encode($output);

?>