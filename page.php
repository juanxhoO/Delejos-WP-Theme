<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delejos_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container content-menu">
		<nav class="navbar navbar-expand-lg desktop-category-navbar navbar">
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
		<?
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


</main><!-- #main -->

<?php
get_sidebar();
get_footer();