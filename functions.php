<?php 

    add_action( 'wp_enqueue_scripts', function () {
        wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css' );

        wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/app.min.js', array(), null, true);
    });
  

    add_action( 'after_setup_theme', 'theme_register_nav_menu' );

    function theme_register_nav_menu() {
        register_nav_menu( 'header-top', 'Меню справа от логотипа' );
		register_nav_menu( 'header-nav', 'Основное навигационное меню' );
    }

    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
	add_theme_support( 'woocommerce' );



add_filter( 'upload_mimes', 'svg_upload_allow' );
# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}

add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );

# Формирует данные для отображения SVG как изображения в медиабиблиотеке.
function show_svg_in_media_library( $response ) {

	if ( $response['mime'] === 'image/svg+xml' ) {

		// С выводом названия файла
		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
}

add_filter( 'acf/settings/rest_api_format', function () {
	return 'standard';
} );

add_action('rest_api_init', 'register_rest_images' );
function register_rest_images(){
    register_rest_field( array('post'),
        'fimg_url',
        array(
            'get_callback'    => 'get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
function get_rest_featured_image( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}

add_filter('https_ssl_verify', '__return_false');


add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}

//Настройки WooCommerce

add_filter('woocommerce_currency_symbol', 'woocommerce_change_rub_symbol', 9999, 2);
 
function woocommerce_change_rub_symbol( $valyuta_symbol, $valyuta_code ) {
	if( $valyuta_code === 'RUB' ) {
		return 'руб/м²';
	}
	return $valyuta_symbol;
}

add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives' );  
function woocommerce_add_to_cart_button_text_archives() {
    return __( 'Купить', 'woocommerce' );
}

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action(' woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_review_before', 'woocommerce_review_display_gravatar', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_filter( 'wc_add_to_cart_message_html', '__return_null' );

// add_action('woocommerce_before_shop_loop', 'woocustom_get_filters', 20);
add_action('woocommerce_after_shop_loop_item_title', 'woocustom_get_button', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10);
// add_action('woocommerce_before_shop_loop_item_title', 'woocustom_thumb', 10);


function woocustom_get_filters() {
	echo do_shortcode('[wcpf_filters id="658"]');
};

function woocustom_get_button() {
	echo '<div class="product-button"><button class="more more-doublesquare">Купить</button></div>';
}

add_filter( 'wc_add_to_cart_message_html', 'woocustom_add_cart', 10, 3 );
 
function woocustom_add_cart( $message, $products, $show_qty ) {
    
    $button = '<a href="/cart" class="button button-accent">В корзину</a>';

    foreach($products as $product_id => $qty) {
        $message = '<div class="message"><strong>' . get_the_title($product_id) . '</strong> в количестве <strong>' . $qty . ' м²</strong> в корзине</div>' . $button;
    }
	
    return $message;
}

// Adding and displaying additional product quantity custom fields
add_action( 'woocommerce_product_options_pricing', 'additional_product_pricing_option_fields', 50 );
function additional_product_pricing_option_fields() {
    $domain = "woocommerce";
    global $post;

    echo '</div><div class="options_group pricing">';

    woocommerce_wp_text_input( array(
        'id'            => '_input_qty',
        'label'         => __("Количество в упаковке", $domain ),
        'placeholder'   => '',
        'description'   => __("Количество единиц товара в упаковке", $domain ),
        'desc_tip'      => true,
    ) );


    woocommerce_wp_text_input( array(
        'id'            => '_step_qty',
        'label'         => __("Шаг", $domain ),
        'placeholder'   => '',
        'description'   => __("Шаг единиц упаковок при заказе", $domain ),
        'desc_tip'      => true,
    ) );

}

// Saving product custom quantity values
add_action( 'woocommerce_admin_process_product_object', 'save_product_custom_meta_data', 100, 1 );
function save_product_custom_meta_data( $product ){
    if ( isset( $_POST['_input_qty'] ) )
        $product->update_meta_data( '_input_qty', sanitize_text_field($_POST['_input_qty']) );

    if ( isset( $_POST['_step_qty'] ) )
        $product->update_meta_data( '_step_qty', sanitize_text_field($_POST['_step_qty']) );
}

// Set product quantity field by product
add_filter( 'woocommerce_quantity_input_args', 'custom_quantity_input_args', 10, 2 );
function custom_quantity_input_args( $args, $product ) {
    if( $product->get_meta('_input_qty') ){
        $args['input_value'] = is_cart() ? $args['input_value'] : $product->get_meta('_step_qty');
        $args['min_value']   = $product->get_meta('_step_qty');
    }

    if( $product->get_meta('_step_qty') ){
        $args['step'] = $product->get_meta('_step_qty');
    }

    return $args;
}


function min_decimal($val) {
    return 0.01; // Минимальное значение
}

add_filter("woocommerce_quantity_input_min", "min_decimal");

function step_decimal($val) {
    return 0.01; // Шаг    
}

add_filter("woocommerce_quantity_input_step", "step_decimal");

// Удаление и добавление своего фильтра проверки количества

remove_filter("woocommerce_stock_amount", "intval");
add_filter("woocommerce_stock_amount", "floatval");

add_filter( 'woocommerce_available_variation', 'custom_qty_available_variation_args', 10, 3 );
function custom_qty_available_variation_args( $data, $product, $variation ) {
    $data['min_qty'] = $product->get_meta('_step_qty');
    return $data;
}



remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
// add_action('woocommerce_shop_loop_item_title','woocustiomtitle',10);
// function woocustiomtitle() {
//     $title = $product->get_title();

//     if (strlen($title) > 10) {
//         $title = substr($title, 0, 7) . '...';
//     }
       
//     echo '<h2 class="woocommerce-loop-product__title">'. $title . '</h2>';
// }


?>