<?php
/**
 * Template part for displaying posts
 * Template Name: Country Template 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delejos_Theme
 */
get_header();
$product_category = get_query_var('product_category');
$product = get_query_var('product');

// Use these variables to fetch and display the product content.
// Example: Query your database and display product details.

echo($country);
echo($product);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php ecommerce_delejos_post_thumbnail(); ?>

	<div class="entry-content">
		<main id="primary" class="site-main">

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

		</main><!-- #main -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wp_footer();
		get_footer();

		?>

	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->