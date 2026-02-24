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
            <h1>RSS Feed from CI Events</h1>

            <?php
                $feedURL = "https://www.trumba.com/calendars/csuci-academic-calendar.rss";
                $feed = simplexml_load_file($feedURL);

                echo '<h1>' . $feed->channel->title . '</h1>';

                foreach ($feed->channel->item as $item) {
                    echo '<a href="' . $item->link . '"><h2>' . $item->title . '</h2>'
                        . '<h3>' . $item->description . '</h3></a><br/>';
                }
            ?>
        </div>

        <!--<script src="./rssfeed.js" async defer></script>-->

        <script src="https://kit.fontawesome.com/2bceb4ad9c.js" crossorigin="anonymous"></script>
    </body>
</html>