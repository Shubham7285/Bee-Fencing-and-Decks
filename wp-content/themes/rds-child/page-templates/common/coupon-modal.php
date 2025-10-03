<?php 
if (empty($args["globals"]["promotion"])){
    global $rdsTemplateDataGlobal;
    $args = $rdsTemplateDataGlobal;
}
?>
<div class="modal fade request_form" id="slider_request_coupon_form" tabindex="-1" role="dialog" data-bs-backdrop="false" data-bs-keyboard="false" aria-labelledby="requestcoupon_Label" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content border-0 rounded-0 text-center">
         <div class="modal-header border-0 p-0">
            <button type="button" class="close coupon-popup-close position-absolute bg-transparent border-0 pb-0 px-0" data-bs-dismiss="modal" aria-label="Close" style="opacity:1; z-index: 999; color:#fff ;">
            <i class="icon-xmark1 text_30 line_height_26"></i>
            </button>
         </div>
         <div class="modal-body w-100 my-auto mx-auto rounded-0 coupons">
            <div class="border-dashed-7 footer_form_A ui_kit_footer_form elementor-popupform">
               <?php if (!empty($args["globals"]["promotion"]["popup_form_heading"])) { ?>
               <h4 class="rpx_mb_18 true_black--imp"><?php echo $args["globals"]["promotion"]["popup_form_heading"]; ?></h4>
               <?php } ?>
               <?php if (!empty($args["globals"]["promotion"]["popup_form_subheading"])) { ?>
               <div class="w-lg-260 mx-auto text-start text-lg-center d-flex align-items-center justify-content-center rpx_mb_30 rpx_mb_lg_27">
                  <i class="icon-shield-check1 text_30 line_height_30 me-2 position-relative color_secondary"></i>
                  <span class="text_bold text_16 line_height_28 sm_text_16 sm_line_height_28 color_secondary"><?php echo $args["globals"]["promotion"]["popup_form_subheading"]; ?></span>
               </div>
               <?php } ?>
               <div class="">
                  <?php
                     $form_id = $args["globals"]["promotion"]["popup_gravity_form_id"];
                     if (!empty($form_id)) {
                        echo do_shortcode("[gravityforms id=" . $form_id . " ajax=true]");
                     }
                     ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery(".promotionC_icon").click(function () {
          var text = jQuery(this).html().trim();
          currentText = jQuery(this).text();
   
          if (currentText == "More info ") {
              jQuery(this).html(text.replace('More info ', 'Less info '));
              if (jQuery('body').hasClass('elementor-editor-active')) {
               jQuery(this).find('i').toggleClass('icon-plus1 icon-minus1');
           }
          } else {
              jQuery(this).html(text.replace('Less info ', 'More info '));
               if (jQuery('body').hasClass('elementor-editor-active')) {
                    jQuery(this).find('i').toggleClass('icon-minus1 icon-plus1');
                }
          }
      });
            jQuery(".coupon-popup-close").click(function () {
                jQuery(this).closest("#slider_request_coupon_form").find("form .gfield_label").each(function (k, d) {
                    jQuery(d).attr("style", "");
                    jQuery(d).parent('li').children('label').show();
                    jQuery(d).parent('li').find('.validation_message').hide();
                    jQuery(d).parent('li').removeClass('gfield_error');
                    jQuery(d).parent('li').removeClass('gfield_error');
                    jQuery(d).parent('li').find('input').val('');
                    jQuery(d).parent('li').find('select').val('');
                    jQuery(d).parent('li').children('label').removeClass('float_label');
                    jQuery(d).parent("li").find(".gfield-choice-input").prop("checked", true);
                });
            });
            jQuery(".rds_gform_submit").click(function () {
                console.log(jQuery(this).closest("form").find(".coupon-name input").val());
                var promotiontitleValue = jQuery(this).closest("form").find(".coupon-name input").val();
                if (promotiontitleValue != "") {
                    setTimeout(function () {
                        jQuery('.bc-promotion-title').text(promotiontitleValue);
                    }, 500);
                }
            });
            setInterval(function () {
                    var promotiontitleValue = jQuery('#input_9_10').val();
                    jQuery('.bc-promotion-title').text(promotiontitleValue);
            }, 500);
        });
        function couponButton1Click(attr) {
            var CouponTitle = jQuery(attr).parent().parent('.coupon_name').find('.coupon_title').text();
            var CouponsubTitle = jQuery(attr).parent().parent('.coupon_name').find('.coupon_subtitle').text();
            var Couponsubheading = jQuery(attr).parent().parent('.coupon_name').find('.coupon_sub_heading ').text();
            console.log(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading)
            jQuery(".coupon-name").find('input:text').val(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading);
            jQuery(".bc-promotion-title").text(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading);
        }

    </script>