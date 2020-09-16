<?php
/**
 * Plugin Name:       WooCommerce Sold Out Badge
 * Description:       A simple "Sold Out" badge for out-of-stock products.
 * Version:           0.1.0
 * Requires at least: 5.3
 * Requires PHP:      7.0
 * Author:            Luca Scalzotto
 * Author URI:        https://github.com/LucaScorpion
 */

function show_sold_out_badge() {
    global $product;
    if (!$product->is_in_stock()) {
        printf('<span class="sold-out-badge">Sold Out</span>');
    }
}

add_action('woocommerce_before_shop_loop_item_title', 'show_sold_out_badge');

function enqueue_badge_style() {
    wp_enqueue_style('woocommerce-sold-out-badge', plugins_url('/sold-out-badge.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'enqueue_badge_style');
