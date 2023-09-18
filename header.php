<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Delejos_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary">
			<?php esc_html_e('Skip to content', 'ecommerce-delejos'); ?>
		</a>

		<header>
			<div class="top_menu container d-flex flex-wrap">
				<ul class="nav me-auto">
					<li class="nav-item"><a href="">+1-646-597-8034 </a></li>
					<li class="nav-item"><a href="">+1-646-597-8034 </a></li>
					<li class="nav-item"><a href="">+1-646-597-8034 </a></li>
					<li class="nav-item">
						<?php if (!is_front_page()) {
							if (is_user_logged_in()) { ?>
								<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
									title="<?php _e('My Account', 'woothemes'); ?>">
									<?php _e('My Account', 'woothemes'); ?>
								</a>
							<?php } else { ?>
								<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
									title="<?php _e('Login / Register', 'woothemes'); ?>">
									<?php _e('Login / Register', 'woothemes'); ?>
								</a>
							<?php }
						} ?>
					</li>
				</ul>

				<div class="d-flex align-items-center cart-container">
					<?php
					if (!is_front_page()) {
						if (function_exists('ecommerce_delejos_woocommerce_header_cart')) {
							ecommerce_delejos_woocommerce_header_cart();
						}
					}
					?>
				</div>
				<div>
					currency exchanger
				</div>
				<div>
					Languaje Siwtch
				</div>
			</div>
			<!--Homepage Custom Menu  -->
			<?php
			if (!is_home() && !is_front_page()) { ?>
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
					<div class="d-flex align-items-center">
				
					</div>
				</div>
			<?php } ?>
		</header><!-- .entry-header -->