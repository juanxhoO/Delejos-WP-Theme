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

</div><!-- #page -->
<footer id="colophon" class="site-footer py-5">


	<?php if (is_front_page()) { ?>
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

				<div id="secondary" class="col-md-3 mb-3 col-6 delejos_footer_menu">
					<?php dynamic_sidebar('footer-1'); ?>
				</div><!-- #secondary -->

				<div id="secondary" class="col-md-3 mb-3 col-6 delejos_footer_menu">
					<?php dynamic_sidebar('footer-2'); ?>
				</div><!-- #secondary -->

				<div id="secondary" class="col-md-3 mb-3 col-6 delejos_footer_menu">
					<?php dynamic_sidebar('footer-3'); ?>
				</div><!-- #secondary -->

				<div id="secondary" class="col-md-3 mb-3 col-6 delejos_footer_menu">
					<?php dynamic_sidebar('footer-4'); ?>
				</div><!-- #secondary -->

			</div>
		</div>


	<?php } ?>



	<?php

	if (!is_front_page()) {
		?>
		<div>
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
		</div><!-- .entry-footer -->
	<?php }

	?>
</footer><!-- #colophon -->

<?php wp_footer(); ?>


</body>

</html>