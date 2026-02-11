<form action="" method="post">
    <label>First Name: </label>
    <input type="text" name="first_name"><br>
    <label>Last Name: </label>
    <input type="text" name="last_name"><br>
    <label>Email: </label>
    <input type="text" name="email"><br>
    <label>Message: </label>
    <br><textarea rows="5" name="message" cols="30"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
    if (isset($_POST['submit'])){
        $to = "emma.schwartz515@myci.csuci.edu";
        $from = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $subject = "Form submission";
        $message = $first_name . " " . $last_name . " (" . $from . ")wrote the following:" . "\n\n" . $_POST['message'];

        mail($to, $subject, $message);
        echo("Mail Sent. Thank you " . $first_name . ", we will contact you shortly.");
    }
?>