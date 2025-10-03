<?php
$enable_sidebar = $args["enable_sidebar"];
$widget_id = 32541;
$category_name = is_array($args["category_taxonomy"]) ? $args["category_taxonomy"] : [$args["category_taxonomy"]];
$get_rds_template_data_array = RDS_TEMPLATE_DATA;
$promotion_pagination = $enable_sidebar === "yes" ? 6 : 9;
$paged = get_query_var("paged") ? get_query_var("paged") : -1;
$current_date = date("m/d/Y");
$saved_date = get_option('custom_selected_date');
if (empty($category_name) || in_array("all", $category_name)) {
    query_posts([
        "post_type" => "bc_promotions",
        "posts_per_page" => $promotion_pagination,
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
        "posts_per_page" => $promotion_pagination,
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

global $wp_query;
?>
<main>
    <div class="w-100 d-block">
        <div class="d-flex flex-column">
            <div class="d-block order-1 order-lg-1">
                <!-- Subpage content area starts -->
                <div class="container-fluid order-1 order-lg-1 rpx_py_40 rpx_py_lg_80 promo-template-sec">
                    <div class="container subpage_full_content ">
                        <div class="row g-0">
                            <h1 class="rpx_mb_50"><?php the_title(); ?></h1>
                            <div class="<?php echo $enable_sidebar === "yes" ? "col-12 col-lg-8 order-lg-1 order-1" : "col-12 col-lg-12 order-lg-1 order-1"; ?>">
                                <div class="row">
                                    <?php
                                    $i = 0;
                                    if (have_posts()):
                                        while (have_posts()):
                                            the_post();
                                            if (function_exists("get_promotion_query")) {
                                                $get_rds_template_data_array = RDS_TEMPLATE_DATA;
                                                $promotion_type = get_post_meta(get_the_ID(), "promotion_type", true);
                                                $noexpiry = get_post_meta(get_the_ID(), "promotion_noexpiry", true);
                                                $colorCode = get_post_meta(get_the_ID(), "promotion_color", true);
                                                $date = get_post_meta(get_the_ID(), "promotion_expiry_date1", true);
                                                $open_new_tab = get_post_meta(get_the_ID(), "promotion_open_new_tab", true);

                                                if (strtotime($date) >= strtotime(current_time("m/d/Y")) || $noexpiry == 1) {

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
                                                    <div class="<?php echo $enable_sidebar === "yes" ? "col-lg-6 mb-lg-5 rpx_mb_30" : "col-lg-6 col-xl-4 rpx_mb_30"; ?>">
					<div class="h-100">
						<?php
                        echo get_template_part('global-templates/promotion/coupon');
                        ?>
										</div> 
                                                    </div>
                                    <?php $i++;
                                                }
                                            }
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                                <?php if ($i >= $promotion_pagination || $wp_query->max_num_pages > 1) { ?>
                                    <div class="row">
                                        <div class="col-md-12 d-flex align-items-center justify-content-center rpx_mt_30">
                                            <?php understrap_pagination(["prev_text" => '<i class="icon-angles-left4"></i>', "next_text" => '<i class="icon-angles-right4"></i>']); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if ($enable_sidebar === "yes") { ?>
                                <div class="col-lg-4 pt-lg-0 pt-4 px-0 order-lg-2 order-2 overflow-hidden sidebar">
                                    <div class="d-flex flex-column w-100">
                                        <?php echo do_shortcode('[elementor-template id="40126"]'); ?>
                                        <?php echo do_shortcode('[elementor-template id="40147"]'); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- Subpage content area ends -->
            </div>
        </div>
    </div>
</main>

<?php wp_reset_query(); ?>
<?php echo get_template_part('page-templates/common/coupon-modal'); ?>
          