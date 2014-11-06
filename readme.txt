=== WooCommerce Autocomplete Order ===
Contributors: rashef
Donate link: http://cl.ly/2C2W181j1G2g
Tags: WooCommerce, order, complete, virtual, autocomplete
Requires at least: 3.3
Tested up to: 4.0.0
Stable tag: 0.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Do you hate WooCommerce for obliging you to manually approve every order placed for non-downloadable goods? This plugin is the answer, since allows to automatically mark orders for <strong>virtual</strong> products as Completed after a successful payment (e.g. with PayPal or Credit Card).

== Description ==

WooCommerce by design allows to automatically mark as compelted only orders for product marked as "virtual" and "downloadable". This plugin allows to extend the same functionality to products that have just the "virtual" flag on so you can still benefit from the same features reserved to physical products.
Please be aware that in any case WooCommerce allows to mark an order as completed only upon a successful payment and therefore this plugin will not allow the order to be approved if the order is paid with money transfer or "cash-on-delivery".

== Installation ==

1. Upload the plugin's folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Flag as "Virtual" all the products you want to be unlocked for users upon successful payment without any further (manual) action from you in the backoffice

== Frequently asked questions ==

= The plugin is not working =
Please ensure that all the products listed in the order are "virtual".

= Uh-uh, still not working! =
If you are testing with PayPal, please ensure that in WooCommerce settings you are using the "Primary Email" the PayPal account is associated to. Using a secondary email might prevent the payment notification from reaching WooCommerce and the order cannot be completed without proof of payment.

= No dude, not working yet! =
Please deactivate my plugin, test with a product marked as "virtual" **and** "downloadable". If it still doesn't work, then there's something wrong in your WooCommerce configuration or in your payment gateway. If it does work, please write me through the forum!

== Changelog ==

= v0.1.2 =
* Updated compatibility.
* Added localization support.
* Added Italian localization.
* Added Spanish localization.

= v0.1.1 =
* Added links to support and the official page.

= v0.1 =
* First release.

== Upgrade notice ==

* Tested with WordPress 4.0 and the latest version of WooCommerce.
* Added Italian and Spanish translations.