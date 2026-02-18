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
            <h1>Login</h1>
            <div class="login">
                <form action="" method="post">
                    <label>Username: </label>
                    <input type="text" name="username" placeholder="AlexSmith2032"><br>
                    <label>Password: </label>
                    <input type="text" name="password"><br>
                    <input type="submit" name="create" value="Create Account">
                    <input type="submit" name="login" value="Log In">
                </form>
                <p>
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

                        $table = "user_data";
                        $result = mysqli_query($conn,"SELECT * FROM $table");

                        if (isset($_POST['login'])) {
                            $user_username = $_POST['username'];
                            $user_pass = $_POST['password'];

                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                if ($row['username'] == $user_username) {
                                    if ($row['password'] == $user_pass) {
                                        echo "GOOD JOB YOU DID IT!";
                                        echo json_encode($row);
                                        return;
                                    }
                                }
                            }
                        } else if (isset($_POST['create'])) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                if ($row['username'] == $user_username) {
                                    echo "RUH ROH";
                                    return;
                                }
                            }

                            mysqli_query($conn, 'INSERT INTO $table ($user_username, $user_pass, "{}", "{}")');
                        }
                    ?>
                </p>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/2bceb4ad9c.js" crossorigin="anonymous"></script>
        <script src="./index.js" async defer></script>
    </body>
</html>