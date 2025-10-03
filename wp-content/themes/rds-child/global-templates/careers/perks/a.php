<div class="container-fluid px-0 rpx_py_40 rpx_pt_lg_80 rpx_pb_lg_38">
    <div class="container">
        <div class="swiper carrer_icon_swiper">
            <div class="swiper-wrapper flex-lg-wrap rpx_mb_40 rpx_mb_lg_0">
                <?php
                // Check if $iconItems is an array and not empty
                if (!empty($args["page_templates"]["career_page"]["perks"]["items"]) && is_array($args["page_templates"]["career_page"]["perks"]["items"])) {
                    $iconItems = $args["page_templates"]["career_page"]["perks"]["items"];
                    foreach ($iconItems as $value) {
                        // Check if the necessary keys exist and are not empty
                        $icon = !empty($value["icon"]) ? esc_attr($value["icon"]) : '';
                        $heading = !empty($value["heading"]) ? esc_html($value["heading"]) : '';
                        $description = !empty($value["description"]) ? esc_html($value["description"]) : '';

                        // Output the HTML
                        echo '<div class="swiper-slide col-lg-4 rpx_pr_lg_40 text-lg-start text-center pe-lg-4 rpx_mb_lg_42">
                            <div class="d-flex align-items-start justify-content-lg-start justify-content-center rpx_gap_20">
                                <div class="carrer_icon_inner mw-50 mh-50 text-center">
                                    <i class="' . $icon . ' color_secondary"></i>
                                </div>
                                <div class="carrer_title text-start">
                                    <h3 class="rpx_mb_10">' . $heading . '</h3>
                                    <p class="mb-0">' . $description . '</p>
                                </div>
                            </div>
                        </div>';
                    }
                }
                ?>
            </div>
        </div>
		<div class="position-relative d-flex justify-content-center align-items-center rpx_mb_30">
                    <div class="swiper-button-prev-carrer swiper-button-prev"></div>
                    <div class="swiper-pagination carrer-pagination"></div>
                    <div class="swiper-button-next-carrer swiper-button-next"></div>
                </div> 
        <div class="swiper-pagination carrer_pagination position-relative d-lg-none"></div>
    </div>
</div>

<script>
jQuery(document).ready(function(){
    var swiperIconA = new Swiper(".carrer_icon_swiper", {
		slidesPerView: 1,
        spaceBetween: 10,
		loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
          },
	pagination: {
							el: ".carrer-pagination",
							clickable: true
		}, 
						  navigation: {
							nextEl: '.swiper-button-next-carrer',
							prevEl: '.swiper-button-prev-carrer',
	},
        breakpoints: {
          640: {
            slidesPerView: 1,
            spaceBetween: 10,
            noSwiping: false,
            autoHeight:true,
          },
          768: {
            slidesPerView: 1,
            spaceBetween: 10,
            noSwiping: false,
          },
          992: {
            slidesPerView: 6,
            spaceBetween: 0,
            noSwiping: true,
          },
        },
    });
});
</script>
