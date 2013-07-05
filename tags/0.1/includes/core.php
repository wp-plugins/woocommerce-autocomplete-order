<?php
	add_action('plugins_loaded', 'woocommerce_autocomplete_order_init', 0);
	function woocommerce_autocomplete_order_init(){
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			add_filter( 'woocommerce_payment_complete_order_status', 'virtual_order_payment_complete_order_status', 10, 2 );
			function virtual_order_payment_complete_order_status( $order_status, $order_id ) {
				$order = new WC_Order( $order_id );
				if ( 'processing' == $order_status &&
				( 'on-hold' == $order->status || 'pending' == $order->status || 'failed' == $order->status ) ) {
					$virtual_order = null;
					if ( count( $order->get_items() ) > 0 ) {
						foreach( $order->get_items() as $item ) {
							if ( 'line_item' == $item['type'] ) {
								$_product = $order->get_product_from_item( $item );
									if ( ! $_product->is_virtual() ) {
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
					if ( $virtual_order ) {
						return 'completed';
					}
				}
				// non-virtual order, return original status
				return $order_status;
			}
		}
		else {		
			function check_woo_notices() {			
				if (!is_plugin_active('woocommerce/woocommerce.php')) {				
					ob_start(); ?>			
					<div class="error">				
						<p><strong>WARNING</strong>: WooCommerce is not active and WooCommerce Autocomplete Order will not work!</p>			
					</div>			
					<?php			
					echo ob_get_clean();				
				}		
			}		
			add_action('admin_notices', 'check_woo_notices');	
		}
	}
?>