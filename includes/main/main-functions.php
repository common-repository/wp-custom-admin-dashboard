<?php
/**
 * Main Functions
 * @package  customize-admin-dashboard
 * @developer  Inceva <https://www.inceva.co.th>
 * @version 1.2
 *
 */

if (!defined('ABSPATH')) {
    exit;
}

/***************************************************************/
/***************************************************************/

/***************************************************************/

/*wp login login custom logo start*/
$cad_login_logo = get_option('cad_login_logo');
if ($cad_login_logo) {
    function cad_login_logo_hook()
    {
        ?>
        <style type="text/css">
            .login h1 a {
                background-image: url(<?php echo get_option('cad_login_logo');?>) !important;
            }
        </style>
        <?php
    }

    add_action('login_enqueue_scripts', 'cad_login_logo_hook');
}
/*wp login custom logo end*/

/***************************************************************/

/*wp login custom background start*/
$cad_login_bg = get_option('cad_login_bg');
if ($cad_login_bg) {
    function cad_login_bg_hook()
    {
        ?>
        <style type="text/css">
            body.login {
                background-image: url(<?php echo get_option('cad_login_bg'); ?>) !important;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
            }
        </style>
        <?php
    }

    add_action('login_enqueue_scripts', 'cad_login_bg_hook');
}
/*wp login custom background end*/

/***************************************************************/

/*Change wp URL login start*/
$cad_login_logo_url = get_option('cad_login_logo_url');
if ($cad_login_logo_url) {
    function cad_login_logo_url_hook()
    {
        return get_option('cad_login_logo_url');
    }

    add_filter('login_headerurl', 'cad_login_logo_url_hook');
}
/*Change wp URL login end*/

/***************************************************************/

/*Change wp title login start*/
$cad_login_logo_title = get_option('cad_login_logo_title');
if ($cad_login_logo_title) {
    function cad_login_logo_title_hook()
    {
        return get_option('cad_login_logo_title');
    }

    add_filter('login_headertitle', 'cad_login_logo_title_hook');
}
/*Change wp title login end*/

/***************************************************************/

/*wp login bg color start*/
$cad_login_bg_color = get_option('cad_login_bg_color');
if ($cad_login_bg_color) {
    function cad_login_bg_color_hook()
    {
        ?>
        <style type="text/css">
            body, html {
                background: <?php echo get_option('cad_login_bg_color');?> none repeat scroll 0 0 !important;
            }
        </style>
        <?php
    }

    add_action('login_enqueue_scripts', 'cad_login_bg_color_hook');
}
/*wp login bg color end*/

/***************************************************************/

/*wp login custom text start*/
$cad_login_message = get_option('cad_login_message');
if ($cad_login_message) {
    function cad_login_message_hook($message)
    {
        if (empty($message)) {
            return "<p class='cad_login_custom_message' style='font-weight: bold;text-align: center;margin:11px 0;' >" . get_option('cad_login_message') . "</p>";
        } else {
            return $message;
        }
    }

    add_filter('login_message', 'cad_login_message_hook');
}
/*wp login custom text end*/

/***************************************************************/

/*wp login custom text color start*/
$cad_login_message_color = get_option('cad_login_message_color');
if ($cad_login_message_color) {
    function cad_login_message_color_hook()
    {
        ?>
        <style type="text/css">
            .login .cad_login_custom_message, .login #backtoblog a, .login #nav a {
                color: <?php echo get_option('cad_login_message_color');?> !important;
            }
        </style>
        <?php
    }

    add_action('login_enqueue_scripts', 'cad_login_message_color_hook');
}
/*wp login custom text color end*/

/***************************************************************/

/*wp login buttons color start*/
$cad_login_btn_color = get_option('cad_login_btn_color');
if ($cad_login_btn_color) {
    function cad_login_btn_color_hook()
    {
        ?>
        <style type="text/css">
            .login .submit input {
                background-color: <?php echo get_option('cad_login_btn_color');?> !important;
                text-shadow: none !important;
                box-shadow: none !important;
                border-color: <?php echo get_option('cad_login_btn_color');?>
            }

            .login .submit input:hover {
                background-color: <?php echo get_option('cad_login_btn_color');?> !important;
                text-shadow: none !important;
                box-shadow: none !important;
                border-color: <?php echo get_option('cad_login_btn_color');?>
            }
        </style>
        <?php
    }

    add_action('login_enqueue_scripts', 'cad_login_btn_color_hook');
}
/*wp login buttons color end*/

/***************************************************************/
/***************************************************************/

/*Remove Help tab start*/
$cad_remove_help = get_option('cad_remove_help');
if ($cad_remove_help) {
    function cad_remove_help_hook($cad_old_help, $cad_screen_id, $cad_screen)
    {
        $cad_screen->remove_help_tabs();
        return $cad_old_help;
    }

    add_filter('contextual_help', 'cad_remove_help_hook', 999, 3);
}
/*Remove Help tab ends*/

/***************************************************************/

/*Remove Screen options tab start*/
$cad_remove_screen_options = get_option('cad_remove_screen_options');
if ($cad_remove_screen_options) {
    add_filter('screen_options_show_screen', '__return_false');
}
/*Remove Screen options tab end*/

/***************************************************************/
/***************************************************************/

/*Remove welcome to wordpress widget start*/
$cad_widgets_welcome = get_option('cad_widgets_welcome');
if ($cad_widgets_welcome) {
    add_action('load-index.php', 'cad_widgets_welcome_hook');
    function cad_widgets_welcome_hook()
    {
        remove_action('welcome_panel', 'wp_welcome_panel');
        $cad_user_id = get_current_user_id();
        if (0 !== get_user_meta($cad_user_id, 'show_welcome_panel', true)) {
            update_user_meta($cad_user_id, 'show_welcome_panel', 0);
        }
    }
}
/*Remove welcome to wordpress widget end*/

/***************************************************************/

/*Remove at a glance widget start*/
$cad_widgets_glance = get_option('cad_widgets_glance');
if ($cad_widgets_glance) {
    remove_action('welcome_panel', 'wp_welcome_panel');
    function cad_widgets_glance_hook()
    {
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    }

    add_action('wp_dashboard_setup', 'cad_widgets_glance_hook');
}
/*Remove at a glance widget end*/

/***************************************************************/

/*Remove activity widget start*/
$cad_widgets_activity = get_option('cad_widgets_activity');
if ($cad_widgets_activity) {
    remove_action('welcome_panel', 'wp_welcome_panel');
    function cad_widgets_activity_hook()
    {
        global $wp_meta_boxes;
        remove_meta_box('dashboard_activity', 'dashboard', 'normal');
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    }

    add_action('wp_dashboard_setup', 'cad_widgets_activity_hook');
}
/*Remove activity widget end*/

/***************************************************************/

/*Remove draft widget start*/
$cad_widgets_draft = get_option('cad_widgets_draft');
if ($cad_widgets_draft) {
    remove_action('welcome_panel', 'wp_welcome_panel');
    function dc_widgets_draft_hook()
    {
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    }

    add_action('wp_dashboard_setup', 'cad_widgets_draft_hook');
}
/*Remove draft widget end*/

/***************************************************************/

/*Remove quick draft widget start*/
$cad_widgets_quick_draft = get_option('cad_widgets_quick_draft');
if ($cad_widgets_quick_draft) {
    remove_action('welcome_panel', 'wp_welcome_panel');
    function cad_widgets_quick_draft_hook()
    {
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    }

    add_action('wp_dashboard_setup', 'cad_widgets_quick_draft_hook');
}
/*Remove quick draft widget end*/

/***************************************************************/

/*Remove wp news widget start*/
$cad_widgets_wp_news = get_option('cad_widgets_wp_news');
if ($cad_widgets_wp_news) {
    remove_action('welcome_panel', 'wp_welcome_panel');
    function cad_widgets_wp_news_hook()
    {
        remove_meta_box('dashboard_primary', 'dashboard', 'normal');
    }

    add_action('wp_dashboard_setup', 'cad_widgets_wp_news_hook');

    function cad_widgets_wp_news_tribe_hook()
    {
        remove_meta_box('dashboard_primary', 'dashboard', 'core');
    }

    add_action('admin_menu', 'cad_widgets_wp_news_tribe_hook');
}
/*Remove wp news widget end*/

/***************************************************************/

/*Remove plugins widget start*/
$cad_widgets_plugins = get_option('cad_widgets_plugins');
if ($cad_widgets_plugins) {
    function dc_widgets_plugins_hook()
    {
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    }

    add_action('wp_dashboard_setup', 'cad_widgets_plugins_hook');
}
/*Remove plugins widget end*/

/***************************************************************/
/***************************************************************/

/*Remove WP logo topbar start*/
$cad_remove_wp_topbar = get_option('cad_remove_wp_topbar');
if ($cad_remove_wp_topbar) {
    function cad_remove_wp_topbar_hook()
    {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
    }

    add_action('wp_before_admin_bar_render', 'cad_remove_wp_topbar_hook', 0);
}
/*Remove WP logo topbar end*/

/***************************************************************/

/*Remove edit buttons topbar start*/
$cad_remove_wp_edit_topbar = get_option('cad_remove_wp_edit_topbar');
if ($cad_remove_wp_edit_topbar) {
    function cad_remove_wp_edit_topbar_hook()
    {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('edit');
        $wp_admin_bar->remove_menu('comments');
    }

    add_action('wp_before_admin_bar_render', 'cad_remove_wp_edit_topbar_hook');
}
/*Remove new buttons topbar end*/

/***************************************************************/

/*Remove edit buttons topbar start*/
$cad_remove_new_topbar = get_option('cad_remove_new_topbar');
if ($cad_remove_new_topbar) {
    function cad_remove_new_topbar_hook()
    {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('new-content');
    }

    add_action('wp_before_admin_bar_render', 'cad_remove_new_topbar_hook');
}
/*Remove new buttons topbar end*/

/***************************************************************/

/*Change Howdy text start*/
$cad_change_howdy_topbar = get_option('cad_change_howdy_topbar');
if ($cad_change_howdy_topbar) {
    function cad_change_howdy_topbar_hook($wp_admin_bar)
    {
        $my_account = $wp_admin_bar->get_node('my-account');
        $new_title = str_replace('Howdy', get_option('cad_change_howdy_topbar'), $my_account->title);
        $wp_admin_bar->add_node(array(
            'id' => 'my-account',
            'title' => $new_title,
        ));
    }

    add_filter('admin_bar_menu', 'cad_change_howdy_topbar_hook', 25);
}
/*Change Howdy text end*/

/***************************************************************/
/***************************************************************/

/*Disable wp_thankyou_footer start*/
$cad_wp_thankyou_disable_footer = get_option('cad_wp_thankyou_footer_disable');
if ($cad_wp_thankyou_disable_footer) {
    function cad_wp_thankyou_footer_diable_hook()
    {
        add_filter('admin_footer_text', 'cad_wp_thankyou_footer_diable_hook_text', 11);
    }

    function cad_wp_thankyou_footer_diable_hook_text($content)
    {
        return "";
    }

    add_action('admin_init', 'cad_wp_thankyou_footer_diable_hook');
}
/*Disable wp_thankyou_footer end*/

/***************************************************************/

/*Change wp_thankyou_footer start*/
$cad_wp_thankyou_footer = get_option('cad_wp_thankyou_footer');
if ($cad_wp_thankyou_footer) {
    function cad_wp_thankyou_footer_hook()
    {
        add_filter('admin_footer_text', 'cad_wp_thankyou_footer_hook_text', 11);
    }

    function cad_wp_thankyou_footer_hook_text($content)
    {
        return get_option('cad_wp_thankyou_footer');
    }

    add_action('admin_init', 'cad_wp_thankyou_footer_hook');
}
/*Change wp_thankyou_footer end*/

/***************************************************************/

/*Remove wp version footer start*/
$cad_wp_version_footer = get_option('cad_wp_version_disable');
if ($cad_wp_version_footer) {
    function cad_wp_version_disable_hook()
    {
        remove_filter('update_footer', 'core_update_footer');
    }

    add_action('admin_menu', 'cad_wp_version_disable_hook');
}
/*Remove wp version footer end*/

/***************************************************************/
/***************************************************************/
