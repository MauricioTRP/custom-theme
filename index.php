<?php
/**
 * Main page template
 * 
 * @package Duam
 */
  get_header();

?>


  <div class="primary">
    <main id="main" class="site-main mt-5" role="main">
      <?php
        if ( have_posts() ) :
          ?>
          <div class="container">
            <?php
              if ( ! is_front_page() && is_home() ) {
                ?>
                  <h1 class="mb-5"><?php single_post_title(); ?></h1>
                <?php
              }
            ?>
            <div class="grid">
              <?php

                // Start the loop
                while ( have_posts() ) : the_post();
                  
                  get_template_part( 'template-parts/content' );

                endwhile;
              ?>
            </div>
          </div>

      <?php
      else :
        
        get_template_part( 'template-parts/content-none' );

      endif;
      ?>
    </main>
  </div>
  
  <?php get_footer();

