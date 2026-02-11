<ul class="accordion">
    <?php
        $_GET["name"] = "Quick Facts";
        $_GET["content"] = "
            <p class=\"sect\">
                [Computer Scientist]<br>
                Working as a <em>Web Service Analyst</em>
                for <strong>CSU Channel Islands</strong>
            </p>";
        include("accordion-item.php");

        $_GET["name"] = "Life Story";
        $_GET["content"] = "
            <p class=\"sect\">
                I was born in San Francisco in 2008, then moved to Woodland Hills in 2012. When I was 8, I learned to code because...
            </p>";
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
    ?>
</ul>