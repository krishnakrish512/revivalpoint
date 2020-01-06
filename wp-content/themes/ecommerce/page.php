<?php

get_header();

while ( have_posts() ):
	the_post();

	if ( get_the_content() ) {
		if ( is_cart() || is_checkout() ) {
			?>
            <div class="b-page_title b-page_title_default text-center">
                <h1 class="b-entry_title"><span><?= get_the_title() ?></span></h1>
                <div class="b-breadcrumbs">
                    <a href="<?= get_home_url() ?>">Home</a>
                    <span><?= get_the_title() ?></span>
                </div>
            </div>
			<?php
		} else {
			echo "<h1>" . get_the_title() . "</h1>";
		}
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