<div class="d-block color_primary">
    <div class="container-fluid text-center px-0 hiring_cta_bg position-relative">
        <div class="container rpx_px_lg_0">
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-between rpx_gap_40 rpx_gap_lg_0 hiring_cta_block rpx_pb_40 rpx_pb_lg_80">
                    <?php
                    $careers_cta_image = get_exist_image_url("careers-cta", "career-cta");
                    $careers_cta_image2x = get_exist_image_url("careers-cta", "career-cta@2x");
                    $careers_cta_image3x = get_exist_image_url("careers-cta", "career-cta@3x");

                    if (!empty($careers_cta_image) && @getimagesize($careers_cta_image) !== false) {
                        ?>
                        <img src="<?php echo esc_url($careers_cta_image); ?>" alt="career-logo" class="img-fluid" width="110" height="90" srcset="<?php echo esc_url($careers_cta_image); ?> 1x, <?php echo esc_url($careers_cta_image2x); ?> 2x, <?php echo esc_url($careers_cta_image3x); ?> 3x">
                        <?php
                    } else {
                        ?>
                        <div class="hiring_icon"><i class="icon-people-group4 text_125 sm_text_100 line_height_23"></i></div>
                        <?php
                    }
                    ?>
                <div class="d-flex flex-column flex-xl-row  rpx_gap_xl_10 mw-lg-650  mw-md-315">
                        <h3 class="mb-0 d-none d-xl-inline-block"> <?php echo !empty($args["page_templates"]["homepage"]["we_are_hiring"]["heading"]) ? $args["page_templates"]["homepage"]["we_are_hiring"]["heading"] : ''; ?> </h3>
                        <h3 class="mb-0 d-none d-xl-inline-block color_secondary--imp"><?php echo !empty($args["page_templates"]["homepage"]["we_are_hiring"]["subheading"]) ? $args["page_templates"]["homepage"]["we_are_hiring"]["subheading"] : ''; ?></h3>
						<h5 class="mb-0 d-inline-block d-xl-none true_black--imp"> <?php echo !empty($args["page_templates"]["homepage"]["we_are_hiring"]["heading"]) ? $args["page_templates"]["homepage"]["we_are_hiring"]["heading"] : ''; ?> </h3>
                        <h5 class="mb-0 d-inline-block d-xl-none"><?php echo !empty($args["page_templates"]["homepage"]["we_are_hiring"]["subheading"]) ? $args["page_templates"]["homepage"]["we_are_hiring"]["subheading"] : ''; ?></h3>
                </div>
                <div class="">
                   <?php if (!empty($args["page_templates"]["homepage"]["we_are_hiring"]["button_text"])) { ?>
                        <a href="<?php echo esc_url($args["page_templates"]["homepage"]["we_are_hiring"]["button_link"]); ?>" class="no_hover_underline">
                            <button type="button" class="btn btn-secondary">
                                <?php echo esc_html($args["page_templates"]["homepage"]["we_are_hiring"]["button_text"]); ?><i class="icon-circle-chevron-right2"></i>
                            </button>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>