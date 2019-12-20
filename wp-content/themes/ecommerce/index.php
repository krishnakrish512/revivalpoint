<?php

get_header();
?>
    <div>
        <div class="container">
			<?php
			while ( have_posts() ):
				the_post();

				echo "<h1>" . get_the_title() . "</h1>";

				the_content();
			endwhile;
			?>
        </div>
    </div>
<?php
get_footer();