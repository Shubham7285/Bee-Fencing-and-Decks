<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */
// Exit if accessed directly.
defined("ABSPATH") || exit();
$gallery_img = get_post_meta(get_the_ID(), "gallery_images", true);
$gallery_img_arr = json_decode($gallery_img);
$alt = "";
?>
<div class="col-lg-4 col-sm-6 rpx_mb_30 lightbox cursor-pointer" data-bs-toggle="modal" data-bs-target="#Gallerylightbox">
    <div class="gallery_link ">
        <div class="rounded-0 position-relative" >        
            <img class="d-block w-100 h-auto" src="<?php echo $gallery_img_arr[0]
            	->image; ?>"   alt="<?php echo $alt; ?>">          
            <div class="overlay position-absolute h-100 w-100 d-none d-lg-flex align-items-center justify-content-center">
                <div class="text position-absolute text-center">
                    <i class="icon-magnifying-glass1 text_50 line_height_24 mx-auto true_white "></i>
                </div>
            </div>  
        </div>
    </div>
    <div class="row rpx_pt_25 d-none">
        <div class="col-8"><h3 class="mb-0"><?php //echo get_the_title(); ?></h3></div>
        <div class="col-4 text-end  "><i class="bc_line_height_24 text_16 icon-arrow-right1 ms-1 color_primary position-relative"></i></div>
	</div>
</div>