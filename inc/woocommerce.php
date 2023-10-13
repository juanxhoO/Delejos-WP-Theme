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
	if (is_cart() && !is_product()) {
		// Add your custom class here
		$custom_class = 'my-custom-li-class col-md-3';
		// Add the custom class to the classes array
		$classes[] = $custom_class;
	}

	if (!is_product() && !is_cart()) {
		// Add your custom class here
		$custom_class = 'my-custom-li-class col-md-4';
		// Add the custom class to the classes array
		$classes[] = $custom_class;
	}

	return $classes;
}
add_filter('woocommerce_post_class', 'custom_add_class_to_shop_loop_item', 10, 2);



//Adding Row class for the loop product container in the UL
function custom_add_product_list_container_class($html)
{
	// Add your custom class here
	$custom_class = 'my-custom-product-list row';

	// Append the custom class to the existing classes
	$html = str_replace('class="', 'class="' . $custom_class . ' ', $html);

	return $html;
}

add_filter('woocommerce_product_loop_start', 'custom_add_product_list_container_class');


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
			jQuery('.single-product div.product .images').addClass('delejos-gallery-container col-md-6 justify-content-center align-items-center d-flex');
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

// remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
// add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60);

// function custom_entry_summary_class($classes)
// {
// 	$classes[] = 'your-custom-class'; // Replace 'your-custom-class' with the class name you want to add.
// 	return $classes;
// }

// add_filter('woocommerce_post_class', 'custom_entry_summary_class');


//Checkout

/**
 * @snippet       Close Ship to Different Address @ Checkout Page* @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.9
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_filter('woocommerce_ship_to_different_address_checked', '__return_true');



//My Account Page and Register Form

// Add first name field
add_filter('woocommerce_register_form_start', 'add_first_name_field');

function add_first_name_field()
{
	echo '<p class="form-row form-row-wide">
            <label for="reg_first_name">' . __('First Name', 'woocommerce') . '<span class="required">*</span></label>
            <input type="text" class="input-text" name="first_name" id="reg_first_name" value="' . esc_attr($_POST['first_name']) . '" required/>
          </p>';
}

// Add last name field
add_filter('woocommerce_register_form_start', 'add_last_name_field');

function add_last_name_field()
{
	echo '<p class="form-row form-row-wide">
            <label for="reg_last_name">' . __('Last Name', 'woocommerce') . '<span class="required">*</span></label>
            <input type="text" class="input-text" name="last_name" id="reg_last_name" value="' . esc_attr($_POST['last_name']) . '" required/>
          </p>';
}


add_filter('woocommerce_register_form_start', 'add_phone_number_field');

function add_phone_number_field()
{
	echo '<p class="form-row form-row-wide">
            <label for="reg_phone">' . __('Phone Number', 'woocommerce') . '<span class="required">*</span></label>
            <input type="tel" class="input-text" name="phone" id="reg_phone" value="' . esc_attr($_POST['phone']) . '" required/>
          </p>';
}



add_filter('woocommerce_register_form_start', 'add_country_selector_field');

function add_country_selector_field()
{
	$countries = WC()->countries->get_countries();

	echo '<p class="form-row form-row-wide">
            <label for="reg_country">' . __('Country', 'woocommerce') . '<span class="required">*</span></label>
            <select class="country_select" name="country" id="reg_country" required>';

	foreach ($countries as $key => $value) {
		echo '<option value="' . esc_attr($key) . '">' . esc_html($value) . '</option>';
	}

	echo '</select></p>';
}




// Save first name and last name when registering
add_action('woocommerce_created_customer', 'save_first_last_name_fields');

function save_first_last_name_fields($customer_id)
{
	if (isset($_POST['first_name'])) {
		update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['first_name']));
	}
	if (isset($_POST['last_name'])) {
		update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['last_name']));
	}

	if (isset($_POST['phone'])) {
		update_user_meta($customer_id, 'phone', sanitize_text_field($_POST['phone']));
	}
}

// Save custom fields in the account details
add_action('woocommerce_save_account_details', 'save_custom_account_fields');

function save_custom_account_fields($user_id)
{

	if (isset($_POST['phone'])) {
		update_user_meta($user_id, 'phone', sanitize_text_field($_POST['phone']));
	}


	if (isset($_POST['country'])) {
		update_user_meta($user_id, 'country', sanitize_text_field($_POST['country']));
	}

}

add_action('woocommerce_edit_account_form_start', 'display_custom_account_fields');

function display_custom_account_fields()
{
	$user = wp_get_current_user();
	$user_id = $user->ID;
	$phone_value = get_user_meta($user_id, 'phone', true);
	?>

	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label for="phone">
			<?php _e('Phone Number', 'woocommerce'); ?>
			<span class="required">*</span>
		</label>
		<input required type="tel" class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="phone"
			value="<?php echo esc_attr($phone_value); ?>" />
	</p>
	<?php
}


add_action('woocommerce_edit_account_form_start', 'add_country_selector_field_to_account');

function add_country_selector_field_to_account()
{

	$user = wp_get_current_user();
	$user_id = $user->ID;
	$selected_country = get_user_meta($user_id, 'country', true); // Get the user's selected country (if previously saved)
	$countries = WC()->countries->get_countries();

	echo '<p class="form-row form-row-wide">
            <label for="country">' . __('Country', 'woocommerce') . '<span class="required">*</span></label>
            <select class="country_select" name="country" id="country" required>';

	foreach ($countries as $key => $value) {
		$selected = selected($selected_country, $key, false); // Add 'selected' attribute to the currently selected country
		echo '<option value="' . esc_attr($key) . '" ' . $selected . '>' . esc_html($value) . '</option>';
	}

	echo '</select></p>';
}

add_filter('woocommerce_register_form', 'add_confirm_password_field');

function add_confirm_password_field()
{
	?>
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="reg_confirm_password">
			<?php _e('Confirm Password', 'woocommerce'); ?><span class="required">*</span>
		</label>
		<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="confirm_password"
			id="reg_confirm_password" required />
	</p>
	<?php
}
function enqueue_password_confirmation_script()
{
	wp_enqueue_script('password-confirmation', get_template_directory_uri() . '/js/password-confirmation.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_password_confirmation_script');


add_filter('woocommerce_registration_errors', 'custom_password_confirmation_validation', 10, 3);

function custom_password_confirmation_validation($errors, $username, $password)
{
	if ($_POST['password'] !== $_POST['confirm_password']) {
		$errors->add('password_mismatch', __('Passwords do not match.', 'woocommerce'));
	}
	return $errors;
}

//Adding bootstrap classes to checkout fields

add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields');
function addBootstrapToCheckoutFields($fields)
{
	foreach ($fields as &$fieldset) {
		foreach ($fieldset as &$field) {
			// if you want to add the form-group class around the label and the input
			$field['class'][] = 'form-group col-md-6 col-sm-12';

			// add form-control to the actual input
			$field['input_class'][] = 'form-control col-md-6 col-sm-12';
		}
	}
	return $fields;
}



function add_custom_class_to_billing_wrapper($fields)
{
	$fields = '<div class="my-custom-class">' . $fields . '</div>';
	return $fields;
}

add_action('woocommerce_checkout_billing', 'add_custom_class_to_billing_wrapper');




//addinbg wrapper for billing form

function custom_div_before_billing_form()
{
	echo '<div class="delejos_billing_fields_container">';
}

function custom_div_after_billing_form()
{
	echo '</div>';
}

add_action('woocommerce_before_checkout_billing_form', 'custom_div_before_billing_form');
add_action('woocommerce_after_checkout_billing_form', 'custom_div_after_billing_form');



function custom_div_before_shipping_form()
{
	echo '<div class="delejos_shipping_fields_container">';
}

function custom_div_after_shipping_form()
{
	echo '</div>';
}

add_action('woocommerce_before_checkout_shipping_form', 'custom_div_before_shipping_form');
add_action('woocommerce_after_checkout_shipping_form', 'custom_div_after_shipping_form');




//Insert PRoduct Tabs inside the entry summary


remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60);



//Include Menu in Single Product Pages



function custom_div_before_navigation_account()
{
	echo '<div class="col-md-4 woocommerce-MyAccount-navigation">';
}

add_action('woocommerce_before_account_navigation', 'custom_div_before_navigation_account');



function custom_div_after_navigation_account()
{
	echo '</div>';
}

add_action('woocommerce_after_account_navigation', 'custom_div_after_navigation_account');



