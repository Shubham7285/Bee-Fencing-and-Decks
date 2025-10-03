<?php if (function_exists('get_promotion_query')) {
    // $query = get_promotion_query(3);
    $category_name = $args['category_taxonomy'];
    $current_date = date('m/d/Y');
    if (empty($category_name) || in_array("all", $category_name)) {
        query_posts([
            "post_type" => "bc_promotions",
            "posts_per_page" => "3",
            // "paged" => $paged,
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
         "posts_per_page" => "3",
        //  "paged" => $paged,
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


            if (have_posts()) {?>
	
    <div class="sidebar_coupon mx-md-auto mw-lg-358 order-lg-2 order-2">
    <?php if (!empty($args['page_templates']['subpage']['sidebar']['promotion']['heading'])): ?>
        <h3 class="rpx_mb_30 rpx_mb_lg_15 text-center true_black">
            <?php echo $args['page_templates']['subpage']['sidebar']['promotion']['heading']; ?>
        </h3>
    <?php endif; ?>
    
    <div class="swiper coupon-swiper rpx_mb_30 rpx_small_shadow rpx_radius_10">
        <div class="swiper-wrapper">
            <?php while (have_posts()) : the_post();
                $promotion_type = get_post_meta(get_the_ID(), 'promotion_type', TRUE);
                $noexpiry = get_post_meta(get_the_ID(), 'promotion_noexpiry', true);
                $colorCode = get_post_meta(get_the_ID(), 'promotion_color', true);
                $date = get_post_meta(get_the_ID(), 'promotion_expiry_date1', true);
                
                if (strtotime($date) >= strtotime(current_time('m/d/Y')) || $noexpiry == 1) {
                    $title = get_post_meta(get_the_ID(), 'promotion_title1', true);
                    $color = get_post_meta(get_the_ID(), 'promotion_color', true);
                    $subheading = get_post_meta(get_the_ID(), 'promotion_subheading', true);
                    $heading = get_post_meta(get_the_ID(), 'promotion_heading', true);
                    $footer_heading = get_post_meta(get_the_ID(), 'promotion_footer_heading', true);
                    $requestButtonLink = get_post_meta($post->ID, 'request_button_link', true);
                    $open_new_tab = get_post_meta(get_the_ID(), 'promotion_open_new_tab', true);
                    $requestButtonTitle = get_post_meta($post->ID, 'request_button_title', true);
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
                <?php } endwhile; ?>
        </div>

    </div>
<div class="position-relative d-flex justify-content-center align-items-center rpx_mb_30">
                    <div class="swiper-button-prev-sidebar-coupons swiper-button-prev"></div>
                    <div class="swiper-pagination sidebar-coupons-pagination"></div>
                    <div class="swiper-button-next-sidebar-coupons swiper-button-next"></div>
                </div> 
    
    <div class="text-center">
        <?php if (!empty($args['page_templates']['subpage']['sidebar']['promotion']['button_link']) && !empty($args['page_templates']['subpage']['sidebar']['promotion']['button_text'])): ?>
            <a href="<?php echo get_home_url() . $args['page_templates']['subpage']['sidebar']['promotion']['button_link']; ?>" class="btn btn-secondary">
                <?php echo $args['page_templates']['subpage']['sidebar']['promotion']['button_text']; ?><i class="icon-circle-chevron-right2"></i>
            </a>
        <?php endif; ?>
    </div>
</div>
<?php echo get_template_part('page-templates/common/coupon-modal'); ?>

<script type="text/javascript">
       jQuery(document).ready(function () {
  
	    var swiperSubpageA = new Swiper(".coupon-swiper", {
                spaceBetween: 70,
                slidesPerView: 1, 
                loop: true,
                autoplay: {
                    delay: 8000,
                    disableOnInteraction: true,
                  },
						pagination: {
							el: ".sidebar-coupons-pagination",
							clickable: true
						}, 
						  navigation: {
							nextEl: '.swiper-button-next-sidebar-coupons',
							prevEl: '.swiper-button-prev-sidebar-coupons',
						  },

            });
			            var mySwiper = document.querySelector('.coupon-swiper').swiper
                document.querySelectorAll('.request_service_button').forEach(function(button) {
                    button.addEventListener('click', function() {
                        if (document.getElementById('sidebar_request_coupon_form').classList.contains('show')) {
                            mySwiper.autoplay.stop();
                        }
                    });
                });

                document.querySelector('.coupon-popup-close').addEventListener('click', function() {
                    if (!document.getElementById('sidebar_request_coupon_form').classList.contains('show')) {
                        mySwiper.autoplay.start();
                }
            });
    
   });
   

    </script>
    <?php } wp_reset_query(); 
} ?>
