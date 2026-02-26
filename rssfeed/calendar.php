<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CI Calendar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../index.css">
    </head>
    <body>
        <main class="main">
            <?php
                $rssUrl = "https://www.trumba.com/calendars/csuci-academic-calendar.rss";

                $maxItems = 5;

                if (!isset($_POST["showless"])) {
                    if (isset($_POST["showmore"])) {
                        $maxItems = -1;
                    }
                }

                $_POST["showless"] = null;
                $_POST["showmore"] = null;

                include "./rssfeed.php";

                rssv($maxItems, $rssUrl);

                if ($maxItems > 0) {
                    echo '
                        <form action="" method="post">
                            <input type="submit" name="showmore" value="Show more">
                        </form>
                    ';
                } else {
                    echo '
                        <form action="" method="post">
                            <input type="submit" name="showless" value="Show less">
                        </form>
                    ';
                }
            ?>
        </main>

        <script src="https://kit.fontawesome.com/2bceb4ad9c.js" crossorigin="anonymous"></script>
    </body>
</html>