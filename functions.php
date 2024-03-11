<?php

/**
 * Delejos_Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Delejos_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
}
define('_S_VERSION', '1.5.111221111221122211123123212211112122111111111111111111211111111');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ecommerce_delejos_setup()
{
	/*
																																				  * Make theme available for translation.
																																				  * Translations can be filed in the /languages/ directory.
																																				  * If you're building a theme based on Delejos_Theme, use a fiborder: 1px solid #ccc;
																																				 padding: 40px 10%;nd and replace
																																				  * to change 'ecommerce-delejos' to the name of your theme in all the template files.
																																				  */
	load_theme_textdomain('ecommerce-delejos', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header-menu' => esc_html__('Primary', 'ecommerce-delejos'),
			'category-menu' => esc_html__('Category', 'ecommerce-delejos'),
			'footer-menu' => esc_html__('Footer', 'ecommerce-delejos'),
			'home-menu' => esc_html__('Home', 'ecommerce-delejos')

		)
	);


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ecommerce_delejos_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'ecommerce_delejos_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ecommerce_delejos_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ecommerce_delejos_content_width', 640);
}
add_action('after_setup_theme', 'ecommerce_delejos_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecommerce_delejos_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'ecommerce-delejos'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'ecommerce-delejos'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);


	//Main Homepage Footer Widgets 
	register_sidebar(
		array(
			'name' => esc_html__('Footer 1', 'ecommerce-delejos'),
			'id' => 'footer-1',
			'description' => esc_html__('Add widgets here.', 'ecommerce-delejos'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer 2', 'ecommerce-delejos'),
			'id' => 'footer-2',
			'description' => esc_html__('Add widgets here.', 'ecommerce-delejos'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer 3', 'ecommerce-delejos'),
			'id' => 'footer-3',
			'description' => esc_html__('Add widgets here.', 'ecommerce-delejos'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer 4', 'ecommerce-delejos'),
			'id' => 'footer-4',
			'description' => esc_html__('Add widgets here.', 'ecommerce-delejos'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	//Country Homepage
	register_sidebar(
		array(
			'name' => esc_html__('Country Footer', 'ecommerce-delejos'),
			'id' => 'country-footer-1',
			'description' => esc_html__('Add widgets here.', 'ecommerce-delejos'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
}
add_action('widgets_init', 'ecommerce_delejos_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ecommerce_delejos_scripts()
{

	wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
	wp_enqueue_style('ecommerce-delejos-style', get_stylesheet_uri(), array(), _S_VERSION);

	wp_style_add_data('ecommerce-delejos-style', 'rtl', 'replace');

	wp_enqueue_script('ecommerce-delejos-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.2.3', true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ecommerce_delejos_scripts');

// Custom function to get products by country attribute


class Bootstrap_Nav_Walker extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		// Add Bootstrap dropdown class to submenu ul
		$output .= '<ul class="dropdown-menu">';
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		if (empty($item->title)) {
			return;
		}
		// Add Bootstrap classes to each menu item's <li> element
		$classes = empty($item->classes) ? array() : (array) $item->classes;

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));


		// Check if the menu item has children (sub-menu)
		$has_children = in_array('menu-item-has-children', $item->classes) || in_array('page-item-has-children', $item->classes);

		if ($has_children) {
			$class_names .= ' dropdown'; // Add "dropdown" class if it has children
		}

		$class_names = ' class="nav-item ' . esc_attr($class_names) . '"'; // Add "nav-item" class

		$output .= '<li' . $class_names . '>';

		// Add Bootstrap dropdown class to parent li if it has submenu items
		if ($args->walker->has_children) {
			$output .= ' <a href="' . esc_url($item->url) . '" class="nav-link dropdown-toggle" data-toggle="dropdown">';
		} else {
			$output .= ' <a href="' . esc_url($item->url) . '" class="nav-link">';
		}

		$output .= esc_html($item->title);
		$output .= '</a>';
	}

	function end_lvl(&$output, $depth = 0, $args = null)
	{
		// Close the submenu ul
		$output .= '</ul>';
	}
}


class Mobile_Nav_Walker extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		// Add Bootstrap dropdown class to submenu ul
		$output .= '<ul class="dropdown-menu">';
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		if (empty($item->title)) {
			return;
		}
		// Add Bootstrap classes to each menu item's <li> element
		$classes = empty($item->classes) ? array() : (array) $item->classes;

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));


		// Check if the menu item has children (sub-menu)
		$has_children = in_array('menu-item-has-children', $item->classes) || in_array('page-item-has-children', $item->classes);

		if ($has_children) {
			$class_names .= ' dropdown'; // Add "dropdown" class if it has children
		}

		$class_names = ' class="nav-item ' . esc_attr($class_names) . '"'; // Add "nav-item" class

		$output .= '<li' . $class_names . '>';

		// Add Bootstrap dropdown class to parent li if it has submenu items
		if ($args->walker->has_children) {
			$output .= ' <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="' . esc_url($item->url) . '">';
		} else {
			$output .= ' <a href="' . esc_url($item->url) . '" class="nav-link">';
		}

		$output .= esc_html($item->title);
		$output .= '</a>';
	}

	function end_lvl(&$output, $depth = 0, $args = null)
	{
		// Close the submenu ul
		$output .= '</ul>';
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}



function create_custom_city_table()
{
	global $wpdb;

	$table_name = $wpdb->prefix . 'custom_cities';

	// // Check if the table already exists
	// if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

	// 	$sql = "CREATE TABLE $table_name (
    //         id INT NOT NULL AUTO_INCREMENT,
    //         city_name VARCHAR(255) NOT NULL,
    //         country_code VARCHAR(2) NOT NULL,
    //         flat_rate DECIMAL(10, 2) NOT NULL,
    //         PRIMARY KEY (id)
    //     )";

	// 	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	// 	dbDelta($sql);
	// }
	echo("database created");
}

// Hook the table creation function to a custom action for testing purposes
add_action('create_custom_city_table_hook', 'create_custom_city_table');

//do_action("create_custom_city_table_hook");
// To create the table, you can manually trigger the action when needed for testing
// For example, you can add the following code where you want to trigger the table creation:
// do_action('create_custom_city_table_hook');

// Add custom fields for regular price, sale price, sale schedule, and multiple countries to the product's General tab
function add_custom_field_to_product_general_tab()
{
	global $post;

	// Check if the post type is 'product'
	if ($post->post_type === 'product') {


		$countries = WC()->countries->get_countries();

		foreach ($countries as $code => $country) {


			echo '<div class="country_container">';

			woocommerce_wp_checkbox(
				array(
					'id' => '_custom_country_active_' . sanitize_title($code),
					'description' => sprintf(__('Check this box to activate.', 'woocommerce')),
				)
			);

			woocommerce_wp_text_input(
				array(
					'id' => '_custom_country_price_' . sanitize_title($code),
					'label' => sprintf(__('Price for %s ($)', 'woocommerce'), $country),
					'placeholder' => '',
					'desc_tip' => 'true',
					'description' => sprintf(__('Enter the price for this product in %s.', 'woocommerce'), $code),
					'type' => 'number',
					'custom_attributes' => array(
						'step' => 'any',
						'min' => '0'
					)
				)
			);

			woocommerce_wp_text_input(
				array(
					'id' => '_custom_country_sale_price_' . sanitize_title($code),
					'label' => sprintf(__('Sale Price($)', 'woocommerce')),
					'placeholder' => '',
					'desc_tip' => 'true',
					'description' => sprintf(__('Enter the sale price for this product in %s.', 'woocommerce'), $country),
					'type' => 'number',
					'custom_attributes' => array(
						'step' => 'any',
						'min' => '0'
					)
				)
			);
			echo '</div>';


			// woocommerce_wp_text_input(
			//     array(
			//         'id' => '_custom_country_sale_schedule_' . sanitize_title($country),
			//         'label' => sprintf(__('Sale Schedule for %s', 'woocommerce'), $country),
			//         'placeholder' => '',
			//         'desc_tip' => 'true',
			//         'description' => sprintf(__('Enter the sale schedule for this product in %s (YY MM DD).', 'woocommerce'), $country),
			//         'type' => 'text', // Use 'text' input type for date
			//         'custom_attributes' => array(
			//             'placeholder' => 'YY MM DD',
			//             'data-datepicker_format' => 'yy mm dd', // Set the desired date format
			//         )
			//     )
			// );
		}
	}
}

add_action('woocommerce_product_options_general_product_data', 'add_custom_field_to_product_general_tab');

// Save the custom field data for regular price, sale price, sale schedule, and multiple countries
function save_custom_field_data($product_id)
{
	$countries = WC()->countries->get_countries();

	foreach ($countries as $code => $name) {
		$price_field_name = '_custom_country_price_' . sanitize_title($code);
		$sale_price_field_name = '_custom_country_sale_price_' . sanitize_title($code);
		// $sale_schedule_field_name = '_custom_country_sale_schedule_' . sanitize_title($name);
		$active_field_name = '_custom_country_active_' . sanitize_title($code);


		$country_price = isset($_POST[$price_field_name]) ? wc_clean($_POST[$price_field_name]) : '';
		$country_sale_price = isset($_POST[$sale_price_field_name]) ? wc_clean($_POST[$sale_price_field_name]) : '';
		// $country_sale_schedule = isset($_POST[$sale_schedule_field_name]) ? wc_clean($_POST[$sale_schedule_field_name]) : '';
		$country_active = isset($_POST[$active_field_name]) ? 'yes' : 'no';


		update_post_meta($product_id, $price_field_name, $country_price);
		update_post_meta($product_id, $sale_price_field_name, $country_sale_price);
		// update_post_meta($product_id, $sale_schedule_field_name, $country_sale_schedule);
		update_post_meta($product_id, $active_field_name, $country_active);
	}
}

add_action('woocommerce_process_product_meta', 'save_custom_field_data');


// Replace 'Country1' with the actual country name or detection logic

// Hook into the WooCommerce price calculation
add_filter('woocommerce_get_price', 'custom_product_price_based_on_country', 10, 2);

function custom_product_price_based_on_country($price, $product)
{
	global $post;

	// Check if we are on a single product page
	if (is_product() && $post) {
		// Check if the product has custom pricing for the selected country
		$custom_price = get_post_meta($post->ID, '_custom_country_price_' . sanitize_title("Albania"), true);

		if ($custom_price) {
			return $custom_price; // Replace the default price with the custom price
		}
	}

	return $price; // Return the default price if no custom price is set
}

function custom_permalink_structure($post_link, $post)
{
	if (is_object($post) && $post->post_type == 'product') {


		$terms = get_the_terms($post->ID, 'product_cat');

		if ($terms && !is_wp_error($terms)) {
			$country = 'ecuador'; // Default country


			// Get the user's selected country from the geolocation plugin
			foreach ($terms as $term) {
				if (strpos($term->slug, 'flores-' . $country) !== false) {
					$category = $term->slug;
					$post_link = home_url("/flores-$country/$category/{$post->post_name}/");
					break;
				}
			}
		}
	}
	return $post_link;
}
add_filter('post_type_link', 'custom_permalink_structure', 10, 2);


// Adding Homepage Scripts

/**
 * Enqueue scripts and styles.
 */
function ecommerce_homepage_delejos_scripts()
{
	if (is_front_page()) {

		wp_enqueue_script('home-script', get_template_directory_uri() . '/js/homepage_selector.js', array('jquery'), '15.222222233', true);

		//ajax_object
		wp_localize_script('home-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
	}
}
add_action('wp_enqueue_scripts', 'ecommerce_homepage_delejos_scripts');



// Fetching Cities from Homepage Selector
add_action('wp_ajax_nopriv_fetch_cities', 'fetch_cities');

function fetch_cities()
{
	$country_selected = isset($_GET['country']) ? sanitize_text_field($_GET['country']) : '';
	global $wpdb;
	$table_name = $wpdb->prefix . 'custom_cities';
	$query = $wpdb->prepare("SELECT city_name FROM $table_name WHERE country_code = %s", $country_selected);
	$cities = $wpdb->get_results($query);
	// Initialize the result array
	$result = array();
	// Check if there are results
	if ($cities) {
		// Loop through the results and add them to the result array
		foreach ($cities as $city) {
			$result[] = $city->city_name;
		}
	}
	// Return the result (either an array of city names or an empty array)
	echo json_encode($result);
	wp_die();
}


function prepend_default_rewrite_rules($rules)
{
	// Prepare for new rules
	$new_rules = [];
	// Set up languages, except default one
	$language_slugs = ['ar', 'ku', 'de'];
	// Generate language slug regex
	$languages_slug = '(?:' . implode('/|', $language_slugs) . '/)?';

	// Set up the list of rules that don't need to be prefixed
	$whitelist = [
		'^wp-json/?$',
		'^wp-json/(.*)?',
		'^index.php/wp-json/?$',
		'^index.php/wp-json/(.*)?'
	];
	// Set up the new rule for home page
	$new_rules['(?:' . implode('/|', $language_slugs) . ')/?$'] = 'index.php';
	// Loop through old rules and modify them
	foreach ($rules as $key => $rule) {
		// Re-add those whitelisted rules without modification
		if (in_array($key, $whitelist)) {
			$new_rules[$key] = $rule;
			// Update rules starting with ^ symbol
		} elseif (substr($key, 0, 1) === '^') {
			$new_rules[$languages_slug . substr($key, 1)] = $rule;
			// Update other rules
		} else {
			$new_rules[$languages_slug . $key] = $rule;
		}
	}
	// Return out new rules
	return $new_rules;
}
add_filter('rewrite_rules_array', 'prepend_default_rewrite_rules');


// function custom_rewrite_rules()
// {

// 	$country_slugs = ['ecuador', 'colombia', 'argentina', 'brasil', 'chile', 'us', 'uk', 'france', 'ar'];

// 	$country_pattern = '(' . implode('|', $country_slugs) . ')';

// 	// Handle product pages
// 	add_rewrite_rule(
// 		'^(' . $country_pattern . ')/product/([^/]+)/?$',
// 		'index.php?country=$matches[1]&product=$matches[2]',
// 		'top'
// 	);

// 	// Handle category pages
// 	add_rewrite_rule(
// 		'^(' . $country_pattern . ')/product-category/([^/]+)/?$',
// 		'index.php?country=$matches[1]&product_cat=$matches[2]',
// 		'top'
// 	);

// 	add_rewrite_rule(
// 		'^(ar|ku)/(.+?)/?$',
// 		'index.php?country=$matches[1]&pagename=$matches[2]',
// 		'top'
// 	);
// }
// add_action('init', 'custom_rewrite_rules');

function custom_query_vars($query_vars)
{
	$query_vars[] = 'country';
	return $query_vars;
}
add_filter('query_vars', 'custom_query_vars');


function enqueue_specific_scripts()
{
	if (is_front_page()) {

		wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/admin-city-shipping.js', array('jquery'), '11.0', true);
	}

	if (function_exists('is_account_page') && is_account_page()) {

		wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/my-account.js', array('jquery'), '11.0', true);
	}
}
add_action('wp_enqueue_scripts', 'enqueue_specific_scripts');
