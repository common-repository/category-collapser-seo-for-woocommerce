<?php
/**
 * Plugin Name: Category collapser SEO for woocommerce
 * Plugin URI:  https://wordpress.org/plugins/
 * Description: Improve the SEO of your woocommerce categories
 * Version:     1.0.1
 * Author:      Camilo
 * Author URI:  https://camilowp.com/
 * Text Domain: category-collap-woo-seo
 * Domain Path: /languages
 * License:     GPL3
 * WC tested up to: 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// WooCommerce is active
add_action('admin_init', 'category_collapser_active');

function category_collapser_active() {
        if (is_admin() && current_user_can("activate_plugins") && !is_plugin_active("woocommerce/woocommerce.php")) {
            add_action('admin_notices', 'category_collapser_notice');
            deactivate_plugins(plugin_basename(__FILE__));
            $flag = (int) $_GET['activate'];
            if (isset($flag)) {
                unset($_GET['activate']);
            }
        }
    }

function category_collapser_notice() {
 if ( is_admin() ) {
        $plugin_URL =  esc_url( admin_url('plugin-install.php?s=woocommerce&tab=search&type=term') );
        ?>
        <div class="error">
            <p>
                <?php
                printf( __('%s must be installed and activated for the Category collapser SEO for woocommerce Check plugin to work', 'category-collap-woo-seo'), '<a href="' . $plugin_URL . '">WooCommerce</a>'
                );
                ?>
            </p>
        </div>
        <?php
    }
  }

function load_translation_category_collap_seo()
{
    load_plugin_textdomain('category-collap-woo-seo', false, basename(dirname(__FILE__)) . '/languages');
}

add_action('init', 'load_translation_category_collap_seo');

function register_cat_collapser_script() {
  if ( is_product_category() ) {
	wp_register_script('cat-collapser', plugins_url( 'assets/js/jquery.collapser.min.js' , __FILE__ ), array('jquery'), true);
	wp_print_scripts('cat-collapser');
}
}

function category_collapser_css() {
if ( is_product_category() ) {
?>
 <style type="text/css">
.term-description {
	padding-bottom:1em;
}
 </style>
<?php
}
}
add_action( 'wp_head', 'category_collapser_css' );

include_once('includes/settings.php');
include_once('includes/main.php');


?>
