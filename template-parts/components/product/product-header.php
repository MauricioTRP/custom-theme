<?php
/**
 * Template for product entry header
 * 
 * @package Duam
 */
$the_post_id = get_the_ID();
$hide_title = get_post_meta( $the_post_id, '_hide_page_title', true );
?>

    <?php
        // Featured image
        if ( has_post_thumbnail( $the_post_id ) ) :
        ?>
            <a href="<?php the_permalink( $the_post_id ); ?> " class="card-img-top">
                <?php 
                // Custom helper to get responsive thumbnail
                the_post_custom_thumbnail( 
                    $the_post_id,
                    'featured-thumbnail',
                    [
                        'alt' => get_the_title(),
                        'class' => 'rounded',
                    ]
                );
                ?>
            </a>
        <?php
        endif;
    ?>