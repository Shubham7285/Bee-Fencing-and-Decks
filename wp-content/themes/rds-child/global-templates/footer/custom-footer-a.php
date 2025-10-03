<?php
$get_alt_text = RDS_ALT_DATA;
// $footer_tem = json_decode(get_option("rds_template"), true);
$header_logo_alt = "";
$footer_logo_alt = "";
$footer_mobile_logo_alt = "";
$copyright_svg_alt = "";
if (is_array($get_alt_text))
{
    foreach ($get_alt_text as $value)
    {
		if (is_array($value) && in_array("header-logo.webp", $value)) {
            $header_logo_alt = 'alt="' . $value[3] . '"';
        }
		
        if (in_array("footer-logo.webp", $value))
        {
            $footer_logo_alt = 'alt="' . $value[3] . '"';
        }

        if (in_array("m-footer-logo.webp", $value))
        {
            $footer_mobile_logo_alt = 'alt="' . $value[3] . '"';
        }

        if (in_array("bc-logo.svg", $value))
        {
            $copyright_svg_alt = 'alt="' . $value[3] . '"';
        }
    }
}
?>  
<footer class="position-relative">
<div class="">
    <div class="container-fluid rpx_px_15 rpx_px_lg_0 rpx_py_40 rpx_py_lg_80 text-md-start">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-start justify-content-center justify-content-lg-between  rpx_gap_lg_30  rpx_gap_lg_0">
                <div class="d-lg-none d-block  text-center w-100 rpx_mb_40 rpx_mb_lg_0">
				<a href="<?php echo get_home_url(); ?>">
				<img src="<?php echo get_exist_image_url("footer", "m-footer-logo"); ?>" srcset="<?php echo get_exist_image_url("footer", "m-footer-logo"); ?> 1x, <?php echo get_exist_image_url("footer", "m-footer-logo@2x"); ?> 2x, <?php echo get_exist_image_url("footer", "m-footer-logo@3x"); ?> 3x" class="img-fluid w-auto mx-auto" style="max-width: 315px;" <?php echo $footer_mobile_logo_alt; ?> width="315" height="138" loading="lazy">
				</a>
				</div>
                <div class="text-lg-start text-start rpx_mb_30 rpx_mb_lg_0">
                <div class="d-flex rpx_gap_30 flex-column"> 
                    <a class="mt-1 d-lg-inline-block d-none " href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_exist_image_url("footer", "footer-logo"); ?>" srcset="<?php echo get_exist_image_url("footer", "footer-logo"); ?> 1x, <?php echo get_exist_image_url("footer", "footer-logo@2x"); ?> 2x, <?php echo get_exist_image_url("footer", "footer-logo@3x"); ?> 3x" class="d-lg-block d-none img-fluid w-auto" style="max-width: 162px;" <?php echo $footer_logo_alt; ?> width="162" height="124" loading="lazy">

                    <img src="<?php echo get_exist_image_url("footer", "m-footer-logo"); ?>" srcset="<?php echo get_exist_image_url("footer", "m-footer-logo"); ?> 1x, <?php echo get_exist_image_url("footer", "m-footer-logo@2x"); ?> 2x, <?php echo get_exist_image_url("footer", "m-footer-logo@3x"); ?> 3x" class="d-lg-none d-none img-fluid w-auto mx-auto" style="max-width: 162px" <?php echo $footer_mobile_logo_alt; ?> width="162" height="124" loading="lazy">
                    </a>
                    <div class="d-inline-block align-self-start">

                        <div class="d-block w-100 rpx_mb_40 rpx_mb_lg_10">
							<span class="h6 color_primary--imp rpx_mb_10 d-block">Phone</span> 
                            <div class="d-flex justify-content-lg-start justify-content-start align-items-start rpx_gap_10">
                                <i class="footer_phone_icon_color icon-circle-phone2 text_20 line_height_23"></i>
                               <span class="d-inline-block"><?php
								$country_code = !empty($args["site_info"]["country_code"]) ? $args["site_info"]["country_code"] : '';
								$phone = !empty($args["site_info"]["phone"]) ? $args["site_info"]["phone"] : '';
								?>
                                <a href="tel: <?php echo $country_code . $phone; ?>" class="footer_phone_number position-relative "><?php echo $country_code . $phone; ?></a></span>
                            </div>

                        </div>
						 <?php
							if (!empty($args["site_info"]["social_media"]["items"]))
							{ ?>
 						<div class="order-lg-3 order-3 d-block d-lg-none">
						<span class="d-block h6 color_primary--imp text-lg-start text-start rpx_mb_4">
                        <?php echo !empty($args["site_info"]["heading"]) ? $args["site_info"]["heading"] : '';
							?></span> 
                            <div class="text-start text-lg-start d-flex justify-content-lg-start justify-content-start text_20">
                                <?php
							if (!empty($args["site_info"]["social_media"]["items"]))
							{
								$socialItems = $args["site_info"]["social_media"]["items"];
								foreach ($socialItems as $value)
								{
									echo '<a target="_blank" class=" social_media_icons no_hover_underline me-2 text_20 line_height_25 no_hover_underline " title="' . $value["icon_class"] . '" href="' . $value["url"] . '">
												<i class="' . $value["icon_class"] . '"></i>
											</a>';
								}
							}
							?>
                            </div>
							</div>
							<?php }?>
                    </div>
                    <?php if (!empty($args["site_info"]["license_number"][0])){ ?>
						 <div class="d-inline-block align-self-start">
                                <div class="d-flex justify-content-lg-start justify-content-start">
                                    <i class="footer_license_icon_color icon-id-card2 text_24 line_height_25 float-lg-start me-2  d-inline-block"></i> 
                                    <?php if (count($args["site_info"]["license_number"]) > 1)
									{
										echo "<span class='h8-alt rpx_mb_4'>Licenses: </span>";
									}
									else
									{
										echo "<span class='h8-alt rpx_mb_4'>License: </span> ";
									} ?>
                                </div>
                                <div class="ms-4 ps-2">
								<span class="d-inline-block footer_text no_hover_underline">
                                        <?php foreach ($args["site_info"]["license_number"] as $value)
											{
												echo "" . $value . "<br>";
											} ?>
                                    </span>
                                </div>
                        </div>
                    <?php } ?>
                </div>
                </div>
				
                <div class="">
                    <div class="d-flex rpx_gap_30 rpx_gap_lg_17 flex-column">
                        <div class="order-lg-1 order-1 text-start text-lg-start rpx_gap_10 d-flex flex-column">
						<h6 class="d-block mb-0 color_primary mb-0">
                         <?php 
								echo !empty($args["site_info"]["address_heading"]) ? $args["site_info"]["address_heading"] : '';
						 ?>
                            </h6>
                            <?php if (!empty($args["site_info"]["address"]))
							{  $address = $args["site_info"]["address"];
								foreach ($address as $value)  { ?>
                                <p class="footer_text mb-0"> <?php echo $value["address"]; ?><br> <?php echo $value["city"]; ?> <?php echo $value["state"]; ?> <?php echo $value["zip"]; ?></span></p>
                            <?php } } ?>
                        </div>

                        <?php
							if (!empty($args["site_info"]["social_media"]["items"]))
							{ ?>
 						<div class="order-lg-3 order-3 d-none d-lg-block">
						<span class="d-block h6 color_primary--imp text-lg-start text-start rpx_mb_4 mb-0">
                        <?php echo !empty($args["site_info"]["heading"]) ? $args["site_info"]["heading"] : '';
							?></span> 
                            <div class="text-start text-lg-start d-flex justify-content-lg-start justify-content-start text_20">
                                <?php
							if (!empty($args["site_info"]["social_media"]["items"]))
							{
								$socialItems = $args["site_info"]["social_media"]["items"];
								foreach ($socialItems as $value)
								{
									echo '<a target="_blank" class=" social_media_icons no_hover_underline  me-2 text_20 line_height_25 no_hover_underline " title="' . $value["icon_class"] . '" href="' . $value["url"] . '">
												<i class="' . $value["icon_class"] . '"></i>
											</a>';
								}
							}
							?>
                            </div>
							</div>
							<?php }?>


                        <div class="order-lg-2 order-2 text-start text-lg-start">
                            <span class="d-block h6 color_primary--imp rpx_mb_10"><?php
							echo !empty($args["site_info"]["hours_heading"]) ? $args["site_info"]["hours_heading"] : '';
							 ?></span>
                            <div class="mw-lg-270 mw-270 mx-auto ms-lg-0">
                                <div class="row g-0 rpx_mb_lg_10  rpx_gap_10">
                                    <div class="col">
                                        <p class="footer_text mb-0">
                                            <?php echo !empty($args["site_info"]["week_days"]) ? $args["site_info"]["week_days"] : '';
										
										 ?></p>    
                                    </div>
                                    <div class="col">
                                        <p class="footer_text mb-0 text-end text-lg-start"><?php
									echo !empty($args["site_info"]["weekday_hours"]) ? $args["site_info"]["weekday_hours"] : '';
									 ?></p>


                                    </div>

                                </div>
                                <div class="row g-0 rpx_gap_10">
                                    <div class="col">
                                        <p class="footer_text mb-0"><?php
										echo !empty($args["site_info"]["weekend_days"]) ? $args["site_info"]["weekend_days"] : '';
										 ?></p>   
                                    </div>
                                    <div class="col">
                                        <p class="footer_text mb-0 text-end text-lg-start"><?php
										echo !empty($args["site_info"]["weekend_hours"]) ? $args["site_info"]["weekend_hours"] : '';
										 ?></p>   

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-lg-block d-none">
                    <div class="d-flex rpx_gap_10 flex-column">
                        <h6 class="d-block mb-0 color_primary">
                        <?php echo !empty($args["globals"]["footer"]["data"]["footer_menu_1_heading"]) ? $args["globals"]["footer"]["data"]["footer_menu_1_heading"] : ''; ?>
                        </h6>	
                        <?php
						$name = !empty($args["globals"]["footer"]["data"]["footer_menu_1_name"]) ? $args["globals"]["footer"]["data"]["footer_menu_1_name"] : '';
						$menu = get_term_by("name", $name, "nav_menu");
						$menu_items = wp_get_nav_menu_items($menu);
						if (isset($menu_items) && !empty($menu_items)): ?>
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($menu_items as $key => $value) { 
                               // Get the classes for the menu item
                                $classes = !empty($value->classes) ? implode(' ', $value->classes) : '';
                                ?>
                                    <li class="footer_links <?php echo esc_attr($classes); ?>">
                                        <a class="footer_links on_hover_underline" target="<?php echo $value->target; ?>" href="<?php echo $value->url; ?>">
                                            <?php echo $value->post_title; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php endif; ?>
                    </div>
                </div>
                <div class="d-lg-block d-none">
                    <div class="d-flex rpx_gap_10 flex-column">
                        <h6 class="d-block mb-0 color_primary">
                        <?php echo !empty($args["globals"]["footer"]["data"]["footer_menu_2_heading"]) ? $args["globals"]["footer"]["data"]["footer_menu_2_heading"] : ''; ?>
                        </h6>
                        <?php
						$name = !empty($args["globals"]["footer"]["data"]["footer_menu_2_name"]) ? $args["globals"]["footer"]["data"]["footer_menu_2_name"] : '';
						$menu = get_term_by("name", $name, "nav_menu");
						$menu_items = wp_get_nav_menu_items($menu);
						if (isset($menu_items) && !empty($menu_items)): ?>
                            <ul class="list-unstyled mb-0">
                            <?php foreach ($menu_items as $key => $value) { 
                                    // Get the classes for the menu item
                                    $classes = !empty($value->classes) ? implode(' ', $value->classes) : '';
                                ?>
                                    <li class="footer_links <?php echo esc_attr($classes); ?>">
                                        <a class="footer_links on_hover_underline" target="<?php echo $value->target; ?>" href="<?php echo $value->url; ?>">
                                            <?php echo $value->post_title; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
$get_rds_template_data_array = RDS_TEMPLATE_DATA;
// check is service area is enabled
$enable_service_areas = $get_rds_template_data_array["globals"]["footer"];

// get service area pagelist on which we need to show
$service_areas = $get_rds_template_data_array["globals"]["footer"]["service_areas"];
$page_ids_to_show_service_areas = [];
foreach ($service_areas as $value)
{
    $get_pageids = $value["page_ids"];
    $page_ids_to_show_service_areas = array_merge($page_ids_to_show_service_areas, $get_pageids);
}
if ($enable_service_areas["enable"] == true && is_page($page_ids_to_show_service_areas))
{
    get_template_part("page-templates/common/servicearea");
}
?>
 </div>
 <div class="footer_copyright_bar text-stat text-lg-center true_black_bg rpx_mb_50 rpx_mb_lg_0 rpx_py_20 rpx_py_lg_25">
      <div class="container-xl">
      <div class="d-lg-flex rpx_gap_lg_10 justify-content-lg-center align-items-lg-center rpx_py_lg_10 true_white m-footer-text">
         <i class="icon-copyright4"></i> <?php echo date("Y"); ?> <?php
		echo !empty($args["site_info"]["copyright_title"]) ? $args["site_info"]["copyright_title"] : '';
		if (!empty($args["site_info"]["bluecorona_branding"]))
		{ ?><span class="d-none d-lg-inline-block">|</span><span class="d-block d-lg-inline">Web Design and Internet Marketing by <a class="footer_copyright_links a-alt copyright_hover d-inline" target="_blank" href="<?php echo !empty($args["site_info"]["bluecorona_link"]) ? $args["site_info"]["bluecorona_link"] : ''; ?>">RYNO Strategic Solutions</a></span><span class="d-none d-lg-inline-block">|</span><a class="footer_copyright_links  a-alt  copyright_hover"  href="#" data-bs-toggle="modal" data-bs-target="#disclaimer">Disclaimer</a><span class="d-inline-block d-lg-inline-block rpx_mx_10 rpx_mx_lg_0">|</span><a class=" footer_copyright_links  a-alt copyright_hover rpx_mr_5 rpx_mr_lg_0" href="<?php echo (!empty($args["site_info"]["privacy_policy_link"]) ? $args["site_info"]["privacy_policy_link"] : ''); ?>">Privacy Policy</a><?php }?>
      </div>
      </div>
   </div>
	<div class="container-fluid m-0 p-0 d-lg-none color_quaternary_bg fixed-bottom sticky_bottom_btn">
            <div class="row g-0">
                <div class="col-12 text-center">
					<?php if (!empty($args["globals"]["desktop_schedule_online_button"]["enabled"]))
						{if ($args["globals"]["desktop_schedule_online_button"]["type"] != "url") { ?>
                                <span id="schedule_online_button_desktop" class="rpx_py_13 rpx_gap_12 d-flex align-items-center justify-content-center btn btn-primary no_hover_underline  w-100 rounded-0 sticky_footer_btn" ><i class="<?php
        echo !empty($args["globals"]["desktop_schedule_online_button"]["icon_class"]) ? $args["globals"]["desktop_schedule_online_button"]["icon_class"] : '';
         ?>"></i><span class="d-inline-block align-middle sm_line_height_23 m-0"><?php
					echo !empty($args["globals"]["desktop_schedule_online_button"]["label"]) ? $args["globals"]["desktop_schedule_online_button"]["label"] : '';
					 ?></span><i class="icon-circle-chevron-right2"></i>
						</span>
               <?php } else { ?>
                    <a href="<?php echo (!empty($args["globals"]["desktop_schedule_online_button"]["url"]) ? $args["globals"]["desktop_schedule_online_button"]["url"] : ''); ?>" class="rpx_py_13 rpx_gap_12 d-flex align-items-center justify-content-center btn btn-primary no_hover_underline  w-100 rounded-0 sticky_footer_btn"><i class="<?php
        echo !empty($args["globals"]["desktop_schedule_online_button"]["icon_class"]) ? $args["globals"]["desktop_schedule_online_button"]["icon_class"] : '';
         ?>"></i><span class="d-inline-block align-middle sm_line_height_23 m-0"><?php
					echo !empty($args["globals"]["desktop_schedule_online_button"]["label"]) ? $args["globals"]["desktop_schedule_online_button"]["label"] : '';
					 ?></span><i class="icon-circle-chevron-right2 text_18 line_height_18 rpx_mr_0"></i></a>
										<?php }
										} ?> 
                </div>
            </div>
    </div>
    <div class="modal fade p-0" id="disclaimer" tabindex="-1" data-bs-backdrop="false" role="dialog" aria-labelledby="disclaimerLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header border-0 text-end ms-auto pb-0">
                    <button type="button" class="close border-0 bg-transparent ms-auto" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;">
                        <span aria-hidden="true"><i class="icon-xmark1 true_black line_height_24 text_24"></i></span>
                    </button>
                </div>
                <div class="modal-body px-md-5 px-4 pb-5 col-md-10 offset-md-1 text-lg-start text-center">
                    <div id="disclaimerLabel" class="h1">Disclaimer</div>
                    <p class=""><?php
					echo !empty($args["site_info"]["disclaimer_text"]) ? $args["site_info"]["disclaimer_text"] : '';
					 ?></p>
                </div>
            </div>
        </div>
    </div>

</footer>
<script>
jQuery(document).ready(function() {
    jQuery('#Gallerylightbox').on('click', function(e) {
        // Check if the click is NOT inside img-popup-outer
        if (!jQuery(e.target).closest('.img-popup-outer').length) {
            jQuery('#Gallerylightbox').modal('hide');
        }
    });
    
    // Prevent modal from closing when clicking inside img-popup-outer
    jQuery('.img-popup-outer').on('click', function(e) {
        e.stopPropagation();
    });
});
</script>