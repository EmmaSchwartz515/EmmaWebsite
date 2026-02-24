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
                $maxItems = 3;

                if (!isset($_POST["showless"])) {
                    echo "no Showless";
                    if (isset($_POST["showmore"])) {
                        echo "Showmore";
                        $maxItems = -1;
                    }
                } else {
                    $_POST["showless"] = null;
                    $_POST["showmore"] = null;
                }
                $feedURL = "https://www.trumba.com/calendars/csuci-academic-calendar.rss";
                $feed = simplexml_load_file($feedURL);

                echo '<h1>' . $feed->channel->title . '</h1>';

                $i = 0;
                foreach ($feed->channel->item as $item) {
                    if ($i >= $maxItems && $maxItems >= 0) {
                        break;
                    }

                    $i++;
                    echo '<a href="' . $item->link . '"><button class="rsscard"><h2>' . $item->title . '</h2>'
                        . '<h3>' . $item->description . '</h3></button></a><br/>';
                }

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
        </div>

        <!--<script src="./rssfeed.js" async defer></script>-->

        <script src="https://kit.fontawesome.com/2bceb4ad9c.js" crossorigin="anonymous"></script>
    </body>
</html>