<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
require get_stylesheet_directory() . '/classes/MusicianHandler.php';
require get_stylesheet_directory() . '/classes/ArtistHandler.php';
require get_stylesheet_directory() . '/classes/SongHandler.php';
function music_script() {
    wp_enqueue_script( 'music', get_stylesheet_directory_uri() . '/js/music.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'music_script' );
/*require get_stylesheet_directory() . '/classes/Song.php';*/

/*****************************************************************************************************************************
MUSICIAN FUNCTIONS GO HERE

****************************************************************************************************************************/

function selectMusicians($atts) {
	$atts = shortcode_atts( array(
		'numberMusicians' => 1,
		
	), $atts, 'select_musicians' );

	if(is_numeric($atts['numberMusicians'])) {
		$numberMusicians = $atts['numberMusicians'];
	}

	$args = array(
		'posts_per_page' => $numberMusicians,
		'post_type' => 'musician',
		);
	
	$musicianQuery = new WP_Query($args);

	while ( $musicianQuery->have_posts() ) {
		$musicianQuery->the_post();
		$musician = new MusicianHandler($post->ID);
		$musicians[] = $musician;
	}
	wp_reset_postdata();
	return $musicians;
}

add_shortcode( 'select_artists', 'selectArtists' );

function selectArtists($atts) {
	$atts = shortcode_atts( array(
		'numberArtists' => 1,
		
	), $atts, 'select_artists' );

	if(is_numeric($atts['numberArtists'])) {
		$numberArtists = $atts['numberArtists'];
	}

	$args = array(
		'posts_per_page' => $numberArtists,
		'post_type' => 'artist',
		);
	
	$artistQuery = new WP_Query($args);

	while ( $artistQuery->have_posts() ) {
		$artistQuery->the_post();
		$artist = new ArtistHandler($post->ID);
		$artists[] = $artist;
	}
	wp_reset_postdata();
	return $artists;
}

add_shortcode( 'select_artists', 'selectArtists' );

function renderHomepageartist() {

}

?>