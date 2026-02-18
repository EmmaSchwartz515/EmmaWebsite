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

    $table = $_GET["table"];

    if ($table == "tasks") {
        $result = mysqli_query($conn,"SELECT * FROM $table");
        
        $arr = array();

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $row_array['text'] = $row['text'];
            $row_array['tags'] = $row['tags'];

            array_push($arr, $row_array);
        }

        echo json_encode($arr);
    } else if ($table == "user_data") {
        $result = mysqli_query($conn,"SELECT * FROM $table");
        
        $arr = array();

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $row_array['username'] = $row['username'];
            $row_array['password'] = $row['password'];
            $row_array['tags_points'] = $row['tags_points'];
            $row_array['tasks_completed'] = $row['tasks_completed'];

            array_push($arr, $row_array);
        }

        echo json_encode($arr);
    }
?>