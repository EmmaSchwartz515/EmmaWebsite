<?php
    $servername = "localhost";
    $username = "emmaschw_emma";
    $password = "Zydvy3-noswyx-tixzyk";
    $dbname = "emmaschw_tasks";
    $table = "funnytable";

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

    $outp = "[";
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            if ($outp != "[") {
                $outp .= ",";
            }
            $outp .= '{"ID":"' . $rs["id"] . '",';
            $outp .= '"a":"' . $rs["a"] . '",';
            $outp .= '"b":"' . $rs["b"] . '"}';
            $outp .= '"c":"' . $rs["c"] . '"}';
        }
    $outp .= "]";
    
    echo json_encode($outp);
?>