<?php 
$widget_id = 32453;
$category_name = $args['category_taxonomy'];
if (empty($category_name) || in_array('all', $category_name)) {
    $testimonial = array(
        'post_type'      => 'bc_testimonials',
        'posts_per_page' => 5,
        'order'          => 'DESC',
        'meta_query'     => array(
            'relation' => 'OR',
            array(
                'key'     => 'testimonial_landing_page',
                'compare' => 'NOT EXISTS', // Exclude posts where the 'testimonial_landing_page' meta key doesn't exist
            ),
            array(
                'key'     => 'testimonial_landing_page',
                'value'   => '0', // Exclude posts where 'testimonial_landing_page' is set to 1
                'compare' => '=', 
                'type'    => 'NUMERIC',
            ),
        ),
        'post_status'    => 'publish',
        
    );
} else {
    $testimonial = array(
        'post_type'      => 'bc_testimonials',
        'posts_per_page' => 5,
        'order'          => 'DESC',
        'meta_query'     => array(
            'relation' => 'OR',
            array(
                'key'     => 'testimonial_landing_page',
                'compare' => 'NOT EXISTS', // Exclude posts where the 'testimonial_landing_page' meta key doesn't exist
            ),
            array(
                'key'     => 'testimonial_landing_page',
                'value'   => '0', // Exclude posts where 'testimonial_landing_page' is set to 1
                'compare' => '=', 
                'type'    => 'NUMERIC',
            ),
        ),
        'post_status'    => 'publish',
        'tax_query' => [
            'relation' => 'OR', 
            [
                'taxonomy' => 'bc_testimonial_category',
                'field'    => 'name',
                'terms' => $category_name,
                'operator' => 'IN', 
            ],
        ],
    );
}

$query = new WP_Query($testimonial);
if ($query->have_posts()) {

    $heading_tag = isset($args["globals"]["testimonial"]["heading_tag"]) ? $args["globals"]["testimonial"]["heading_tag"] : "h2";
    $subheading_tag = isset($args["globals"]["testimonial"]["subheading_tag"]) ? $args["globals"]["testimonial"]["subheading_tag"] : "h4";
?>

    <!-- use this order class order-7 order-lg-7-->
    <div class="d-block">
        <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 color_quaternary_bg overflow-hidden">
            <div class="container review-container position-relative">
                <div class="row">
                    <div class="col-12 align-self-center">
                    <div class="rpx_px_xl_2">
                        <?php if (!empty($args["globals"]["testimonial"]["heading"])): ?>
                            <<?php echo $heading_tag ?> class="rpx_mb_40 text-center color_secondary"><?php echo $args["globals"]["testimonial"]["heading"]; ?></<?php echo $heading_tag ?>>
                        <?php endif; ?>
                        <?php if (!empty($args["globals"]["testimonial"]["subheading"])): ?>
                            <<?php echo $subheading_tag ?> class="rpx_mb_20 rpx_mb_lg_30"><?php echo $args["globals"]["testimonial"]["subheading"]; ?></<?php echo $subheading_tag ?>>
                        <?php endif; ?>
                        <div class="swiper review-swiper-c-<?php echo $widget_id ?> reviews-swiper text-start rpx_mb_20 rpx_mb_lg_40">
                            <div class="swiper-wrapper rpx_mb_20 rpx_mb_lg_40">
                                <?php while ($query->have_posts()): $query->the_post();
                                    $name = get_post_meta(get_the_ID(), "testimonial_name", true);
                                    $city = get_post_meta(get_the_ID(), "testimonial_city", true);
                                    $state = get_post_meta(get_the_ID(), "testimonial_state", true);
                                    $message = get_post_meta(get_the_ID(), "testimonial_message", true);
                                    ?>
                                    <div class="swiper-slide h-auto review_panel review_block">
									
										<div class="slide-icon d-flex align-items-end rpx_mb_15">
											<i class="icon-star-sharp1 text_23 line_height_21 stars_color me-1"></i>
											<i class="icon-star-sharp1 text_23 line_height_21 stars_color me-1"></i>
											<i class="icon-star-sharp1 text_23 line_height_21 stars_color me-1"></i>
											<i class="icon-star-sharp1 text_23 line_height_21 stars_color me-1"></i>
											<i class="icon-star-sharp1 text_23 line_height_21 stars_color me-1"></i>
										</div>
                                        <?php if (!empty($message)): ?>
                                            <p class="rpx_mb_15 true_white"><?php
                                                $my_content = wp_strip_all_tags($message);
                                                echo wp_trim_words($my_content, 40);
                                            ?></p>
                                        <?php endif; ?>
                                        <?php if (!empty($name) || !empty($city) || !empty($state)): ?>
                                            <div class="d-lg-block d-none">
                                                <?php if (!empty($name)): ?>
                                                    <p class="mb-0 text-capitalize color_quaternary "><strong class="color_quaternary"><?php echo $name; ?></strong></p>
                                                <?php endif; ?>
                                                <p class="mb-0 position-relative top_n4 color_quaternary ">
                                                    <?php 
                                                    if (!empty($city) && !empty($state)) {
                                                        echo $city . ", " . $state;
                                                    } elseif (!empty($city)) {
                                                        echo $city;
                                                    } elseif (!empty($state)) {
                                                        echo $state;
                                                    } 
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="d-lg-none d-block">
                                                <?php if (!empty($name)): ?>
                                                    <p class="mb-0 text-capitalize color_quaternary "><strong class="color_quaternary "><?php echo $name; ?></strong></p>
                                                <?php endif; ?>
                                                <p class="mb-0 position-relative top_n4 color_quaternary ">
                                                    <?php 
                                                    if (!empty($city) && !empty($state)) {
                                                        echo $city . ", " . $state;
                                                    } elseif (!empty($city)) {
                                                        echo $city;
                                                    } elseif (!empty($state)) {
                                                        echo $state;
                                                    } 
                                                    ?>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
					<div class="position-relative d-flex justify-content-center align-items-center">
                    <div class="swiper-button-prev-review-<?php echo $widget_id; ?> swiper-button-prev"></div>
                    <div class="swiper-pagination review-pagination-<?php echo $widget_id; ?>"></div>
                    <div class="swiper-button-next-review-<?php echo $widget_id; ?> swiper-button-next"></div>
                </div>
							 <div class="review-pagination-c-<?php echo $widget_id ?> swiper-pagination position-relative text-start"></div>
                        </div>
                       
                        <?php if (!empty($args["globals"]["testimonial"]["button_text"])): ?>
                            <div class="text-center">
                                <a href="<?php echo get_home_url() . $args["globals"]["testimonial"]["button_link"]; ?>" class="btn btn-secondary" target="<?php echo isset($args["globals"]["testimonial"]["is_external"]) ? $args["globals"]["testimonial"]["is_external"] : false; ?>"><?php echo $args["globals"]["testimonial"]["button_text"]; ?> <i class="icon-circle-chevron-right2"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
			<img src="<?php echo get_exist_image_url('hero', 'mascot'); ?>" srcset="<?php echo get_exist_image_url('hero', 'mascot'); ?> 1x, <?php echo get_exist_image_url('hero', 'mascot@2x'); ?> 2x, <?php echo get_exist_image_url('hero', 'mascot@3x'); ?> 3x" <?php echo !empty($alt) ? $alt : ''; ?> class="img-fluid review-mascot-img d-none d-xl-block" width="360" height="576">

            </div>
        </div>
    </div>  
	
    <script type="text/javascript">
        jQuery(document).ready(function () {
            var swiper = new Swiper(".review-swiper-c-<?php echo $widget_id ?>", {
                spaceBetween: 10,
                slidesPerView: 1,
                loop: true,
                autoplay: {
                    delay: 8000,
                    disableOnInteraction: true,
                },
                pagination: {
                    el: ".review-pagination-<?php echo $widget_id; ?>",
                    clickable: true
                }, 
				  navigation: {
					nextEl: '.swiper-button-next-review-<?php echo $widget_id ?>',
					prevEl: '.swiper-button-prev-review-<?php echo $widget_id ?>',
				  },
				breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 50,
                },
            },
            });
        })
    </script>
	
    <?php
}
