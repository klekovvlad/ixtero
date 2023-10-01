<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<div class="breadcrumbs">','</div>');
	}?>
	<div class="productpage-top">


		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>

		<?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?>
		
		<div class="productpage-items">

			<div class="productpage-info">
				<h2 class="info-title">Характеристики:</h2>
				<?php 
					$height = get_field('height');
					$coloring = get_field('coloring');
				?>
				
				<?php if($height) { ?>
					<div class="info-item">
						<div class="height">
							Высота: <span class="height-value"><?php echo $height;?></span>мм
						</div>
						<div class="height-icons"></div>
					</div>
				<?php } ?>

				<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action( 'woocommerce_single_product_summary' );
				?>

				<?php if($coloring) { ?>
					<div class="info-item">
						Покрас: <span title="<?php echo $coloring['label']?>" class="coloring-value coloring-value__<?php echo $coloring['value']?>"></span>
					</div>
				<?php } ?>

				<div class="info-excerpt">
					<div class="info-title">Описание:</div>
					<?php 
						$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt ); 
						if($short_description) {
							echo $short_description;
					} else {
						$desc = $product->description;
						if (strlen($desc) > 190) {
							$desc = mb_substr($desc, 0, 190) . '...';
						} 
						echo $desc;
					} ?>
				</div>

			</div>

			<div class="productpage-price">
				<div class="price-value">Цена: <?php echo '<span class="price-value-summ"></span>' . ' ' . get_woocommerce_currency_symbol() ;?> </div>
				<div class="price-desc">Товар продается кратно поддону по <?php echo $product->get_meta('_step_qty') ?> кв. м.</div>
			</div>

			<div class="productpage-buttons">
				<div class="input-quantity">
					<input type="text" class="quantity-custom" autocomplete="off">
					<div class="quantity-change" data-action="minus">-</div>
					<div class="quantity-change" data-action="plus">+</div>
				</div>

				<?php 
					$price = '';
					if($product->is_type('simple')) {
						$price = $product->price;
					}
				?>
				<div class="quantity-price" data-price="<?php echo $price;?>">

				</div>
				<button class="add-cart-custom">Купить</button>
			</div>
		</div>


	</div>

	<?php 
		$tags = $product->tag_ids;
		$gost = get_field('gost', $product->id);
		$life = get_field('life', $product->id);
		$documents = get_field('documents', $product->id);
		$size = get_field('size', $product->id);
		$chars = get_field('chars', $product->id);
		
		function woocustom_make($ids) {
			foreach($ids as $cat_id) {
				$cat = get_term_by( 'id', $cat_id, 'product_cat');
				if($cat->parent == 0) {
					$make = get_field('make', $cat);
					if($make) {
						return $make;
					}
				}
			}
			
		}

		$make = woocustom_make($product->category_ids);
	?>

	<div class="tab">
		<div class="productpage-nav tab-nav swiper">
			<div class="swiper-wrapper">
				<?php if($product->description) {?>
					<div class="tab-nav-item swiper-slide">
						Описание
						<img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/product-desc-1.svg" alt="icon" class="icon">
					</div>
				<?php } ?> 
				<?php if($chars) { ?>
					<div class="tab-nav-item swiper-slide">
						Характеристики
						<img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/product-desc-2.svg" alt="icon" class="icon">
					</div>
				<?php } ?>
				<?php if($tags) { ?>
					<div class="tab-nav-item swiper-slide">
						Преимущества
						<img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/product-desc-3.svg" alt="icon" class="icon">
					</div>
				<?php } ?>
				<?php if($make) { ?>
					<div class="tab-nav-item swiper-slide">
						Как изготавливается
						<img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/product-desc-4.svg" alt="icon" class="icon">
					</div>
				<?php } ?>
				<div class="tab-nav-item swiper-slide">
					Отзывы
					<img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/product-desc-5.svg" alt="icon" class="icon">
				</div>
				<?php if($documents) { ?>
					<div class="tab-nav-item swiper-slide">
						Полезные материалы
						<img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/product-desc-6.svg" alt="icon" class="icon">
					</div>
				<?php } ?>
			</div>
		</div>

		<div class="tab-content">
			<?php if($product->description) { ?>
				<div class="tab-content-item">
					<div class="wrapper">
						<div class="text">
							<h2>Описание</h2>
							<p class="desc"><?php echo $product->description;?></p>
						</div>

						<div class="tags">
							<?php 

								if($tags) {
									foreach ($tags as $tag_id) { 
										$tag = get_term($tag_id)
										?>
										
										<div class="tag" data-desc="<?php echo strip_tags($tag->description); ?>">
											<img src="<?php echo get_field('icon', $tag) ?>" alt="<?php echo $tag->name; ?>">
										</div>

									<?php }
								}
								if($gost || $life) { ?>
									<div class="tags-wide">
										<?php if($life) { ?>
											<div class="tag-life">
												<div class="tag-value"><?php echo $life;?></div>
												<div class="tag-title">службы</div>
											</div>
										<?php }
										if($gost) { ?>
											<div class="tag-gost">
												<div class="tag-title">ГОСТ</div>
												<div class="tag-value"><?php echo $gost;?></div>
											</div>
										<? } ?> 

									</div>
								<? }
							?>


						</div>
					</div>
				</div>
			<?php } ?>
			
			<?php if($chars) { ?>
				<div class="tab-content-item">
					<h2>Характеристики</h2>

					<?php if($size) { ?>

						<div class="product-sizes">

							<?php foreach($size as $value) { ?>

								<div data-long="<?php echo $value['long'];?>" data-width="<?php echo $value['width'];?>" data-height="<?php echo $value['height'];?>"  class="product-size">
									<?php if($value['img']) { ?>
										<div class="product-size-img">
											<img src="<?php echo $value['img']['url'];?>" alt="<?php echo $value['img']['link'];?>">
										</div>
									<?php } ?>
									<div class="product-size-value">
										<div class="item"><?php echo $value['width'];?></div>
										<div class="item"><?php echo $value['long'];?></div>
										<div class="item"><?php echo $value['height'];?></div>
									</div>
								</div>

							<?php } ?>

						</div>

					<?php } ?>
					
					<div class="chars-items">
						<?php foreach($chars as $char) { ?>
							<div class="chars-item">
								<div class="title"><?php echo $char['title'];?></div>
								<div class="value"><?php echo $char['value'];?></div>
							</div>
						<?php } ?>
					</div>


				</div>
			<?php } ?>
			
			<?php if($tags) { ?>

				<div class="tab-content-item">
					<h2>Преимущества</h2>
					<div class="advantage-items">
						
						<?php foreach($tags as $tag_id) { 
							$tag = get_term($tag_id)
							?>
							
							<div class="advantage-item">
								<div class="advantage-icon"><img src="<?php echo get_field('icon', $tag) ?>" alt="<?php echo $tag->name; ?>"></div>
								<div class="advantage-text"><?php echo $tag->description; ?></div>
							</div>
						<?php } ?>

					</div>
				</div>

			<?php } ?>

			<?php if($make) { ?>
				<div class="tab-content-item">
					<h2>Как изготавливается</h2>
					<?php if($make['desc']) { ?>
						<div class="make-desc"><?php echo $make['desc']; ?></div>
					<?php }
					if($make['list']) { ?>
						<div class="make-list box-list">
							<div class="desc">
								<?php echo $make['list']; ?>
							</div>
						</div>
					<?php } ?>
					<?php if($make['imgs']) { ?>
						<div class="make-imgs">
							<?php foreach ($make['imgs'] as $img) { 
								?>
								<img src="<?php echo $img['img']['url'];?>" alt="<?php echo $img['img']['alt'];?>" class="make-img">
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>

			<div class="tab-content-item">
				<h2>Отзывы</h2>
				<?php comments_template();?>
			</div>
			
			<?php if($documents) { ?>
				<div class="tab-content-item">
					<h2>Полезные материалы</h2>

					<div class="doc-items">

						<?php foreach($documents as $document) { ?>
							
							<div class="doc-item">
								<?php if($document['img']) { ?>
									<img src="<?php echo $document['img']['url']; ?>" alt="<?php echo $document['img']['alt']; ?>" class="doc-img">
								<?php } ?>
								<div class="doc-content">
									<div class="doc-title"><?php echo $document['title']; ?></div>
									<a class="download-link" href="<?php echo $document['doc'];?>">Скачать</a>
								</div>
							</div>

						<?php } ?>

					</div>


				</div>
			<?php } ?>

		</div>
	</div>

	<a href="/shop" class="more more-doublesquare more-doublesquare__big">Назад в каталог</a>
	

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

<script src="https://api-maps.yandex.ru/2.1/?apikey=503200f3-2559-4ceb-9d10-43db7a56e0a1&lang=ru_RU" type="text/javascript"></script>

<div class="map-title">Наши представительства</div>
<div class="productpage-map" id="map">
	<div class="map-block">
		<h2 class="title">Наши представительства</h2>
		<a href="/buy" class="more more-doublesquare">Где купить?</a>
	</div>
</div>
<a href="/buy" class="more more-doublesquare map-link">Где купить?</a>