<div class="true_white_bg rpx_radius_10 rpx_small_shadow h-100">
<div class="coupon_name h-coupan-100">
<div class="rpx_p_30 d-flex justify-content-start  align-items-start  flex-column rpx_gap_20 w-100">
      <?php if (!empty($subheading)) { ?>
         <span class="d-flex rpx_gap_20 text-center coupon_sub_heading justify-content-between align-items-center w-100"><?php echo $subheading; ?> 			<img src="<?php echo get_exist_image_url('coupon', 'coupon-icon'); ?>" srcset="<?php echo get_exist_image_url('coupon', 'coupon-icon'); ?> 1x, <?php echo get_exist_image_url('coupon', 'coupon-icon@2x'); ?> 2x, <?php echo get_exist_image_url('coupon', 'coupon-icon@3x'); ?> 3x" <?php echo !empty($alt) ? $alt : ''; ?> class="img-fluid review-coupon-icon-img" width="55" height="53">
</span>
      <?php } ?>
      <?php if (!empty($title)) { ?>
         <h4 class="coupon_title coupon_offer mb-0"><?php echo $title; ?></h4>
      <?php } ?>
      <?php if (!empty($heading)) { ?>
         <span class="coupon_subtitle d-block coupon_heading"><?php echo $heading; ?></span>
      <?php } ?>
         <?php if (!empty($footer_heading)) { ?>
            <span class="d-block coupon_disclaimer"><?php echo $footer_heading; ?></span>
         <?php } ?>
   </div>
      <div class="expiry-block d-flex align-items-center justify-content-between rpx_px_18 rpx_py_10 rpx_gap_20 w-100 color_secondary_bg">
         <?php
         $noexpiry = get_query_var('promotion_noexpiry');
         $date = get_query_var('date');
         if ($noexpiry != 1 && !empty($date)) { ?>
            <span class="d-block coupon_expiry">Expires <?php echo $date; ?></span>
         <?php } ?>
      <a
         data-bs-toggle="<?php echo empty($requestButtonLink) ? "modal" : ""; ?>"
         data-bs-target="<?php echo empty($requestButtonLink) ? "#slider_request_coupon_form" : ""; ?>"
         <?php echo empty($requestButtonLink) ? 'onclick="couponButton1Click(this);"' : 'href="' . $requestButtonLink . '"'; ?>
         <?php echo empty($requestButtonTitle) ? 'aria-label="Request Service"' : 'aria-label="' . $requestButtonTitle . '"'; ?>
         class="btn btn-primary request_service_button mw-200"
         <?php echo $open_new_tab == 1 ? 'target="_blank"' : ""; ?>
      >
         <?php echo empty($requestButtonTitle) ? "Request Service" : $requestButtonTitle; ?>
      </a>
      </div>
   </div>
</div>