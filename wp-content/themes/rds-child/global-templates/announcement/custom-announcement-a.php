<div class="container-fluid px-0 rpx_py_5 color_secondary_bg hide-tablet-and-ipad">
    <!-- Hide this section if announcement bar is disabled-->
    <div class="container ">
        <div class="row text-center text-lg-start announcement_bar_text">
            <!-- announcement bar content-->
            <div class="col-lg-2 col-xl-3 text-start d-flex justify-content-start">
                <?php if (
                    !empty($args["globals"]["announcement"]["left"]["type"]) &&
                    $args["globals"]["announcement"]["left"]["type"] == "link"
                ) { ?>
                    <a class="announcment_bar_text d-inline-flex align-items-center justify-content-start me-auto tooltip-text" 
                       title="<?php echo esc_attr($args["globals"]["announcement"]["left"]["title"]); ?>" 
                       href="<?php echo esc_url(get_home_url() . $args["globals"]["announcement"]["left"]["url"]); ?>">
                        <i class="<?php echo esc_attr($args["globals"]["announcement"]["left"]["icon_class"]); ?> text_16 line_height_16 me-2 icon"></i>
                        <span class="announcment_wrap_text"><?php echo esc_html($args["globals"]["announcement"]["left"]["text"]); ?></span>
                    </a>
                <?php } elseif (
                    !empty($args["globals"]["announcement"]["left"]["text"])
                ) { ?>
                    <span title="<?php echo esc_attr($args["globals"]["announcement"]["left"]["title"]); ?>" 
                          class="announcment_bar_text d-inline-flex align-items-center text_normal justify-content-start me-auto tooltip-text position-relative">
                        <i class="<?php echo esc_attr($args["globals"]["announcement"]["left"]["icon_class"]); ?> text_16 line_height_16 me-2 icon"></i>
                        <span class="announcment_wrap_text"><?php echo esc_html($args["globals"]["announcement"]["left"]["text"]); ?></span>
                        <div class="tooltips p-4 text-center text-transform-none">
                            <span class="p d-inline-block tool_tip_text">
                                <?php echo esc_html($args["globals"]["announcement"]["left"]["tooltip_text"]); ?>
                            </span>
                        </div>
                    </span>
                <?php } ?> 
            </div>

            <div class="col-lg-8 col-xl-6 text-center d-flex justify-content-center">
                <?php if (
                    !empty($args["globals"]["announcement"]["middle"]["text"])
                ) { ?>
                    <span class="announcment_bar_text d-inline-flex rpx_gap_10 align-items-center">
                        <span>  <?php for ($i = 0; $i < 5; $i++) { ?>
                          <i class="<?php echo esc_attr($args["globals"]["announcement"]["middle"]["icon_class"]); ?> text_16 line_height_16 me-1 color_secondary"></i>
                        <?php } ?>
						</span>
						<span class="announcment_wrap_text text-decoration-none"><?php echo esc_attr($args["globals"]["announcement"]["middle"]["title"]); ?></span>
                        <a class="btn btn-primary mw-227" 
                           title="<?php echo esc_attr($args["globals"]["announcement"]["middle"]["title"]); ?>" 
                           href="<?php echo esc_url(get_home_url() . $args["globals"]["announcement"]["middle"]["url"]); ?>">
                            <?php echo esc_html($args["globals"]["announcement"]["middle"]["text"]); ?>
							<i class="icon-circle-chevron-right2 text_18 line_height_normal"></i>
                        </a>
						
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-2 col-xl-3 text-end d-flex justify-content-end">
                <?php if (
                    !empty($args["globals"]["announcement"]["right"]["text"])
                ) { ?>
                    <span class="announcment_bar_text d-inline-flex align-items-center">
                        <a class="announcment_bar_text d-inline-flex align-items-center rpx_gap_7" 
                           title="<?php echo esc_attr($args["globals"]["announcement"]["right"]["title"]); ?>" 
                           href="<?php echo esc_url(get_home_url() . $args["globals"]["announcement"]["right"]["url"]); ?>">
                            <i class="<?php echo esc_attr($args["globals"]["announcement"]["right"]["icon_class"]); ?> text_16 line_height_16 icon"></i>
                            <span class="announcment_wrap_text"><?php echo esc_html($args["globals"]["announcement"]["right"]["text"]); ?></span>
                            <i class="icon-chevron-right1 text_16 line_height_16"></i>
                        </a>
                    </span>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
