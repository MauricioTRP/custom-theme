<?php
/**
 * Template for displaying a message that post can't be found
 * 
 * @package Duam
 */
?>

<section class="no-result not-found">
    <header class="page-header">
        <h1 class="title"><?php esc_html_e( 'No encontramos nada', 'duam' ); ?></h1>
    </header>

    <div class="page-content">
        <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) {
                ?>
                    <p>
                        <?php 
                            printf(
                                wp_kses(  
                                    __( '¿Listo para publicar tu primer post? <a  href="%s">Comienza a postear</a>', 'duam' ),
                                    [
                                        'a' => [
                                            'href' => []
                                        ]
                                    ]
                                ),
                                esc_url( admin_url( 'post-new.php' ) )
                            )
                        ?>
                    </p>
                <?php
            } elseif ( is_search() ) {
                ?>

                    <p><?php esc_html_e( 'Lo sentimos, no encontramos lo que buscabas, intenta de nuevo con otra palabra clave', 'duam' ) ?></p>
                <?php
                    get_search_form();
            } else {
                ?>
                    <p><?php esc_html_e( 'Lo sentimos, no encontramos lo que buscabas, tal vez una búsqueda puede ayudar', 'duam' ) ?></p>
                <?php
            }
        ?>
    </div>
</section>
