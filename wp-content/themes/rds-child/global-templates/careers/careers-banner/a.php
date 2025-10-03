<?php
$get_alt_text = RDS_ALT_DATA;
$career_banner_alt = "";
$career_mobile_banner_alt = "";

if (is_array($get_alt_text)) {
    foreach ($get_alt_text as $value) {
        if (in_array("careers-banner.webp", $value)) {
            $career_banner_alt = !empty($value[3]) ? 'alt="' . esc_attr($value[3]) . '"' : '';
        }

        if (in_array("m-careers-banner.webp", $value)) {
            $career_mobile_banner_alt = !empty($value[3]) ? 'alt="' . esc_attr($value[3]) . '"' : '';
        }
    }
}
?> 
<!-- carrer banner starts -->
<div class="container-fluid px-0 rpx_mb_xl_75">
        <div class="row g-0">
            <div class="col-lg-6 carrer-left-xl-6">
                <div class="mh-lg-502">
                    <img src="<?php echo get_exist_image_url('careers','careers-banner'); ?>" srcset="<?php echo get_exist_image_url('careers','careers-banner'); ?> 1x, <?php echo get_exist_image_url('careers','careers-banner@2x'); ?> 2x, <?php echo get_exist_image_url('careers','careers-banner@3x'); ?> 3x" width="1075" height="502" <?php echo $career_banner_alt; ?> class="img-fluid mh-lg-502 mw-lg-100 object-fit d-md-block d-none">
                    <img src="<?php echo get_exist_image_url('careers','careers-banner'); ?>" srcset="<?php echo get_exist_image_url('careers','m-careers-banner'); ?> 1x, <?php echo get_exist_image_url('careers','m-careers-banner@2x'); ?> 2x, <?php echo get_exist_image_url('careers','m-careers-banner@3x'); ?> 3x"  width="1075" height="502" <?php echo $career_banner_alt; ?> class="img-fluid mh-lg-502 mw-lg-100 object-fit d-md-none d-block">
                </div>
            </div>
            <div class="col-lg-6 carrer-right-xl-6 position-relative carrer_banner_content d-flex align-items-center">
                <div class="mw-lg-445 ms-lg-0 container rpx_py_40 rpx_py_xl_0 rpx_pl_15 rpx_pr_15 rpx_pr_lg_0 rpx_pl_xl_34">
                    <span class="display1 true_black d-block rpx_mb_15"><?php the_title(); ?></span>
                    
                                 <?php
$content = isset($args['page_templates']['career_page']['banner']['content']) ? $args['page_templates']['career_page']['banner']['content'] : '';
$charLimit = 464;
        if (strlen(strip_tags($content)) > $charLimit) {
            $trimmedContent = substr(strip_tags($content), 0, $charLimit);
            echo $trimmedContent . '...';
           
        } else {
            echo $content;
        }
    ?>
                    <div class="">
                        <?php if(!empty($args['page_templates']['career_page']['banner']['button_text'])){ ?>
                        <button  onclick="scrollSmoothTo('open_position')"  class="btn btn-primary mw-279"><?php echo $args['page_templates']['career_page']['banner']['button_text']; ?><i class="icon-circle-chevron-down2"></i></button>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- carrer banner ends -->

    <script>
        function scrollSmoothTo(elementId) {
            var offset = <?php echo wp_is_mobile() ? 80 : 220; ?>;

            jQuery("html, body").animate({
            scrollTop: jQuery('#open_position').offset().top - offset
            }, 500);

            }
            //Job Application js
            function viewPostionButtonClick(attr) {
            var jobTitle = jQuery(attr).siblings('.position_title').text();
            console.log(jobTitle);
            jQuery(".job-title").find('input:text').val(jobTitle);
        }
    </script> 