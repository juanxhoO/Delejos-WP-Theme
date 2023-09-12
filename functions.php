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
	define('_S_VERSION', '1.0.0');
}

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
	 * If you're building a theme based on Delejos_Theme, use a find and replace
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
			'menu-1' => esc_html__('Primary', 'ecommerce-delejos'),
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
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', array('jquery'), '5.2.3', true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ecommerce_delejos_scripts');

// Custom function to get products by country attribute


function display_products_by_country($country)
{
	global $wpdb;

	// Prepare the SQL query to fetch product IDs with the specified country attribute
	$query = $wpdb->prepare("
        SELECT product_id
        FROM {$wpdb->prefix}wc_product_meta_lookup
        WHERE country = %s
    ", $country);
	$product_ids = $wpdb->get_col($query);
	var_dump($product_ids);

	if (!empty($product_ids)) {
		// Query and display the products based on the retrieved product IDs
		$args = array(
			'post_type' => 'product',
			'post__in' => $product_ids,
			'posts_per_page' => -1,
		);

		$products = new WP_Query($args);

		if ($products->have_posts()) {
			ob_start();
			woocommerce_product_loop_start();
			while ($products->have_posts()):
				$products->the_post();
				wc_get_template_part('content', 'product');
			endwhile;
			woocommerce_product_loop_end();
			ob_end_flush();
		} else {
			echo 'No products found for the specified country.';
		}

		wp_reset_postdata();
	} else {
		echo 'No products found for the specified country.';
	}
}

// Define a custom function to modify the product URLs.
function custom_rewrite_rules()
{
	add_rewrite_rule(
		'^flores-ecuador/([^/]+)/([^/]+)/?$',
		'index.php?product_category=$matches[1]&product=$matches[2]',
		'top'
	);
}
add_action('init', 'custom_rewrite_rules');
function custom_query_vars($query_vars)
{
	$query_vars[] = 'product_category';
	$query_vars[] = 'product';
	return $query_vars;
}
add_filter('query_vars', 'custom_query_vars');

function add_country_visibility_meta_box()
{
	add_meta_box(
		'country-visibility-meta-box',
		'Country Visibility',
		'render_country_pricing_meta_box',
		'product',
		'side',
		'default'
	);
}
add_action('add_meta_boxes', 'add_country_visibility_meta_box');

function save_country_pricing($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (isset($_POST['country_pricing'])) {
		$country_pricing = $_POST['country_pricing'];
		update_post_meta($post_id, '_country_pricing', $country_pricing);
	}
}
add_action('save_post', 'save_country_pricing');

function render_country_pricing_meta_box($post)
{
	// Retrieve the existing country-based prices, if any.
	$country_pricing = get_post_meta($post->ID, '_country_pricing', true);

	// Define an array of countries you want to support (or fetch dynamically).
	$supported_countries = array(
		'US' => 'United States',
		'CA' => 'Canada',
		// Add more countries as needed...
	);

	$countries = WC()->countries->get_countries();
	if (!empty($countries)) {
		// Loop through the list of countries and generate checkboxes
		foreach ($countries as $code => $name) {
			$price = isset($country_pricing[$code]) ? $country_pricing[$code] : '';
			?>
			<label for="country_<?php echo esc_attr($code); ?>">
				<input type="checkbox" id="country_<?php echo esc_attr($code); ?>" name="selected_countries[]"
					value="<?php echo esc_attr($code); ?>" />
				<?php echo esc_html($name); ?>
				<?php
				echo '<p>';
				echo '<input type="text" id="country_' . esc_attr($code) . '" name="country_pricing[' . esc_attr($code) . ']" value="' . esc_attr($price) . '" />';
				echo '</p>';
				?>
			</label>
			<br>
			<?php
		}
	} else {
		echo 'No countries found.';
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