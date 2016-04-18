<?php
/*Template Name: home page*/




//do_shortcode('[select_musicians numberMusicians="10"]');

/*$musicians = do_shortcode('[select_musicians numberMusicians="10"]');
$artists = do_shortcode('[select_artists numberartists="10"]');*/



	$args = array(
        'posts_per_page' => -1,
        'post_type' => 'musician',
    );
	$musicians = new WP_Query( $args );
	$ma = array();
	while ($musicians->have_posts()) {
		$musicians->the_post();
		$ma[] = new MusicianHandler($post->id);
	}
	wp_reset_postdata();

	var_dump($ma);

	$args = array(
        'posts_per_page' => 10,
        'post_type' => 'song',
    );
	$songs = new WP_Query( $args );

	$sa = array();
	while ($songs->have_posts()) {
		$songs->the_post();
		$sa[] = new SongHandler($post->id);
	}
	wp_reset_postdata();

	var_dump($sa);



	
get_header(); ?>
	<?php masterslider(1); ?>
	<div class="site-container">
	

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="homepageSongs">
				<h2>New Music</h2>
					<?php 

					foreach ($songArray as $song) {
						echo $song->homePageRender();
					}

					?>
				</div>

				<div class="homepageArtists">
				<h2>New Designs</h2>
					<?php
						foreach ($shirtArray as $shirt) {
							echo $shirt->homePageRender();
						}
					?>
				</div>
				<div class="homepageBlurb">
					<h2>Who We Are</h2>
					<p>This is a blurb about Radiate and what we do. This is a blurb about Radiate and what we do. This is a blurb about Radiate and what we do. This is a blurb about Radiate and what we do.</p>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
		
		<div class="clearboth"></div>
	</div>

<?php get_footer(); ?>
