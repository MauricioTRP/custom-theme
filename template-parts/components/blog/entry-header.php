<?php
/**
 * Template for post entry header
 * 
 * @package duam
 */
$the_post_id = get_the_ID();
?>

<header class="entry-header">
    <?php
        // Featured image
        if ( has_post_thumbnail( $the_post_id ) ) :
        ?>
            <a href="<?php the_permalink( $the_post_id ); ?>" class="d-flex">
                <?php 
                // Custom helper to get responsive thumbnail
                the_post_custom_thumbnail( 
                    $the_post_id,
                    'featured-large',
                    [
                        'alt' => get_the_title(),
                        'class' => 'rounded mx-auto d-block',
                    ]
                 );
                 ?>
            </a>
        <?php
        endif;
    ?>
</header>