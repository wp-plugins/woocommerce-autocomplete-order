<?php
/*
	Plugin Name: WooCommerce - Autocomplete Order
	Plugin URI: 
	Description: This plugin allows to automatically set any order for any virtual product on Completed status right after a successfull payment.
	Version: 0.1
	Author: Mirko Grewing
	Author URI: http://www.mirkogrewing.eu	
		
		Copyright: © 2013 Mirko Grewing (email : mirko@grewing.us)	
		License: GNU General Public License v3.0	
		License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

define('WOOAO_DIR', plugin_dir_path(__FILE__));
define('WOOAO_URL', plugin_dir_url(__FILE__));
function wooao_load(){
    require_once(WOOAO_DIR.'includes/core.php');}
wooao_load();
?>