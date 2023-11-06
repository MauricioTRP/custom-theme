<?php
/**
 * Products index template
 * 
 * @package Duam
 */

//  Info about current page
 $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

//  Info about products
 $args = [
    'post_type' => 'product',
    'posts_per_page' => 10,
    'paged' => $paged
 ];

//  Products Query
 $the_query = new WP_Query( $args );

?>
<div class="container products mx-auto mt-3">
    <h2 class="h2"><?php esc_html_e( 'Cursos', 'duam' ) ?></h2>

    <?php
        if ( $the_query->have_posts() ) :
            $index = 0;
            $no_of_cols = 4;
            $max_rows = 5;
            $productos = 15;
          ?>
            
            <div class="row grid" style="--bs-row: 5; --bs-columns: 4;">
              <?php


                // Start the loop
                while ( $the_query->have_posts() ) : $the_query->the_post();
                  // Post content
                ?>
                <div class="card-group col-md-4 col-sm-12 col-xl-3">
                    <div class="card mx-1 my-1">
    
                    <?php
                      get_template_part( 'template-parts/components/product/product-header' );
                    ?>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
              ?>
            </div>
            
            <?php
        else :
        
            get_template_part( 'template-parts/content-none' );
        
        endif;
    ?>
</div>