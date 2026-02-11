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
        <div class="main">
            <h1>Emma Schwartz</h1>
            <ul class="accordion">
                <li id="quick-facts">
                    <div class="sect-dropdown">
                        <button onclick="toggleSection('quick-facts')" aria-label="quick-facts-dropdown" class="sect-dpdown-btn">
                            Quick Facts
                            <div class="collapse">
                                <i class="fa-solid fa-plus" aria-live="off"></i>
                            </div>
                        </button>
                    </div>
                    <div class="sect">
                        <p class="sect-p">
                            [Computer Scientist]<br>
                            Working as a <em>Web Service Analyst</em>
                            for <strong>CSU Channel Islands</strong>
                        </p>
                    </div>
                </li>
                <li id="life-story">
                    <div class="sect-dropdown">
                        <button onclick="toggleSection('life-story')" aria-label="life-story-dropdown" class="sect-dpdown-btn">
                            Life Story
                            <div class="collapse">
                                <i class="fa-solid fa-plus" aria-live="off"></i>
                            </div>
                        </button>
                    </div>
                    <div class="sect">
                        <p class="sect-p">
                            I was born in San Francisco in 2008, then moved to Woodland Hills in 2012. When I was 8, I learned to code because...
                        </p>
                    </div>
                </li>
                <li id="socials">
                    <div class="sect-dropdown">
                        <button onclick="toggleSection('socials')" aria-label="socials" class="sect-dpdown-btn">
                            Socials
                            <div class="collapse">
                                <i class="fa-solid fa-plus" aria-live="off"></i>
                            </div>
                        </button>
                    </div>
                    <ul class="sect socials">
                        <li>
                            <a href="https://github.com/SleepiiRaven">
                                <img src="images/github-logo.png" alt="GitHub Logo, Clickable.">
                            </a>
                        </li>

                        <li>
                            <a href="https://www.linkedin.com/in/emmals/">
                                <img src="images/linkedin-logo.png" alt="LinkedIn Logo, Clickable.">
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <script src="https://kit.fontawesome.com/2bceb4ad9c.js" crossorigin="anonymous"></script>
        </div>

        <img class="decorative-image-bottom-right" src="images/plant-image.gif" alt="">
        <script src="./index.js" async defer></script>
    </body>
</html>