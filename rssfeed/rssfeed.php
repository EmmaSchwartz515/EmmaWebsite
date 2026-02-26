<?php
    function rssv($maxItems, $feedURL) {
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
    }
?>