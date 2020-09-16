<?php
/**
 * Plugin Name:       WooCommerce Sold Out Badge
 * Description:       A simple "Sold Out" badge for out-of-stock products.
 * Version:           0.1.0
 * Requires at least: 5.3
 * Requires PHP:      7.0
 * Author:            Luca Scalzotto
 * Author URI:        https://github.com/LucaScorpion
 * Text Domain:       woocommerce-sold-out-badge
 * Domain Path:       /languages
 */

namespace WooCommerceSoldOutBadge;

function init_hooks() {
    add_action('plugins_loaded', __NAMESPACE__ . '\load_text_domain');
    add_action('woocommerce_before_shop_loop_item_title', __NAMESPACE__ . '\show_sold_out_badge');
    add_action('wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_badge_style');
}

function load_text_domain() {
    load_plugin_textdomain('woocommerce-sold-out-badge', false, dirname(plugin_basename(__FILE__)) . '/languages');
}

function show_sold_out_badge() {
    global $product;
    if (!$product->is_in_stock()) {
        printf('<span class="sold-out-badge">%s</span>', __('Sold Out', 'woocommerce-sold-out-badge'));
    }
}

function enqueue_badge_style() {
    wp_enqueue_style('woocommerce-sold-out-badge', plugins_url('/sold-out-badge.css', __FILE__));
}

init_hooks();
