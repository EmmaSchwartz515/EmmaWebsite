<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../index.css">
    </head>
    <body>
        <div class="main">
            <h1>Task Giver</h1>
            <h2>Current Task:</h2>
            <div id="currtask"></div>
            <button onclick="completed()">did it</button>
            <button onclick="notCompleted()">didn't do it</button>
            <div><span id="counter">0</span> tasks completed</div>
        </div>

        <?php
            $servername = "emmaschw_tasks";
            $username = "emmaschw_emma";
            $password = "Zydvy3-noswyx-tixzyk";
            $dbname = "tasks";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            echo "Connected successfully";
        ?>

        <script src="https://kit.fontawesome.com/2bceb4ad9c.js" crossorigin="anonymous"></script>
        <script src="./index.js" async defer></script>
    </body>
</html>