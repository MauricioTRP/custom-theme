<?php
/**
 * Template for post entry header
 * 
 * @package duam
 */
$the_post_id = get_the_ID();
$hide_title = get_post_meta( $the_post_id, '_hide_page_title', true );
$heading_class = !empty( $hide_title ) && 'yes' === $hide_title ? 'd-none' : '';
?>

<header class="entry-header">
    <?php
        // Featured image
        if ( has_post_thumbnail( $the_post_id ) ) :
        ?>
            <a href="<?php the_permalink( $the_post_id ); ?>">
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
        // Title
        if ( is_single() || is_page() ) {
            printf(
                '<h1 class="page-title h1 %1s">%2s</h1>',
                esc_attr( $heading_class ),
                wp_kses_post( get_the_title() )
            );
        } else {
            printf(
                '<h4 class="entry-title"><a class="text-body-secondary" href="%1s">%2s</a></h1>',
                esc_url( get_the_permalink() ),
                wp_kses_post( get_the_title() )
            );
        }
    ?>
</header>