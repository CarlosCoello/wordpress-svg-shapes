<?php settings_errors(); ?>

<?php

$picture = esc_attr( get_option( 'profile_picture' ) );
$firstName = esc_attr( get_option( 'first_name' ) );
$lastName = esc_attr( get_option( 'last_name' ) );
$fullName = $firstName . ' ' . $lastName;
$description = esc_attr( get_option( 'user_description' ) );

$twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
$facebook_icon = esc_attr( get_option( 'facebook_handler' ) );


;?>
<!--  -->
<div class="geometry-website-sidebar-preview">

  <div class="geometry-website-sidebar">

    <div class="image-container">

      <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture ;?>);"></div>

    </div><!-- .image-container -->

    <h1 class="geometry-website-username"><?php print $fullName; ?></h1>
    <h2 class="geometry-website-description"><?php print $description ;?></h2>

    <div class="icon-wrapper">
      <?php if( !empty( $twitter_icon ) ): ;?>
        <span class="sunset-icon-sidebar dashicons-before dashicons-twitter"></span>
      <?php endif;
      if( !empty( $facebook_icon ) ): ;?>
      <span class="geometry-website-icon-sidebar dashicons-before dashicons-facebook-alt"></span>
     <?php endif; ?>
   </div><!-- .icon-wrapper -->

  </div><!-- .geometry-website-sidebar -->

</div><!-- .geometry-website-sidebar-preview -->

<form class="geometry-website-general-form" action="options.php" method="post">

  <?php settings_fields( 'geometry-website-settings-group' ); ?>
  <?php do_settings_sections( 'geometry_website' ) ;?>
  <?php submit_button() ;?>

</form>
