<div class="d-block">
    <?php
    // Example of setting image size-wise
    // ['desktop', 'ipad', 'mobile']

    $img1x = [
        get_exist_image_url('service-block', 'service-block-bg'),
        get_exist_image_url('service-block', 'service-block-bg'),
        get_exist_image_url('service-block', 'm-service-block-bg')
    ];

    $img2x = [
        get_exist_image_url('service-block', 'service-block-bg@2x'),
        get_exist_image_url('service-block', 'service-block-bg@2x'),
        get_exist_image_url('service-block', 'm-service-block-bg@2x')
    ];

    $img3x = [
        get_exist_image_url('service-block', 'service-block-bg@3x'),
        get_exist_image_url('service-block', 'service-block-bg@3x'),
        get_exist_image_url('service-block', 'm-service-block-bg@3x')
    ];

    $img1x = implode(',', $img1x);
    $img2x = implode(',', $img2x);
    $img3x = implode(',', $img3x);

    echo do_shortcode('[custom-bg-srcset class="proudly-serving-bg " img1x="'.$img1x.'" img2x="'.$img2x.'" img3x="'.$img3x.'" size1x="cover" size2x="cover" size3x="cover"]');
    ?>

    <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 proudly_serving_area proudly-serving-bg color_primary_bg">
        <div class="container rpx_px_lg_0">
            <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center rpx_gap_20 rpx_gap_lg_40 proudly_serving_panel">
                <div class="col-12 col-lg mw-lg-420 last-child-content">
				<?php
                        $subheading = $args['globals']['service_area']['subheading'];
                        if (!empty($subheading)) {
                                echo '<div>'.$subheading.'</div>';
                        }?>
						
            </div>
                    <div class="col-12 col-lg true_white_bg rpx_radius_10 rpx_py_40 rpx_px_20 rpx_p_lg_60 rpx_small_shadow">
                        
                        <?php
                        $heading = $args['globals']['service_area']['heading'];
                        if (!empty($heading)) {
                                echo '<h5 class="text-center mb-0">'.$heading.'</h5>';
                           
                        }
                        $description_html_allowed = $args['globals']['service_area']['description_html_allowed'];
                        if (!empty($description_html_allowed)) {
                                echo '<div>'.$description_html_allowed.'</div>';
                        }

                        if (!empty($args['globals']['service_area']['button_link']) && !empty($args['globals']['service_area']['button_text'])) {
                            echo '<div class="pt-1 pt-lg-2 pb-0 pb-lg-0">';
                            echo '<a href="'.get_home_url().$args['globals']['service_area']['button_link'].'" class="a-alt no_hover_underline text-uppercase font_default text_semibold d-inline-flex align-items-center text_18 line_height_23">';
                            echo $args['globals']['service_area']['button_text'];
                            echo ' <i class="icon-chevron-right ms-2 bc_text_18 bc_line_height_18 position-relative top_n2"></i>';
                            echo '</a></div>';
                        }
                        ?>

                    </div>
        </div>
    </div>
</div>
