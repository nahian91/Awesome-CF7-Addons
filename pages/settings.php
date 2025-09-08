<?php 

// Settings page callback
function acf7a_settings_page() {
    ?>
    <div class="wrap">
        <h1>Awesome CF7 Addons Settings</h1>
        <form method="post" action="options.php">
            <?php
            // Register settings
            settings_fields('acf7a_settings_group');
            do_settings_sections('acf7a_settings_group');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
