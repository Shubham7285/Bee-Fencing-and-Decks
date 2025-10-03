<div class="container-fluid px-0 rpx_py_40 rpx_py_lg_80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="rpx_mb_50"><?php the_title(); ?></h1>
                
                <?php if (!empty($args["page_templates"]["contact_page"]["content"])): ?>
                    <?php echo $args["page_templates"]["contact_page"]["content"]; ?>
                <?php endif; ?>
                
                <div class="contact-form">
                    <?php if (!empty($args["page_templates"]["contact_page"]["gravity_form_id"])): ?>
                        <?php
                        $form_id = $args["page_templates"]["contact_page"]["gravity_form_id"];
                        echo do_shortcode("[gravityforms id=" . $form_id . " ajax=true]");
                        ?>
                    <?php endif; ?>
                </div>
            </div>  
        </div>
    </div>
</div>
