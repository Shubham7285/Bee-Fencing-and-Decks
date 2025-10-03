
<div class="d-lg-block d-none">
<div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 color_secondary_bg review_request_service">
	<div class="container">
			<div class="row g-0 align-items-center ">
				<div class="col-lg-12 elementor-requestformA">
					<div class="">
						<?php
						if (!empty($args["globals"]["request_service"]["heading"])) {
						?>
							<h3 class="rpx_mb_25 text-center true_white"><?php echo esc_html($args["globals"]["request_service"]["heading"]); ?></h3>
						<?php
						}
						?>
						
						<div class="banner-form">
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



