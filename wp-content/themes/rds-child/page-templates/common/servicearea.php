<?php
$get_rds_template_data_array = RDS_TEMPLATE_DATA;
$service_areas =
	$get_rds_template_data_array["globals"]["footer"]["service_areas"];
?>
<div class="container-fluid px-0 check-location rpx_pb_40 rpx_pb_lg_60">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 text-lg-start text-center our-locations ">
         <div class="border-top-light border-bottom-light border_width_2">
            <span class="text-decoration-none locations_footer d-flex justify-content-between w-100 rpx_py_24 true_white cursor-pointer">
            <div class="h4-alt d-inline-block mb-0">Service Area</div> 
            <i id="plus" aria-hidden="true" class="icon icon-plus1 text_25 line_height_36  ml-2 align-self-center position-relative" style="top:-2px"></i>
            </span>
            <div class="footer-service-area location text-center text-lg-start">
              <div class="row pb-4 true_white">
               <?php
               $processed_ids = [];
               foreach ($service_areas as $value) {
               	$pageids = $value["page_ids"];
               	$pageids = array_diff($pageids, $processed_ids);
               	$location_ids = $value["location_ids"];
               	if (!empty($location_ids)) {
               		$get_locationid = implode(",", $location_ids);
               		if (!empty($pageids) && is_page($pageids)) {
               			$processed_ids = array_merge(
               				$processed_ids,
               				$pageids
               			);
               			echo do_shortcode(
               				'[bc-location page_id="' . $get_locationid . '"]'
               			);
               		}
               	}
               }
               ?>
              </div>
            </div>
         </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   jQuery(document).ready(function(){
      if(jQuery('.check-location').find('.col-lg-3').hasClass('text-center') == false){
         jQuery('.check-location').hide();
      }
   });
</script>