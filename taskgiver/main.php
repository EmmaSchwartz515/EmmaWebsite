
<h1>Task Giver</h1>
<div hidden="true" aria-hidden="true" id="username">
    <?php
        echo $_GET["username"];
    ?>
</div>
<h2>Current Task:</h2>
<div id="currtask"></div>
<button onclick="completed()">did it</button>
<button onclick="notCompleted()">didn't do it</button>
<div><span id="counter">0</span> tasks completed</div>


<form action="./index.php" method="post">
    <button name="logout">Log out</button>
</form>

<script src="./index.js" async defer></script>