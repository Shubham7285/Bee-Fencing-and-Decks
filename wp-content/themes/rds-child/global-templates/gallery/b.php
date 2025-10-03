<style type="text/css">
    .mySwiper-lightbox{
        visibility: hidden;
    }
    html {
        -webkit-user-select: none; /* Safari */
        -ms-user-select: none; /* IE 10 and IE 11 */
        user-select: none; /* Standard syntax */
    }
</style>
<?php
$settings = get_query_var('settings');
?>
<main>
                <div class="container-fluid px-0 rpx_pt_lg_45">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                    $get_rds_template_data_array = RDS_TEMPLATE_DATA;

                                    if (!empty($args["page_templates"]["gallery_page"]["content"])) {
                                        echo $args["page_templates"]["gallery_page"]["content"];
                                    }
                                    ?>
                                <div class="row" id="gallery-container">
                                    <?php 
                                    $gallery_images = [];
                                    if (!empty($settings['custom_gallery'])) {
                                        $gallery_images = $settings['custom_gallery'];
                                        foreach ($gallery_images as $index => $image) {
                                            ?>
                                            <div class="col-lg-4 col-sm-6 rpx_mb_30 lightbox cursor-pointer"
                                                 data-bs-toggle="modal"
                                                 data-bs-target="#GallerylightBox"
                                                 data-index="<?php echo $index; ?>">
                                                <div class="gallery_link">
                                                    <div class="rounded-0 position-relative">        
                                                        <img class="m-auto d-block w-100 h-auto img-border" src="<?php echo $image['url']; ?>" alt="">          
                                                        <div class="overlay position-absolute h-100 w-100 d-flex align-items-center justify-content-center">
                                                            <div class="text position-absolute text-center">
                                                                <i class="p-alt icon-magnifying-glass1 text_50 line_height_24 mx-auto"></i>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12">
							
                <div class="d-flex align-items-center justify-content-center">
                    <?php understrap_pagination([
                        "prev_text" => '<i class="icon-angles-left4"></i>',
                        "next_text" => '<i class="icon-angles-right4"></i>',
                    ]); ?>
                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                set_query_var('gallery_images', $gallery_images);
                get_template_part("page-templates/common/custom-gallery-popup"); 

                ?>
    <?php wp_reset_query(); ?>
</main>
<script>
jQuery(document).ready(function () {
    jQuery(".lightbox").click(function (e) {
        e.preventDefault();
        dataIndex = jQuery(this).data('index') || jQuery(this).index();
        
        // Initialize Swiper when modal is shown
        jQuery('#Gallerylightbox').on('shown.bs.modal', function () {
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
                on: {
                    init: function () {
                        jQuery(".mySwiper-lightbox").css("visibility", "visible");
                    }
                }
            });
        });
        
        // Destroy Swiper when modal is hidden
        jQuery('#Gallerylightbox').on('hidden.bs.modal', function () {
            if(gallerySwiper) {
                gallerySwiper.destroy();
            }
        });
        
        // Show the modal
        jQuery('#Gallerylightbox').modal('show');
    });
});
</script>