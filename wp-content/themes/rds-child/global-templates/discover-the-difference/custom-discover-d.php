<!--order-5 order-lg-5-->
<?php
$get_alt_text = RDS_ALT_DATA;
$alt = "";
if (is_array($get_alt_text)) {
    foreach ($get_alt_text as $value) {
        if (in_array("value-prop-img.webp", $value)) {
            $alt = 'alt="' . $value[3] . '"';
        }
    }
}

//exaple how to set image sizewise
// ['dektop', 'ipad', 'mobile']

$img1x = [
	get_exist_image_url("value-prop", "value-prop-bg"),
	get_exist_image_url("value-prop", "value-prop-bg"),
	get_exist_image_url("value-prop", "m-value-prop-bg"),
];
$img2x = [
	get_exist_image_url("value-prop", "value-prop-bg@2x"),
	get_exist_image_url("value-prop", "value-prop-bg@2x"),
	get_exist_image_url("value-prop", "m-value-prop-bg@2x"),
];
$img3x = [
	get_exist_image_url("value-prop", "value-prop-bg@3x"),
	get_exist_image_url("value-prop", "value-prop-bg@3x"),
	get_exist_image_url("value-prop", "m-value-prop-bg@3x"),
];
$img1x = Implode(",", $img1x);
$img2x = Implode(",", $img2x);
$img3x = Implode(",", $img3x);
?>
<?php echo do_shortcode(
	'[custom-bg-srcset class="value_prop_bg" img1x="' .$img1x .'" img2x="'.$img2x .'" img3x="'.$img3x .'" size1x="cover" size2x="cover" size3x="cover" position="top center" md_position="top center" m_position="top center"]'
); 
?>

    <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 value_prop_bg">
        <div class="container rpx_px_xl_0">
		 <div class="d-flex flex-column flex-lg-row rpx_gap_20 rpx_mb_20 rpx_mb_lg_40"> 
		 <div class="col"> 
			<h6 class="rpx_mb_20 color_primary"><?php echo !empty( $args['globals']['discover_the_difference']['heading']) ?  $args['globals']['discover_the_difference']['heading'] : ''; ?></h6>
			<h4 class="mb-0 color_primary"><?php echo !empty( $args['globals']['discover_the_difference']['subheading']) ?  $args['globals']['discover_the_difference']['subheading'] : ''; ?></h4>
		 </div>
		 <div class="col">
		 
		 <?php if($args['globals']['discover_the_difference']['description']){?>
		 <p class="true_white rpx_mb_20"><?php echo $args['globals']['discover_the_difference']['description']; ?></p>
		 <?php } ?>
		 
		 <a href="<?php echo (!empty($args['globals']['discover_the_difference']['button_link']) ? $args['globals']['discover_the_difference']['button_link'] : ''); ?>" class="btn btn-secondary"><?php echo $args['globals']['discover_the_difference']['button_text']; ?><i class="icon-circle-chevron-right2"></i></a>
		 </div>
		 </div>
	
			<div class="">
				<div class="swiper value_prop_swiper">
						  <!-- Additional required wrapper -->
						  <div class="swiper-wrapper rpx_mb_20 rpx_mb_lg_40">
                    <?php
                    if (!empty($args['globals']['discover_the_difference']['items'])) {
                        $discoverItems = $args['globals']['discover_the_difference']['items'];
                        foreach ($discoverItems as $value) { ?>
                            <div class="swiper-slide text-start">
                                <div class="value-prop-items">
								
										<?php
										
										if ( ! empty( $value['image'] ) ) : 
											$image_url = $value['image'];
											$image_id  = $value['image_id'] ?? '';
											//print_r($image_id );
											$alt_text  = $image_id ? get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : 'discover img';
										?>
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>" class="w-100" />
					<?php endif; ?>
                                    <div class="rpx_py_40 rpx_px_24"><h5 class="rpx_mb_20 color_primary"><?php echo $value['title']; ?></h5>
										<p class="true_white mb-0"><?php echo $value['description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
						  </div>
					<div class="position-relative d-flex justify-content-center align-items-center controls-primary">
                    <div class="value_prop_prev swiper-button-prev"></div>
                    <div class="swiper-pagination value_prop_pagination"></div>
                    <div class="value_prop_next swiper-button-next"></div>
                </div>
				</div>
			</div>
        </div>
    </div>
<script>
    jQuery(document).ready(function () {
        var swiperValueprop = new Swiper(".value_prop_swiper", {
            spaceBetween: 10,
			loop:true,
            autoplay: {
                delay: 5000,
                disableOnInteraction:true,
            },                
            pagination: {
                el: ".value_prop_pagination",
                clickable: true,
            }, 
			navigation: {
					nextEl: '.value_prop_next',
					prevEl: '.value_prop_prev',
				  },
				breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
    });
</script>

