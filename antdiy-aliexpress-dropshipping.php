<?php
/**
 * Plugin Name: Antdiy Dropshipping Solution: Find products on AliExpress for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/antdiy/
 * Description: Antdiy is AliExpress official dropshipping partner. It's the best way to place 100s of orders at once to AliExpress, find products, and more!
 * Version: 2.0.0
 * Author: Antdiy
 * Author URI: https://www.antdiy.vip/
 * Text Domain: antdiy
 * Domain Path: /languages
 **/
add_action( 'admin_menu', 'antdiy_woo_init' );
function antdiy_woo_init() {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $antdiy_source = \plugin_dir_url(dirname(__FILE__)) . \plugin_basename(dirname(__FILE__));
    add_menu_page( 'Antdiy', 'Antdiy', 'read', 'antdiy_page', 'antdiy_woo_displayInterface', $antdiy_source . "/assets/wp-ad-logo.svg", 2 );
}
function antdiy_woo_displayInterface() {
    $at_source = \plugin_dir_url(dirname(__FILE__)) . \plugin_basename(dirname(__FILE__));
    \wp_enqueue_style('antdiy',"{$at_source}/static/app.css", array(), '1.0.1');
    echo '<div id ="antdiy"  style=""><div><div class="at_header">';
    echo '<div class="at_logo"><img src="data:image/png;base64,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" alt="logo" ></div>';
    echo '<div class="at_info"><div class="at_text">Don’t hesitate to contact us if you have any questions!</div>';
    echo '<a href="mailto:apps@antdiy.vip" class="at_email at_span"><img src="data:image/svg+xml;base64,PHN2ZyBpZD0i5Zu+5bGCXzEiIGRhdGEtbmFtZT0i5Zu+5bGCIDEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDEyNCA5NiI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOm5vbmU7c3Ryb2tlOiNmZjRkNGY7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo2cHg7fTwvc3R5bGU+PC9kZWZzPjx0aXRsZT5FbWFpbDwvdGl0bGU+PHJlY3QgY2xhc3M9ImNscy0xIiB4PSIzIiB5PSIzIiB3aWR0aD0iMTE4IiBoZWlnaHQ9IjkwIiByeD0iMTAiLz48cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik01NDAuNDIsNDQ5bDUwLjEyLDQ4LjY4YTcuNjEsNy42MSwwLDAsMCwxMC45MiwwTDY1MS41OCw0NDkiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC01MzQgLTQ0NCkiLz48L3N2Zz4=" alt="Email">Email Us</a>';
    echo '<a href="https://platform.antdiy.vip/#/app/importProducts?source=ad-woo" target="_blank" class = "at_connect">Sync to Antdiy</a></div></div>';
    echo '<div class= "at_content"><div class= "at_info">';
    echo  '<p >Click ‘Connect’ to Connect your store to Antdiy. Start your dropshipping journey with Antdiy!</p><br />';
    echo '<a href="https://platform.antdiy.vip/#/wooBinding?source=ad-woo&shop=' . home_url('/') . '" target="_blank" class = "at_connect">CONNECT</a>';
    echo  '</div></div><div class="ant_products">';
    $at_products_res = antdiy_woo_products();
    foreach ($at_products_res->products as $product) {
        echo  '<div class="ant_product"><a href="'.$product->url.'" target="_blank">';
        echo  '<div class="ant_card_img">';
        echo "<img src='$product->icon' />";
        echo  '<div class="ant_price2"><span class="ant_old_price">US $'.$product->price2.'</span></div>';
        echo  '</div><div class="ant_card_body"><div class="ant_card_content"><div class="ant_card_meta">';
        echo "$product->title";
        echo  '</div><div class="ant_card_wrapper">';
        echo "US $$product->price1 <br></div></div></div></a></div>";
    }
    echo  '</div></div></div>';
}
function antdiy_woo_products() {
    $rep = wp_remote_request('https://gateway.antdiy.vip/account-service/products/recommend/pass', array( 'method' => 'GET' , ) );
    return json_decode(wp_remote_retrieve_body($rep));
}