<?php
//exaple how to set image sizewise
// ['dektop', 'ipad', 'mobile']
if(is_page(array(62164,62166)) || is_single(62334)) { //decks/ -- /gallery/decks/ -- /decks/custom/ page

$img1x = [
	get_exist_image_url("subpage-hero", "subpage-banner-decks-gallery"),
	get_exist_image_url("subpage-hero", "subpage-banner-decks-gallery"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-decks-gallery"),
];

$img2x = [
	get_exist_image_url("subpage-hero", "subpage-banner-decks-gallery@2x"),
	get_exist_image_url("subpage-hero", "subpage-banner-decks-gallery@2x"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-decks-gallery@2x"),
];

$img3x = [
	get_exist_image_url("subpage-hero", "subpage-banner-decks-gallery@3x"),
	get_exist_image_url("subpage-hero", "subpage-banner-decks-gallery@3x"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-decks-gallery@3x"),
];	

} elseif (is_page(array(62163)) || is_single(62336)) {  //fencing/wood/ -- /gallery/wood-fence/ page

$img1x = [
	get_exist_image_url("subpage-hero", "subpage-banner-wood-gallery"),
	get_exist_image_url("subpage-hero", "subpage-banner-wood-gallery"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-wood-gallery"),
];

$img2x = [
	get_exist_image_url("subpage-hero", "subpage-banner-wood-gallery@2x"),
	get_exist_image_url("subpage-hero", "subpage-banner-wood-gallery@2x"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-wood-gallery@2x"),
];

$img3x = [
	get_exist_image_url("subpage-hero", "subpage-banner-wood-gallery@3x"),
	get_exist_image_url("subpage-hero", "subpage-banner-wood-gallery@3x"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-wood-gallery@3x"),
];	
	
    
}elseif (is_page(array(62167)) || is_single(62331)) {  //fencing/aluminum/ -- /gallery/aluminum-fence/ page

$img1x = [
	get_exist_image_url("subpage-hero", "subpage-banner-aluminum-gallery"),
	get_exist_image_url("subpage-hero", "subpage-banner-aluminum-gallery"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-aluminum-gallery"),
];

$img2x = [
	get_exist_image_url("subpage-hero", "subpage-banner-aluminum-gallery@2x"),
	get_exist_image_url("subpage-hero", "subpage-banner-aluminum-gallery@2x"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-aluminum-gallery@2x"),
];

$img3x = [
	get_exist_image_url("subpage-hero", "subpage-banner-aluminum-gallery@3x"),
	get_exist_image_url("subpage-hero", "subpage-banner-aluminum-gallery@3x"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-aluminum-gallery@3x"),
];	
    
}elseif (is_page(array(62168)) || is_single(62333)) {  //fencing/chain-link/ -- /gallery/chain-link-fence/ page

$img1x = [
	get_exist_image_url("subpage-hero", "subpage-banner-chain-link-gallery"),
	get_exist_image_url("subpage-hero", "subpage-banner-chain-link-gallery"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-chain-link-gallery"),
];

$img2x = [
	get_exist_image_url("subpage-hero", "subpage-banner-chain-link-gallery@2x"),
	get_exist_image_url("subpage-hero", "subpage-banner-chain-link-gallery@2x"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-chain-link-gallery@2x"),
];

$img3x = [
	get_exist_image_url("subpage-hero", "subpage-banner-chain-link-gallery@3x"),
	get_exist_image_url("subpage-hero", "subpage-banner-chain-link-gallery@3x"),
	get_exist_image_url("subpage-hero", "m-subpage-banner-chain-link-gallery@3x"),
];	
	
    
}else{
$img1x = [
	get_exist_image_url("subpage-hero", "subpage-banner"),
	get_exist_image_url("subpage-hero", "subpage-banner"),
	get_exist_image_url("subpage-hero", "m-subpage-banner"),
];

$img2x = [
	get_exist_image_url("subpage-hero", "subpage-banner@2x"),
	get_exist_image_url("subpage-hero", "subpage-banner@2x"),
	get_exist_image_url("subpage-hero", "m-subpage-banner@2x"),
];

$img3x = [
	get_exist_image_url("subpage-hero", "subpage-banner@3x"),
	get_exist_image_url("subpage-hero", "subpage-banner@3x"),
	get_exist_image_url("subpage-hero", "m-subpage-banner@3x"),
];
}

$img1x = Implode(",", $img1x);
$img2x = Implode(",", $img2x);
$img3x = Implode(",", $img3x);
?>
 <?php echo do_shortcode(
 	'[custom-bg-srcset class="subpage_banner" img1x="' .
 		$img1x .
 		'" img2x="' .
 		$img2x .
 		'" img3x="' .
 		$img3x .
 		'" size1x="cover" size2x="cover" size3x="cover"]'
 ); ?>
<div class="container-fluid subpage_banner">
  
</div>