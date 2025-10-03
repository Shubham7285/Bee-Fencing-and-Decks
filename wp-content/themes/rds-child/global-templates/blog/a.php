<div class="row">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <div class="col-lg-4 col-md-6 rpx_mb_30">
                <a href="<?php echo esc_url(get_permalink()); ?>"  class="no_hover_underline no-underline card border-0 rounded-0 p-0 position-relative blogs h-100">
				<div class="blog_img_container rpx_mb_30">
                            <img src="<?php echo esc_url(post_content_first_image()); ?>" class="blog_img img-fluid w-100" alt="<?php echo esc_attr(get_the_title()); ?>" width="350" height="200">
                        </div>
                        <div class="card-body px-0 py-0">
                            <h5 class="rpx_mb_15 true_black"><?php echo esc_html(get_the_title()); ?></h5>
                            <p class="rpx_mb_15">
                                <?php
                                $my_content = wp_strip_all_tags(get_the_excerpt());
                                echo wp_trim_words($my_content, 25) . (!is_admin() ? "..." : "");
                                ?>
                            </p>
                        </div>
						  <div class="card-footer bg-transparent border-0 p-0">
						  <span class="no_hover_underline w-100 d-inline-flex align-items-center link_text_btn blog_read_more_text_color">
                                <span class="d-inline-block align-middle">Keep Reading</span><i class="align-middle icon-chevron-right2 position-relative"></i>
                            </span>
						   </div>
                    </a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <?php get_template_part("loop-templates/content", "none"); ?>
    <?php endif; ?>
</div>
