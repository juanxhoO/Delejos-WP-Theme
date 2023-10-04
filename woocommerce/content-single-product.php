<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action('woocommerce_before_single_product_summary');
    ?>

    <div class="summary entry-summary col-md-6 col-sm-12">

        <?php
        /**
         * Hook: woocommerce_single_product_summary.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         * @hooked WC_Structured_Data::generate_product_data() - 60
         */
        do_action('woocommerce_single_product_summary');

        global $product;
        $countries = WC()->countries->get_countries();
        
        foreach ($countries as $code => $country) {
            $price_field_name = '_custom_country_price_' . sanitize_title($country);
            $sale_price_field_name = '_custom_country_sale_price_' . sanitize_title($country);
            $active_field_name = '_custom_country_active_' . sanitize_title($country);

            $country_price = get_post_meta(get_the_ID(), $price_field_name, true);
            $country_sale_price = get_post_meta(get_the_ID(), $sale_price_field_name, true);
            $country_active = get_post_meta(get_the_ID(), $active_field_name, true);

                if ($country_price) {
                    echo '<p class="price">' . sprintf(__('Price in %s: %s', 'woocommerce'), $country, wc_price($country_price)) . '</p>';
                }

                // if ($country_sale_price && $country_sale_schedule) {
                //     $current_date = date('Y-m-d');

                //     if ($current_date >= $country_sale_schedule) {
                //         echo '<p class="country-sale-price">' . sprintf(__('Sale Price in %s: %s', 'woocommerce'), $country, wc_price($country_sale_price)) . '</p>';
                //     } else {
                //         echo '<p class="country-sale-price">' . sprintf(__('Sale starts on %s in %s', 'woocommerce'), $country_sale_schedule, $country) . '</p>';
                //     }
                // }
            
        }

        ?>
    </div>

    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action('woocommerce_after_single_product_summary');
    ?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>