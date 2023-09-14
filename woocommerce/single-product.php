<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>


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

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action('woocommerce_before_main_content');
?>

<div class="container">


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

    <?php while (have_posts()): ?>
        <?php the_post(); ?>

        <?php wc_get_template_part('content', 'single-product'); ?>

    <?php endwhile; // end of the loop. ?>


    <div>

        <?php
        /**
         * woocommerce_after_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action('woocommerce_after_main_content');
        ?>

        <?php
        /**
         * woocommerce_sidebar hook.
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        do_action('woocommerce_sidebar');
        ?>

        <?php
        get_footer('shop');

        /* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */