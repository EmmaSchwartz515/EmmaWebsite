<?php session_start(); ?>
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
            <?php
                if (isset($_POST['logout'])) {
                    session_destroy();
                    header("Location: index.php");
                    exit;
                }

                if (!isset($_SESSION['username'])) {

            ?>
                    <div class="login">
                        <h2>Login</h2>
                        <form action="" method="post">
                            <label>Username: </label>
                            <input type="text" name="i_username" placeholder="AlexSmith2032"><br>
                            <label>Password: </label>
                            <input type="text" name="i_password"><br>
                            <input type="submit" name="create" value="Create Account">
                            <input type="submit" name="login" value="Log In">
                        </form>
                    </div>
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

                    if (isset($_POST['login']) || isset($_POST['create'])) {
                        $user_username = $_POST['i_username'] ?? '';
                        $user_pass = $_POST['i_password'] ?? '';

                        $result = mysqli_query($conn,"SELECT * FROM $table");

                        if (isset($_POST['login'])) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                if ($row['username'] == $user_username) {
                                    if ($row['password'] == $user_pass) {
                                        $_GET['username'] = $row;
                                        $_SESSION['username'] = $row['username'];
                                        header("Location: ./index.php");
                                        exit;
                                    } else {
                                        echo "Wrong password lol";
                                    }
                                }
                            }
                        } else if (isset($_POST['create'])) {
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
                    }
                } else {
                    include("./main.php");
                }
            ?>
        </div>

        <script src="https://kit.fontawesome.com/2bceb4ad9c.js" crossorigin="anonymous"></script>
    </body>
</html>