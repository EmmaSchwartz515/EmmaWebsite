
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