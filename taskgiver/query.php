<?php
    $servername = "localhost";
    $username = "emmaschw_emma";
    $password = "Zydvy3-noswyx-tixzyk";
    $dbname = "emmaschw_tasks";
    $table = "tasks";

    // Create connection
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
    } catch (Exception $e) {
        die("". $e->getMessage());
    }
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
    $result = mysqli_query($conn,"SELECT * FROM $table");
    
    $arr = array();

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $row_array['text'] = $row['text'];
        $row_array['tags'] = $row['tags'];

        array_push($arr, $row_array);
    }

    echo json_encode($arr);
?>