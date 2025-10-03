<?php
//exaple how to set image sizewise
// ['dektop', 'ipad', 'mobile']

$img1x = [
	get_exist_image_url("service-block", "service-block-bg"),
	get_exist_image_url("service-block", "service-block-bg"),
	get_exist_image_url("service-block", "m-service-block-bg"),
];
$img2x = [
	get_exist_image_url("service-block", "service-block-bg@2x"),
	get_exist_image_url("service-block", "service-block-bg@2x"),
	get_exist_image_url("service-block", "m-service-block-bg@2x"),
];
$img3x = [
	get_exist_image_url("service-block", "service-block-bg@3x"),
	get_exist_image_url("service-block", "service-block-bg@3x"),
	get_exist_image_url("service-block", "m-service-block-bg@3x"),
];
$img1x = Implode(",", $img1x);
$img2x = Implode(",", $img2x);
$img3x = Implode(",", $img3x);
echo do_shortcode(
	'[custom-bg-srcset class="services_section" img1x="' .$img1x .'" img2x="'.$img2x .'" img3x="'.$img3x .'" size1x="cover" size2x="cover" size3x="cover" position="top center" md_position="top center" m_position="top center"]'
); 
$heading  = $args['globals']['services']['heading'];
?>


<div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 color_primary_bg services_section">
 <div class="container rpx_px_0">
	 <?php if($heading){ ?>
 <h2 class="rpx_mb_0 rpx_mb_lg_20 text-center color_secondary"><?php echo $heading; ?></h2>
	  <?php } ?>
 
 
 				<div class="swiper services_prop_swiper rpx_px_20 rpx_pt_20 ">
				 <!-- Additional required wrapper -->
			<div class="swiper-wrapper rpx_mb_20 rpx_mb_lg_40">
                   <?php
            $servicesItems = $args['globals']['services']['items'];
			
            $titleLengths = [];
            
            foreach ($servicesItems as $item) {
                if (isset($item['title'])) {
                    $title = $item['title'];
                    $titleLengths[] = strlen($title);
                }
				
						
			}	
           
            
            foreach ($servicesItems as $key => $services): 	 		
          ?>
                            <div class="swiper-slide h-auto text-start true_white_bg rpx_radius_10 rpx_p_30 rpx_small_shadow">
                                <div class="services-prop-items">
								
                                        <div class="rpx_mb_20 rpx_py_2 rpx_py_lg_0 d-flex flex-row align-items-center justify-content-between"><h5 class="color_secondary mb-0"><?php echo $services['title']; ?></h5><i class="<?php echo $services['icon']; ?> text_50 line_height_57 color_primary"></i></div>
										<p class="mb-0"><?php echo $services['description']; ?></p>
                                </div>
                            </div>
                         <?php endforeach; ?>
						  </div>
					<div class="position-relative d-flex justify-content-center align-items-center">
                    <div class="services_prop_prev swiper-button-prev"></div>
                    <div class="swiper-pagination services_prop_pagination"></div>
                    <div class="services_prop_next swiper-button-next"></div>
                </div>
				</div>
    </div>
</div>
<script>
    jQuery(document).ready(function () {
        var swiperservicesprop = new Swiper(".services_prop_swiper", {
            spaceBetween: 40,
			loop:true,
            autoplay: {
                delay: 5000,
                disableOnInteraction:true,
            },                
            pagination: {
                el: ".services_prop_pagination",
                clickable: true,
            }, 
			navigation: {
					nextEl: '.services_prop_next',
					prevEl: '.services_prop_prev',
				  },
				breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
            },
        });
    });
</script>
