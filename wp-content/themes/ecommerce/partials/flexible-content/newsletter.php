<?php
$image = wp_get_attachment_image_url( get_sub_field( 'background_image' ), 'full' );
$image = getResizedImage( $image );
?>
<style>
    .b-newsletter_bg {
        background-image: url(<?=esc_url($image['orig'])?>);
    }

    .no-webp .b-newsletter_bg {
        background-image: url(<?=esc_url($image['orig']);?>);
    }

    .webp .b-newsletter_bg {
        background-image: url(<?=esc_url($image['webp'])?>);
    }
</style>
<section id="b-newsletter">
    <div class="b-newsletter b-newsletter_bg mb-5" data-type="background" data-speed="6">
        <div class="b-newsletter_inner">
            <h3 class="text-center font-italic"><?= get_sub_field( 'pre_header' ) ?></h3>
            <h2 class="text-center"><?= get_sub_field( 'header' ) ?></h2>
            <p class="text-center"><?= get_sub_field( 'description' ) ?></p>
            <div class="b-newsletter_form">
				<?php echo do_shortcode( '[newsletter_form form="1"]' ) ?>
            </div>
        </div>
    </div>
</section>