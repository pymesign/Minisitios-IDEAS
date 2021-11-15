<h1>Options</h1>
<?php settings_errors(); ?>
<h1>Ideas Theme Options</h1>
<?php

$picture = esc_attr(get_option('profile_picture'));

?>

<div class="image-container">
    <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
</div>

<form method="post" action="options.php">
    <?php settings_fields('ideas-settings-group'); ?>
    <?php do_settings_sections('customize_ideas'); ?>
    <?php submit_button(); ?>
</form>