<?php
   $widget_id = $args["globals"]["promotion"]["widget_id"];
   $category_name = is_array($args["category_taxonomy"]) ? $args["category_taxonomy"] : array($args["category_taxonomy"]);
   $current_date = date("m/d/Y");
   $paged = get_query_var("paged") ? get_query_var("paged") : -1;
   if (empty($category_name) || in_array("all", $category_name)) {
       query_posts([
           "post_type" => "bc_promotions",
           "posts_per_page" => "6",
           "paged" => $paged,
           "order" => "DESC",
           "post_status" => "publish",
           "meta_query" => [
        "relation" => "AND", 
            [
                "key" => "promotion_landing_page_setting",
                "value" => "0",
            ],
            [
                "key" => "promotion_expiry_date1",
                "value" => $current_date,
                "compare" => ">=",
            ],
        ],
            "meta_value" => $current_date,
            "meta_compare" => ">=",
            
        ]);
    } else { 
        $abc = query_posts([
        "post_type" => "bc_promotions",
        "posts_per_page" => "6",
        "paged" => $paged,
        "order" => "DESC",
        "post_status" => "publish",
        "meta_query" => [
            "relation" => "AND", 
            [
                "key" => "promotion_landing_page_setting",
                "value" => "0", 
            ],
            [
                "key" => "promotion_expiry_date1",
                "value" => $current_date,
                "compare" => ">=",
            ],
        ],
        "tax_query" => [
            [
                "taxonomy" => "bc_promotion_category",
                "field" => "name",
                "terms" => $category_name,
                "operator" => "IN",
            ],
        ],
    ]);
    
   }
   
   
   
   $title_tag = isset($args["globals"]["promotion"]["title_tag"])
   	? $args["globals"]["promotion"]["title_tag"]
   	: "h2";
   $heading_tag = isset($args["globals"]["promotion"]["heading_tag"])
   	? $args["globals"]["promotion"]["heading_tag"]
   	: "h4";
   ?>
 
<div class="d-block">
<?php
   global $template;
   if (
   	!empty($template) &&
   	!empty($template) &&
   	basename($template) == "rds-landing.php"
   ) { ?>
<div class="container-fluid px-0 true_white_bg home_promo_section">
<?php } else { ?>
<div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 home_promo_section">
   <?php }
      ?>
      <div class="container rpx_px_0">
         <div class="row mx-0">
            <div class="homepage_coupon col-lg-12 px-0">
            <div class="rpx_px_15 rpx_px_xl_20">
               <?php if (!empty($args["globals"]["promotion"]["title"])) { ?>
               <<?php echo $title_tag ?> class="color_secondary rpx_mb_20 text-center"><?php echo $args["globals"]["promotion"]["title"]; ?></<?php echo $title_tag ?>>
               <?php } ?>
               <?php if (!empty($args["globals"]["promotion"]["heading"])) { ?>
               <<?php echo $heading_tag ?> class="text-center d-block"><?php echo $args["globals"]["promotion"]["heading"]; ?></<?php echo $heading_tag ?>>
               <?php } ?>
			   </div>
               <div class="coupon_slider position-relative">
                  <div class="swiper home-coupons-swiper-<?php echo $widget_id ?> d-lg-block d-none rpx_px_20 rpx_pt_20 rpx_mb_30 rpx_mb_lg_40">
                     <div class="swiper-wrapper rpx_mb_20 rpx_mb_lg_40">
                        <?php if (have_posts()):
                           while (have_posts()):
                              the_post();
                              $promotion_type = get_post_meta(get_the_ID(), "promotion_type", true);
                              $noexpiry = get_post_meta(get_the_ID(), "promotion_noexpiry", true);
                              $date = get_post_meta(get_the_ID(), "promotion_expiry_date1", true);
                              $open_new_tab = get_post_meta(get_the_ID(), "promotion_open_new_tab", true);
                              if (
                                 strtotime($date) >= strtotime(current_time("m/d/Y")) ||
                                 $noexpiry == 1
                              ) {
                                 $title = get_post_meta(get_the_ID(), "promotion_title1", true);
                                 $color = get_post_meta(get_the_ID(), "promotion_color", true);
                                 $subheading = get_post_meta(get_the_ID(), "promotion_subheading", true);
                                 $heading = get_post_meta(get_the_ID(), "promotion_heading", true);
                                 $footer_heading = get_post_meta(get_the_ID(), "promotion_footer_heading", true);
                                 $requestButtonLink = get_post_meta($post->ID, "request_button_link", true);
                                 $requestButtonTitle = get_post_meta($post->ID, "request_button_title", true);
                                 $promotion_data = array(
                                    'heading' => $heading,
                                    'subheading' => $subheading,
                                    'title' => $title,
                                    'requestButtonLink' => $requestButtonLink,
                                    'requestButtonTitle' => $requestButtonTitle,
                                    'open_new_tab' => $open_new_tab,
                                    'date' => $date,
                                    'footer_heading' => $footer_heading,
                                    'promotion_noexpiry' => $noexpiry
                                );
                                
                                foreach ($promotion_data as $key => $value) {
                                    set_query_var($key, $value);
                                }
                                 ?>
                        <div class="swiper-slide h-auto">
                        <?php     
                         echo get_template_part('global-templates/promotion/coupon');
                         ?>
                        </div>
                        <?php
                           }
                           endwhile;
                           endif; ?>
                     </div>
				 <div class="position-relative d-flex justify-content-center align-items-center">
                    <div class="swiper-button-prev-home-coupons-<?php echo $widget_id; ?> swiper-button-prev"></div>
                    <div class="swiper-pagination home-coupons-pagination-<?php echo $widget_id; ?>"></div>
                    <div class="swiper-button-next-home-coupons-<?php echo $widget_id; ?> swiper-button-next"></div>
                </div>
                  </div>
                  <div class="swiper m-home-coupons-swiper-<?php echo $widget_id ?> d-lg-none d-block rpx_px_20 rpx_pt_20 rpx_mb_30 rpx_mb_lg_40">
                     <div class="swiper-wrapper rpx_mb_20 rpx_mb_lg_40">
                        <?php if (have_posts()):
                           while (have_posts()):
                              the_post();
                              $promotion_type = get_post_meta(get_the_ID(), "promotion_type", true);
                              $noexpiry = get_post_meta(get_the_ID(), "promotion_noexpiry", true);
                              $date = get_post_meta(get_the_ID(), "promotion_expiry_date1", true);
                              $open_new_tab = get_post_meta(get_the_ID(), "promotion_open_new_tab", true);
                              if (
                                 strtotime($date) >= strtotime(current_time("m/d/Y")) ||
                                 $noexpiry == 1
                              ) {
                                 $title = get_post_meta(get_the_ID(), "promotion_title1", true);
                                 $color = get_post_meta(get_the_ID(), "promotion_color", true);
                                 $subheading = get_post_meta(get_the_ID(), "promotion_subheading", true);
                                 $heading = get_post_meta(get_the_ID(), "promotion_heading", true);
                                 $footer_heading = get_post_meta(get_the_ID(), "promotion_footer_heading", true);
                                 $requestButtonLink = get_post_meta($post->ID, "request_button_link", true);
                                 $requestButtonTitle = get_post_meta($post->ID, "request_button_title", true);
                                 $promotion_data = array(
                                    'heading' => $heading,
                                    'subheading' => $subheading,
                                    'title' => $title,
                                    'requestButtonLink' => $requestButtonLink,
                                    'requestButtonTitle' => $requestButtonTitle,
                                    'open_new_tab' => $open_new_tab,
                                    'date' => $date,
                                    'footer_heading' => $footer_heading,
                                    'promotion_noexpiry' => $noexpiry
                                );
                                
                                // Loop through the array and set query variables
                                foreach ($promotion_data as $key => $value) {
                                    set_query_var($key, $value);
                                }
                                 ?>
                        <div class="swiper-slide h-auto">
                        <?php
                        echo get_template_part('global-templates/promotion/coupon');
                        ?>
                        </div>
                        <?php
                           }
                           endwhile;
                           endif; ?>
                     </div>
					 <div class="position-relative d-flex justify-content-center align-items-center">
                    <div class="swiper-button-prev-m-home-coupons-<?php echo $widget_id; ?> swiper-button-prev"></div>
                    <div class="swiper-pagination m-home-coupons-pagination-<?php echo $widget_id; ?>"></div>
                    <div class="swiper-button-next-m-home-coupons-<?php echo $widget_id; ?> swiper-button-next"></div>
                </div>
                  </div>
                  <?php
                     global $template;
                     if (
                        !empty($template) &&
                        basename($template) == "rds-landing.php"
                     ) { ?>
                  <div class="swiper-button-next home_coupons_next_a-<?php echo $widget_id ?>">
                     <i class="icon-chevron-right text_25 line_height_42 transform"></i>
                  </div>
                  <div class="swiper-button-prev home_coupons_prev_a-<?php echo $widget_id ?>">
                     <i class="icon-chevron-left text_25 line_height_42 transform"></i>
                  </div>
                  <?php } else { ?>
         				  
				  
                  <div class="text-center">
                     <?php if (!empty($args["globals"]["promotion"]["button_link"]) && !empty($args["globals"]["promotion"]["button_text"])) { ?>
                     <a href="<?php echo get_home_url() . $args["globals"]["promotion"]["button_link"]; ?>" class="btn btn-secondary"><?php echo $args["globals"]["promotion"]["button_text"]; ?><i class="icon-circle-chevron-right2"></i></a>
                     <?php } ?>
                  </div>
                  <?php }
                     ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php wp_reset_query(); ?>
<?php echo get_template_part('page-templates/common/coupon-modal'); ?>
<script>
            jQuery(document).ready(function () {
                var numImage = jQuery('.home-coupons-swiper-<?php echo $widget_id ?> .swiper-slide').length;
                if (numImage <= 2) {
                    jQuery('.home-coupons-swiper-<?php echo $widget_id ?> .swiper-wrapper').addClass('justify-content-center ps-lg-3');
                    new Swiper(".home-coupons-swiper-<?php echo $widget_id ?>", {
                        spaceBetween: 40,
                        slidesPerView: 1,
                        loop: false,
						pagination: {
							el: ".home-coupons-pagination-<?php echo $widget_id; ?>",
							clickable: true
						}, 
						  navigation: {
							nextEl: '.swiper-button-next-home-coupons-<?php echo $widget_id ?>',
							prevEl: '.swiper-button-prev-home-coupons-<?php echo $widget_id ?>',
						  },
                        breakpoints: {
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 40
                            },
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 40
                            },
                            992: {
                                slidesPerView: 2,
                                spaceBetween: 40
                            }
                        }
                    });
                } else {
                    new Swiper(".home-coupons-swiper-<?php echo $widget_id ?>", {
                        spaceBetween: 40,
                        slidesPerView: 1,
                        autoplay: {
                            delay: 8000,
                            disableOnInteraction: true
                        },
                        loop:true,
						pagination: {
							el: ".home-coupons-pagination-<?php echo $widget_id; ?>",
							clickable: true
						}, 
						  navigation: {
							nextEl: '.swiper-button-next-home-coupons-<?php echo $widget_id ?>',
							prevEl: '.swiper-button-prev-home-coupons-<?php echo $widget_id ?>',
						  },
                        breakpoints: {
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 40
                            },
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 40
                            },
                            992: {
                                slidesPerView: 2,
                                spaceBetween: 40
                            }
                        }
                    });
                    var mySwiper = document.querySelector('.home-coupons-swiper-<?php echo $widget_id ?>').swiper
                    document.querySelectorAll('.request_service_button').forEach(function(button) {
                        button.addEventListener('click', function() {
                            if (document.getElementById('request_coupon_form').classList.contains('show')) {
                                mySwiper.autoplay.stop();
                            }
                        });
                    });

                    document.querySelector('.coupon-popup-close').addEventListener('click', function() {
                        if (!document.getElementById('request_coupon_form').classList.contains('show')) {
                            mySwiper.autoplay.start();
                        }
                    });
                }
                

                new Swiper(".m-home-coupons-swiper-<?php echo $widget_id ?>", {
                    spaceBetween: 30,
                    slidesPerView: 1,
                    autoplay: {
                        delay: 8000,
                        disableOnInteraction: true
                    },
                    loop: true,

						pagination: {
							el: ".m-home-coupons-pagination-<?php echo $widget_id; ?>",
							clickable: true
						}, 
						  navigation: {
							nextEl: '.swiper-button-next-m-home-coupons-<?php echo $widget_id ?>',
							prevEl: '.swiper-button-prev-m-home-coupons-<?php echo $widget_id ?>',
						  },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        768: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        }
                    }
                }); 
                if(jQuery('.m-home-coupons-swiper-<?php echo $widget_id ?>').length == 1){
                    var mySwipera = document.querySelector('.m-home-coupon-swiper-<?php echo $widget_id ?>').swiper
                    document.querySelectorAll('.request_service_button').forEach(function(button) {
                        button.addEventListener('click', function() {
                            if (document.getElementById('request_coupon_form').classList.contains('show')) {
                                mySwipera.autoplay.stop();
                            }
                        });
                    });

                    document.querySelector('.coupon-popup-close').addEventListener('click', function() {
                        if (!document.getElementById('request_coupon_form').classList.contains('show')) {
                            mySwipera.autoplay.start();
                        }
                    });
                }
                
        });
        </script>
