<?php
		$img1x = [
			get_exist_image_url("full-width-form", "form-img-bg"),
			get_exist_image_url("full-width-form", "form-img-bg"),
			get_exist_image_url("full-width-form", "form-img-bg"),
		];
		$img2x = [
			get_exist_image_url("full-width-form", "form-img-bg@2x"),
			get_exist_image_url("full-width-form", "form-img-bg@2x"),
			get_exist_image_url("full-width-form", "form-img-bg@2x"),
		];

		$img3x = [
			get_exist_image_url("full-width-form", "form-img-bg@3x"),
			get_exist_image_url("full-width-form", "form-img-bg@3x"),
			get_exist_image_url("full-width-form", "form-img-bg@3x"),
		];

		// Convert arrays to comma-separated strings
		$img1x = implode(",", $img1x);
		$img2x = implode(",", $img2x);
		$img3x = implode(",", $img3x);

		// Add the custom-bg-srcset shortcode
		echo do_shortcode(
			'[custom-bg-srcset class="request-service-bg" img1x="' .
				$img1x .
				'" img2x="' .
				$img2x .
				'" img3x="' .
				$img3x .
				'" size1x="cover" size2x="cover" size3x="cover"]'
		);

		$imgbg1x = [
			get_exist_image_url("full-width-form", "full-width-form-bg"),
			get_exist_image_url("full-width-form", "full-width-form-bg"),
			get_exist_image_url("full-width-form", "full-width-form-bg"),
		];
		$imgbg2x = [
			get_exist_image_url("full-width-form", "full-width-form-bg@2x"),
			get_exist_image_url("full-width-form", "full-width-form-bg@2x"),
			get_exist_image_url("full-width-form", "full-width-form-bg@2x"),
		];

		$imgbg3x = [
			get_exist_image_url("full-width-form", "full-width-form-bg@3x"),
			get_exist_image_url("full-width-form", "full-width-form-bg@3x"),
			get_exist_image_url("full-width-form", "full-width-form-bg@3x"),
		];

		// Convert arrays to comma-separated strings
		$imgbg1x = implode(",", $imgbg1x);
		$imgbg2x = implode(",", $imgbg2x);
		$imgbg3x = implode(",", $imgbg3x);

		// Add the custom-bg-srcset shortcode
		echo do_shortcode(
			'[custom-bg-srcset class="request-form-bg" img1x="' .
				$imgbg1x .
				'" img2x="' .
				$imgbg2x .
				'" img3x="' .
				$imgbg3x .
				'" size1x="cover" size2x="cover" size3x="cover"]'
		);
?>	
<div class="d-lg-block d-none">
<div class="container-fluid px-0 rpx_pt_lg_80 color_secondary_bg request-form-bg">
	<div class="container rpx_px_0">
		<div class="rpx_p_lg_80 request-service-bg color_primary_bg rpx_small_shadow rpx_radius_10 ">
			<div class="row g-0 align-items-center ">
				<div class="col-lg-12 elementor-requestformA">
					<div class="">
						<?php
						if (!empty($args["globals"]["request_service"]["heading"])) {
						?>
							<h2 class="rpx_mb_20 text-center color_secondary"><?php echo esc_html($args["globals"]["request_service"]["heading"]); ?></h2>
						<?php
						}
						?>
						
						<div class="banner-form request-service-form">
							<?php
							if (!empty($args["globals"]["request_service"]["gravity_form_id"])) {
								$form_id = $args["globals"]["request_service"]["gravity_form_id"];
								echo do_shortcode("[gravityforms id=" . esc_attr($form_id) . " ajax=true]");
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>



