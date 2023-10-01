<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li <?php wc_product_class( '', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	if ( !$product->is_type('simple') ) {
		$variations = $product->get_available_variations(); 
		$url = $_SERVER['QUERY_STRING'];
		$thumb = woocommerce_get_product_thumbnail('full');
		$var_img = false;
		parse_str($url, $array);
		if(count($array) > 0) {
			$colors = explode(',', $array['colors']);
			foreach($variations as $variation) {
				for($i = 0; $i < count($colors); $i++) {
					if($var_img == false && $colors[$i] == $variation['attributes']['attribute_pa_colors']) { ?>
						<img src="<?php echo $variation['image']['src']; ?>" alt="<?php echo $variation['image']['alt']; ?>">
					<?php 
						$var_img = true;
					}
				}
			}
			if($var_img == false) {
				echo $thumb; 
			}
		}else{ 
			if($thumb) {
				echo $thumb; 
				} else { ?>
					<img src="<?php echo $variations[0]['image']['src'];?>" alt="<?php echo $variations[0]['image']['alt'];?>">
				<?php } } ?>
	<?php } else {
		echo $thumb;
	}

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action( 'woocommerce_shop_loop_item_title' );

	$title = $product->get_title(); ?>
	<div class="info">
    <?php if (mb_strlen($title) > 44) {
        $title = mb_substr($title, 0, 44) . '...';
    } 
    echo '<h2 class="woocommerce-loop-product__title">'. $title . '</h2>';
	$short_description = $product->short_description;
	$desc = '';
	if($short_description) {
		$desc = $short_description;
	} else {
		$desc = $product->description;
	}
	if (mb_strlen($desc) > 80) {
		$desc = mb_substr($desc, 0, 80) . '...';
	} 
	echo '<div class="desc">' . $desc . '</div>'; ?>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
