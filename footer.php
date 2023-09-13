<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Delejos_Theme
 */
?>
<footer id="colophon" class="site-footer py-5">

	<div class="container">
		<div class="row text-center">
			<!-- <?php
			function are_footer_widgets_active($num_widgets = 4)
			{
				for ($i = 1; $i <= $num_widgets; $i++) {
					$sidebar_name = 'footer-' . $i;

					if (is_active_sidebar($sidebar_name)) {
						return true; // At least one footer widget is active
					}
				}

				return false; // No footer widgets are active
			}
			?> -->

			<div id="secondary" class="col-3 col-md-3 mb-3">
				<?php dynamic_sidebar('footer-1'); ?>
			</div><!-- #secondary -->

			<div id="secondary" class="col-3 col-md-3 mb-3">
				<?php dynamic_sidebar('footer-2'); ?>
			</div><!-- #secondary -->

			<div id="secondary" class="col-3 col-md-3 mb-3">
				<?php dynamic_sidebar('footer-3'); ?>
			</div><!-- #secondary -->

			<div id="secondary" class="col-3 col-md-3 mb-3">
				<?php dynamic_sidebar('footer-4'); ?>
			</div><!-- #secondary -->

		</div>
		<div class="site-info text-center">
			<a href="<?php echo esc_url(__('https://wordpress.org/', 'ecommerce-delejos')); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf(esc_html__('Proudly powered by %s', 'ecommerce-delejos'), 'WordPress');
				?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf(esc_html__('Theme: %1$s by %2$s.', 'ecommerce-delejos'), 'ecommerce-delejos', '<a href="http://underscores.me/">Juan Granja</a>');
			?>
		</div><!-- .site-info -->

	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>