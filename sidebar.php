<?php

  /*
  ==================================
  Sidebar
  ==================================
  */

  if ( !is_active_sidebar( 'geometry-website-sidebar' ) ){

      return;

  }

  ?>

  <aside id="secondary" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'geometry-website-sidebar' );?>

  </aside><!-- #secondary -->
