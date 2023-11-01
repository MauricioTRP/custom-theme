<?php
/**
 * Main template file
 * 
 * @package Duam
 */
?>

  <?php get_header(); ?>
  <div class="primary">
    <main id="main" class="site-main mt-5" role="main">
      <?php
        if ( have_posts() ) {
          ?>
          <div class="container"></div>
            <?php 
              while ( have_posts() ) : the_post(); 
                the_title();
                the_excerpt();
              endwhile;
            ?>
          <?php
        }
      ?>

    </main>
    
  </div>
  <?php get_footer();

