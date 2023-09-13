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
<style>
	/* Dropdown on Hover */
	.nav-item.dropdown:hover .dropdown-menu {
		display: block;
	}

	/* Ensure the dropdown menu appears above other content */
	.dropdown-menu {
		position: absolute;
		z-index: 1000;
	}
</style>

<header class="entry-header">
	<div class="top_menu container d-flex flex-wrap">
		<ul class="nav me-auto">
			<li class="nav-item"><a href="">+1-646-597-8034 </a></li>

			<li class="nav-item"><a href="">+1-646-597-8034 </a></li>

			<li class="nav-item"><a href="">+1-646-597-8034 </a></li>
		</ul>

		<div>
			currency exchanger
		</div>
		<div>

			Languaje Siwtch
		</div>
	</div>
</header><!-- .entry-header -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content container">
		<main id="primary" class="site-main">

			<?php
			if (has_nav_menu('page_a')) {
				// do something
				?>
				<div class="navbar navbar-expand-lg navbar-light bg-light ">
					<div class="collapse navbar-collapse justify-content-md-center" id="navbarNav">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'category-menu',
								// Change this to your menu location
								'menu_class' => 'navbar-nav ml-auto',
								'walker' => new Bootstrap_Nav_Walker(),
							)
						);
						?>
					</div>
				</div>
				<?php
			} ?>

			<?php
			while (have_posts()):
				the_post();
				get_template_part('template-parts/content', 'page');
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- .entry-content -->


	<footer class="entry-footer">

		<div class="container">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-menu',
					// Change this to your menu location
					'menu_class' => 'nav justify-content-center border-bottom',
					// Use the custom walker class for this menu
				)
			);
			?>
		</div>
		<?php wp_footer();

		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->