<section class="section-mb promo-block">

        <a href="<?php the_sub_field('image_link');?>">

            <?php

            $image_id = get_sub_field('image_url');

            $image = wp_get_attachment_image_url($image_id, 'full');

            $image = getResizedImage($image);

            echo \NextGenImage\getWebPHTML($image['webp'], $image['orig'], [

                'class' => 'img-fluid',

                'alt' => esc_attr(get_the_title($image_id))

            ]);

            ?>

        </a>

</section>

</br>