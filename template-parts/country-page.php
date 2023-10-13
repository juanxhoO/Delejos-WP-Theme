<?php
/**
 * Template part for displaying posts
 * Template Name: Country Template 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delejos_Theme
 */
get_header();
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
					aria-label="Slide 1" aria-current="true"></button>
				<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
					class=""></button>
				<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
					class=""></button>
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

		<main id="primary" class="site-main container">
			<nav class="navbar navbar-expand-lg category-navbar navbar">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'category-menu',
						'container_class' => 'collapse navbar-collapse justify-content-md-center',
						// Change this to your menu location
						'menu_class' => 'navbar-nav',
						'walker' => new Bootstrap_Nav_Walker(),
					)
				);
				?>
			</nav>
			<?php
			while (have_posts()):
				the_post();
				get_template_part('template-parts/content', 'page');
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- .entry-content -->
	<?php wp_footer(); ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
get_footer();
?>