<?php

/**
 * get_the_post_custom_thumbnail
 * 
 * @post_id
 * @size -> registered size
 * @additional_attributes
 * 
 * returns $custom_thumbnail (html string)
 */
function get_the_post_custom_thumbnail( $post_id, $size = 'featured-large', $additional_attributes = [] ) {
    $custom_thumbnail = '';

    if ( null == $post_id) {
        $post_id = get_the_ID();
    }

    if ( has_post_thumbnail( $post_id )) {
        $default_attributes = [
            'loading' => 'lazy',
            'class'   => 'img-fluid mx-auto',
        ];
    }

    $attributes = array_merge( $additional_attributes, $default_attributes );

    $custom_thumbnail = wp_get_attachment_image( 
        get_post_thumbnail_id( $post_id ), 
        $size, 
        false, 
        $attributes
        );

    return $custom_thumbnail;
}

function the_post_custom_thumbnail( $post_id, $size = 'featured-large', $additional_attributes = [] ) {
    echo get_the_post_custom_thumbnail( $post_id, $size, $additional_attributes );
}

/**
 * Post info for Google Robots
 * 
 * Used to d-none print info on updates
 */
function duam_posted_on() {
 
	$year                        = get_the_date( 'Y' );
	$month                       = get_the_date( 'n' );
	$day                         = get_the_date( 'j' );
	$post_date_archive_permalink = get_day_link( $year, $month, $day );

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	// Post is modified ( when post published time is not equal to post modified time )
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="d-none updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_attr( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_attr( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Publicado el %s', 'post date', 'duam' ),
		'<a href="' . esc_url( $post_date_archive_permalink ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';
}

/**
 * Get the trimmed versión of post excerpt.
 * 
 * @param int $trim_character_count Character count to be trimmed
 * 
 * @return bool|string
 */

function duam_the_excerpt( $trim_character_count = 0) {
    $post_ID = get_the_ID();

    if ( empty( $post_ID) ) {
        return null;
    }

    if ( has_excerpt() || 0 === $trim_character_count ) {
        the_excerpt();

        return;
    }

    $excerpt = wp_html_excerpt( get_the_excerpt( $post_ID ), $trim_character_count, '[...]' );

    return $excerpt;
}

/**
 * Filter the "read more" excerpt string link to the post
 * 
 * @param string $more "Read more" excerpt stromg.
 * 
 * @return string (Maybe) modified "Read more" excerpt string
 */

function duam_excerpt_more( $more = '' ) {

	if ( ! is_single() ) {
		$more = sprintf( '<a class="duam-read-more text-white mt-3 btn btn-success btn-sm" href="%1$s">%2$s</a>',
			get_permalink( get_the_ID() ),
			__( 'Sigue leyendo', 'duam' )
		);
	}

	return $more;
}