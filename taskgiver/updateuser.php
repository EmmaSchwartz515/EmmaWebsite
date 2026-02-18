<?php
    $db_servername = "localhost";
    $db_username = "emmaschw_emma";
    $db_password = "Zydvy3-noswyx-tixzyk";
    $db_dbname = "emmaschw_tasks";

    $user_username = $_GET['user'];
    $user_tags_points = $_GET['tags_points'];
    $user_tasks_completed = $_GET['tasks_completed'];

    // Create connection
    try {
        $conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname);
    } catch (Exception $e) {
        die("". $e->getMessage());
    }
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $table = "user_data";
    $result = mysqli_query($conn,"SELECT * FROM $table");

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['username'] == $user_username) {
            if ($done) {
                $sql = "UPDATE $table SET tags_points='$user_tags_points', tasks_completed='$user_tasks_completed' WHERE username='$$user_username'";
                mysqli_query($conn, $sql);
                echo "Done";
                return;
            }
        }
    }

    echo "Error: No user account found!";
?>