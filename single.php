<?php
/**
 * Single Post template file
 * 
 * @package Duam
 */
get_header();
?>
<div class="primary">
  <main class="site-main mt-5" id="main">
    <?php
      if ( is_home() && ! is_front_page() ) {
        ?>
        <h1 class="mb-5"><?php single_post_title(); ?></h1>
        <?php
      }
      ?>
      <div class="content">
        <?php 
        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/content' );
        endwhile;
        ?>
      </div>
    
      
  </main>
</div>

<?php get_footer();

