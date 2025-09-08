<?php
function acf7a_general_page() {
    ?>
    <div class="wrap">
        <h1>General Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('acf7a_general_settings');
            do_settings_sections('acf7a_general_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
