<?php
/**
 * Ajax
 *
 * @package  customize-admin-dashboard
 * @developer  Inceva <https://www.inceva.co.th>
 * @version 1.1
 *
 */
if (!defined('ABSPATH')) {
    exit;
}
/***************************************************************/
/***************************************************************/

/***************************************************************/

add_action("wp_ajax_cad_reset_settings", "cad_reset_settings");
add_action("wp_ajax_nopriv_cad_reset_settings", "cad_reset_settings");
function cad_reset_settings()
{
    if (!wp_verify_nonce($_REQUEST['cad_reset_nonce'], "cad_reset_settings")) {
        exit("Ever dance with the devil in the pale moon light?");
    }

    $cad_options_to_delete = array(
        'cad_login_logo',
        'cad_login_bg',
        'cad_login_bg_color',
        'cad_login_btn_color',
        'cad_login_logo_url',
        'cad_login_logo_title',
        'cad_login_message',
        'cad_login_message_color',
        'cad_remove_help',
        'cad_remove_screen_options',
        'cad_widgets_welcome',
        'cad_widgets_glance',
        'cad_widgets_activity',
        'cad_widgets_draft',
        'cad_widgets_quick_draft',
        'cad_widgets_wp_news',
        'cad_widgets_plugins',
        'cad_remove_wp_topbar',
        'cad_remove_wp_edit_topbar',
        'cad_remove_new_topbar',
        'cad_change_howdy_topbar',
        'cad_wp_thankyou_footer_disable',
        'cad_wp_thankyou_footer',
        'cad_wp_version_disable'
    );

    foreach ($cad_options_to_delete as $cad_option_to_delete) {
        delete_option($cad_option_to_delete);
    }

    $result['type'] = "success";

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    die();
}

/***************************************************************/
/***************************************************************/
