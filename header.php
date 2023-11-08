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
					<li class="nav-item"><i class="fa-solid fa-phone"></i>
						<a href="">+1-646-597-8034 </a>
					</li>
					<li class="nav-item"><i class="fa-brands fa-whatsapp"></i><a href="">+1-646-597-8034 </a></li>
					<li class="nav-item"><i class="fa-solid fa-envelope"></i><a
							mailto="info@delejos.com">info@delejos.com</a></li>
				</ul>

				<div class="d-flex align-items-center cart-container d-none d-lg-flex">
					<?php if (!is_front_page()) { ?>
						<li class="nav-item">

							<?php if (is_user_logged_in()) { ?>

								<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
									title="<?php _e('My Account', 'woothemes'); ?>"><i class="fa-solid fa-user"></i>
									<span>
										<?php _e('My Account', 'woothemes'); ?>
									</span>

								</a>
							<?php } else { ?>
								<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
									title="<?php _e('Login / Register', 'woothemes'); ?>"><i class="fa-solid fa-user"></i>
									<span>
										<?php _e('Login / Register', 'woothemes'); ?>
									</span>
								</a>
							<?php } ?>
						</li>
						<?php
					} ?>
					<?php
					if (!is_front_page()) {

						echo ("<i class='fa-solid fa-cart-shopping'></i>");
						if (function_exists('ecommerce_delejos_woocommerce_header_cart')) {
							ecommerce_delejos_woocommerce_header_cart();
						}
					}
					?>
				</div>
			</div>

			<!--CountryPage Custom Menu  -->
			<?php
			if (!is_home() && !is_front_page()) { ?>
				<div class="justify-content-around  container pt-4 pb-4">
					<nav class="navbar navbar-light bg-light">
						<div class="container-fluid">
							<div class="site-branding ">
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
							<div class="losgos2up d-none d-lg-block">
								<div class="logossup">
									<img src="https://es.delejos.com/images/logosupspanish.png">
								</div>
							</div>

							<div class="delejos_mobile_container d-flex">
								<div class="d-flex align-items-center cart-container mx-2">
									<?php if (!is_front_page()) { ?>
										<li class="nav-item mx-2">

											<?php if (is_user_logged_in()) { ?>

												<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
													title="<?php _e('My Account', 'woothemes'); ?>"><i class="fa-solid fa-user"></i>
													<span>
														<?php _e('My Account', 'woothemes'); ?>
													</span>

												</a>
											<?php } else { ?>
												<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
													title="<?php _e('Login / Register', 'woothemes'); ?>"><i
														class="fa-solid fa-user"></i>
													<span>
														<?php _e('Login / Register', 'woothemes'); ?>
													</span>
												</a>
											<?php } ?>
										</li>
										<?php
									} ?>
									<?php
									if (!is_front_page()) {

										echo ("<i class='fa-solid fa-cart-shopping'></i>");
										if (function_exists('ecommerce_delejos_woocommerce_header_cart')) {
											ecommerce_delejos_woocommerce_header_cart();
										}
									}
									?>
								</div>

								<button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
									data-bs-target="#mobile_menu" aria-controls="navbarSupportedContent"
									aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
							</div>


							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'category-menu',
									'container_class' => 'collapse navbar-collapse d-lg-none',
									'container_id' => 'mobile_menu',
									// Change this to your menu location
									'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
									'walker' => new Mobile_Nav_Walker(),
								)
							);
							?>
						</div>
					</nav>
				</div>
			<?php } ?>
		</header><!-- .entry-header -->