<?php
$get_rds_template_data_array = RDS_TEMPLATE_DATA;
$paged = get_query_var("paged") ? get_query_var("paged") : -1;
$category_name = $args["category_taxonomy"];
if (empty($category_name) || in_array("all", $category_name)) {
    query_posts([
        "post_type" => "bc_testimonials",
        "posts_per_page" => 5,
        "paged" => $paged,
        "order" => "DESC",
        "post_status" => "publish",
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
    ]);
} else {
    query_posts([
        "post_type" => "bc_testimonials",
        "posts_per_page" => 5,
        "paged" => $paged,
        "order" => "DESC",
        "post_status" => "publish",
        "tax_query" => [
            "relation" => "AND", // Match both category and landing page criteria
            [
                "taxonomy" => "bc_testimonial_category",
                "field" => "name",
                "terms" => $category_name,
                "operator" => "IN",
            ],
        ],
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
    ]);
}

?>
<div class="w-100 d-block">
<div class="d-flex flex-column">
<div class="d-block order-1 order-lg-1">
<div class="container-fluid rpx_py_40 rpx_py_lg_80 px-0">
    <div class="container subpage_full_content review_page_content">
        <div class="row">
            <div class="col-12">
            <h1><?php echo get_the_title(); ?></h1>
            <h2 class="rpx_mb_50 text-capitalize"><?php echo !empty($args["page_templates"]["testimonial_page"]["subheading"]) ? $args["page_templates"]["testimonial_page"]["subheading"] : ''; ?></h2>
                <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                        <?php
                        $message = get_post_meta(get_the_ID(), "testimonial_message", true);
                        $name = get_post_meta(get_the_ID(), "testimonial_name", true);
                        $heading = get_post_meta(get_the_ID(), "testimonial_heading", true);
                        $city = get_post_meta(get_the_ID(), "testimonial_city", true);
                        $state = get_post_meta(get_the_ID(), "testimonial_state", true);
                        ?>
                      <div class="review_panel true_black_bg rpx_py_30 rpx_px_25 rpx_mb_50">
					  
                            <div class="slide-icon align-items-center d-flex justify-content-start rpx_mb_20">
                                <i class="icon-star-sharp1 stars_color text_15 line_height_15 me-1"></i>
                                <i class="icon-star-sharp1 stars_color text_15 line_height_15 me-1"></i>
                                <i class="icon-star-sharp1 stars_color text_15 line_height_15 me-1"></i>
                                <i class="icon-star-sharp1 stars_color text_15 line_height_15 me-1"></i>
                                <i class="icon-star-sharp1 stars_color text_15 line_height_15 mr-0"></i>
                            </div>
                            <?php if (!empty($message)): ?>
                                <p class="rpx_mb_20 true_white"><?php echo esc_html($message); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($name)): ?>
                                <p class="mb-0 true_white"><strong class="d-block true_white"><?php echo esc_html($name); ?></strong></p>
                            <?php endif; ?>
                            <p class="mb-0">
                                <strong class="d-block true_white">
                                    <?php 
                                    $location = '';
                                    if (!empty($city)) {
                                        $location .= esc_html($city);
                                    }
                                    if (!empty($state)) {
                                        if (!empty($location)) {
                                            $location .= ', ';
                                        }
                                        $location .= esc_html($state);
                                    }
                                    echo $location;
                                    ?>
                                </strong>
                            </p>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        <?php understrap_pagination([
                            "prev_text" => '<i class="icon-angles-left4"></i>',
                            "next_text" => '<i class="icon-angles-right4"></i>',
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php wp_reset_query(); // Reset the custom query
?>
