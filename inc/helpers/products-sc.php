<?php
/**
 * Wordpress products shortcode
 * 
 * @package Duam
 */
function custom_product_grid_shortcode( $atts ) {
    ob_start();

    // Parámetros del shortcode
    $atts = shortcode_atts( array(
        'category' => '',
        'limit' => 12,
        'columns' => 4
    ), $atts, 'product_grid' );

    // Query de productos
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $atts['limit'],
        'product_cat' => $atts['category']
    );
    $products = new WP_Query( $args );

    if ( $products->have_posts() ) {
        echo '<div class="woocommerce columns-' . $atts['columns'] . '">';
        while ( $products->have_posts() ) {
            $products->the_post();
            wc_get_template_part( 'content', 'product' );
        }
        echo '</div>';
    }

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode( 'product_grid', 'custom_product_grid_shortcode' );