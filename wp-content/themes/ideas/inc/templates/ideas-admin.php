<h1>Options</h1>
<?php settings_errors(); ?>
<h1>Ideas Theme Options</h1>
<?php

$picture = esc_attr(get_option('profile_picture'));
$position = esc_attr(get_option('sidebar_position'));

echo $position;

?>
<div class="ideas-sidebar-preview">
    <div class="ideas-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
        </div>

        <div class="icons-wrapper">

        </div>
    </div>
</div>
<form method="post" action="options.php">
    <?php settings_fields('ideas-settings-group'); ?>
    <?php do_settings_sections('customize_ideas'); ?>
    <?php submit_button(); ?>
</form>