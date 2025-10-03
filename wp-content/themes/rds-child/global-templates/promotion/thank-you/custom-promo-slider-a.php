<?php
if (function_exists("get_promotion_query")) {
	$query = get_promotion_query(1);
	if ($query->have_posts()) {
		while ($query->have_posts()):
			$query->the_post();
			$promotion_type = get_post_meta(
				get_the_ID(),
				"promotion_type",
				true
			);
			$noexpiry = get_post_meta(get_the_ID(), "promotion_noexpiry", true);
			$colorCode = get_post_meta(get_the_ID(), "promotion_color", true);
			$date = get_post_meta(get_the_ID(), "promotion_expiry_date1", true);
			$open_new_tab = get_post_meta(
				get_the_ID(),
				"promotion_open_new_tab",
				true
			);
			if (
				strtotime($date) >= strtotime(current_time("m/d/Y")) ||
				$noexpiry == 1
			) {

				$title = get_post_meta(get_the_ID(), "promotion_title1", true);
				$color = get_post_meta(get_the_ID(), "promotion_color", true);
				$subheading = get_post_meta(
					get_the_ID(),
					"promotion_subheading",
					true
				);
				$heading = get_post_meta(
					get_the_ID(),
					"promotion_heading",
					true
				);
				$footer_heading = get_post_meta(
					get_the_ID(),
					"promotion_footer_heading",
					true
				);
				$requestButtonLink = get_post_meta(
					$post->ID,
					"request_button_link",
					true
				);
				$requestButtonTitle = get_post_meta(
					$post->ID,
					"request_button_title",
					true
				);
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
 
                <div class="col-lg-6 px-lg-3">
				<div class="mw-lg-358 mx-auto">
				<div class="h-auto coupon_bg">
						<?php
                        echo get_template_part('global-templates/promotion/coupon');
                        ?>
                    </div> 
                    </div> 
</div>
<?php echo get_template_part('page-templates/common/coupon-modal'); ?>
            <?php
			}
		endwhile; ?>
    <?php
	}
} ?> 