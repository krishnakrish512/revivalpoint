<?php
$cotact_form  = get_sub_field( 'contact_form' );
$contact_info = get_sub_field( 'info' );
?>
<div class="b-contact b-contact_light pt-5 mt-4">
    <div class="container">
        <div class="row clearfix">
            <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-12 col-xs-12">
                <div class="b-title b-title_line_right">
                    <h2 class="text-uppercase"><?= $cotact_form['title'] ?></h2>
                </div>
				<?= do_shortcode( '[contact-form-7 id="' . $cotact_form['form'] . '"]' ) ?>
                <div class="mt-4" id="mail-status"></div>
            </div>
            <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-12 col-xs-12">
                <div class="b-title b-title_line_righ mt-5 mt-lg -0">
                    <h2 class="text-uppercase"><?= $contact_info['title'] ?></h2>
                </div>
				<?= $contact_info['content'] ?>
                <div class="b-title b-title_line_right">
                    <h2 class="text-uppercase">contact us</h2>
                </div>
                <div class="b-block_four_info">
                    <div class="row clearfix">
						<?php
						while ( have_rows( 'contact_us' ) ):
							the_row();
							?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="clearfix mb-5">
                                    <i class="icon-<?= get_sub_field( 'icon' ) ?> icons pull-left mr-4 b-icon_large"></i>
                                    <p class="pull-left mb-0">
										<?= get_sub_field( 'content' ) ?>
                                    </p>
                                </div>
                            </div>
						<?php
						endwhile;
						?>
                    </div>
                </div>
                <div class="b-blog_social b-socail_color mt-0 pb-5">
                    <ul class="list-unstyled clearfix mb-0 pl-0 pr-0">
						<?php
						$social_media = get_field( 'social_media', 'option' );
						?>
                        <li><a href="<?= $social_media['facebook'] ?>" target="_blank"
                               rel="noopener noreferrer" class="fa fa-facebook text-white"></a>
                        </li>
                        <li><a href="<?= $social_media['twitter'] ?>" target="_blank"
                               rel="noopener noreferrer" class="fa fa-twitter text-white"></a>
                        </li>
                        <li><a href="<?= $social_media['instagram'] ?>" target="_blank"
                               rel="noopener noreferrer" class="fa fa-instagram text-white"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>