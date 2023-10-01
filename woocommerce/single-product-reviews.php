<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div class="comments" id="comments">

			<div class="comments-wrapper">
				<div class="comment-rating">
					<?php woocommerce_template_single_rating() ?>
				</div>
				<div class="comments-form">
					<button class="comments-open">Оставить отзыв</button>
					<form action="/wp-comments-post.php" method="post" id="commentform" class="comment-form">
						<div class="comment-rating">
							<div class="input-rating">
								<input type="radio" name="rating" id="rating-1" value="1">
								<label class="comment-star" for="rating-1" data-rating="1"></label>
							</div>
							<div class="input-rating">
								<input type="radio" name="rating" id="rating-2" value="2">
								<label class="comment-star" for="rating-2" data-rating="2"></label>
							</div>
							<div class="input-rating">
								<input type="radio" name="rating" id="rating-3" value="3">
								<label class="comment-star" for="rating-3" data-rating="3"></label>
							</div>
							<div class="input-rating">
								<input type="radio" name="rating" id="rating-4" value="4">
								<label class="comment-star" for="rating-4" data-rating="4"></label>
							</div>
							<div class="input-rating">
								<input type="radio" name="rating" id="rating-5" value="5">
								<label class="comment-star" for="rating-5" data-rating="5"></label>
							</div>
						</div>
						<div class="input-author">
							<input id="author" name="author" type="text" value="" size="30" required="" placeholder="Имя">
							<input id="email" name="email" type="email" value="" size="30" required="" placeholder="Email">
						</div>
						<div class="input-comment">
							<textarea id="comment" name="comment" cols="45" rows="8" required="" placeholder="Текст отзыва"></textarea>
						</div>
						<div class="form-submit">
							<button name="submit" type="submit" id="submit" class="more more-doublesquare more-doublesquare__black">Отправить</button> 
							<input type="hidden" name="comment_post_ID" value="<?php echo $product->id ?>" id="comment_post_ID">
							<input type="hidden" name="comment_parent" id="comment_parent" value="0">
						</div>
					</form>
				</div>
			</div>


		<?php if ( have_comments() ) : ?>
			
			<div class="comments-items">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</div>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
							'next_text' => is_rtl() ? '&larr;' : '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>
		<?php endif; ?>
	</div>

	<div class="clear"></div>
</div>
