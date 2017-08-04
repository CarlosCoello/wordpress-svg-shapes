<div class="container form-container">
  <div class="contact-title">
    <header>
      <h1><?php esc_html_e( 'Contact Form', 'geometrywebsite' ) ;?></h1>
    </header>
  </div><!-- .contact-title -->
  <form class="contactForm" action="#" method="post" data-url="<?php echo esc_url( admin_url('admin-ajax.php') ); ?>">

    <div class="form-group">
        <input type="text" id="name" class="form-control" name="name" value="" placeholder="Your Name" >
        <small class="text-danger form-control-msg"><?php esc_html_e( 'Your name is Required', 'geometrywebsite' ) ;?></small>
    </div><!-- .form-group -->
    <div class="form-group">
        <input type="email" id="email" class="form-control" name="email" value="" placeholder="Your Email" >
        <small class="text-danger form-control-msg"><?php esc_html_e( 'Your email is Required', 'geometrywebsite' ) ;?></small>
    </div><!-- .form-group -->
    <div class="form-group">
        <textarea class="form-control" id="message" name="message" placeholder="Your Message"  rows="8" cols="80"></textarea>
        <small class="text-danger form-control-msg"><?php esc_html_e( 'Your message is Required', 'geometrywebsite' ) ;?></small>
    </div><!-- .form-group -->
    <button type="submit" class="btn btn-default formbutton" name="button">Submit</button>
    <small class="text-info form-control-msg js-form-submission"><?php esc_html_e( 'Submission in process, please wait..', 'geometrywebsite' ) ;?></small>
    <small class="text-info form-control-msg js-form-success"><?php esc_html_e( 'Message sent!', 'geometrywebsite' ) ;?></small>
    <small class="text-info form-control-msg js-form-error"><?php esc_html_e( 'There was a problem submitting the form.', 'geometrywebsite' ) ;?></small>
    <?php wp_nonce_field( 'geometry_website_my_action', 'geometry_website_nonce_field' ); ?>
  </form><!-- form -->

</div><!-- .form-container -->
