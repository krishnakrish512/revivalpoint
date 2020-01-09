<div class="rev_slider_wrapper fullwidthbanner-container bck-cover" data-alias="classic4export" data-source="gallery">
    <div id="b-home_01_slider" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
        <ul>
			<?php
			while ( have_rows( 'slider' ) ):
				the_row();
				$subtitle = get_sub_field( 'sub_title' );
				$subtitle = explode( '#', $subtitle );
				?>
                <li data-transition="zoomout"
                    data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut"
                    data-masterspeed="2000" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500"
                    data-fsslotamount="7" data-saveperformance="off" data-title="Intro" data-param1="" data-param2=""
                    data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                    data-param9=""
                    data-param10="" data-description="">
					<?php
					if ( get_sub_field( 'link_url' ) ):
						?>
                        <a href="<?= get_sub_field( 'link_url' ) ?>" class="absolute-link"></a>
					<?php
					endif;
					$image = wp_get_attachment_image_url( get_sub_field( 'image' ), 'full' );
					$image = getResizedImage( $image );
					?>
                    <img src="<?= $image['orig'] ?>" alt=""
                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                         data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <div class="tp-caption  tp-resizeme"
                         data-x="['left','left','left','center']"
                         data-hoffset="['300','300','170','0']"
                         data-y="['top','top','top','top']"
                         data-voffset="['210','210','210','100']"
                         data-fontsize="['22','22','22','20']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"
                         data-type="text"
                         data-responsive_offset="on"
                         data-frames='[{"delay":500,"speed":700,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"x:-50px;opacity:0;","ease":"nothing"}]'
                         data-textalign="['left','left','left','left']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"
                         style="line-height: 22px; font-weight: bold; text-transform: uppercase; color: #000; z-index: 999">
						<?= get_sub_field( 'title' ) ?>
                    </div>
                    <div class="tp-caption tp-resizeme"
                         data-x="['left','left','left','center']"
                         data-hoffset="['130','100','50','0']"
                         data-y="['top','top','top','top']"
                         data-voffset="['250','250','230','130']"
                         data-fontsize="['30','30','24','24']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"
                         data-type="text"
                         data-responsive_offset="on"
                         data-frames='[{"delay":700,"speed":700,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:50px;opacity:0;","ease":"nothing"}]'
                         data-textalign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"
                         style="font-family: Lora; color: #000; line-height: 60px; text-align: center; text-transform: uppercase; z-index: 999; font-weight: 600"><?= $subtitle[0] ?>
                    </div>
                    <div class="tp-caption tp-resizeme"
                         data-x="['left','left','left','center']"
                         data-hoffset="['100','100','70','0']"
                         data-y="['top','top','top','top']"
                         data-voffset="['300','300','270','180']"
                         data-fontsize="['30','30','20','20']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"
                         data-type="text"
                         data-responsive_offset="on"
                         data-frames='[{"delay":700,"speed":700,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:50px;opacity:0;","ease":"nothing"}]'
                         data-textalign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"
                         style="font-family: Lora; color: #000; line-height: 60px; text-align: center; text-transform: uppercase; z-index: 999; font-weight: 600"><?= $subtitle[1] ?>
                    </div>
                </li>
			<?php
			endwhile;
			?>
        </ul>
        <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>
    </div>
</div>