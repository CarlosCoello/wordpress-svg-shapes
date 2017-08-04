<?php

/*
Image Post Format
____________________________________________
*/

$class = get_query_var( 'posts-class' );


 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'geometry-website-format-image', $class ) ); ?>>

   <header class="entry-header text-center">
     <?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">', '</a></h1>' ); ?>
     <div class="entry-meta">
       <?php echo geometry_website_posted_meta(); ?>
     </div><!-- entry-meta -->
     <div class="svg-octagonal">
     <svg class="svg-graphic" width="100%" height="100%" viewBox="0 0 1000 600" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" version="1.1">
          <clipPath id="octagonal">
             <polygon points="300,0 700,0 1000,180 1000,420 700,600 300,600 0,420 0,180" />
          </clipPath>
       <g>
       <a href="<?php the_permalink(); ?>">
         <image clip-path="url(#octagonal)" height="100%" width="100%" xlink:href="<?php the_post_thumbnail_url(); ?>" class="octagonal" />
       </a>
       </g>
       </svg>
     </div>
   </header><!-- .entry-header -->
   <div class="entry-excerpt image-caption">
     <div class="entry-tags">
       <?php the_tags( 'Tags: ',' > ' ); ?>
     </div><!-- .entry-tags -->
   </div><!-- .entry-excerpt -->
 </article><!-- article -->
