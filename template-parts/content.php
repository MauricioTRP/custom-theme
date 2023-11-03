<?php
/**
 * Content template
 * 
 * @package Duam
 */
?>

<article id="post-<?php the_ID(); ?>" class="g-col-xl-3 g-col-lg-4 g-col-md-6 g-col-12">
    <?php
        get_template_part( 'template-parts/components/blog/entry-header' );
        // get_template_part( 'template-parts/components/blog/entry-meta' );
        // get_template_part( 'template-parts/components/blog/entry-content' );
        // get_template_part( 'template-parts/components/blog/entry-content' );
        // get_template_part( 'template-parts/components/blog/entry-footer' );
    ?>
</article>

