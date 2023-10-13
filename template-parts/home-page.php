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

		<div>
			<?php
			if (is_user_logged_in()) { ?>
				<i class="fa-solid fa-user"></i><a
					href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
					title="<?php _e('My Account', 'woothemes'); ?>">
					<?php _e('My Account', 'woothemes'); ?>
				</a>
			<?php } else { ?>
				<i class="fa-solid fa-user"></i><a
					href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
					title="<?php _e('Login / Register', 'woothemes'); ?>">
					<?php _e('Login / Register', 'woothemes'); ?>
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

	<div class="px-4 py-2 my-5 text-center row">


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
						'class' => array('chzn'),
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
				<select class="form-select form-select-lg" name="ocasion" id="delejos_ocasion_selector">
					<option>Select Ocasion</option>
					<?php
					$parent_category_slug = 'ocasion'; // Replace with the slug of the category you want to exclude.
					
					// Get the category ID by slug.
					$parent_category = get_term_by('slug', $parent_category_slug, 'product_cat');

					if ($parent_category && !is_wp_error($parent_category)) {
						// Get subcategories of the parent category
						$parent_category_id = $parent_category->term_id;
						$subcategories = get_terms(
							array(
								'taxonomy' => 'product_cat',
								'hide_empty' => false,
								'parent' => $parent_category_id,
							)
						);
						foreach ($subcategories as $subcategory) {
							echo '<option value="' . esc_attr($subcategory->term_id) . '">' . esc_html($subcategory->name) . '</option>';
						}
					}
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary btn-lg disabled">Filter</button>
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
			<img src="http://localhost/wp-content/uploads/2023/09/c_banner4.jpg">
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
			<img src="http://localhost/wp-content/uploads/2023/09/c_banner.jpg">
			<div class="container">
				<div class="carousel-caption">
					<h1>Another example headline.</h1>
					<p>Some representative placeholder content for the second slide of the carousel.</p>
					<p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
				</div>
			</div>
		</div>
		<div class="carousel-item active carousel-item-start">
			<img src="http://localhost/wp-content/uploads/2023/09/c_banner3.jpg">
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