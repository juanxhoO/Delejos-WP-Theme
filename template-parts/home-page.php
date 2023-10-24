<?php
/**
 * Template part for displaying posts
 * Template Name: Home Template 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delejos_Theme
 */

get_header();

?>
<!--Homepage Custom Menu  -->
<div class="d-flex justify-content-around  container pt-4 pb-4">
	<div class="site-branding">
		<?php
		the_custom_logo();
		if (is_front_page() && is_home()):
			?>
			<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<?php bloginfo('name'); ?>
				</a>
			</h1>
			<?php
		endif; ?>
	</div><!-- .site-branding -->


	<div class="d-flex delejos_home_menu">
		<!-- This div will vertically align the content -->
		<nav class="navbar navbar-expand-lg">
			<div class="collapse navbar-collapse" id="navbarNav">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'home-menu',
						// Change this to your menu location
						'menu_class' => 'navbar-nav ',
						'walker' => new Bootstrap_Nav_Walker(),
					)
				);
				?>
			</div>
		</nav>
	</div>
	<div class="d-flex align-items-center">

		<div class="myaccount_container">
			<?php
			if (is_user_logged_in()) { ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
					title="<?php _e('My Account', 'woothemes'); ?>"><i class="fa-solid fa-user"></i>
					<?php _e('My Account', 'woothemes'); ?>
				</a>
			<?php } else { ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
					title="<?php _e('Login / Register', 'woothemes'); ?>"><i class="fa-solid fa-user"></i>
					<span>
						<?php _e('Login / Register', 'woothemes'); ?>
					</span>

				</a>
			<?php } ?>

		</div>


		<div class="d-flex align-items-center cart-container">
			<i class="fa-solid fa-cart-shopping"></i>
			<?php
			if (function_exists('ecommerce_delejos_woocommerce_header_cart')) {
				ecommerce_delejos_woocommerce_header_cart();
			}
			?>
		</div>

	</div>
</div>

<!-- Hero Element for Displaying Country City and Ocassion  -->

<div class="container">

	<div class="px-4 py-2 my-2 text-center row justify-content-center">


		<form method="POST" action="" class="delejos_homepage_selector row" id="delejos_homepage_selector_form">

			<!-- Country Selector -->
			<div class="col-lg-4 mx-auto">

				<?php
				// Get the list of allowed countries for various purposes (e.g., shipping and billing).
				$allowed_countries = WC()->countries->get_allowed_countries();

				echo '<div id="my_custom_countries_field">';

				woocommerce_form_field(
					'country',
					array(
						'id' => "delejos_country_selector",
						'type' => 'select',
						'required' => true,
						'input_class' => array('form-select form-select-lg'),
						'label' => 'Select a country',
						'placeholder' => __('Select Country'),
						'options' => array('' => __('Select Country')) + $allowed_countries // Add the default option
					)
				);
				echo '</div>';

				?>
			</div>

			<!-- City Selector -->
			<div class="col-lg-4 mx-auto">
				<div id="my_custom_countries_field"><label>Select City</label><select required name="city"
						id="delejos_city_selector" class="form-select form-select-lg">
						<option>Select City</option>
					</select>
				</div>


			</div>

			<!--  Ocasion Selector -->
			<div class="col-lg-4 mx-auto">
				<label for="subcategory_dropdown">Select Ocasion:</label>
				<select class="form-select form-select-lg text-center" name="ocasion" id="delejos_ocasion_selector">
					<option>Select Ocasion</option>
					<?php
					// Get the product categories from WooCommerce.
					$categories = get_terms(
						array(
							'taxonomy' => 'product_cat',
							'hide_empty' => false,
							'exclude' => array(15,20,22), // Replace 1 and 5 with the category IDs you want to exclude.
						)
					);

					if ($categories && !is_wp_error($categories)) {
						foreach ($categories as $category) {
							echo '<option value="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</option>';
						}
					}

					?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary btn-lg mt-4">Filter</button>
		</form>
	</div>
</div>




<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
	<div class="carousel-indicators">
		<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"
			aria-current="true"></button>
		<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
		<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
	</div>
	<div class="carousel-inner">
		<div class="carousel-item carousel-item-next carousel-item-start">
			<img src="http://localhost/wp-content/uploads/2023/10/c_banner1.jpg">
			<div class="container">
				<div class="carousel-caption text-start">
					<h1>Example headline.</h1>
					<p class="opacity-75">Some representative placeholder content for the first slide of the
						carousel.</p>
					<p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img src="http://localhost/wp-content/uploads/2023/10/c_banner2.jpg">
			<div class="container">
				<div class="carousel-caption">
					<h1>Another example headline.</h1>
					<p>Some representative placeholder content for the second slide of the carousel.</p>
					<p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
				</div>
			</div>
		</div>
		<div class="carousel-item active carousel-item-start">
			<img src="http://localhost/wp-content/uploads/2023/10/c_banner3.jpg">
			<div class="container">
				<div class="carousel-caption text-end">
					<h1>One more for good measure.</h1>
					<p>Some representative placeholder content for the third slide of this carousel.</p>
					<p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
				</div>
			</div>
		</div>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>

<div class="container content-menu">
	<?php
	while (have_posts()):
		the_post();

		get_template_part('template-parts/content', 'page');

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()):
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
</div>
</div>
<?php
get_footer();
?>