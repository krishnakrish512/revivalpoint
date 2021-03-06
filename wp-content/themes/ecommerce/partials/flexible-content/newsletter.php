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
    <div class="b-newsletter b-newsletter_bg">
        <div class="container">
            <div class="b-newsletter_inner row">
                <div class="col-lg-8 ">
                    <h3 class="font-italic"><?= get_sub_field( 'pre_header' ) ?></h3>
                    <h2><?= get_sub_field( 'header' ) ?></h2>
                    <p><?= get_sub_field( 'description' ) ?></p>
                    <div class="b-newsletter_form">
                        <?php echo do_shortcode( '[newsletter_form form="1"]' ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>