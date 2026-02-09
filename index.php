<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div classname="about-sect">
            <p classname="job-desc">[Computer Scientist]</p>
            <h1 classname="title">Emma Schwartz</h1>
            <p classname="about-me">Working as a <em>Web Service Analyst</em> for <strong>CSU Channel Islands</strong></p>
        </div>

        <?php
            // PHP code to check for XML or anything else

            $file_url = 'https://www.csuci.edu/news/rss.xml';
            $headers = get_headers($file_url);

            if ($headers && strpos($headers[0], '200 OK') !== false) {
                echo "HTTP request to the XML file is possible AWIA.";
            } else {
                echo "HTTP request to the XML file is not possible.";
            }

            // Change the $file_url as needed.
            // Code provided by Cory
        ?>

        <h2></h2>
        <script src="index.js" async defer></script>
    </body>
</html>