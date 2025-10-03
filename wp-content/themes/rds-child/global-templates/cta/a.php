<?php
   $heading = !empty( $args["globals"]["in_content_cta"]["heading"] ) ?  $args["globals"]["in_content_cta"]["heading"] : '';
   $title_class = !empty( $args["globals"]["in_content_cta"]["title_class"] ) ?  $args["globals"]["in_content_cta"]["title_class"] : '';
   $button_class = !empty( $args["globals"]["in_content_cta"]["button_class"] ) ?  $args["globals"]["in_content_cta"]["button_class"] : '';
   $buttonText = !empty( $args["globals"]["in_content_cta"]["button_text"] ) ?  $args["globals"]["in_content_cta"]["button_text"] : '';
   $buttonLink = !empty( $args["globals"]["in_content_cta"]["button_link"] ) ?  $args["globals"]["in_content_cta"]["button_link"] : '';
   $phone_number = !empty($args["globals"]["in_content_cta"]["phone"])
    ? $args["globals"]["in_content_cta"]["phone"]
    : $args["site_info"]["phone"];
   $telLink = get_clean_tel_link($phone_number, $args["site_info"]["country_code"]);
   $target = $args["globals"]["in_content_cta"]["target"] == "true" ? "_blank" : "_self";
   $schedule_id = "";
   if (isset($args["globals"]["in_content_cta"]["id"]) && !empty($args["globals"]["in_content_cta"]["id"]) && ($args["globals"]["in_content_cta"]["id"] == "service_titan" || $args["globals"]["in_content_cta"]["id"] == "schedule_engine")) {
       $href = "javascript:void(0)";
       $schedule_id = $args["globals"]["in_content_cta"]["id"];
       $target = "_self";
       if ($schedule_id == "schedule_engine") {
           $id = "schedule_cta_schedule_engine";
       } elseif ($schedule_id == "service_titan") {
           $id = "schedule_cta_service_titan";
       }
   } elseif (isset($args["globals"]["in_content_cta"]["button_link"]) && empty($args["globals"]["in_content_cta"]["id"])) {
       $id = "";
       $href = get_home_url() . $buttonLink;
   } else {
       $schedule_id = $args["globals"]["in_content_cta"]["id"];
       if ($schedule_id == "service_titan" || $schedule_id == "schedule_engine") {
           $href = "javascript:void(0)";
           if ($schedule_id == "schedule_engine") {
               $id = "schedule_cta_schedule_engine";
           } elseif ($schedule_id == "service_titan") {
               $id = "schedule_cta_service_titan";
           }
       } else {
           $id = "";
           $href = get_home_url() . $buttonLink;
       }
   }
   if ($schedule_id == "schedule_engine") {
       add_action("wp_footer", function () {
   ?>
<script type="text/javascript">
   jQuery(".schedule_cta_schedule_engine").click(function () {
       console.log("schedule_engine");
       if (typeof ScheduleEngine !== "undefined" && ScheduleEngine) {
           ScheduleEngine.show();
       }
   });
</script>
<?php
   });
   } elseif ($schedule_id == "service_titan") {
   add_action("wp_footer", function () {
   ?>
<script type="text/javascript">
   jQuery(".schedule_cta_service_titan").click(function () {
       console.log("service_titan");
       if (typeof STWidgetManager !== "undefined" && STWidgetManager) {
           STWidgetManager("ws-open");
       }
   });
</script>
<?php
});
}
$telephone_class = !empty( $args["globals"]["in_content_cta"]["telephone_class"] ) ?  $args["globals"]["in_content_cta"]["telephone_class"] : '';
$icon_class = !empty( $args["globals"]["in_content_cta"]["icon_class"] ) ?  $args["globals"]["in_content_cta"]["icon_class"] : '';
$counteyCode = !empty( $args["site_info"]["country_code"] ) ?  $args["site_info"]["country_code"] : '';
$backgroungImage = get_exist_image_url("in-content-cta", "in-content-bg");

echo '<div class="d-flex flex-column justify-content-center true_black_bg rpx_radius_10 flex-lg-row-reverse in-content-cta-section overflow-hidden">
			<div class="col-12 col-lg mw-lg-284">
				<img src="' . get_exist_image_url("in-content-cta", "in-content-cta-img") . '" srcset="' . get_exist_image_url("in-content-cta", "in-content-cta-img") . ' 1x, ' . get_exist_image_url("in-content-cta", "in-content-cta-img@2x") . ' 2x, ' . get_exist_image_url("in-content-cta", "in-content-cta-img@3x") . ' 3x"  width="285" height="336" class="img-fluid  d-none d-lg-block desktop-cta-img">
				<img src="' . get_exist_image_url("in-content-cta", "m-in-content-cta-img") . '" srcset="' . get_exist_image_url("in-content-cta", "m-in-content-cta-img") . ' 1x, ' . get_exist_image_url("in-content-cta", "m-in-content-cta-img@2x") . ' 2x, ' . get_exist_image_url("in-content-cta", "m-in-content-cta-img@3x") . ' 3x"  width="345" height="154" class="img-fluid d-block d-lg-none w-100 mobile-cta-img">
				</div> 
				<div class="col-12 col-lg rpx_p_20 rpx_px_lg_40 rpx_py_lg_40 mw-md-319 mx-auto align-self-center">
					<div class="d-flex flex-column rpx_gap_20 align-items-center align-items-lg-start text-center text-lg-start">
					 <h5 class="mb-0 true_white">'.$heading .'</h5>
					 <p class="true_white mb-0">Let us help you BEE proud of your home—contact us and see what all the buzz is about!</p>
					 <div class="d-flex flex-column rpx_gap_20 text-center align-items-center align-items-lg-start">
					<a href="'.$href.'" target="'.$target .'" class="btn btn-primary">'.$buttonText .' <i class="icon-circle-chevron-right2"></i>
						</a>
					<a href="tel:'.$counteyCode . $telLink .'" class="btn btn-secondary">'.$telLink .'</a>
				</div>
				</div>
				</div>
	 </div>
';
