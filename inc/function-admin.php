<?php

/*
ADMIN PAGE
___________________________________________
*/

function geometry_website_add_admin_page(){

  //Generate Admin Page
  add_menu_page( 'geometry website Options', 'geometry', 'manage_options', 'geometry_website', 'geometry_website_website_menu_page', 'dashicons-analytics', 101);

  //Generat Admin Subpages
  add_submenu_page( 'geometry_website', 'Sidebar Options', 'Sidebar', 'manage_options', 'geometry_website', 'geometry_website_website_menu_page' );
  add_submenu_page( 'geometry_website', 'Theme Options', 'Theme Options', 'manage_options', 'geometry_website_theme', 'geometry_website_theme_sub_page' );
  add_submenu_page( 'geometry_website', 'Contact Form', 'Contact Form', 'manage_options', 'geometry_website_contact', 'geometry_website_contact_sub_page' );

  //Activate Custom script_concat_settings
  add_action( 'admin_init', 'geometry_website_custom_Settings' );
}

add_action( 'admin_menu', 'geometry_website_add_admin_page' );

function geometry_website_custom_Settings(){

  //Sidebar Options Regiter Setting
  register_setting( 'geometry-website-settings-group', 'profile_picture' );
  register_setting( 'geometry-website-settings-group', 'first_name' );
  register_setting( 'geometry-website-settings-group', 'last_name' );
  register_setting( 'geometry-website-settings-group', 'user_description' );
  register_setting( 'geometry-website-settings-group', 'twitter_handler', 'geometry_website_sanitize_twitter_handler' );
  register_setting( 'geometry-website-settings-group', 'facebook_handler' );

  //Sidebar Options Section and Field
  add_settings_section( 'geometry-website-sidebar-option', 'Sidebar Options', 'geometry_website_sidebar_options', 'geometry_website' );
  add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'geometry_website_profile_picture', 'geometry_website', 'geometry-website-sidebar-option' );
  add_settings_field( 'sidebar-name', 'Full Name', 'geometry_sidebar_name', 'geometry_website', 'geometry-website-sidebar-option' );
  add_settings_field( 'sidebar-description', 'Description', 'geometry_website_sidebar_description', 'geometry_website', 'geometry-website-sidebar-option' );
  add_settings_field( 'sidebar-twitter', 'Twitter Handler', 'geometry_website_sidebar_twitter', 'geometry_website', 'geometry-website-sidebar-option' );
  add_settings_field( 'sidebar-facebook', 'Facebook Handler', 'geometry_website_sidebar_facebook', 'geometry_website', 'geometry-website-sidebar-option' );

  //Theme Support Options Register Settings
  register_setting( 'geometry-website-theme-support', 'post_formats' );
  register_setting( 'geometry-website-theme-support', 'custom_logo' );
  register_setting( 'geometry-website-theme-support', 'custom_header' );
  register_setting( 'geometry-website-theme-support', 'custom_background' );

  //Theme Support Options Section and Field
  add_settings_section( 'geometry-website-theme', 'Theme Support Options', 'geometry_website_theme_support_options', 'geometry_website_theme' );
  add_settings_field( 'post-formats', 'Post Formats', 'geometry_website_post_formats', 'geometry_website_theme', 'geometry-website-theme' );
  add_settings_field( 'custom-logo', 'Custom Logo', 'geometry_website_custom_logo', 'geometry_website_theme', 'geometry-website-theme' );
  add_settings_field( 'custom-header', 'Custom Header', 'geometry_website_custom_header', 'geometry_website_theme', 'geometry-website-theme' );
  add_settings_field( 'custom-background', 'Custom Background', 'geometry_website_cutom_background', 'geometry_website_theme', 'geometry-website-theme' );

  //Contact Form Register Settings
  register_setting( 'geometry-website-contact-options', 'activate_contact' );

  //Contact Form Section and Field
  add_settings_section( 'geometry-website-contact-section', 'Contact Form', 'geometry_website_contact_section', 'geometry_website_contact' );
  add_settings_field( 'activate-form', 'Activate Contact Form', 'geometry_website_activate_contact', 'geometry_website_contact', 'geometry-website-contact-section' );

}

/* Add Admin Page Functions */

function geometry_website_website_menu_page(){

  require_once( get_template_directory() . '/inc/templates/geometry-website-admin.php' );

}

function geometry_website_theme_sub_page(){

  require_once( get_template_directory() . '/inc/templates/geometry-website-theme-support.php' );

}

function geometry_website_contact_sub_page(){

  require_once( get_template_directory() . '/inc/templates/geometry-website-contact-form.php' );

}

/* Custom Settings Functions */

function geometry_website_sidebar_options(){

  echo 'Customize your sidebar!';

}

function geometry_website_profile_picture(){

  $picture = esc_attr( get_option( 'profile_picture' ) );

  if( empty( $picture ) ){
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button" /> <input type="hidden" id="profile-picture" name="profile_picture" value="" />';
  } else {
    echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button" /> <input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
  }

}

function geometry_sidebar_name(){

  $firstName = esc_attr( get_option( 'first_name' ) );
  $lastName = esc_attr( get_option( 'last_name' ) );
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"/> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name"/>';

}

function geometry_website_sidebar_description(){

  $description = esc_attr( get_option( 'user_description' ) );
  echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /> <p class="description">Type a brief description of yourself</p>';

}

function geometry_website_sidebar_twitter(){

  $twitter = esc_attr( get_option( 'twitter_handler' ) );
  echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter Handler" /> <p class="description">Type your Twitter Handler without the @ character</p>';

}

function geometry_website_sidebar_facebook(){

  $facebook = esc_attr( get_option( 'facebook_handler' ) );
  echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook Handler" />';

}

function geometry_website_theme_support_options(){

  echo 'Activate and Deactivate specific Theme Support Options';

}

function geometry_website_post_formats(){

  $options = get_option( 'post_formats' );
  $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
  $output = '';
  foreach ( $formats as $format ) {
    $checked = ( @$options[ $format ] == 1 ? 'checked' : '' );
    $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' />'.$format.'</label><br>';
  }

  echo $output;

}

function geometry_website_custom_logo(){

  $options = get_option( 'custom_logo' );
  $checked =( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_logo" name="custom_logo" value="1" '.$checked.'/> Activate the custom logo</label>';

}

function geometry_website_custom_header(){

  $options = get_option( 'custom_header' );
  $checked =( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'/> Activate the custom header</label>';

}

function geometry_website_cutom_background(){

  $options = get_option( 'custom_background' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'/> Activate the custom background</label>';

}

/* Sanitize Settings */

function geometry_website_sanitize_twitter_handler( $input ){

  $output = sanitize_text_field( $input );
  $output = str_replace( '@', '', $output );
  return $output;

}

function geometry_website_contact_section(){

  echo '<p>By clicking the input field and saving the the page you will activate a contact form custom post type</p>';

}

function geometry_website_activate_contact(){

  $options = get_option( 'activate_contact' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.'/>';

}
