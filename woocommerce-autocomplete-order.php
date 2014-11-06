<?php
/**
	Plugin Name: WooCommerce - Autocomplete Order
	Plugin URI: 
	Description: Do you hate WooCommerce for obliging you to manually approve every order placed for non-downloadable goods? This plugin is the answer, since allows to automatically mark orders for **virtual** products as Completed after a successful payment (e.g. with PayPal or Credit Card).
	Version: 0.1.2
	Author: Mirko Grewing
	Author URI: http://www.mirkogrewing.it	
		
		Copyright: © 2013 Mirko Grewing (email : mirko.grewing@live.com)	
		License: GNU General Public License v3.0	
		License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

define('WOOAO_DIR', plugin_dir_path(__FILE__));
define('WOOAO_URL', plugin_dir_url(__FILE__));

add_action('plugins_loaded', 'loadTextdomain');
/**
 * Launch the localization
 *
 * @return null
 */
function loadTextdomain() 
{
    $loaded = load_plugin_textdomain('wooAutocomplete', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

/**
 * Loading the core file
 *
 * @return null
 */
function wooaoLoad()
{
    require_once(WOOAO_DIR.'includes/core.php');
}
wooaoLoad();
?>