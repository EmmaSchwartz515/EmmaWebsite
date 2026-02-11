<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./index.css">
    </head>
    <body>
        <?php
            include("include/header.php");
        ?>
        <div class="main">
            <h1>Emma Schwartz</h1>
            <?php
                include("include/accordion.php");
                include("include/contact.php");
            ?>
        </div>

        <img class="decorative-image-bottom-right" src="images/plant-image.gif" alt="">
        
        <?php
            include("include/footer.php");
        ?>

        <script src="https://kit.fontawesome.com/2bceb4ad9c.js" crossorigin="anonymous"></script>
        <script src="./index.js" async defer></script>
    </body>
</html>