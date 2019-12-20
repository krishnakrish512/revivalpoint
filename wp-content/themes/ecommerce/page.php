<?php

get_header();

while ( have_posts() ):
	the_post();

	if ( get_the_content() ) {
		echo "<h1>" . get_the_title() . "</h1>";

		the_content();
	}

endwhile;

if ( have_rows( 'sections' ) ) {
	while ( have_rows( 'sections' ) ):
		the_row();

		get_template_part( '/partials/flexible-content/' . get_row_layout() );
	endwhile;
}

get_footer();