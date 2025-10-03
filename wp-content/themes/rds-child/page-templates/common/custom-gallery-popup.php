<div class="modal gallery-lightbox" id="Gallerylightbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog gallery-modal border-0 m-0 modal-dialog-centered " role="document">
        <div class="modal-content  border-0 text-center bg-transparent ">
            <div class="modal-body border-0 bg-transparent text-center p-0 h-100 ">
                <div class="swiper mySwiper-lightbox  h-100 ">
                    <div class="swiper-wrapper ">
                              <?php
                        $gallery_images = get_query_var('gallery_images');
                        
                        if (!empty($gallery_images)) {
                            foreach ($gallery_images as $index => $image) {
                                $alt = !empty($image['alt']) ? $image['alt'] : get_the_title();
                                ?>
																			   
                                <div class="swiper-slide abc gallery-lightbox-popup" data-index="<?php echo $index; ?>">
                                 <div class="img-popup-outer position-relative">
								 <button type="button" class="close m-0 bg-transparent p-0  true_white mr-n0 border-0" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="true_white icon-xmark1 text_30 line_height_26"></i>
                                   </button>
									<img class="img-fluid mx-auto radius_16 img-popup" src="<?php echo $image['url']; ?>"  alt="<?php echo $alt; ?>">                        
                                  <div class="swiper-button-next swiper-button-next-lightbox-gallery color_secondary_bg">
                                   </div>
                                   <div class="swiper-button-prev swiper-button-prev-lightbox-gallery color_secondary_bg">
								   </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                         
                    </div>
                    
                </div>  
                
            </div>
        </div>
    </div>
</div>
