<?php
/**
 * Single Gallery Template for bc_galleries post type
 */

get_header(); ?>
<main>
	<?php get_template_part(
    	"global-templates/subpage-hero/service-subpage/custom-service-subpage-hero-b"
    ); ?>
    <div class="w-100 d-block">
            <div class="d-block">
                <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 ">
                                <h1 class="rpx_mb_50"><?php the_title(); ?></h1>                                
                                <?php
                                $gallery_img = get_post_meta(get_the_ID(), "gallery_images", true);
                                $gallery_img_arr = json_decode($gallery_img);
                                
                                if ($gallery_img_arr && count($gallery_img_arr) > 0) : ?>
                                <div class="row gallery-grid">
                                    <?php foreach ($gallery_img_arr as $index => $image) : 
                                        $alt = !empty($image->alt) ? $image->alt : get_the_title();
                                    ?>
									<div class="col-lg-4 col-sm-6 rpx_mb_30 lightbox cursor-pointer" data-bs-toggle="modal" data-bs-target="#Gallerylightbox" data-index="<?php echo $index; ?>">
										<div class="gallery_link ">
											<div class="rounded-0 position-relative" >        
												<img class="d-block w-100 h-auto" src="<?php echo esc_url($image->image); ?>"   alt="<?php echo esc_attr($alt); ?>">          
												<div class="overlay position-absolute h-100 w-100 d-none d-lg-flex align-items-center justify-content-center">
													<div class="text position-absolute text-center">
														<i class="icon-magnifying-glass1 text_50 line_height_24 mx-auto true_white "></i>
													</div>
												</div>  
											</div>
										</div>
									</div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Custom Popup for Single Gallery -->
<div class="modal gallery-lightbox" id="Gallerylightbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog gallery-modal border-0 m-0 modal-dialog-centered " role="document">
        <div class="modal-content  border-0 text-center bg-transparent ">
            <div class="modal-body border-0 bg-transparent text-center p-0 h-100 ">
                <div class="swiper mySwiper-lightbox  h-100 ">
                    <div class="swiper-wrapper ">
                         <?php 
                                        if ($gallery_img_arr && count($gallery_img_arr) > 0) :
                                            foreach ($gallery_img_arr as $image) : 
                                                $alt = !empty($image->alt) ? $image->alt : get_the_title();
                                        ?>
																			   
                                <div class="swiper-slide abc gallery-lightbox-popup">
                                 <div class="img-popup-outer position-relative">
								 <button type="button" class="close m-0 bg-transparent p-0  true_white mr-n0 border-0" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="true_white icon-xmark1 text_30 line_height_26"></i>
                                   </button>
									<img class="img-fluid mx-auto radius_16 img-popup" src="<?php echo esc_url($image->thumbnail); ?>"  alt="<?php echo esc_attr($alt); ?>">                        
                                  <div class="swiper-button-next swiper-button-next-lightbox-gallery color_secondary_bg">
                                   </div>
                                   <div class="swiper-button-prev swiper-button-prev-lightbox-gallery color_secondary_bg">
								   </div>
                                    </div>
                                </div>
                                        <?php 
                                            endforeach;
                                        endif; 
                             ?>
                         
                    </div>
                    
                </div>  
                
            </div>
        </div>
    </div>
</div>

                
            </div>
			<?php echo do_shortcode('[elementor-template id="38959"]'); ?>
			<?php echo do_shortcode('[elementor-template id="32406"]'); ?>
    </div>
</main>

<script>
    jQuery(document).ready(function () {
        var gallerySwiper;
        
        jQuery(".lightbox").click(function () {
            var dataIndex = jQuery(this).data('index');
            
            // Initialize or update Swiper
            if (gallerySwiper) {
                gallerySwiper.slideTo(dataIndex, 0);
            } else {
                gallerySwiper = new Swiper('.mySwiper-lightbox', {
                    grabCursor: true,
                    observer: true,
                    observeParents: true,
                    navigation: {
                        nextEl: ".swiper-button-next-lightbox-gallery",
                        prevEl: ".swiper-button-prev-lightbox-gallery",
                    },
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    initialSlide: dataIndex,
                    slideToClickedSlide: false,
                    on: {
                        init: function () {
                            jQuery(".mySwiper-lightbox").css("visibility", "visible");
                        },
                        beforeDestroy: function () {
                            jQuery(".mySwiper-lightbox").css("visibility", "hidden");
                        }
                    }
                });
            }
        });
        
        jQuery("#Gallerylightbox").on('hide.bs.modal', function () {
            if (gallerySwiper) {
                gallerySwiper.destroy();
                gallerySwiper = null;
            }
        });
    });
</script>

<?php get_footer(); ?>