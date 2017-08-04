<?php settings_errors(); ?>

<form class="geometry-website-general-form" action="options.php" method="post">
  <?php settings_fields( 'geometry-website-theme-support' ); ?>
  <?php do_settings_sections( 'geometry_website_theme' ); ?>
  <?php submit_button(); ?>
</form>
