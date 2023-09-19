<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Delejos_Theme
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function ecommerce_delejos_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'single_image_width' => 300,
			'product_grid' => array(
				'default_rows' => 3,
				'default_columns' => 5,
				'max_columns' => 3,
			),
		)
	);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'ecommerce_delejos_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function ecommerce_delejos_woocommerce_scripts()
{
	wp_enqueue_style('ecommerce-delejos-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

	$font_path = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style('ecommerce-delejos-woocommerce-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'ecommerce_delejos_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function ecommerce_delejos_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'ecommerce_delejos_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function ecommerce_delejos_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 3,
		'columns' => 3,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'ecommerce_delejos_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('ecommerce_delejos_woocommerce_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function ecommerce_delejos_woocommerce_wrapper_before()
	{
		?>
		<main id="primary" class="site-main container">
			<?php
	}
}
add_action('woocommerce_before_main_content', 'ecommerce_delejos_woocommerce_wrapper_before');

if (!function_exists('ecommerce_delejos_woocommerce_wrapper_after')) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function ecommerce_delejos_woocommerce_wrapper_after()
	{
		?>
		</main><!-- #main -->
		<?php
	}
}
add_action('woocommerce_after_main_content', 'ecommerce_delejos_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'ecommerce_delejos_woocommerce_header_cart' ) ) {
			ecommerce_delejos_woocommerce_header_cart();
		}
	?>
 */

if (!function_exists('ecommerce_delejos_woocommerce_cart_link_fragment')) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function ecommerce_delejos_woocommerce_cart_link_fragment($fragments)
	{
		ob_start();
		ecommerce_delejos_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'ecommerce_delejos_woocommerce_cart_link_fragment');

if (!function_exists('ecommerce_delejos_woocommerce_cart_link')) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function ecommerce_delejos_woocommerce_cart_link()
	{
		?>
		<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>"
			title="<?php esc_attr_e('View your shopping cart', 'ecommerce-delejos'); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'ecommerce-delejos'),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount">
				<?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?>
			</span> <span class="count">
				<?php echo esc_html($item_count_text); ?>
			</span>
		</a>
		<?php
	}
}

if (!function_exists('ecommerce_delejos_woocommerce_header_cart')) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function ecommerce_delejos_woocommerce_header_cart()
	{
		if (is_cart()) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr($class); ?>">
				<?php ecommerce_delejos_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget('WC_Widget_Cart', $instance);
				?>
			</li>
		</ul>
		<?php
	}
}

//Woocomerce Product Loop Tweks Classs

// Add a custom class to the <li> element containing the product item
function custom_add_class_to_shop_loop_item($classes, $product_id)
{
	if (!is_singular('product')) {
		// Add your custom class here
		$custom_class = 'my-custom-li-class col-md-4';

		// Add the custom class to the classes array
		$classes[] = $custom_class;

	}
	return $classes;
}
add_filter('woocommerce_post_class', 'custom_add_class_to_shop_loop_item', 10, 2);

function custom_add_product_list_container_class($html)
{
	// Add your custom class here
	$custom_class = 'my-custom-product-list row';

	// Append the custom class to the existing classes
	$html = str_replace('class="', 'class="' . $custom_class . ' ', $html);

	return $html;
}

add_filter('woocommerce_product_loop_start', 'custom_add_product_list_container_class');

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns()
	{
		return 3; // 3 products per row
	}
}

//Hidding Related PRoducts in SInfgle Product Page

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

//hidding Reviews 
function hide_product_reviews_tab($tabs)
{
	// Remove the "Reviews" tab
	unset($tabs['reviews']);

	return $tabs;
}
add_filter('woocommerce_product_tabs', 'hide_product_reviews_tab');


//Product Single Changes	
function add_custom_class_before_single_product_summary()
{
	echo '<div class="custom-class-before-summary row">';
}
add_action('woocommerce_before_single_product_summary', 'add_custom_class_before_single_product_summary', 1);

function close_custom_class_before_single_product_summary()
{
	echo '</div>';
}
add_action('woocommerce_after_single_product_summary', 'close_custom_class_before_single_product_summary', 99);



//Adding Custom Class to Gallery COntainer Single Product Page

function add_custom_class_to_product_gallery_container()
{
	?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			// Add your custom class to the product gallery thumbnail container
			$('.single-product div.product .images').addClass('delejos-gallery-container col-md-6 justify-content-center align-items-center d-flex');
		});
	</script>

	<?php
}
add_action('woocommerce_before_single_product_summary', 'add_custom_class_to_product_gallery_container');

/**
 * @snippet       Move product tabs beside the product image - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60);

function custom_entry_summary_class($classes) {
    $classes[] = 'your-custom-class'; // Replace 'your-custom-class' with the class name you want to add.
    return $classes;
}

add_filter('woocommerce_post_class', 'custom_entry_summary_class');



//Single Product Page

//Product Single Changes	
function add_custom_class_before_product_add_cart_button()
{
	echo '<div class="custom-class-before-summary row">';
}
add_action('woocommerce_before_single_product_summary', 'add_custom_class_before_product_add_cart_button', 1);

function close_custom_class_before_product_add_cart_button()
{
	echo '</div>';
}
add_action('woocommerce_after_single_product_summary', 'close_custom_class_before_product_add_cart_button', 99);



// Cart Page