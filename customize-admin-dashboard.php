<?php
/*
  Plugin Name: WP Custom Admin Dashboard
  Description: A basic All-in-one plugin that allows users to customize the Wordpress Admininstration dashboard.  Change most options including: Dashboard widgets, Login page, Top Bar Header, Bottom Bar Footer & general options.
  Version: 1.2
  Author: Inceva
  Author URI: https://www.inceva.co.th
 */

if (!defined('ABSPATH')) {
  exit;
}

/***************************************************************/
/***************************************************************/

/*Includes start*/

/*Main functions start*/
include(plugin_dir_path( __FILE__ ) . 'includes/main/main-functions.php');
/*Main functions end*/

/***************************************************************/

/*Options functions start*/
include(plugin_dir_path( __FILE__ ) . 'includes/options/options-functions.php');
/*Options functions end*/

/***************************************************************/

/*SRC functions start*/
include(plugin_dir_path( __FILE__ ) . 'includes/src/src-functions.php');
/*SRC functions end*/

/***************************************************************/

/*AJAX functions start*/
include(plugin_dir_path( __FILE__ ) . 'includes/ajax/ajax.php');
/*AJAX functions end*/

/***************************************************************/

/*Includes end*/

/***************************************************************/
/***************************************************************/

/*Add settings link to plugin page start*/
function cad_add_settings_link( $links ) {
  $settings_link = '<a href='.admin_url('admin.php?page=customize-admin-dashboard&tab=login').'>' . __( 'Settings' ) . '</a>';
  array_push( $links, $settings_link );
  return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter("plugin_action_links_$plugin", 'cad_add_settings_link' );
/*Add settings link to plugin page end*/

/*Get plugin URL start*/
function cad_get_plugin_base_url(){
  return plugin_dir_path( __FILE__ );
}
/*Get plugin URL end*/

/***************************************************************/
/***************************************************************/