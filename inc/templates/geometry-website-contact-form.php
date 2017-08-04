<?php settings_errors(); ?>

<form class="geometry-website-general-form" action="options.php" method="post">
  <?php settings_fields( 'geometry-website-contact-options' ); ?>
  <?php do_settings_sections( 'geometry_website_contact' ); ?>
  <?php submit_button(); ?>
</form>
