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


	<div class="d-flex">
		<!-- This div will vertically align the content -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
	<div class="d-flex align-items-center cart-container">
			<?php
			if (function_exists('ecommerce_delejos_woocommerce_header_cart')) {
				ecommerce_delejos_woocommerce_header_cart();
			}
			?>
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


<div class="container">
	<div class="jumbotrons mt-5 row align-items-md-stretch">
		<div class="col-md-6">
			<div class="h-100 p-5 text-bg-dark rounded-3">
				<h2>Change the background</h2>
				<p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look.
					Then, mix and match with additional component themes and more.</p>
				<button class="btn btn-outline-light" type="button">Example button</button>
			</div>
		</div>
		<div class="col-md-6">
			<div class="h-100 p-5 text-bg-dark rounded-3">
				<h2>Change the background</h2>
				<p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look.
					Then, mix and match with additional component themes and more.</p>
				<button class="btn btn-outline-light" type="button">Example button</button>
			</div>
		</div>
	</div>
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