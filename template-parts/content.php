<?php

/*
Standard Post Format
_____________________________________________
*/

$class = get_query_var( 'posts-class' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'geometry-website-format-standard', $class ) ); ?>>

   <header class="entry-header text-center">
     <?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">', '</a></h1>' ); ?>
     <div class="entry-meta">
       <?php echo geometry_website_posted_meta(); ?>
     </div>
   </header><!-- .entry-header -->

   <div class="entry-content">
    <div class="svg-hexagonal">
     <svg class="svg-graphic" width="100%" height="100%" viewBox="0 0 1000 600" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" version="1.1">

          <clipPath id="hexagonal-mask">
             <polygon points="500,0 1000,150 1000,450 500,600 0,450 0,150" />
          </clipPath>
       <g>
       <a href="<?php the_permalink(); ?>">
       <image clip-path="url(#hexagonal-mask)" height="100%" width="100%" xlink:href="<?php the_post_thumbnail_url(); ?>" class="hexagonal" />
       </a>
       </g>
       </svg>
     </div>
     <div class="entry-tags">
       <?php the_tags( 'Tags: ',' > ' ); ?>
     </div><!-- .entry-tags -->
     <div class="entry-excerpt">
       <?php the_excerpt(); ?>
     </div><!-- .entry-excerpt -->
     <div class="button-container text-center">
       <a href="<?php the_permalink();?>" class="btn btn-default">
         <?php _e( 'Read More' ); ?>
       </a><!-- .btn -->
     </div><!-- .button-container -->
   </div><!-- .entry-content -->

 </article><!-- artcile -->
