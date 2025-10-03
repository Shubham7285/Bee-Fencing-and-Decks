<div class="sidbar-financing text-center order-lg-3 order-3">
	<div class="d-flex flex-column flex-lg-row justify-content-center rpx_gap_20 rpx_px_20 rpx_py_40 color_secondary_bg rpx_radius_10 window_width window_ml window_mr window_auto_lg window_ml_0_lg window_mr_0_lg">
                <div class="col mw-md-304 mw-lg-326 mx-auto ">
					<div class="d-flex flex-column rpx_gap_20 text-center">
					 <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/custom-financing-cta/financing-icon.svg" <?php echo !empty($alt) ? $alt : ''; ?> class="img-fluid mx-auto d-block" width="103" height="105">
                    <?php if (!empty($args["page_templates"]["subpage"]["sidebar"]["financing"]["heading"])): ?>
                        <h5 class="mb-0 color_primary text_22 line_height_27"><?php echo esc_html($args["page_templates"]["subpage"]["sidebar"]["financing"]["heading"]); ?></h5>
                    <?php endif; ?>
                    <?php if (!empty($args["page_templates"]["subpage"]["sidebar"]["financing"]["subheading"])): ?>
                        <p class="mb-0 true_white"><?php echo esc_html($args["page_templates"]["subpage"]["sidebar"]["financing"]["subheading"]); ?></p>
                    <?php endif; ?>
					<div class="d-block">
					 <?php if (!empty($args["page_templates"]["subpage"]["sidebar"]["financing"]["button_text"]) && !empty($args["page_templates"]["subpage"]["sidebar"]["financing"]["button_link"])): ?>
                        <a href="<?php echo esc_url($args["page_templates"]["subpage"]["sidebar"]["financing"]["button_link"]); ?>" class="no_hover_underline">
                            <button type="button" class="btn btn-primary">
                                <?php echo esc_html($args["page_templates"]["subpage"]["sidebar"]["financing"]["button_text"]); ?><i class="icon-circle-chevron-right2"></i>
                            </button>
                        </a>
                    <?php endif; ?>
					 </div>
                </div>
                   
                </div> 
     </div>
</div>
