<?php
//exaple how to set image sizewise
// ['dektop', 'ipad', 'mobile']
$img1x = [get_exist_image_url("custom-form", "custom-form-subpage-bg"), get_exist_image_url("custom-form", "custom-form-subpage-bg"), get_exist_image_url("custom-form", "m-custom-form-subpage-bg-complet")];
$img2x = [get_exist_image_url("custom-form", "custom-form-subpage-bg@2x"), get_exist_image_url("custom-form", "custom-form-subpage-bg@2x"), get_exist_image_url("custom-form", "m-custom-form-subpage-bg-complet@2x")];
$img3x = [get_exist_image_url("custom-form", "custom-form-subpage-bg@3x"), get_exist_image_url("custom-form", "custom-form-subpage-bg@3x"), get_exist_image_url("custom-form", "m-custom-form-subpage-bg-complet@3x")];
$img1x = Implode(",", $img1x);
$img2x = Implode(",", $img2x);
$img3x = Implode(",", $img3x);

echo do_shortcode('[custom-bg-srcset class="sidebar-form-bg" img1x="' . $img1x . '" img2x="' . $img2x . '" img3x="' . $img3x . '" size1x="cover" size2x="cover" size3x="cover" position="center center" md_position="center center" m_position="top center"]');
?>
<div class="sidebar">
    <div class="rpx_p_20 rpx_p_xl_30 d-lg-block d-none border_form border_form_light order-lg-1 order-1 color_secondary_bg sidebar-form-bg">
        <?php if (!empty($args["page_templates"]["service_subpage"]["sidebar"]["request_service"]["heading"])): ?>
			<h3 class="rpx_mb_25 h3-alt text-center"><?php echo $args["page_templates"]["service_subpage"]["sidebar"]["request_service"]["heading"]; ?></h3>
        <?php endif; ?>
        
        <?php if (!empty($args["page_templates"]["service_subpage"]["sidebar"]["request_service"]["subheading"])): ?>
            <span class="d-block pb-lg-4 p-alt text-center font_default text_bold text_normal text_26 line_height_31">
                <?php echo $args["page_templates"]["service_subpage"]["sidebar"]["request_service"]["subheading"]; ?>
            </span>
        <?php endif; ?>
        
        <?php
        $form_id = !empty($args["page_templates"]["service_subpage"]["sidebar"]["request_service"]["gravity_form_id"]) ? $args["page_templates"]["service_subpage"]["sidebar"]["request_service"]["gravity_form_id"] : '';
        if ($form_id) {
            echo do_shortcode("[gravityforms id=" . $form_id . " ajax=true]");
        }
        ?>
    </div>
</div>
