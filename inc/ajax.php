<?php

/*
Contact Form Ajax Submission and Saving Input Data for Custom Post Type called Messages
_____________________________________________________________________________________________
*/

add_action( 'wp_ajax_geometry_website_save_user_contact_form', 'geometry_website_save_user_contact_form' );
add_action( 'wp_ajax_nopriv_geometry_website_save_user_contact_form', 'geometry_website_save_user_contact_form' );

function geometry_website_save_user_contact_form(){

if (
    ! isset( $_POST['geometry_website_nonce_field'] )
    || ! wp_verify_nonce( $_POST['geometry_website_nonce_field'], 'geometry_website_my_action' )
) {

   print 'Sorry, your nonce did not verify.';
   exit;

} else {



$name = wp_strip_all_tags( $_POST["name"] );
$email = wp_strip_all_tags( $_POST["email"] );
$message = wp_strip_all_tags( $_POST["message"] );

    $args = array(
      'post_title'    => $name,
      'post_content'  => $message,
      'post_author'   => 1,
      'post_status'   => 'publish',
      'post_type'     => 'geometry-website-contact',
      'meta_input'    => array(
          '_contact_email_value_key' => $email
      )
    );

  $postID =  wp_insert_post( $args );

  if($postID !== 0){
    $to = get_bloginfo( 'admin_email' );
    $subject = 'Email from '. $name;
    $headers[] = 'From: '. get_bloginfo('name') . '<'.$to.'>';
    $headers[] = 'Reply-To: '.$name.'<'.$email.'>';
    $headers[] = 'Content-Type: text/html: charset=UTF-8';
    //$message = file_get_contents(TEMPLATEPATH . '/inc/hero.php');
    $message = $message;
    wp_mail( $to, $subject, $message, $headers );

  } else {
    echo 0;
  }


  echo $postID;

die();
  }
}
