<li>
    <div class="sect-dropdown">
        <button onclick="toggleSection(self)" class="sect-dpdown-btn">
            <?php
                echo $_GET["name"];
            ?>
            <div class="collapse">
                <i class="fa-solid fa-plus" aria-live="off"></i>
            </div>
        </button>
    </div>
    <div class="sect">
        <?php
            echo $_GET["content"];
        ?>
    </div>

    <script src="../index.js" async defer></script>
</li>