<?php
$get_alt_text = RDS_ALT_DATA;
$alt1 = "";
$alt2 = "";
$alt3 = "";
$alt4 = "";
$alt5 = "";
$alt6 = "";

if (is_array($get_alt_text)) {
    foreach ($get_alt_text as $value) {
        if (in_array("affiliate-logo-1-gray.webp", $value) && isset($value[3])) {
            $alt1 = 'alt="' . $value[3] . '"';
        }
        if (in_array("affiliate-logo-2-gray.webp", $value) && isset($value[3])) {
            $alt2 = 'alt="' . $value[3] . '"';
        }
        if (in_array("affiliate-logo-3-gray.webp", $value) && isset($value[3])) {
            $alt3 = 'alt="' . $value[3] . '"';
        }
        if (in_array("affiliate-logo-4-gray.webp", $value) && isset($value[3])) {
            $alt4 = 'alt="' . $value[3] . '"';
        }
        if (in_array("affiliate-logo-5-gray.webp", $value) && isset($value[3])) {
            $alt5 = 'alt="' . $value[3] . '"';
        }
        if (in_array("affiliate-logo-6-gray.webp", $value) && isset($value[3])) {
            $alt6 = 'alt="' . $value[3] . '"';
        }
    }
}
?>
<?php
$template_id = get_current_elementor_template_id();
$bg_class = 'true_black_bg affiliation_light';
$title_class = 'true_white';
if ($template_id == 40758 || is_singular('bc_galleries') || is_post_type_archive('bc_galleries')) {
    $bg_class = 'true_white';
    $title_class = '';
}
?>
<div class="d-block">
    <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 text-center <?php echo $bg_class; ?>">
        <div class="container">
            <div class="row align-items-center justify-content-center position-relative">
                <div class="col-12">
				<?php if ( !empty($settings['affiliation_title']) ) : ?>
    <h2 class="rpx_mb_50 rpx_mb_lg_40 <?php echo esc_attr($title_class); ?>">
        <?php echo esc_html($settings['affiliation_title']); ?>
    </h2>
<?php endif; ?>

<?php if ( !empty($settings['affiliation_content']) ) : ?>
    <p class="rpx_mb_50 rpx_mb_lg_40 text-center <?php echo esc_attr($title_class); ?>">
        <?php echo wp_kses_post($settings['affiliation_content']); ?>
    </p>
<?php endif; ?>

				</div>
                <div class="col-12">
                    <div class="swiper affiliation-swiper">
                        <div class="swiper-wrapper align-items-center">
                            <?php $Count = $args['globals']['affiliation']['count'];
                            $i = 1;
                           
                            $media_dir = get_stylesheet_directory_uri() . '/img/affiliation/';
                            while ($Count >= $i  ) {
                                 $alt = "alt".$i;
                                 $logo = get_exist_image_url("affiliation", "affiliate-logo-" . $i . "");
                                 $logo2x = get_exist_image_url("affiliation", "affiliate-logo-" . $i . "@2x");
                                 $logo3x = get_exist_image_url("affiliation", "affiliate-logo-" . $i . "@3x");
                                  $alt = $$alt;
                                ?>
                                <div class="swiper-slide">
                                    <div class="text-center">
                                        <img src="<?php echo $logo; ?>" class="img-fluid" width="160" height="160"  srcset="<?php echo $logo; ?> 1x, <?php echo $logo2x; ?> 2x, <?php echo $logo3x; ?> 3x," <?php echo $alt; ?> />
                                    </div>
                                </div>
                                <?php
                                $i++;
                            }
                            ?>
                         
                        </div>
						
                <div class="swiper-button-next affiliation_next">
                    
                </div>
                <div class="swiper-button-prev affiliation_prev">
                
                </div> 
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

       jQuery(document).ready(function () {
        var variation = "<?php echo $args['globals']['affiliation']['variation'] ?>";
          var count = "<?php echo $args['globals']['affiliation']['count'] ?>";
        var slidesPerView = {a: 4, b: 5, c: 6};
        if(count <= slidesPerView[variation]){
             var affiliactionSlider = new Swiper(".affiliation-swiper", {
            spaceBetween: 30,
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
           navigation: {
                nextEl: ".affiliation_next",
                prevEl: ".affiliation_prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                992: {
                    slidesPerView: count,
                    spaceBetween: 30,
                    noSwiping: true,
                },
            },
        });

        }else{
           var affiliactionSlider = new Swiper(".affiliation-swiper", {
            spaceBetween: 30,
            slidesPerView: 1,
            loop: true,
             autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            navigation: {
                 nextEl: ".affiliation_next",
                prevEl: ".affiliation_prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                992: {
                    slidesPerView: slidesPerView[variation],
                    spaceBetween: 30,
                },
            },
        });

        }
        
    });
</script>