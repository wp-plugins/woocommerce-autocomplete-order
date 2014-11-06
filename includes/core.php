<?php
/**
	Plugin Name: WooCommerce - Autocomplete Order
	Plugin URI: 
	Description: Do you hate WooCommerce for obliging you to manually approve every order placed for non-downloadable goods? This plugin is the answer, since allows to automatically mark orders for <strong>virtual</strong> products as Completed after a successful payment (e.g. with PayPal or Credit Card).
	Version: 0.1.2
	Author: Mirko Grewing
	Author URI: http://www.mirkogrewing.it	
		
		Copyright: © 2013 Mirko Grewing (email : mirko.grewing@live.com)	
		License: GNU General Public License v3.0	
		License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

add_action('plugins_loaded', 'wooAutocompleteOrderInit', 0);

/**
 * Launch the main function
 *
 * @return null
 */
function wooAutocompleteOrderInit()
{
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        add_filter('woocommerce_payment_complete_order_status', 'virtualOrderPaymentCompleteOrderStatus', 10, 2);
        /**
         * Launch the main function
         *
         * @return string
         */
        function virtualOrderPaymentCompleteOrderStatus($order_status, $order_id)
        {
            $order = new WC_Order($order_id);
            if ('processing' == $order_status && ('on-hold' == $order->status || 'pending' == $order->status || 'failed' == $order->status)) {
                $virtual_order = null;
                if (count($order->get_items()) > 0 ) {
                    foreach ($order->get_items() as $item) {
                        if ('line_item' == $item['type']) {
                            $_product = $order->get_product_from_item($item);
                            if (!$_product->is_virtual()) {
                                // once we've found one non-virtual product we know we're done, break out of the loop
                                $virtual_order = false;
                                break;
                            } else {
                                $virtual_order = true;
                            }
                        }
                    }
                }
                // virtual order, mark as completed
                if ($virtual_order) {
                    return 'completed';
                }
            }
            // non-virtual order, return original status
            return $order_status;
        }
    } else {
        /**
         * Show warning in the Dashboard
         *
         * @return string
         */
        function checkWooNotices()
        {
            if (!is_plugin_active('woocommerce/woocommerce.php')) {
                ob_start();
                echo '<div class="error">
                    <p><strong>';
                    _e('WARNING', 'wooAutocomplete');
                    echo '</strong>: ' . __('WooCommerce is not active and WooCommerce Autocomplete Order will not work!', 'wooAutocomplete') . '</p>
                </div>';
                echo ob_get_clean();
            }
        }
        add_action('admin_notices', 'checkWooNotices');	
    }
}
?>