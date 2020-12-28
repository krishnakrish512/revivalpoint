<section class="slider full-width-slider">
    <?php
    while (have_rows('slider')):
        the_row();
        ?>
        <div class="slider-item">
            <div class="slider-image">
                <?php
                $image = wp_get_attachment_image_url(get_sub_field('image'), 'full');
                $image = getResizedImage($image);
                //				echo \NextGenImage\getWebPHTML( $image['webp'], $image['orig'] );
                ?>
                <img src="<?= $image['orig'] ?>" alt="">
            </div>
            <div class="slider-content text-white">
                <h2 class="slider-title__lg text-uppercase"><?= get_sub_field('title') ?></h2>
                <span class="slider-title__sm text-uppercase"><?= get_sub_field('sub_title') ?></span>
                <?php if (get_sub_field('button_title')): ?>
                    <a href="<?= (get_sub_field('is_external')) ? get_sub_field('link_url') : get_sub_field('page_link') ?>">
                        <button type="button"
                                class="text-uppercase btn btn-bg"><?= get_sub_field('button_title') ?></button>
                    </a>
                <?php endif; ?>


            </div>
            <a href="<?= (get_sub_field('is_external')) ? get_sub_field('link_url') : get_sub_field('page_link') ?>"
               class="absolute-link"></a>
        </div>
    <?php
    endwhile;
    ?>
</section>

