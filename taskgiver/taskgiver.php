<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Task Giver</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../index.css">
    </head>
    <body>
        <div class="main">
            <h1>Task Giver</h1>
            <div hidden="true" aria-hidden="true" id="username">
                <?php
                    echo $_GET["username"];
                ?>
            </div>
            <h2>Current Task:</h2>
            <div id="currtask"></div>
            <button onclick="completed()">did it</button>
            <button onclick="notCompleted()">didn't do it</button>
            <button onclick="eraseData()">Erase Data</button>
            <div><span id="counter">0</span> tasks completed</div>

            <a href="https://emmaschwartz.cikeys.com/taskgiver/login.php"><button>Log out</button></a>
        </div>


        <script src="./taskgiver.js" async defer></script>

        <script src="https://kit.fontawesome.com/2bceb4ad9c.js" crossorigin="anonymous"></script>
    </body>
</html>