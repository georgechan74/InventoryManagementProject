<?php
    include 'db_connection.php';

    $connection = OpenCon();
    $output = array('error' => false);

    try {
        $currentTable = $_POST['currentTable'];
        $moveTo = $_POST['moveTo'];
        $vnos = $_POST['vnos'];
        $locationField = $_POST['locationField'];
        $output['message'] = "before";

        $relocateQuery = "UPDATE $currentTable set $locationField = '$moveTo' where vno in ($vnos)";
        if ($connection->query($relocateQuery)) {
            $output['message'] = "Move Success!";
        }
        else {
            $output['error'] = true;
            $output['message'] = "Move Failed...";
        }
    }
    catch (PDOException $e) {        
        $output['error'] = true;
        $output['message'] = $relocateQuery . $e->getMessage();
    }

    echo json_encode($output);

    
?>