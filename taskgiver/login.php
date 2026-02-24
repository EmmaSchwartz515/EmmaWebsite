<?php
    $db_servername = "localhost";
    $db_username = "emmaschw_emma";
    $db_password = "Zydvy3-noswyx-tixzyk";
    $db_dbname = "emmaschw_tasks";

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

    if (isset($_POST['login'])) {

        $user_username = $_POST['username_i'];
        $user_pass = $_POST['password_i'];

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if ($row['username'] == $user_username) {
                if ($row['password'] == $user_pass) {
                    header('Location:taskgiver.php?username=' . $user_username); 
                    echo "DID IT!";
                    exit;
                } else {
                    echo "Wrong password lol";
                }
            }
        }
    } else if (isset($_POST['create'])) {
        $user_username = $_POST['username_i'];
        $user_pass = $_POST['password_i'];


        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if ($row['username'] == $user_username) {
                echo "Username Already Taken!";
                return;
            }
        }

        $empty_a = '[]';
        $empty_d = '{}';
        $sql = "INSERT INTO $table(username, password, tags_points, tasks_completed) VALUES('$user_username', '$user_pass', '$empty_a', '$empty_d')";
        mysqli_query($conn, $sql);
    }
?>
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
        <div class="login">
            <h2>Login</h2>
            <form action="" method="post">
                <label>Username: </label>
                <input type="text" name="username_i" placeholder="AlexSmith2032"><br>
                <label>Password: </label>
                <input id="pass_field" type="password" minlength="1" name="password_i"><button onclick="showPassword()">Showw password<i id="pass_show_icon" class="fa-solid fa-eye"></i></button><br>
                <input type="submit" name="create" value="Create Account">
                <input type="submit" name="login" value="Log In">
            </form>
        </div>

        <script src="https://kit.fontawesome.com/2bceb4ad9c.js" crossorigin="anonymous"></script>
    </body>
</html>