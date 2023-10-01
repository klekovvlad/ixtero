<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<div class="shoppage-titles">
	<?php if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<div class="breadcrumbs">','</div>');
	}?>
	<div class="section-titles">
		<h1>Каталог <strong>IXTERO</strong></h1>
	</div>
</div>

<div class="shoppage-wrapper">

<?php echo do_shortcode('[wcpf_filters id="658"]'); ?>

<div class="shoppage-content">
<?php if ( woocommerce_product_loop() ) {

/**
 * Hook: woocommerce_before_shop_loop.
 *
 * @hooked woocommerce_output_all_notices - 10
 * @hooked woocommerce_result_count - 20
 * @hooked woocommerce_catalog_ordering - 30
 */
do_action( 'woocommerce_before_shop_loop' ); ?>

<div class="categorys">
	<div class="categorypage-nav swiper">
		<div class="categorypage-nav-wrapper swiper-wrapper">

			<?php 

			$categorys = get_term_children(68, 'product_cat');
			$current_id = get_queried_object()->term_id; 

			

			if($current_id) { ?>

				<a class="categorypage-nav-item swiper-slide" href="/shop">
					Все
				</a>

			<?php } else { ?>

				<a class="categorypage-nav-item-active swiper-slide" href="/shop">
					Все
				</a>

			<?php } ?>

			<?php foreach($categorys as $category_id) { 

				$classList = "categorypage-nav-item";

				$term = get_term_by('id', $category_id, 'product_cat'); 
				
				if($term->term_id == $current_id) {
					$classList = "categorypage-nav-item-active";
				} ?>

				<a class="<?php echo $classList;?> swiper-slide" href="<?php echo get_category_link($term->term_id) ?>">
					<?php echo $term->name;?>
				</a>

			<?php } ?>
		</div>
	</div>
</div>

<?php woocommerce_product_loop_start();

if ( wc_get_loop_prop( 'total' ) ) {
	$index = 0;
	while ( have_posts() ) {
		
		if($index == 4) { 
			$sales = get_field('sales', 6);
			
			$min = 0;
			$max = count($sales) - 1;

			$random = rand($min,$max);
			?>

			<div class="shoppage-sales">
				<div class="title"><?php echo $sales[$random]['title'];?></div>
				<?php if($sales[$random]['desc']) { ?>
					<div class="subtitle"><?php echo $sales[$random]['desc']?></div>
				<?php } ?>
				<a href="<?php echo $sales[$random]['link']?>" class="more more-doublesquare more-doublesquare__black">Подробнее</a>

				<img src="<?php echo $sales[$random]['img']['url']?>" alt="<?php echo $sales[$random]['img']['alt']?>" class="sales-img">
			</div>

		<?php }

		$index ++;

		the_post();

		/**
		 * Hook: woocommerce_shop_loop.
		 */
		do_action( 'woocommerce_shop_loop' );

		wc_get_template_part( 'content', 'product' );
		
	}
}

woocommerce_product_loop_end(); 


/**
 * Hook: woocommerce_after_shop_loop.
 *
 * @hooked woocommerce_pagination - 10
 */
do_action( 'woocommerce_after_shop_loop' );

/**
 * Hook: woocommerce_archive_description.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
do_action( 'woocommerce_archive_description' );
} else {
/**
 * Hook: woocommerce_no_products_found.
 *
 * @hooked wc_no_products_found - 10
 */
do_action( 'woocommerce_no_products_found' );
}

/**
* Hook: woocommerce_after_main_content.
*
* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
*/
do_action( 'woocommerce_after_main_content' );

/**
* Hook: woocommerce_sidebar.
*
* @hooked woocommerce_get_sidebar - 10
*/
do_action( 'woocommerce_sidebar' ); ?>
</div>

<div>

<?php get_footer(); ?>