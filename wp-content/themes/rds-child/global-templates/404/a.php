<?php $get_alt_text = RDS_ALT_DATA;
$alt = "";

if (is_array($get_alt_text)) {
  foreach ($get_alt_text as $value) {
    if (in_array("404-img-1.webp", $value)) {
      $alt = 'alt="' . $value[3] . '"';
      break; // Optional: exit loop once the alt text is found
    }
  }
}

?>    
     <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 true_white_bg">
    <div class="container ">
        <div class="row rpx_mb_30 rpx_mb_lg_60">
            <div class="col-12 text-center">
                <h1 class="display1 pagenotfound_display_1 rpx_mb_20">Oops!</h1>
                <span class="rpx_mb_30 display2 pagenotfound_display_2 d-block">Page Not Found</span>
                <div class="text-center">
                    <a href="<?php echo esc_url(get_home_url()); ?>" class="btn btn-secondary" name="Return to Home">Return home <i class="icon-circle-chevron-right2"></i></a>
                </div>
            </div>
        </div>
		<div class="row">
                <div class="col-12 text-center">
                <div class="text-center color_quaternary_bg rpx_py_23 rpx_px_20 rpx_px_xl_42 d-flex d-lg-inline-flex justify-content-center align-items-center rpx_gap_10 rpx_gap_xl_25 flex-column flex-lg-row">
                    <h6 class="d-lg-inline d-block text-capitalize mb-0 true_black">Or Jump To...</h6>
                    <div class="d-flex flex-column flex-lg-row page_main_links rpx_gap_10 rpx_gap_xl_30 text_medium">
                        <?php
                        $name = !empty($args["globals"]["404"]["menu_name"]) ? $args["globals"]["404"]["menu_name"] : '';
                        $menu = !empty($name) ? get_term_by("name", $name, "nav_menu") : null;
                        $menu_items = !empty($menu) ? wp_get_nav_menu_items($menu) : [];
                        if (!empty($menu_items)): ?>
                            <?php foreach ($menu_items as $value): 
                                $classes = !empty($value->classes) ? implode(' ', $value->classes) : ''; ?>
                                <a href="<?php echo esc_url($value->url); ?>" 
                                   target="<?php echo esc_attr($value->target); ?>" 
                                   class="text_16 line_height_20 font_default text_medium text-uppercase true_black--imp <?php echo esc_attr($classes); ?>"><?php
																			if (!empty($value->post_title)) {
																				echo esc_html($value->post_title);
																			} else {
																				echo esc_html($value->title);
																			}
																?></a>
                            <?php endforeach;
                        endif;
                        ?>
                    </div>
                    <span class="error-pipe position-relative d-none d-xl-inline-block"></span>

                    <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url("/")); ?>" class="input-group search d-inline-flex align-items-center error-search-box">
                        <div class="input-group-prepend pl-5 pl-sm-0">
                            <button id="searchsubmit" aria-label="magnifying glass" type="submit" class="input-group-text bg-transparent border-0 h-54 text-center m_w_45 rounded-0 focus-outline-0 cursor-pointer p-0">
                                <i class="icon-magnifying-glass2 color_secondary text_18 line_height_18 mx-auto"></i>
                            </button>
                        </div>
                        <input type="text" value="<?php echo esc_attr(get_search_query()); ?>" name="s" id="s" class="form-control rounded-0 empty-search error-search border-0 h-54 color_secondary  rpx_mx_10 p-0 rpx_py_10" placeholder="SEARCH">
                    </form>
                </div>
            </div>
                    </div>
    </div>
</div>
<div class="">
<?php echo do_shortcode('[elementor-template id="32406"]'); ?>
</div>
