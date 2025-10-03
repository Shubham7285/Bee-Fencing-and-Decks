<?php
//exaple how to set image sizewise
// ['dektop', 'ipad', 'mobile']
$img1x = [get_exist_image_url("hero", "home-banner"), get_exist_image_url("hero", "home-banner"), get_exist_image_url("hero", "m-home-banner-complet")];
$img2x = [get_exist_image_url("hero", "home-banner@2x"), get_exist_image_url("hero", "home-banner@2x"), get_exist_image_url("hero", "m-home-banner-complet@2x")];
$img3x = [get_exist_image_url("hero", "home-banner@3x"), get_exist_image_url("hero", "home-banner@3x"), get_exist_image_url("hero", "m-home-banner-complet@3x")];
$img1x = Implode(",", $img1x);
$img2x = Implode(",", $img2x);
$img3x = Implode(",", $img3x);

echo do_shortcode('[custom-bg-srcset class="home_banner" img1x="' . $img1x . '" img2x="' . $img2x . '" img3x="' . $img3x . '" size1x="cover" size2x="cover" size3x="cover" position="center center" md_position="center center" m_position="top center"]');

		$imgbg1x = [
			get_exist_image_url("hero", "booking"),
			get_exist_image_url("hero", "booking"),
			get_exist_image_url("hero", "m-booking"),
		];
		$imgbg2x = [
			get_exist_image_url("hero", "booking@2x"),
			get_exist_image_url("hero", "booking@2x"),
			get_exist_image_url("hero", "m-booking@2x"),
		];

		$imgbg3x = [
			get_exist_image_url("hero", "booking@3x"),
			get_exist_image_url("hero", "booking@3x"),
			get_exist_image_url("hero", "m-booking@3x"),
		];

		// Convert arrays to comma-separated strings
		$imgbg1x = implode(",", $imgbg1x);
		$imgbg2x = implode(",", $imgbg2x);
		$imgbg3x = implode(",", $imgbg3x);

		// Add the custom-bg-srcset shortcode
		echo do_shortcode(
			'[custom-bg-srcset class="expert-box" img1x="' .
				$imgbg1x .
				'" img2x="' .
				$imgbg2x .
				'" img3x="' .
				$imgbg3x .
				'" size1x="cover" size2x="cover" size3x="cover"]'
		); 
 ?>
<div class="container-fluid home_banner color_primary_bg d-flex align-items-center overflow-hidden rpx_pb_44 rpx_pt_55">
        <div class="container-xxl home_banner_container px-0 position-relative">
            <div class="row g-0 align-items-center">
                <div class="col-sm-6 position-relative text-end d-lg-none order-sm-2">
				<img src="<?php echo get_exist_image_url('hero', 'm-mascot'); ?>" srcset="<?php echo get_exist_image_url('hero', 'm-mascot'); ?> 1x, <?php echo get_exist_image_url('hero', 'm-mascot@2x'); ?> 2x, <?php echo get_exist_image_url('hero', 'm-mascot@3x'); ?> 3x" <?php echo !empty($alt) ? $alt : ''; ?> class="img-fluid" width="207" height="321">
				</div>
                <div class="col-sm-6 position-relative rpx_py_44 rpx_py_lg_0 order-sm-1">
                <div class="rpx_pr_lg_25">
                    <?php if (!empty($args["globals"]["hero"]["heading"])) { ?>
                        <span class="display2 sm_text_semibold"><?php echo $args["globals"]["hero"]["heading"]; ?></span>
                    <?php } ?>
                    <?php if (!empty($args["globals"]["hero"]["subheading"])) { ?>
                        <span class="display1"><?php echo $args["globals"]["hero"]["subheading"]; ?></span>
                    <?php } ?>
                    <?php if (!empty($args["globals"]["hero"]["footer_text"])) { ?>
                        <span class="display2"><?php echo $args["globals"]["hero"]["footer_text"]; ?></span>
                    <?php } ?>
                </div>
                </div>
				<div class="col-lg-6 position-relative order-sm-3">
				<div class="expert-box d-flex flex-column justify-content-center rpx_gap_26 rpx_gap_lg_33 rpx_radius_10  bg-black rpx_p_16 rpx_p_lg_40 text-center true_white mw-lg-480 mh-md-511">
				<div class="expert-icons d-flex justify-content-lg-between align-items-center mw-md-248 mw-lg-354 mx-auto w-100 rpx_gap_16 rpx_gap_lg_0">
				<?php if (!empty($settings["expert_leftlabel"])) { ?>
                        <span class="true_white text_12 line_height_15 text-uppercase font_alt_2 "><?php echo $settings["expert_leftlabel"]; ?></span>
                    <?php } ?>
					<?php if ( ! empty( $settings['expert_icon']['url'] ) ) : 
						$image_url = $settings['expert_icon']['url'];
						$image_id  = $settings['expert_icon']['id'] ?? '';
						$alt_text  = $image_id ? get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : '';
					?>
						<img width="55" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>" class="text-center" />
					<?php endif; ?>

				<?php if (!empty($settings["expert_rightlabel"])) { ?>
					<span class="true_white text_12 line_height_15 text-uppercase font_alt_2 "><?php echo $settings["expert_rightlabel"]; ?></span>
				<?php } ?>
				</div>
				 <?php if (!empty($settings["expert_title"])) { ?>
                        <h4 class="h4 true_white--imp mb-0"><?php echo $settings["expert_title"]; ?></h4>
                    <?php } ?>
					<?php if (!empty($settings["expert_subtitle"])) { ?>
                        <p class="true_white mb-0 mw-md-300 mx-auto "><?php echo $settings["expert_subtitle"]; ?></p>
                    <?php } ?>
					<?php if (!empty($settings["expert_footer"])) { ?>
                        <h6 class="h6 true_white--imp mb-0"><?php echo $settings["expert_footer"]; ?></h6>
                    <?php } ?>
					 <?php if (!empty($args["globals"]["hero"]["button_link"]) && !empty($args["globals"]["hero"]["button_text"])) { ?>
					 <a href="<?php echo get_home_url() . $args["globals"]["hero"]["button_link"]; ?>" class="btn btn-primary mw-md-301 mw-lg-301 mh-56 mx-auto w-100 rpx_mt_lg_n23"><?php echo $args["globals"]["hero"]["button_text"]; ?><i class="icon-circle-chevron-right2"></i></a>
					  <?php } ?>
					  
                </div>
                </div>
            </div>
			<img src="<?php echo get_exist_image_url('hero', 'mascot'); ?>" srcset="<?php echo get_exist_image_url('hero', 'mascot'); ?> 1x, <?php echo get_exist_image_url('hero', 'mascot@2x'); ?> 2x, <?php echo get_exist_image_url('hero', 'mascot@3x'); ?> 3x" <?php echo !empty($alt) ? $alt : ''; ?> class="img-fluid banner-mascot-img d-none d-xl-block" width="437" height="676">
			
			<img src="<?php echo get_exist_image_url('hero', 'm-mascot'); ?>" srcset="<?php echo get_exist_image_url('hero', 'm-mascot'); ?> 1x, <?php echo get_exist_image_url('hero', 'm-mascot@2x'); ?> 2x, <?php echo get_exist_image_url('hero', 'm-mascot@3x'); ?> 3x" <?php echo !empty($alt) ? $alt : ''; ?> class="img-fluid banner-mascot-img d-none d-lg-block d-xl-none" width="207" height="321">
        </div>
</div>
