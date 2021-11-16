<h1>Options</h1>
<?php settings_errors(); ?>
<h1>Ideas Theme Options</h1>
<?php

$picture = esc_attr(get_option('profile_picture'));

//echo 'profile picture: ' . $picture;

$imagen_uno = esc_attr(get_option('carousel_image_1'));

echo '<p>imagen uno: ' . $imagen_uno . '</p>';

$imagen_dos = esc_attr(get_option('carousel_image_2'));

echo '<p>imagen dos: ' . $imagen_dos . '</p>';

$imagen_tres = esc_attr(get_option('carousel_image_3'));

echo '<p>imagen tres: ' . $imagen_tres . '</p>';

?>

<div class="image-container">
    <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
</div>

<form method="post" action="options.php">
    <?php settings_fields('ideas-settings-group'); ?>
    <?php do_settings_sections('customize_ideas'); ?>
    <?php submit_button(); ?>
</form>

<div id="carousel-image-preview1" class="profile-picture" style="background-image: url(<?php print $imagen_uno; ?>);"></div>
<div id="carousel-image-preview2" class="profile-picture" style="background-image: url(<?php print $imagen_dos; ?>);"></div>
<div id="carousel-image-preview3" class="profile-picture" style="background-image: url(<?php print $imagen_tres; ?>);"></div>