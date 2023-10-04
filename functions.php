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
define('_S_VERSION', '1.5.4222222');

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
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', array('jquery'), '5.2.3', true);
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


// function display_products_by_country($country)
// {
// 	global $wpdb;

// 	// Prepare the SQL query to fetch product IDs with the specified country attribute
// 	$query = $wpdb->prepare("
//         SELECT product_id
//         FROM {$wpdb->prefix}wc_product_meta_lookup
//         WHERE country = %s
//     ", $country);
// 	$product_ids = $wpdb->get_col($query);
// 	var_dump($product_ids);

// 	if (!empty($product_ids)) {
// 		// Query and display the products based on the retrieved product IDs
// 		$args = array(
// 			'post_type' => 'product',
// 			'post__in' => $product_ids,
// 			'posts_per_page' => -1,
// 		);

// 		$products = new WP_Query($args);

// 		if ($products->have_posts()) {
// 			ob_start();
// 			woocommerce_product_loop_start();
// 			while ($products->have_posts()):
// 				$products->the_post();
// 				wc_get_template_part('content', 'product');
// 			endwhile;
// 			woocommerce_product_loop_end();
// 			ob_end_flush();
// 		} else {
// 			echo 'No products found for the specified country.';
// 		}

// 		wp_reset_postdata();
// 	} else {
// 		echo 'No products found for the specified country.';
// 	}
// }

// Define a custom function to modify the product URLs.
// function custom_rewrite_rules()
// {
// 	add_rewrite_rule(
// 		'^flores-ecuador/([^/]+)/([^/]+)/?$',
// 		'index.php?product_category=$matches[1]&product=$matches[2]',
// 		'top'
// 	);
// }

// add_action('init', 'custom_rewrite_rules');
// function custom_query_vars($query_vars)
// {
// 	$query_vars[] = 'product_category';
// 	$query_vars[] = 'product';
// 	return $query_vars;
// }
// add_filter('query_vars', 'custom_query_vars');


//Agreganto contenedor de Paises en Pagina del Producto (Admin) 


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

	// Check if the table already exists
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

		$sql = "CREATE TABLE $table_name (
            id INT NOT NULL AUTO_INCREMENT,
            city_name VARCHAR(255) NOT NULL,
            country_code VARCHAR(2) NOT NULL,
            flat_rate DECIMAL(10, 2) NOT NULL,
            PRIMARY KEY (id)
        )";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
}

// Hook the table creation function to a custom action for testing purposes
add_action('create_custom_city_table_hook', 'create_custom_city_table');

do_action("create_custom_city_table_hook");
// To create the table, you can manually trigger the action when needed for testing
// For example, you can add the following code where you want to trigger the table creation:
// do_action('create_custom_city_table_hook');


function create_custom_admin_menu()
{
	add_menu_page(
		'Custom Admin Section',
		'Flat Rate Shipping',
		'manage_options',
		// Minimum capability required to access
		'custom-admin-section',
		'custom_admin_page_content',
		'dashicons-admin-generic' // Icon for the menu item (optional)
	);
}
add_action('admin_menu', 'create_custom_admin_menu');

function custom_admin_page_content()
{
	?>
	<div class="custom-shipping-content">
		<h3>
			<?php _e('Custom Shipping Section Content', 'your-text-domain'); ?>
		</h3>
		<!-- Add your form or inputs here -->
		<form method="post" action="">
			<label for="name">Name</label>
			<input type="text" id="name" name="name" required /><br />

			<label for="country_selector">Country</label>
			<select name="country_selector" required>
				<option value="">Select Country</option>

				<?php
				$countries = WC()->countries->get_countries();

				foreach ($countries as $code => $name) {
					echo '<option value="' . esc_attr($code) . '">' . esc_html($name) . '</option>';
				}
				?>
			</select><br />

			<label for="flat_rate_price">Flat Rate Price</label>
			<input type="number" step="0.01" id="price" name="flat_rate_price" required /><br />
			<input type="submit" name="custom_shipping_submit" value="Submit">
		</form>

		<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['custom_shipping_submit'])) {


			global $wpdb;
			$table_name = $wpdb->prefix . 'custom_cities';

			// Retrieve form data and sanitize
			$name = sanitize_text_field($_POST['name']);
			$country_code = sanitize_text_field($_POST['country_selector']);
			$flat_rate_price = floatval($_POST['flat_rate_price']); // Convert to float
	
			//Check if The City is already in the table
			$exists = $wpdb->get_var($wpdb->prepare("SELECT city_name FROM $table_name WHERE city_name = %s", $name));
			echo ($exists);
			if ($exists === $name) {
				// The city already exists, handle this case (e.g., show an error message).
				echo '<div class="error-message">City already exists!</div>';
			} else {
				// Insert data into the custom table
				$wpdb->insert(
					$table_name,
					array(
						'city_name' => $name,
						'country_code' => $country_code,
						'flat_rate' => $flat_rate_price,
					),
					array('%s', '%s', '%f')
				);
			}

			// Optionally, redirect or display a success message
			// Example: wp_redirect('success-page.php');
			// or
			// echo '<div class="success-message">Form submitted successfully!</div>';
		}
		?>
	</div>
	<?php
	display_cities_and_countries();

}

function display_cities_and_countries()
{
	global $wpdb;

	$table_name = $wpdb->prefix . 'custom_cities';
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_prices'])) {

		// Handle the form submission to update prices here
		$updated_prices = $_POST['updated_prices']; // This should be an array containing city names and updated prices

		echo ($updated_prices);

		if (!empty($updated_prices)) {
			foreach ($updated_prices as $city_name => $new_price) {
				// Sanitize the input data and update the database
				$city_name = sanitize_text_field($city_name);
				$new_price = floatval($new_price);

				$wpdb->update(
					$table_name,
					array('flat_rate' => $new_price),
					array('name' => $city_name)
				);
			}

			// Optionally, redirect or display a success message
			// Example: wp_redirect('success-page.php');
			// or
			// echo '<div class="success-message">Prices updated successfully!</div>';
		}
	}


	// Retrieve cities and countries from the custom table
	$results = $wpdb->get_results("SELECT city_name, country_code, flat_rate, ID FROM $table_name", ARRAY_A);


	if (!empty($results)) {
		echo '<form method="post" action="">';
		echo '<label for="country_select">Select a Country:</label>';
		echo '<select id="country_select">';
		echo '<option value="all">All Countries</option>';


		// Create an array to store cities by country
		$cities_by_country = array();

		foreach ($results as $row) {
			$city = esc_html($row['city_name']);
			$country = esc_html($row['country_code']);
			$price = floatval($row['flat_rate']);
			$id = intval($row['ID']);
			// Store cities in an array by country
			if (!isset($cities_by_country[$country])) {
				$cities_by_country[$country] = array();
			}
			$cities_by_country[$country][] = array('city' => $city, 'price' => $price, 'id' => $id);
		}

		// Generate the select options for countries

		$countries = WC()->countries->get_countries();


		foreach ($cities_by_country as $country_code => $cities) {
			echo '<option value="' . esc_attr($country_code) . '">' . esc_html($countries[$country_code]) . '</option>';
		}


		echo '</select>';
		echo '<input type="submit" name="update_prices" value="Update Prices">';
		echo '</form>';

		// Display cities based on the selected country
		echo '<div id="cities_display">';

		foreach ($cities_by_country as $country_code => $cities) {
			echo '<div class="country-cities" data-country="' . esc_attr($country_code) . '">';
			foreach ($cities as $city_data) {
				echo '<p>';
				echo '<strong>' . esc_html($city_data['city']) . ':</strong> ';
				echo '<input type="text" class="edit-price" value="' . esc_attr($city_data['price']) . '">';
				echo '<button data-value="' . esc_attr($city_data['id']) . '" class="delete-city">Delete</button>';
				echo '<button data-value="' . esc_attr($city_data['id']) . '" class="update-city">Update</button>';
				echo '</p>';
			}
			echo '</div>';
		}
		echo '</div>';
	} else {
		echo '<p>No cities and countries found.</p>';
	}
}

function enqueue_custom_script()
{
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/admin-city-shipping.js', array('jquery'), '11.0', true);
	wp_localize_script('custom-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

}

add_action('admin_enqueue_scripts', 'enqueue_custom_script');

// Same handler function...
add_action('wp_ajax_delete_city', 'delete_city');
function delete_city()
{
	global $wpdb;

	$id = intval($_POST['id']);

	$table_name = $wpdb->prefix . 'custom_cities';

	$result = $wpdb->delete($table_name, array('id' => $id));

	if ($result === false) {
		echo "Error deleting record: " . $wpdb->last_error;
	} else {
		echo "Record deleted successfully";
	}
	wp_die();
}


// Same handler function...
add_action('wp_ajax_update_city', 'update_city');
function update_city()
{
	global $wpdb;
	$id = intval($_POST['id']);
	$new_price = floatval($_POST['new_price']);

	$table_name = $wpdb->prefix . 'custom_cities';

	// Data to update
	$data_to_update = array(
		'flat_rate' => $new_price,
	);

	// Conditions for which rows to update
	$where = array(
		'id' => $id
	);

	$updated = $wpdb->update($table_name, $data_to_update, $where);

	if ($updated === false) {
		echo "Error updating record: " . $wpdb->last_error;
	} elseif ($updated === 0) {
		echo "No rows were updated.";
	} else {
		echo "Row updated successfully.";
	}

	wp_die();
}




// Add custom fields for regular price, sale price, sale schedule, and multiple countries to the product's General tab
function add_custom_field_to_product_general_tab() {
    global $post;

    // Check if the post type is 'product'
    if ($post->post_type === 'product') {
		

		$countries = WC()->countries->get_countries();

        foreach ($countries as $code => $country) {


			echo'<div class="country_container">';

			woocommerce_wp_checkbox(
                array(
                    'id' => '_custom_country_active_' . sanitize_title($country),
                    'description' => sprintf(__('Check this box to activate.', 'woocommerce'), $country),
                )
            );
			
			woocommerce_wp_text_input(
                array(
                    'id' => '_custom_country_price_' . sanitize_title($country),
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
                    'id' => '_custom_country_sale_price_' . sanitize_title($country),
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
			echo'</div>';


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
function save_custom_field_data($product_id) {
	$countries = WC()->countries->get_countries();

    foreach ($countries as $code =>  $name) {
        $price_field_name = '_custom_country_price_' . sanitize_title($name);
        $sale_price_field_name = '_custom_country_sale_price_' . sanitize_title($name);
        // $sale_schedule_field_name = '_custom_country_sale_schedule_' . sanitize_title($name);
        $active_field_name = '_custom_country_active_' . sanitize_title($name);


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
