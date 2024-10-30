<?php
add_action( 'admin_menu', 'category_collapser_add_admin_menu' );


function category_collapser_add_admin_menu(  ) {

add_submenu_page( 'woocommerce', 'Category Collapser SEO', 'Category Collapser SEO', 'manage_options', 'category-collapser-seo', 'category_collapser_options_page' );

}


function category_collapser_options_page() {
				include_once('settings_page.php');
}



?>
