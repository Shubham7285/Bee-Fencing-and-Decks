<?php $get_rds_template_data_array = RDS_TEMPLATE_DATA;
$get_alt_text = RDS_ALT_DATA;
$alt = "";
if (is_array($get_alt_text)) {
    foreach ($get_alt_text as $value) {
        if (is_array($value) && in_array("thank-you-graphic.webp", $value) && isset($value[3])) {
            $alt = 'alt="' . esc_attr($value[3]) . '"';
        }
    }
}

?>  
      <div class="d-block order-1 order-lg-1">
    <!-- Thank You content area starts -->
    <div class="container-fluid order-1 order-lg-1 rpx_py_40 rpx_py_lg_80">
        <div class="container ">
            <div class="row ">
                <div class="col-12 order-lg-1 order-1">
                    <div class="text-center mw-md-445 mw-lg-445 mx-auto">
                         <h1 class="thankyou_page_heading_color display1 true_black--imp rpx_mb_20"><?php the_title(); ?></h1>
                        <div class="thankyou_page_content_color">
                            <?php echo !empty($args['page_templates']['thankyou_page']['middle_content']) ? $args['page_templates']['thankyou_page']['middle_content'] : ''; ?>
                        </div>
						<?php if (!empty($args["page_templates"]["thankyou_page"]["show_promotions"]) && $args["page_templates"]["thankyou_page"]["show_promotions"] == 1) { ?>
                        <?php
                        $temName = basename(get_page_template());
                        if ($temName != "rds-coupon-thankyou.php") {
                            ?>
                            <div class="text-center">
                                <span onclick="scrollSmoothTo('thankyou_page_promotion')" class="next-service btn btn-secondary w-100 mw-md-435 mw-lg-435 mx-auto" id="bc-thankyou"><?php echo !empty($args["page_templates"]["thankyou_page"]["scroll_button_text"]) ? esc_html($args["page_templates"]["thankyou_page"]["scroll_button_text"]) : ''; ?> <i class="icon-circle-chevron-down2"></i></span>
                            </div>
                            <?php
                        }
                        ?>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Thank You content area ends -->
</div>

<!-- Affiliation Start-->
<div class="d-block order-2 order-lg-2 color_quaternary_bg rpx_py_20" id="next-service">
    <div class="container-fluid bc-thnkyu-trust px-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center mx-auto">
                        <?php if (!empty($get_rds_template_data_array["globals"]["affiliation"]["variation"])) {
                            get_template_part("global-templates/affiliation/thank-you/" . $get_rds_template_data_array["globals"]["affiliation"]["variation"], null, $get_rds_template_data_array);
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Affiliation End -->

<?php if (!empty($args["page_templates"]["thankyou_page"]["show_promotions"]) && $args["page_templates"]["thankyou_page"]["show_promotions"] == 1) { ?>
    <div class="d-block order-3 order-lg-3" id="thankyou_page_promotion">
        <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 px-lg-3 text-center text-lg-start mb-5 mb-lg-0">
                        <h4 class="mb-0 true_black--imp"><?php echo !empty($args["page_templates"]["thankyou_page"]["promotions"]["heading"]) ? esc_html($args["page_templates"]["thankyou_page"]["promotions"]["heading"]) : ''; ?></h4>
                        <p class="rpx_py_30 mb-0"><?php echo !empty($args["page_templates"]["thankyou_page"]["promotions"]["content"]) ? esc_html($args["page_templates"]["thankyou_page"]["promotions"]["content"]) : ''; ?></p>
                        <a href="<?php echo esc_url(get_home_url() . (!empty($args["page_templates"]["thankyou_page"]["promotions"]["button_link"]) ? $args["page_templates"]["thankyou_page"]["promotions"]["button_link"] : '#')); ?>" class="btn btn-secondary">
                            <?php echo !empty($args["page_templates"]["thankyou_page"]["promotions"]["button_text"]) ? esc_html($args["page_templates"]["thankyou_page"]["promotions"]["button_text"]) : ''; ?>
                            <i class="icon-circle-chevron-right2"></i>
                        </a>
                    </div>
                    <!-- Coupon starts -->
					<?php if (!empty($get_rds_template_data_array["globals"]["promotion"]["variation"])) {
                        get_template_part("global-templates/promotion/thank-you/" . $get_rds_template_data_array["globals"]["promotion"]["variation"], null, $get_rds_template_data_array);
                    } ?>
                    <!-- Coupon ends -->
                </div>
            </div>
        </div>
    </div>
<?php } ?>

            <script>
                 jQuery(".promotionC_icon").click(function () {
                        var text = jQuery(this).html().trim();
                        currentText = jQuery(this).text();

                        if (currentText == "More info ") {
                            jQuery(this).html(text.replace('More info ', 'Less info '));
                            
                             jQuery(this).find('i').toggleClass('icon-plus1 icon-minus1');
                         
                        } else {
                            jQuery(this).html(text.replace('Less info ', 'More info '));
                         
                                  jQuery(this).find('i').toggleClass('icon-minus1 icon-plus1');
                              }
                        
                    });
            </script>
    <script type="text/javascript">
     function scrollSmoothTo(elementId) {
        var element = document.getElementById(elementId);
        if (element !== null) {
            element.scrollIntoView({
                block: 'start',
                behavior: 'smooth'
            });
        }
    }

    </script> 