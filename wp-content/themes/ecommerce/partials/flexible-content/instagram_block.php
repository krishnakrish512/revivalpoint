<section id="b-instagram">
    <div class="b-instagram_feeds">
        <div class="b-instagram_content_inner text-center hidden-sm-down hidden-md-down">
            <h3 class="mb-0"><b><?= get_sub_field( 'title' ) ?></b></h3>
            <hr class="mt-2"
                style="text-align: center; margin-bottom: 10px; width: 40px; border-width: 3px; border-color: black;">
            <p><?= get_sub_field( 'description' ) ?></p>
            <div class="text-center">
                <a href="<?= get_sub_field( 'instagram_link' ) ?>" target="_blank" rel="noreferrer noopener"
                   class="btn btn-full"><?= get_sub_field( 'link_text' ) ?></a>
            </div>
        </div>
        <ul class="b-instagram_pics mb-0 b-instagram_pics_01 list-inline">
			<?php
			$image_ids = get_sub_field( 'images' );
			foreach ( $image_ids as $image_id ):
				?>
                <li>
                    <a href="<?= get_sub_field( 'instagram_link' ) ?>" target="_self"></a>
                    <div class="wrapp-pics">
                        <img src="<?= wp_get_attachment_image_url( $image_id, 'full' ) ?>" alt=""
                             class="img-fluid d-block">
                        <div class="hover-mask"></div>
                    </div>
                </li>
			<?php
			endforeach;
			?>
        </ul>
    </div>
</section>