<?php
if (function_exists('rds_template')) {
    $get_rds_template_data_array = RDS_TEMPLATE_DATA;
}
require_once "type_A_navwalker.php";

// function mobile_nav_type_A_init($attrs){
$searchForm = isset($attrs["search_form"]) ? $attrs["search_form"] : "false";
$searchFormType = gettype($searchForm);
$closeIconClass = "icon-xmark";
if (isset($attrs["close_icon_class"]) && !in_array($attrs["close_icon_class"], [null, false, ""])) {
    $closeIconClass = $attrs["close_icon_class"];
}
if (!empty($attrs["dropdown_icon_up"]) && !empty($attrs["dropdown_icon_down"])) {
    $dropdown_icon_up = $attrs["dropdown_icon_up"];
    $dropdown_icon_down = $attrs["dropdown_icon_down"];
} else {
    $dropdown_icon_up = "icon-chevron-up1";
    $dropdown_icon_down = "icon-chevron-down1";
}
$button_class = "";
$template = basename(get_page_template());
if ($template == "rds-landing.php" && isset($args["page_templates"]["landing_page"]["announcement_and_nav_toggle"]) && $args["page_templates"]["landing_page"]["announcement_and_nav_toggle"] == false) {
    $button_class = "d-none";
}

$get_alt_text = RDS_ALT_DATA;
$header_logo_alt = "";
$header_mobile_logo_alt = "";
$header_mobile_cta_alt = "";
if (is_array($get_alt_text)) {
    foreach ($get_alt_text as $value) {
        if (is_array($value) && in_array("header-logo.webp", $value)) {
            $header_logo_alt = 'alt="' . $value[3] . '"';
        }

        if (is_array($value) && in_array("m-header-logo.webp", $value)) {
            $header_mobile_logo_alt = 'alt="' . $value[3] . '"';
        }

        if (is_array($value) && in_array("m-menu-cta-logo.webp", $value)) {
            $header_mobile_cta_alt = 'alt="' . $value[3] . '"';
        }
    }
}
?>
<div class="container-fluid rpx_px_16 bc_nav_container_mobile d-lg-none ui_kit_mobile_nav mobile_nav_type_A">
    <div class="level-3-background"></div>
    <div class="container px-0">
        <nav class="navbar navbar-expand-lg m-auto d-table w-100 p-0">
            <div id="navbarSupportedContent" class="navbar-collapse collapse">
                <div class="rpx_pt_11 nav-header rpx_mb_12">
                    <div class="row row-eq-height align-items-center">
					
                        <div class="col-2 align-self-center">
						<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler <?php echo $button_class; ?>" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                                <i class="icon-xmark1 close_icon true_black text_24 line_height_24"></i>
                            </button>
                        </div>
                        <div class="col-8 text-center">
                            <a href="<?php echo get_site_url(); ?>"> 
                                <img loading="eager" fetchpriority="high" 
                                     src="<?php echo get_exist_image_url("header", "m-header-logo"); ?>" 
                                     srcset="<?php echo get_exist_image_url("header", "m-header-logo"); ?> 1x, 
                                             <?php echo get_exist_image_url("header", "m-header-logo@2x"); ?> 2x, 
                                             <?php echo get_exist_image_url("header", "m-header-logo@3x"); ?> 3x" 
                                     width="195" height="63" 
                                     style="max-width: 195px" 
                                     class="img-fluid w-atuo" 
                                     <?php echo $header_mobile_logo_alt; ?> >
                            </a> 
                        </div>
						 <div class="col-2 align-self-center text-end">
                        </div>
                        <?php if ($searchForm == "true" && !empty($searchForm)) { ?>
                        <div class="col-12">
                            <div class="nav-search">
                                <?php require_once "type_A_search.php"; ?>
                            </div>
                        </div>
                        <?php } elseif (!in_array($searchForm, ["true", "false"]) && !empty($searchForm)) { ?>
                        <div class="col-12">
                            <div class="nav-search">
                                <?php get_search_form($searchForm); ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="py-3 nav-header-level-3">
                    <button class="navbar-toggler p-0 py-2 close-level-3" type="button">
                        <i class="icon-chevron-left2 me-2 text_21"></i> Back
                    </button>
                </div>
                <div class="mobile_buttons rpx_px_14">
                    <?php if (!empty($get_rds_template_data_array["globals"]["announcement"]["left"]["type"]) && $get_rds_template_data_array["globals"]["announcement"]["left"]["type"] == "link") { ?>
                        <a href="<?php echo get_home_url() . $get_rds_template_data_array["globals"]["announcement"]["left"]["url"]; ?>" class="color_tertiary_bg d-flex w-100 align-items-center announcment_bar_text justify-content-start me-auto rpx_py_15 rpx_px_20 rpx_mb_12">
                            <i class="<?php echo $get_rds_template_data_array["globals"]["announcement"]["left"]["icon_class"]; ?> text_16 line_height_16 me-2"></i> 
                            <?php echo $get_rds_template_data_array["globals"]["announcement"]["left"]["text"]; ?> 
                            <i class="icon-chevron-right1 ms-auto text_15 line_height_15"></i>
                        </a>
                    <?php } else { ?>
                        <div class="color_tertiary_bg rpx_mb_6 header_accordion d-none" id="accordionExample1">
                            <div class="accordion-item border-0 rounded-0 mb-0">
                                <h2 class="accordion-header border-0" id="headingOne">
                                    <button class="accordion-button border-0 rounded-0 collapsed color_tertiary_bg d-flex w-100 align-items-center announcment_bar_text justify-content-start me-auto rpx_py_15 rpx_px_20 rpx_mb_12" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <i class="<?php echo $get_rds_template_data_array["globals"]["announcement"]["left"]["icon_class"]; ?> text_16 line_height_16 me-2"></i> 
                                        <?php echo $get_rds_template_data_array["globals"]["announcement"]["left"]["text"]; ?> 
                                        <i class="icon-chevron-right1 ms-auto text_15 line_height_15 icon_right"></i>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body color_quaternary_bg">
                                        <?php echo $get_rds_template_data_array["globals"]["announcement"]["left"]["tooltip_text"]; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?> 

                    <?php if (!empty($get_rds_template_data_array["globals"]["announcement"]["variation"]) && $get_rds_template_data_array["globals"]["announcement"]["variation"] == "custom-announcement-a") { ?>
						<a class="btn btn-primary w-100 justify-content-between d-flex rpx_gap_0" 
                           href="<?php echo get_home_url() . $get_rds_template_data_array["globals"]["announcement"]["middle"]["url"]; ?>">
                            <span><?php echo $get_rds_template_data_array["globals"]["announcement"]["middle"]["text"]; ?></span>
							<i class="icon-circle-chevron-right2 text_18 line_height_normal"></i>
                        </a>
                    <?php } else {
                        if (!empty($get_rds_template_data_array["globals"]["announcement"]["desktop_schedule_online_button"]["enabled"]) && $get_rds_template_data_array["globals"]["announcement"]["desktop_schedule_online_button"]["enabled"] == true) {
                            if (!empty($get_rds_template_data_array["globals"]["announcement"]["desktop_schedule_online_button"]["type"]) && $get_rds_template_data_array["globals"]["announcement"]["desktop_schedule_online_button"]["type"] != "url") { ?>
                                <span id="schedule_online_button_desktop" class="color_tertiary_bg w-100 d-flex align-items-center announcment_bar_text cursor-pointer rpx_py_15 rpx_px_20 rpx_mb_12">
                                    <i class="<?php echo $get_rds_template_data_array["globals"]["announcement"]["desktop_schedule_online_button"]["icon_class"]; ?> text_16 line_height_16 me-2 px-1"></i>
                                    <?php echo $get_rds_template_data_array["globals"]["announcement"]["desktop_schedule_online_button"]["label"]; ?> 
                                    <i class="icon-chevron-right1 ms-auto"></i>
                                </span>
                            <?php } else { ?>
                                <a class="color_tertiary_bg w-100 d-none align-items-center announcment_bar_text rpx_py_15 rpx_px_20 rpx_mb_12" href="<?php echo get_home_url() . $get_rds_template_data_array["globals"]["announcement"]["desktop_schedule_online_button"]["url"]; ?>">
                                    <i class="<?php echo $get_rds_template_data_array["globals"]["announcement"]["desktop_schedule_online_button"]["icon_class"]; ?> text_16 line_height_16  me-2 px-1"></i>
                                    <?php echo $get_rds_template_data_array["globals"]["announcement"]["desktop_schedule_online_button"]["label"]; ?> 
                                    <i class="icon-chevron-right1 ms-auto"></i>
                                </a>
                            <?php }
                        }
                    } ?>  

                    <?php if (!empty($get_rds_template_data_array["globals"]["announcement"]["variation"]) && $get_rds_template_data_array["globals"]["announcement"]["variation"] == "custom-announcement-a") { ?>
                        <a class="color_tertiary_bg announcment_bar_text w-100 d-none align-items-center rpx_py_15 rpx_px_20 rpx_mb_12" href="<?php echo get_home_url() . $get_rds_template_data_array["globals"]["announcement"]["right"]["url"]; ?>">
                            <i class="<?php echo $get_rds_template_data_array["globals"]["announcement"]["right"]["icon_class"]; ?> text_16 line_height_16 me-2 pl-2"></i>
                            <span class="no_hover_underline d-flex align-items-center w-100"><?php echo $get_rds_template_data_array["globals"]["announcement"]["right"]["text"]; ?> 
                            <i class="icon-chevron-right1 ms-auto text_15 line_height_15"></i></span>
                        </a>
                    <?php } else { ?>
                        <a class="color_tertiary_bg announcment_bar_text w-100 d-none align-items-center rpx_py_15 rpx_px_20 rpx_mb_12" href="tel:<?php echo $get_rds_template_data_array["site_info"]["country_code"] . $get_rds_template_data_array["site_info"]["phone"]; ?>">
                            <i class="<?php echo $get_rds_template_data_array["globals"]["announcement"]["right"]["icon_class"]; ?> text_16 line_height_16 me-2"></i>
                            <span class="no_hover_underline d-flex align-items-center w-100"><?php echo $get_rds_template_data_array["globals"]["announcement"]["right"]["text"]; ?>: <?php echo $get_rds_template_data_array["site_info"]["country_code"] . $get_rds_template_data_array["site_info"]["phone"]; ?> 
                            <i class="icon-chevron-right1 ms-auto text_15 line_height_15"></i></span>
                        </a>
                    <?php } ?>
                </div>
				
				<?php
                $args = [
                    "menu" => "mobile-main-menu",
                    "icon_down" => $dropdown_icon_down,
                    "depth" => 3,
                    "theme_location" => "primary",
                    "container" => false,
                    "menu_class" => "navbar-nav m-auto rpx_px_14",
                    "fallback_cb" => "Bluecorona_Type_A_Navwalker::fallback",
                    "walker" => new Bluecorona_Type_A_Navwalker(),
                ];
                wp_nav_menu($args);
                ?>

            </div>
        </nav>
    </div>
</div>
<script type="text/javascript">
    var dropdown_icon_up = '<?php echo $dropdown_icon_up; ?>';
    var dropdown_icon_down = '<?php echo $dropdown_icon_down; ?>';

</script>

