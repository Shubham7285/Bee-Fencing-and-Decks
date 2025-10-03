<?php
$get_alt_text = RDS_ALT_DATA;
$financing_home_svg_alt = "";
if (is_array($get_alt_text)) {
    foreach ($get_alt_text as $value) {
        if (in_array("financing-a-badge.webp", $value) || in_array("financing-a-badge.svg", $value)) {
            $financing_home_svg_alt = 'alt="' . $value[3] . '"';
        }
    }
}

//exaple how to set image sizewise
// ['dektop', 'ipad', 'mobile']

$img1x = [
	get_exist_image_url("fullwidth-cta", "financing-a-badge-bg"),
	get_exist_image_url("fullwidth-cta", "financing-a-badge-bg"),
	get_exist_image_url("fullwidth-cta", "m-financing-a-badge-bg"),
];
$img2x = [
	get_exist_image_url("fullwidth-cta", "financing-a-badge-bg@2x"),
	get_exist_image_url("fullwidth-cta", "financing-a-badge-bg@2x"),
	get_exist_image_url("fullwidth-cta", "m-financing-a-badge-bg@2x"),
];
$img3x = [
	get_exist_image_url("fullwidth-cta", "financing-a-badge-bg@3x"),
	get_exist_image_url("fullwidth-cta", "financing-a-badge-bg@3x"),
	get_exist_image_url("fullwidth-cta", "m-financing-a-badge-bg@3x"),
];
$img1x = Implode(",", $img1x);
$img2x = Implode(",", $img2x);
$img3x = Implode(",", $img3x);
?>
<?php echo do_shortcode(
	'[custom-bg-srcset class="full_width_cta_bg" img1x="' .$img1x .'" img2x="'.$img2x .'" img3x="'.$img3x .'" size1x="cover" size2x="cover" size3x="cover" position="center center" md_position="center center" m_position="center center"]'
); 
?>
<div class="d-block">   
    <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 full_width_cta_bg">
        <div class="container px-0">
        <div class="row g-0 rpx_gap_40 rpx_gap_lg_30">
        <div class="col-12 text-center">
        <div class="rpx_px_20 rpx_px_lg_0">
		<?php if (!empty($settings["cta_title"])): ?>
                                <h2 class="rpx_mb_20 color_secondary">
                                    <?php echo $settings["box_title"]; ?>
                                </h2>
                            <?php endif; ?>
			
			<?php if (!empty($settings["box_content"])): ?>
                                <div class="mb-0">
                                    <?php echo $settings["box_content"]; ?>
                                </div>
                            <?php endif; ?>
		</div>
		</div>
        <div class="col-12">
		<div class="d-flex flex-column flex-lg-row justify-content-center rpx_gap_30 rpx_gap_lg_80 rpx_px_20 rpx_py_40 rpx_p_lg_80 true_black_bg rpx_radius_10 rpx_small_shadow financing-fullwidth-cta">
                <div class="col align-self-center">
					<div class="d-flex flex-column rpx_gap_20 rpx_gap_lg_40 text-center">
					 <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/custom-financing-cta/financing-icon.svg" <?php echo !empty($alt) ? $alt : ''; ?> class="img-fluid mx-auto d-block" width="103" height="105">
                    <?php if (!empty($args["globals"]["financing"]["heading"])): ?>
                        <h5 class="mb-0 color_primary"><?php echo esc_html($args["globals"]["financing"]["heading"]); ?></h5>
                    <?php endif; ?>
                    <?php if (!empty($args["globals"]["financing"]["subheading"])): ?>
                        <p class="mb-0 mw-md-304 mw-lg-326 mx-auto true_white"><?php echo esc_html($args["globals"]["financing"]["subheading"]); ?></p>
                    <?php endif; ?>
					<div class="d-block d-lg-none">
					 <?php if (!empty($args["globals"]["financing"]["button_text"]) && !empty($args["globals"]["financing"]["button_link"])): ?>
                        <a href="<?php echo esc_url($args["globals"]["financing"]["button_link"]); ?>" class="no_hover_underline">
                            <button type="button" class="btn btn-primary">
                                <?php echo esc_html($args["globals"]["financing"]["button_text"]); ?><i class="icon-circle-chevron-right2"></i>
                            </button>
                        </a>
                    <?php endif; ?>
					 </div>
                </div>
                   
                </div> 
			<div class="d-none d-lg-block w-3 color_primary_bg"></div>
                <div class="col align-self-center d-none d-lg-block">
				
				<?php if (!empty($settings["cta_title"])): ?>
                                <h6 class="color_quaternary rpx_mb_20">
                                    <?php echo $settings["cta_title"]; ?>
                                </h6>
                            <?php endif; ?>
				<div class="mw-lg-370">
				<?php if (!empty($settings["cta_content"])): ?>
                                <div class="">
                                    <?php echo $settings["cta_content"]; ?>
                                </div>
                            <?php endif; ?>
				</div>
                    <?php if (!empty($args["globals"]["financing"]["button_text"]) && !empty($args["globals"]["financing"]["button_link"])): ?>
                        <a href="<?php echo esc_url($args["globals"]["financing"]["button_link"]); ?>" class="no_hover_underline">
                            <button type="button" class="btn btn-primary">
                                <?php echo esc_html($args["globals"]["financing"]["button_text"]); ?><i class="icon-circle-chevron-right2"></i>
                            </button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>