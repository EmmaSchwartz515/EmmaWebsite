<li>
    <div class="sect-dropdown">
        <button onclick="toggleSection(this)" class="sect-dpdown-btn">
            <?php
                echo $_GET["name"];
            ?>
            <div class="collapse">
                <i class="fa-solid fa-plus" aria-live="off"></i>
            </div>
        </button>
    </div>
    <?php
        echo $_GET["content"];
    ?>
</li>