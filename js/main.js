jQuery(document).ready(function($) {

  /*
 Sidebar Toggle Open or Close
 _______________________________________
 */
 $(document).on('click', '.js-toggleSidebar', function() {
        $('.geometry-website-sidebar').toggleClass('sidebar-closed');
        $('html').toggleClass('no-scroll');
        $('.sidebar-overlay').fadeToggle(500);
    });

  /*
  ScrollTop
  ______________________________________
  */

  //window on scroll show scroll top button
  $(document).on('scroll', function(){


      if ($(document).scrollTop() > 400) { // this refers to window
          $('.ninety-nine-scroll-top').removeClass('hide');
      } else {
        $('.ninety-nine-scroll-top').addClass('hide');
      }


  });

  //On Click
  $('.ninety-nine-scroll-top').on('click', function(){

    $('html, body').animate({
           scrollTop: $('html').position().top
       }, 1500);

  });
  /*
  Contact Form Submission
  _____________________________________
  */

  $('.contactForm').on('submit', function(e) {
       e.preventDefault();

       $('.has-error').removeClass('has-error');

       var form = $(this);

       var name = form.find('#name').val();
       var email = form.find('#email').val();
       var message = form.find('#message').val();
       var ajaxurl = form.data('url');
       var geometry_website_nonce_field = form.find('#geometry_website_nonce_field').val();

       if (name === '') {
           $('#name').parent('.form-group').addClass('has-error');
           return;
       }
       if (email === '') {
           $('#email').parent('.form-group').addClass('has-error');
           return;
       }
       if (message === '') {
           $('#message').parent('.form-group').addClass('has-error');
           return;
       }
       form.find('input, textarea, button').attr('disabled', 'disabled');
       $('.js-form-submission').addClass('js-show-feedback');


       $.ajax({

           url: ajaxurl,
           type: 'post',
           data: {
               geometry_website_nonce_field: geometry_website_nonce_field,
               name: name,
               email: email,
               message: message,
               action: 'geometry_website_save_user_contact_form'

           },
           error: function(response) {
               $('.js-show-feedback').removeClass('js-show-feedback');
               $('.js-form-error').addClass('js-show-feedback');
               form.find('input, textarea, button').removeAttr('disabled');
           },
           success: function(response) {
               $('#name').val('');
               $('#email').val('');
               $('#message').val('');
               $('.js-show-feedback').removeClass('js-show-feedback');
               $('.js-form-success').addClass('js-show-feedback');
           }
       });


   });

});
