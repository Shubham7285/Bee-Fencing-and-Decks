<?php
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
$announcement_class = "d-lg-block";
$template = basename(get_page_template());
if (
	$template == "rds-landing.php" &&
	!$args["page_templates"]["landing_page"]["announcement_and_nav_toggle"]
) {
	$announcement_class = "d-none";
}
?>
        <!-- Header Deafult Starts -->
       <div class="container-fluid rpx_px_20 desktop-header-container d-none d-lg-block hide-on-touch">
                <div class="d-flex flex-column flex-lg-row align-items-center  justify-content-center justify-content-lg-between mh-112">
                    <div class="rpx_py_16">
					<a href="<?php echo get_home_url(); ?>" class="d-inline-block">
                        <img src="<?php echo get_exist_image_url("header", "header-logo"); ?>" srcset="<?php echo get_exist_image_url("header", "header-logo"); ?> 1x, <?php echo get_exist_image_url("header", "header-logo@2x"); ?> 2x, <?php echo get_exist_image_url("header", "header-logo@3x"); ?> 3x" <?php echo $header_logo_alt; ?> class="branding_logo img-fluid w-auto" style="max-width: 337px;" width="337" height="113" fetchpriority="high" loading="eager">
                        </a>
					</div>
                    <div class="align-self-end">
					<!-- Desktop Navigations Starts -->
                        <?php get_template_part("global-templates/nav/desktop/a"); ?>
					<!-- Desktop Navigations Ends -->
                    </div>
                    <div class="">
						<div class="d-lg-flex rpx_gap_20">
                            <div class="d-flex rpx_gap_4 flex-column align-items-end">
                            <div class="color_secondary--imp text-capitalize text_18 text_medium line_height_22_5"><?php 
                            echo !empty( $args["globals"]["header"]["call_text"] ) ?  $args["globals"]["header"]["call_text"] : '';?></div>
							<span class="">
							
							<a href="tel: <?php
echo !empty($args["site_info"]["country_code"]) ? $args["site_info"]["country_code"] : '';
echo !empty($args["site_info"]["phone"]) ? $args["site_info"]["phone"] : '';
?>" class=" phone_number">
                                    <?php
echo !empty($args["site_info"]["country_code"]) ? $args["site_info"]["country_code"] : '';
echo !empty($args["site_info"]["phone"]) ? $args["site_info"]["phone"] : '';
?></a> </span>
                            </div>                 
                       
                        <div class="d-lg-flex align-items-center justify-content-end">
                                                        <?php if (!empty($args["globals"]["desktop_schedule_online_button"]["enabled"]))
{
    if ($args["globals"]["desktop_schedule_online_button"]["type"] != "url")
    { ?>
                                <span id="schedule_online_button_desktop" class="btn btn-primary" ><i class="<?php
        echo !empty($args["globals"]["desktop_schedule_online_button"]["icon_class"]) ? $args["globals"]["desktop_schedule_online_button"]["icon_class"] : '';
         ?>"></i><?php
        echo !empty($args["globals"]["desktop_schedule_online_button"]["label"]) ? $args["globals"]["desktop_schedule_online_button"]["label"] : '';
         ?><i class="icon-circle-chevron-right2"></i></span>
                            <?php
    }
    else
    { ?>
                                <a  class="btn btn-primary" target="_self"  href="<?php echo (!empty($args["globals"]["desktop_schedule_online_button"]["url"]) ? $args["globals"]["desktop_schedule_online_button"]["url"] : ''); ?>"><i class="<?php echo !empty($args["globals"]["desktop_schedule_online_button"]["icon_class"]) ? $args["globals"]["desktop_schedule_online_button"]["icon_class"] : ''; ?>"></i><?php
        echo !empty($args["globals"]["desktop_schedule_online_button"]["label"]) ? $args["globals"]["desktop_schedule_online_button"]["label"] : ''; ?><i class="icon-circle-chevron-right2"></i></a>
                            <?php
    }
} ?>                       
                        </div>
						 </div>

                    </div>
                    </div>
        </div>
        <!-- Header Deafult Ends -->
        <!-- Mobile Header Starts -->
        <div class="container-fluid ui_kit_mobile_header mobile_header_type_A d-lg-none show-on-touch px-0">
            <div class="container-fluid">
                <div class="row row-eq-height no-gutters align-items-center">
                    <div class="col text-center  align-self-center px-0 rpx_max_w_75">
                        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler d-inline-flex align-items-center <?php echo $announcement_class ?>" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                           <i class="icon-bars2 navbar-toggler-icon icon-bars2 text_24 line_height_24 true_black"></i>
                        </button>
                    </div>
                    <div class="col text-center px-0">
                        <a href="<?php echo get_home_url(); ?>" class="d-block">
                        <img src="<?php echo get_exist_image_url("header", "m-header-logo"); ?>" srcset="<?php echo get_exist_image_url("header", "m-header-logo"); ?> 1x, <?php echo get_exist_image_url("header", "m-header-logo@2x"); ?> 2x, <?php echo get_exist_image_url("header", "m-header-logo@3x"); ?> 3x"  width="195" height="63" style="max-width: 195px" class="img-fluid w-atuo" <?php echo $header_mobile_logo_alt; ?>  fetchpriority="high" loading="eager">
                        </a>
                    </div>
                    <div class="col text-center px-0 rpx_max_w_75">
                        <div class="d-flex h-100 phone-icon no_hover_underline justify-content-center">
                            <a data-bs-toggle="modal" href="#" data-bs-target="#cta-a"  class="d-flex align-items-center justify-content-center w-100 no_hover_underline color_primary_bg"><i class="true_black icon-phone-flip text_24 line_height_24  "></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade mobile_popup_form_background_color mobile_cta_popup border-0 " id="cta-a" tabindex="-1" role="dialog" aria-labelledby="cta-a" aria-hidden="true">
            <div class="modal-dialog mt-0 mb-0 mx-0 mx-md-auto" role="document">
                <div class="modal-content bg-transparent border-0 position-absolute mt-md-0 rpx_pt_17">
<div class="w-100 rpx_px_30">
<div class="row row-eq-height align-items-center">
					
                        <div class="col-2 align-self-center">
						<button type="button" class="close p-0 bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close" >
                        <i class="icon-xmark1 close_icon true_black text_24 line_height_24 true_black" ></i>
                    </button>
                        </div>
                        <div class="col-8 text-center">
                            <a href="<?php echo get_site_url(); ?>"> 
                                <img src="<?php echo get_exist_image_url("header", "m-header-logo"); ?>" 
                                     srcset="<?php echo get_exist_image_url("header", "m-header-logo"); ?> 1x, 
                                             <?php echo get_exist_image_url("header", "m-header-logo@2x"); ?> 2x, 
                                             <?php echo get_exist_image_url("header", "m-header-logo@3x"); ?> 3x" 
                                     width="195" height="63" 
                                     style="max-width: 195px" 
                                     class="img-fluid w-atuo" 
                                     alt="site mobile logo" fetchpriority="high" loading="eager">
                            </a> 
                        </div>
						 <div class="col-2 align-self-center text-end">
                        </div>
                    </div>
                    </div>
                    <div class="modal-body rpx_px_30 rpx_py_8 mobile_popup_form_background_color text-center border-0 w-100"> 
                        <div class="text-center">
                            <a href="tel:<?php
echo !empty($args["site_info"]["country_code"]) ? $args["site_info"]["country_code"] : '';
echo !empty($args["site_info"]["phone"]) ? $args["site_info"]["phone"] : '';
?>" class="btn-quaternary justify-content-center align-items-center">
                           <i class="icon-phone"></i> call | <?php
                                 echo !empty( $args["site_info"]["country_code"] ) ?  $args["site_info"]["country_code"] : '';
                                 echo !empty( $args["site_info"]["phone"] ) ?  $args["site_info"]["phone"] : '';
                                ?> <i class="icon-chevron-right2"></i>
                            </a>
                            <?php
if (!empty($args["globals"]["ctas"]))
{
    $footerItems = $args["globals"]["ctas"];
    $i = 0;
    foreach ($footerItems as $key => $value)
    {
        if ($value["enabled"] == true)
        {
            if ($value["type"] == "url" || $value["type"] == "sms")
            {
                echo '<a href="' . get_home_url() . $value["type"] . '" class="btn-quaternary justify-content-center align-items-center" id="rds_footer_element_' . $i . '">
                           <i class="' . $value["icon_class"] . '"></i> ' . $value["label"] . '<i class="icon-chevron-right2"></i>
                        </a>';
            }
            else
            {
                echo '<span id="rds_footer_element_' . $i . '" class="btn-quaternary justify-content-center align-items-center" >
                          <i class="' . $value["icon_class"] . '"></i> ' . $value["label"] . '<i class="icon-chevron-right2"></i>
                        </span>';
            }
        }
        $i++;
    }
}
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part("global-templates/nav/mobile/a"); ?>
        <!-- Mobile Header Ends --> 