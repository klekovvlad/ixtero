<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>

	<div class="productpage-rating">
		<div class="productpage-stars">
			<?php 
				$index = 0;
				while($index < $average) { ?>
					<div class="productpage-star"></div>
					
			<?php $index++; } ?>
		</div>
		<?php if ( comments_open() ) : ?>
			<?php //phpcs:disable ?>
			<a href="#reviews" class="productpage-review" rel="nofollow">
				<?php 
					$text = 'отзыва';
					if($review_count === 1) {
						$text = 'отзыв';
					}else if($review_count >= 5) {
						$text = 'отзывов';
					}
					echo $review_count . ' ' . $text;
				?>
			</a>
			<?php // phpcs:enable ?>
		<?php endif ?>
	</div>

<?php endif; ?>
