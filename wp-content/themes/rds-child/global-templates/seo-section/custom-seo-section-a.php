<?php
$template_id = get_current_elementor_template_id();
if ($template_id == 41084) {
?>
<div class="d-block">
    <div class="container-fluid pt-5 pt-lg-2 text-center">
        <div class="container pt-lg-2 py-2">
            <div class="row align-items-center py-lg-2">
                <div class="col-lg-12 px-0 bc_homepage text-center">
                    <?php if (!empty($args["page_templates"]["history_page"]["seo_section"]["heading"])): ?>
                        <h1><?php echo $args["page_templates"]["history_page"]["seo_section"]["heading"]; ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["history_page"]["seo_section"]["subheading"])): ?>
                        <h2 class="pb-lg-5"><?php echo $args["page_templates"]["history_page"]["seo_section"]["subheading"]; ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["history_page"]["seo_section"]["before_read_more_content"])): ?>
                        <p><?php echo $args["page_templates"]["history_page"]["seo_section"]["before_read_more_content"]; ?></p>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["history_page"]["seo_section"]["after_read_more_content"])): ?>
                        <div class="collapse bg-transparent border-0" id="read_more">
                            <div class="card card-body bg-transparent border-0">
                                <p><?php echo $args["page_templates"]["history_page"]["seo_section"]["after_read_more_content"]; ?></p>
                            </div>
                        </div>
                        <?php echo do_shortcode('[bc-read-more id="read_more" background-color="" data-close-icon="icon-minus1" data-open-icon="icon-plus1"]'); ?>
                    <?php endif; ?>                
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}elseif($template_id == 39478) {
?>
<div class="d-block home-seo-section true_black_bg">
    <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 bc_homepage last-child-content">
                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["heading"])): ?>
                        <h1 class="true_white rpx_mb_20 rpx_mb_lg_40 text-center"><?php echo $args["page_templates"]["homepage"]["seo_section"]["heading"]; ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["subheading"])): ?>
                        <h2 class="true_white rpx_mb_30 text-center"><?php echo $args["page_templates"]["homepage"]["seo_section"]["subheading"]; ?></h2>
                    <?php endif; ?>
					<div class="mw-lg-496 mh-3 mw-md-169 w-100 mx-auto rpx_my_20 rpx_my_lg_40 color_primary_bg">
					</div>
		<div class="content_white">
                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["before_read_more_content"])): ?>
                        <?php echo $args["page_templates"]["homepage"]["seo_section"]["before_read_more_content"]; ?>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["after_read_more_content"])): ?>
                        <div class="collapse bg-transparent border-0 p-0" id="read_more">
                            <div class="card card-body bg-transparent border-0 p-0 last-child-content">
                                <?php echo $args["page_templates"]["homepage"]["seo_section"]["after_read_more_content"]; ?>
                            </div>
                        </div>
                        <?php echo do_shortcode('[bc-read-more id="read_more" background-color="" data-close-icon="icon-minus1" data-open-icon="icon-plus1"]'); ?>
                    <?php endif; ?>                
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}elseif($template_id == 40844) {
?>
 
<div class="d-block home-seo-section financing-seo-section">
    <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 bc_homepage">
                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["heading"])): ?>
                        <h1 class="rpx_mb_20 rpx_mb_lg_40 text-center"><?php echo $args["page_templates"]["homepage"]["seo_section"]["heading"]; ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["subheading"])): ?>
                        <h2 class="rpx_mb_30 text-center"><?php echo $args["page_templates"]["homepage"]["seo_section"]["subheading"]; ?></h2>
                    <?php endif; ?>
					<div class="mw-lg-496 mh-3 mw-md-169 w-100 mx-auto rpx_my_20 rpx_my_lg_40 color_primary_bg">
					</div>
		<div class="">
                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["before_read_more_content"])): ?>
                        <?php echo $args["page_templates"]["homepage"]["seo_section"]["before_read_more_content"]; ?>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["after_read_more_content"])): ?>
                        <div class="collapse bg-transparent border-0 p-0" id="read_more">
                            <div class="card card-body bg-transparent border-0 p-0">
                                <?php echo $args["page_templates"]["homepage"]["seo_section"]["after_read_more_content"]; ?>
                            </div>
                        </div>
                        <?php echo do_shortcode('[bc-read-more id="read_more" background-color="" data-close-icon="icon-minus1" data-open-icon="icon-plus1"]'); ?>
                    <?php endif; ?>                
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}elseif($template_id == 40758) {
?>
<div class="d-block home-seo-section">
    <div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 bc_homepage last-child-content">
                    <?php if (!empty($args["page_templates"]["about_us_page"]["seo_section"]["heading"])): ?>
                        <h1 class="rpx_mb_20 rpx_mb_lg_40 text-center"><?php echo $args["page_templates"]["about_us_page"]["seo_section"]["heading"]; ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["about_us_page"]["seo_section"]["subheading"])): ?>
                        <h2 class="rpx_mb_30 text-center"><?php echo $args["page_templates"]["about_us_page"]["seo_section"]["subheading"]; ?></h2>
                    <?php endif; ?>
					<div class="mw-lg-496 mh-3 mw-md-169 w-100 mx-auto rpx_my_20 rpx_my_lg_40 color_primary_bg">
					</div>
                    <?php if (!empty($args["page_templates"]["about_us_page"]["seo_section"]["before_read_more_content"])): ?>
                        <?php echo $args["page_templates"]["about_us_page"]["seo_section"]["before_read_more_content"]; ?>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["about_us_page"]["seo_section"]["after_read_more_content"])): ?>
                        <div class="collapse bg-transparent border-0 p-0" id="read_more">
                            <div class="card card-body bg-transparent border-0 p-0 last-child-content">
                                <?php echo $args["page_templates"]["about_us_page"]["seo_section"]["after_read_more_content"]; ?>
                            </div>
                        </div>
                        <?php echo do_shortcode('[bc-read-more id="read_more" background-color="" data-close-icon="icon-minus1" data-open-icon="icon-plus1"]'); ?>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}elseif($template_id == 40930) {
?>
<div class="d-block">
    <div class="container-fluid pt-5 pt-lg-2 text-center">
        <div class="container pt-lg-2 py-2">
            <div class="row align-items-center py-lg-2">
                <div class="col-lg-12 px-0 bc_homepage text-center">
                    <?php if (!empty($args["page_templates"]["landing_page"]["seo_section"]["heading"])): ?>
                        <h1><?php echo $args["page_templates"]["landing_page"]["seo_section"]["heading"]; ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["landing_page"]["seo_section"]["subheading"])): ?>
                        <h2 class="pb-lg-5"><?php echo $args["page_templates"]["landing_page"]["seo_section"]["subheading"]; ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["landing_page"]["seo_section"]["before_read_more_content"])): ?>
                        <p><?php echo $args["page_templates"]["landing_page"]["seo_section"]["before_read_more_content"]; ?></p>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["landing_page"]["seo_section"]["after_read_more_content"])): ?>
                        <div class="collapse bg-transparent border-0" id="read_more">
                            <div class="card card-body bg-transparent border-0">
                                <p><?php echo $args["page_templates"]["landing_page"]["seo_section"]["after_read_more_content"]; ?></p>
                            </div>
                        </div>
                        <?php echo do_shortcode('[bc-read-more id="read_more" background-color="" data-close-icon="icon-minus1" data-open-icon="icon-plus1"]'); ?>
                    <?php endif; ?>                
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}elseif ($template_id == 60786) {
?>
<div class="d-block">
    <div class="container-fluid pt-5 pt-lg-2 text-center">
        <div class="container pt-lg-2 py-2">
            <div class="row align-items-center py-lg-2">
                <div class="col-lg-12 px-0 bc_homepage text-center">
                    <?php if (!empty($args["page_templates"]["landing_page"]["seo_section"]["heading"])): ?>
                        <h1><?php echo $args["page_templates"]["landing_page"]["seo_section"]["heading"]; ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["landing_page"]["seo_section"]["subheading"])): ?>
                        <h2 class="pb-lg-5"><?php echo $args["page_templates"]["landing_page"]["seo_section"]["subheading"]; ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["landing_page"]["seo_section"]["before_read_more_content"])): ?>
                        <p><?php echo $args["page_templates"]["landing_page"]["seo_section"]["before_read_more_content"]; ?></p>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["landing_page"]["seo_section"]["after_read_more_content"])): ?>
                        <div class="collapse bg-transparent border-0" id="read_more">
                            <div class="card card-body bg-transparent border-0">
                                <p><?php echo $args["page_templates"]["landing_page"]["seo_section"]["after_read_more_content"]; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["landing_page"]["seo_section2"]["after_read_more_content"])): ?>
                        <?php echo do_shortcode('[bc-read-more id="read_more" background-color="" data-close-icon="icon-minus1" data-open-icon="icon-plus1"]'); ?>
                    <?php endif; ?>              
                </div>
            </div>
        </div>
    </div>
</div>

<?php
} else {
?>
<div class="d-block">
    <div class="container-fluid pt-5 pt-lg-2 text-center">
        <div class="container pt-lg-2 py-2">
            <div class="row align-items-center py-lg-2">
                <div class="col-lg-12 px-0 bc_homepage text-center">
                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["heading"])): ?>
                        <h1><?php echo $args["page_templates"]["homepage"]["seo_section"]["heading"]; ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["subheading"])): ?>
                        <h2 class="pb-lg-5"><?php echo $args["page_templates"]["homepage"]["seo_section"]["subheading"]; ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["before_read_more_content"])): ?>
                        <p><?php echo $args["page_templates"]["homepage"]["seo_section"]["before_read_more_content"]; ?></p>
                    <?php endif; ?>

                    <?php if (!empty($args["page_templates"]["homepage"]["seo_section"]["after_read_more_content"])): ?>
                        <div class="collapse bg-transparent border-0" id="read_more">
                            <div class="card card-body bg-transparent border-0">
                                <p><?php echo $args["page_templates"]["homepage"]["seo_section"]["after_read_more_content"]; ?></p>
                            </div>
                        </div>
                        <?php echo do_shortcode('[bc-read-more id="read_more" background-color="" data-close-icon="icon-minus1" data-open-icon="icon-plus1"]'); ?>
                    <?php endif; ?>                
                </div>
            </div>
        </div>
    </div>
                    </div>
<?php
}
?>
