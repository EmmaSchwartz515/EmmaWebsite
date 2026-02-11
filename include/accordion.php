<ul class="accordion">
    <?php
        $_GET["name"] = "Quick Facts";
        $_GET["content"] = "
            <div class=\"sect\">
                [Computer Scientist]<br>
                Working as a <em>Web Service Analyst</em>
                for <strong>CSU Channel Islands</strong>
            </div>";
        include("accordion-item.php");

        $_GET["name"] = "Life Story";
        $_GET["content"] = "
            <div class=\"sect\">
                I was born in San Francisco in 2008!
                <img src=\"../images/san-francisco.jpg\" alt=\"Golden Gate Bridge in San Francisco\">
                then moved to Woodland Hills in 2012. When I was 8, I learned to code because...
            </div>";
        include("accordion-item.php");


        

        $_GET["name"] = "Socials";
        $_GET["content"] = "
            <ul class=\"sect socials\">
                <li>
                    <a href=\"https://github.com/SleepiiRaven\">
                        <img src=\"../images/github-logo.png\" alt=\"GitHub Logo, Clickable.\">
                    </a>
                </li>

                <li>
                    <a href=\"https://www.linkedin.com/in/emmals/\">
                        <img src=\"../images/linkedin-logo.png\" alt=\"LinkedIn Logo, Clickable.\">
                    </a>
                </li>
            </ul>";
        include("accordion-item.php");


        $_GET["name"] = "contact";
        $_GET["content"] = "
            <div class=\"sect\"><?php include(\"contact.php\") ?></div>";
        include("accordion-item.php");
    ?>
</ul>