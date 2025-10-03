<!--order-9 order-lg-9-->
<?php
$get_alt_text = RDS_ALT_DATA;
$alt = "";
if (is_array($get_alt_text)) {
    foreach ($get_alt_text as $value) {
        if (in_array("seo-img.webp", $value)) {
            $alt = 'alt="' . $value[3] . '"';
        }
    }
}

?> 

<div class="d-block">
    <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 company_services">
        <div class="container rpx_px_15 rpx_px_lg_0">
            <div class="row g-xl-0 company_services_row"> 
			<div class="col-12 col-lg-5 company_services_row__col rpx_mb_20 rpx_mb_lg_0">
                <div class="text-md-right d-md-inline-block company_img_bg">
                    <div class="img_section company_img_block d-md-inline-block">
                       <img src="<?php echo get_exist_image_url('seo-section', 'seo-img'); ?>" srcset="<?php echo get_exist_image_url('seo-section', 'seo-img'); ?> 1x, <?php echo get_exist_image_url('seo-section', 'seo-img@2x'); ?> 2x, <?php echo get_exist_image_url('seo-section', 'seo-img@3x'); ?> 3x" <?php echo !empty($alt) ? $alt : ''; ?> class="img-fluid d-none d-md-none" width="550" height="550">
					   <img src="<?php echo get_exist_image_url('seo-section', 'm-seo-img'); ?>" srcset="<?php echo get_exist_image_url('seo-section', 'm-seo-img'); ?> 1x, <?php echo get_exist_image_url('seo-section', 'm-seo-img@2x'); ?> 2x, <?php echo get_exist_image_url('seo-section', 'm-seo-img@3x'); ?> 3x" <?php echo !empty($alt) ? $alt : ''; ?> class="img-fluid d-block d-lg-none w-100" width="345" height="345">
                    </div>
                </div>
                </div>			
                <div class="col-12 col-lg-7 company_services_row__col">
                <div class="cmpny-content">
                    <?php if (!empty($args["globals"]["company_services"]["heading"])): ?>
                        <h4 class="rpx_mb_30 rpx_mb_lg_50"><?php echo $args["globals"]["company_services"]["heading"]; ?></h4>
                    <?php endif; ?>

                    <?php if (!empty($args["globals"]["company_services"]["subheading"])): ?>
                        <h5 class="rpx_mb_30"><?php echo $args["globals"]["company_services"]["subheading"]; ?></h5>
                    <?php endif; ?>

                    <div class="company_treat_content">
                    <div class="">
                        <?php echo !empty($args["globals"]["company_services"]["description_html_allowed"]) ? $args["globals"]["company_services"]["description_html_allowed"] : ''; ?>
							</div>
                        <?php if (!empty($args["globals"]["company_services"]["button_text"])): ?>
                            <div class="">
                                <a href="<?php echo $args["globals"]["company_services"]["button_link"]; ?>" class="btn btn-secondary mx-lg-0 mx-auto">
                                    <?php echo $args["globals"]["company_services"]["button_text"]; ?><i class="icon-chevron-right1"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                   
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div> 
</div>