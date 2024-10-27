<?php

function get_all_pages(){
	$pages     = [];
	$all_pages = get_posts( array(
		'post_type'   => 'page',
		'post_status' => 'publish',
		'numberposts' => - 1
	) );

	if ( ! empty( $all_pages ) ) {
		foreach ( $all_pages as $page ) {
			$replace        = str_replace( ' ', '-', $page->post_title );
			$slug           = strtolower( $replace );
			$pages[ $slug ] = $page->post_title;
		}
	}

	return $pages;
}
