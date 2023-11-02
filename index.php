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
            <div class="row">
              <?php
                $index = 0;
                $no_of_columns = 3;

                // Start the loop
                while ( have_posts() ) : the_post();

                // Opens html col tag
                  if ( 0 === $index % $no_of_columns ) {
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <?php
                  }
                  // Post content

                  get_template_part( 'template-parts/content' );

                  $index ++;
                // Closes html tag
                if ( 0 !== $index && 0 === $index % $no_of_columns ) {
                  ?>
                    </div>
                  <?php
                  }
                  
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

