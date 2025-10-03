<div class="container-fluid bg-white px-0 rpx_py_40 rpx_py_lg_80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="img_section rpx_mb_30 rpx_mb_lg_0 ext-center">
                    <?php
                    $financing_placeholder_image = get_exist_image_url(
                        "financing-page",
                        "financing-img"
                    );
                    $financing_placeholder_image2x = get_exist_image_url(
                        "financing-page",
                        "financing-img@2x"
                    );
                    $financing_placeholder_image3x = get_exist_image_url(
                        "financing-page",
                        "financing-img@3x"
                    );
                    if (@getimagesize($financing_placeholder_image) == false) {
                        $financing_placeholder_image = get_exist_image_url(
                            "",
                            "finance-placeholder"
                        );
                        $financing_placeholder_image2x = get_exist_image_url(
                            "",
                            "finance-placeholder@2x"
                        );
                        $financing_placeholder_image3x = get_exist_image_url(
                            "",
                            "finance-placeholder@3x"
                        );
                    }
                    ?>
                    <img src="<?php echo $financing_placeholder_image; ?>" srcset="<?php echo $financing_placeholder_image; ?> 1x, <?php echo $financing_placeholder_image2x; ?> 2x, <?php echo $financing_placeholder_image3x; ?> 3x" alt="placeholder Image" class="img-fluid" width="540" height="540" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="">
                    <?php if (!empty($args["page_templates"]["finance_page"]["company_services"]["heading"])): ?>
                        <h4 class=""><?php echo $args["page_templates"]["finance_page"]["company_services"]["heading"]; ?></h4>
                    <?php endif; ?>
                    
                    <?php if (!empty($args["page_templates"]["finance_page"]["company_services"]["subheading"])): ?>
                        <h2 class="mb-lg-0 pb-lg-5"><?php echo $args["page_templates"]["finance_page"]["company_services"]["subheading"]; ?></h2>
                    <?php endif; ?>
                    
                    <?php if (!empty($args["page_templates"]["finance_page"]["company_services"]["description_html_allowed"])): ?>
                        <?php echo $args["page_templates"]["finance_page"]["company_services"]["description_html_allowed"]; ?>
                    <?php endif; ?>
                    
                    <div class="">
                        <?php if (!empty($args["page_templates"]["finance_page"]["company_services"]["button_text"])): ?>
                            <a href="<?php echo $args["page_templates"]["finance_page"]["company_services"]["button_link"]; ?>" target="<?php echo $args["page_templates"]["finance_page"]["company_services"]["target"] == "true" ? "_blank" : "_self"; ?>" class="btn btn-secondary"><?php echo $args["page_templates"]["finance_page"]["company_services"]["button_text"]; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
