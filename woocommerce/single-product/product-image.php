<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

	$img = $product->image_id;
	$gallery = $product->gallery_image_ids;


	if ( !$product->is_type('simple') ) {
		$variations = $product->get_available_variations();
	}

?>

<div class="productpage-gallery">
	<div class="productpage-imgs swiper">
		<div class="swiper-wrapper">
			
			<?php if($img) { ?>
				<div class="productpage-img swiper-slide">
					<?php echo wp_get_attachment_image( $img, 'full'); ?>
				</div>
			<?php } ?>
			
			<?php
			if($variations) {
				foreach($variations as $variation) { ?>
					<div class="productpage-img swiper-slide" data-variation="<?php echo $variation['variation_id'];?>">
						<img src="<?php echo $variation['image']['src'];?>" alt="<?php echo $variation['image']['alt'];?>">
					</div>
			<?php } } ?>
			
			<?php if($gallery) {
				foreach($gallery as $gallery_id) { ?>
				<div class="productpage-img swiper-slide">
					<?php echo wp_get_attachment_image( $gallery_id, 'full'); ?>
				</div>
			<?php } } ?>

		</div>
	</div>
	<div class="productpage-thumbs swiper">
		<div class="swiper-wrapper">

			<?php if($img) { ?>
				<div class="productpage-thumb swiper-slide">
					<?php echo wp_get_attachment_image( $img, 'full'); ?>
				</div>
			<?php } ?>

			<?php
			if($variations) {
				foreach($variations as $variation) { ?>
					<div class="productpage-thumb swiper-slide" data-variation="<?php echo $variation['variation_id'];?>">
						<img src="<?php echo $variation['image']['src'];?>" alt="<?php echo $variation['image']['alt'];?>">
					</div>
			<?php } } ?>

			<?php if($gallery) {
				foreach($gallery as $gallery_id) { ?>
				<div class="productpage-thumb swiper-slide">
					<?php echo wp_get_attachment_image( $gallery_id, 'full'); ?>
				</div>
			<?php } } ?>

		</div>
	</div>
</div>


