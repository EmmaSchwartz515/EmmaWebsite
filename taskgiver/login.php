
<div class="login">
    <h2>Login</h2>
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
            $db_servername = "localhost";
            $db_username = "emmaschw_emma";
            $db_password = "Zydvy3-noswyx-tixzyk";
            $db_dbname = "emmaschw_tasks";

            $user_username = $_POST['username'];
            $user_pass = $_POST['password'];

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

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    if ($row['username'] == $user_username) {
                        if ($row['password'] == $user_pass) {
                            $_POST['username'] = $row['username'];
                            echo "DID IT!";
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
        ?>
    </p>
</div>