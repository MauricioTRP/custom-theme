<?php
/**
 * Content template
 * 
 * @package duam
 */
?>

<div class="entry-content">
	<?php
	if ( is_single() ) {
		the_content(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. */
					__( 'Sigue Leyendo %s <span class="meta-nav">&rarr;</span>', 'duam' ),
					[
						'span' => [
							'class' => [],
						],
					]
				),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			)
		);

		wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'duam' ),
				'after'  => '</div>',
			]
		);

	} else {
		?>
		<div class="truncate-4">
			<?php duam_the_excerpt( 200 ); ?>
		</div>
		<?php

        echo duam_excerpt_more();
	}

	?>
</div>