<div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80 color_secondary_bg finance_page_form ">
    <div class="container">
        <div class="row">
            <div class="col-12 free_estimate_form">
                    <?php if (!empty($args["page_templates"]["finance_page"]["gravity_form_heading"])): ?>
                        <h4 class="rpx_mb_25 text-center true_white"><?php echo $args["page_templates"]["finance_page"]["gravity_form_heading"]; ?></h4>
                    <?php endif; ?>
                <?php if (!empty($args["page_templates"]["finance_page"]["gravity_form_id"])): ?>
                    <?php
                    $form_id = $args["page_templates"]["finance_page"]["gravity_form_id"];
                    echo do_shortcode("[gravityforms id=" . $form_id . " ajax=true]");
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
