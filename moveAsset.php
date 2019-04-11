<?php
    include 'db_connection.php';

    $connection = OpenCon();
    $output = array('error' => false);

    try {
        $currentTable = $_POST['currentTable'];
        $assetMoveTo = $_POST['assetMoveTo'];
        $guids = $_POST['guids'];
        $assetLocationField = $_POST['assetLocationField'];
        $sublocationOptions = $_POST['subLocationOptions'];

        $relocateQuery = "update $currentTable set sublocation = '$sublocationOptions', $assetLocationField = '$assetMoveTo' where guid in ($guids)";
        if ($connection->query($relocateQuery)) {
            $output['message'] = "Asset Move Success!";
        }
        else {
            $output['error'] = true;
            $output['message'] = "Asset Move Failed...";
        }
    }
    catch (PDOException $e) {
        $output['error'] = true;
        $output['message'] = $e->getMessage();
    }

    echo json_encode($output);
?>