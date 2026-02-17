<?php
    $servername = "localhost";
    $username = "emmaschw_emma";
    $password = "Zydvy3-noswyx-tixzyk";
    $dbname = "emmaschw_tasks";

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
    
    $result = mysqli_query($conn,"SELECT * FROM $dbname");
    
    echo json_encode($result);
?>