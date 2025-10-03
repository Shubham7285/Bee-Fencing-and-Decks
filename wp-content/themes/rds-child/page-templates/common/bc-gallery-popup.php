<div class="modal gallery-lightbox" id="Gallerylightbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog gallery-modal border-0 m-0 modal-dialog-centered " role="document">
        <div class="modal-content  border-0 text-center bg-transparent ">
            <div class="modal-body border-0 bg-transparent text-center p-0 h-100 ">
                <div class="swiper mySwiper-lightbox  h-100 ">
                    <div class="swiper-wrapper ">
                        <?php
						$get_rds_template_data_array = RDS_TEMPLATE_DATA;
						$cat = isset($_GET["cat"]) ? $_GET["cat"] : "";
						$query_args = [
							"posts_per_page" => -1,
							"post_type" => "bc_galleries",
						];
						if ($cat) {
							$query_posts["tax_query"] = [
								[
									"taxonomy" => "bc_gallery_category",
									"field" => "slug",
									"terms" => $cat,
								],
							];
						}
						$query = new WP_Query($query_args);
                        if ($query->have_posts()):
                        	while ($query->have_posts()):

                        		$query->the_post();
                        		$gallery_img = get_post_meta(
                        			get_the_ID(),
                        			"gallery_images",
                        			true
                        		);
                        		$gallery_img_arr = json_decode($gallery_img);
                        		$alt = "";
                        		?>
                                <?php foreach ($gallery_img_arr as $image) : ?>
																			   
                                <div class="swiper-slide abc gallery-lightbox-popup">
                                 <div class="img-popup-outer position-relative">
								 <button type="button" class="close m-0 bg-transparent p-0  true_white mr-n0 border-0" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="true_white icon-xmark1 text_30 line_height_26"></i>
                                   </button>
									<img class="img-fluid mx-auto radius_16 img-popup" src="<?php echo $gallery_img_arr[0]->thumbnail; ?>"  alt="<?php echo $alt; ?>">                        
                                  <div class="swiper-button-next swiper-button-next-lightbox-gallery color_secondary_bg">
                                   </div>
                                   <div class="swiper-button-prev swiper-button-prev-lightbox-gallery color_secondary_bg">
								   </div>
                                    </div>
                                </div>
							<?php endforeach; ?>
                                <?php
                        	endwhile;
                        	wp_reset_postdata();
                        endif;
                        ?>
                         
                    </div>
                    
                </div>  
                
            </div>
        </div>
    </div>
</div>
