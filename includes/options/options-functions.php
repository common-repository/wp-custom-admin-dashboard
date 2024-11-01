<?php
/**
 * Options Functions
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

/*Adding page to submenu start*/
function cad_register_options_page()
{
    add_menu_page("Custom Dashboard", "Custom Dashboard", "manage_options", "customize-admin-dashboard", "dashboard_customizer_settings", "dashicons-editor-removeformatting", null, 99);
    add_submenu_page('customize-admin-dashboard', 'Login Page (wp-login.php) Options', 'Login Page (wp-login.php) Options', '10', 'customize-admin-dashboard&tab=login', '__return_null');
    add_submenu_page('customize-admin-dashboard', 'General Options', 'General Options', '10', 'customize-admin-dashboard&tab=general', '__return_null');
    add_submenu_page('customize-admin-dashboard', 'Widgets Options', 'Widgets Options', '10', 'customize-admin-dashboard&tab=widgets', '__return_null');
    add_submenu_page('customize-admin-dashboard', 'Header Options', 'Header Options', '10', 'customize-admin-dashboard&tab=header', '__return_null');
    add_submenu_page('customize-admin-dashboard', 'Footer Options', 'Footer Options', '10', 'customize-admin-dashboard&tab=footer', '__return_null');
    add_submenu_page('customize-admin-dashboard', 'Reset All Options', 'Reset All Options', '10', 'customize-admin-dashboard&tab=reset', '__return_null');
}

add_action("admin_menu", "cad_register_options_page");
/*Adding page to submenu end*/

/***************************************************************/
/***************************************************************/

/*Register settings page start*/

/***************************************************************/

/*Login logo functions start*/
function cad_login_logo_fcts()
{
    ?>
    <div class="cad_sizes">
        <ul>
            <li>Min recommended width: <b>64px</b></li>
            <li>Min recommended height: <b>64px</b></li>
            <li>Aspect ratio: <b>1:1</b></li>
        </ul>
    </div>
    <?php
    if (get_option('cad_login_logo')) {
        ?>
        <div class="cad_login_logo_set">
            <img src="<?php echo get_option('cad_login_logo'); ?>" alt="logo">
        </div>
        <input type="text"
               value="<?php if (get_option('cad_login_logo')): echo get_option('cad_login_logo'); endif; ?>"
               class="cad_login_logo cad_hidden" id="cad_login_logo" name="cad_login_logo">
        <button class="cad_login_logo_setter button">Change</button>
        <button class="cad_login_logo_remover button">Remove</button>
        <?php
    } else {
        ?>
        <div class="cad_login_logo_set cad_hidden">
            <img src="#" alt="logo">
        </div>
        <input type="text"
               value="<?php if (get_option('cad_login_logo')): echo get_option('cad_login_logo'); endif; ?>"
               class="cad_login_logo cad_hidden" id="cad_login_logo" name="cad_login_logo">
        <button class="cad_login_logo_setter button">Set Logo Here</button>
        <button class="cad_login_logo_remover button cad_hidden">Remove</button>
        <?php
    }
}

/*Login logo functions end*/

/***************************************************************/

/*Login background functions start*/
function cad_login_bg_fcts()
{
    ?>
    <div class="cad_sizes">
        <ul>
            <li>Min recommended width: <b>1200px</b></li>
            <li>Min recommended height: <b>1200px</b></li>
            <li>Aspect ratio: <b>2:1</b></li>
        </ul>
    </div>
    <?php
    if (get_option('cad_login_bg')) {
        ?>
        <div class="cad_login_logo_set bg">
            <img src="<?php echo get_option('cad_login_bg'); ?>" alt="logo">
        </div>
        <input type="text" value="<?php if (get_option('cad_login_bg')): echo get_option('cad_login_bg'); endif; ?>"
               class="cad_login_logo cad_hidden" id="cad_login_logo" name="cad_login_bg">
        <button class="cad_login_logo_setter button">Change</button>
        <button class="cad_login_logo_remover button">Remove</button>
        <?php
    } else {
        ?>
        <div class="cad_login_logo_set bg cad_hidden">
            <img src="#" alt="logo">
        </div>
        <input type="text" value="<?php if (get_option('cad_login_bg')): echo get_option('cad_login_bg'); endif; ?>"
               class="cad_login_logo cad_hidden" id="cad_login_logo" name="cad_login_bg">
        <button class="cad_login_logo_setter button">Set Logo Here</button>
        <button class="cad_login_logo_remover button cad_hidden">Remove</button>
        <?php
    }
}

/*Login background functions end*/

/***************************************************************/

/*Login bg color functions start*/
function cad_login_bg_color_fcts()
{
    ?>
    <input type="text" name="cad_login_bg_color"
           value="<?php if (get_option('cad_login_bg_color')): echo get_option('cad_login_bg_color'); endif; ?>"/>
    <?php
}

/*Login bg color functions end*/

/***************************************************************/

/*Login bg btns functions start*/
function cad_login_btn_color_fcts()
{
    ?>
    <input type="text" name="cad_login_btn_color"
           value="<?php if (get_option('cad_login_btn_color')): echo get_option('cad_login_btn_color'); endif; ?>"/>
    <?php
}

/*Login bg btns functions end*/

/***************************************************************/

/*Login URL functions start*/
function cad_login_logo_url_fcts()
{
    ?>
    <input type="text" name="cad_login_logo_url"
           placeholder="http://wordpress.org"
           value="<?php if (get_option('cad_login_logo_url')): echo get_option('cad_login_logo_url'); endif; ?>"/>
    <?php
}

/*Login URL functions end*/

/***************************************************************/

/*Login title functions start*/
function cad_login_logo_title_fcts()
{
    ?>
    <input type="text" name="cad_login_logo_title"
           placeholder="Powered by WordPress"
           value="<?php if (get_option('cad_login_logo_title')): echo get_option('cad_login_logo_title'); endif; ?>"/>
    <?php
}

/*Login title functions end*/

/***************************************************************/

/*Login message functions start*/
function cad_login_message_fcts()
{
    ?>
    <input type="text" name="cad_login_message"
           placeholder="Add custom message here"
           value="<?php if (get_option('cad_login_message')): echo get_option('cad_login_message'); endif; ?>"/>
    <?php
}

/*Login message functions end*/

/***************************************************************/

/*Login message functions start*/
function cad_login_message_color_fcts()
{
    ?>
    <input type="text" name="cad_login_message_color"
           value="<?php if (get_option('cad_login_message_color')): echo get_option('cad_login_message_color'); endif; ?>"/>
    <?php
}

/*Login message functions end*/

/***************************************************************/

/*General settings functions start*/

function cad_remove_help_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_remove_help"
           value="1" <?php checked(1, get_option('cad_remove_help'), true); ?> />
    <?php
}

/***************************************************************/

function cad_remove_screen_options_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_remove_screen_options"
           value="1" <?php checked(1, get_option('cad_remove_screen_options'), true); ?> />
    <?php
}

/*General settings functions end*/

/***************************************************************/

/*Widgets settings functions start*/

function cad_widgets_welcome_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_widgets_welcome"
           value="1" <?php checked(1, get_option('cad_widgets_welcome'), true); ?> />
    <?php
}

/***************************************************************/

function cad_widgets_glance_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_widgets_glance"
           value="1" <?php checked(1, get_option('cad_widgets_glance'), true); ?> />
    <?php
}

/***************************************************************/

function cad_widgets_activity_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_widgets_activity"
           value="1" <?php checked(1, get_option('cad_widgets_activity'), true); ?> />
    <?php
}

/***************************************************************/

function cad_widgets_draft_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_widgets_draft"
           value="1" <?php checked(1, get_option('cad_widgets_draft'), true); ?> />
    <?php
}

/***************************************************************/

function cad_widgets_quick_draft_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_widgets_quick_draft"
           value="1" <?php checked(1, get_option('cad_widgets_quick_draft'), true); ?> />
    <?php
}

/***************************************************************/

function cad_widgets_wp_news_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_widgets_wp_news"
           value="1" <?php checked(1, get_option('cad_widgets_wp_news'), true); ?> />
    <?php
}

/***************************************************************/

function cad_widgets_plugins_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_widgets_plugins"
           value="1" <?php checked(1, get_option('cad_widgets_plugins'), true); ?> />
    <?php
}

/*Widgets settings functions end*/

/***************************************************************/

/*Header settings functions start*/

function cad_remove_wp_topbar_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_remove_wp_topbar"
           value="1" <?php checked(1, get_option('cad_remove_wp_topbar'), true); ?> />
    <?php
}

/***************************************************************/

function cad_remove_wp_edit_topbar_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_remove_wp_edit_topbar"
           value="1" <?php checked(1, get_option('cad_remove_wp_edit_topbar'), true); ?> />
    <?php
}

/***************************************************************/

function cad_remove_new_topbar_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_remove_new_topbar"
           value="1" <?php checked(1, get_option('cad_remove_new_topbar'), true); ?> />
    <?php
}

/***************************************************************/

function cad_change_howdy_topbar_fcts()
{
    ?>
    <input type="text" name="cad_change_howdy_topbar"
           placeholder="Howdy, _USERNAME_"
           value="<?php if (get_option('cad_change_howdy_topbar')): echo get_option('cad_change_howdy_topbar'); endif; ?>"/>
    <?php
}

/*Header settings functions end*/

/***************************************************************/

/*Footer settings functions start*/

function cad_wp_thankyou_footer_disable_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_wp_thankyou_footer_disable"
           value="1" <?php checked(1, get_option('cad_wp_thankyou_footer_disable'), true); ?> />
    <?php
}

/***************************************************************/

function cad_wp_thankyou_footer_fcts()
{
    ?>
    <input type="text" name="cad_wp_thankyou_footer"
        <?php if (get_option('cad_wp_thankyou_footer_disable')): echo 'class="cad_to_hide"';endif; ?>
           placeholder="Thank you for creating with WordPress"
           value="<?php if (get_option('cad_wp_thankyou_footer')): echo get_option('cad_wp_thankyou_footer'); endif; ?>"/>
    <?php
}

/***************************************************************/

function cad_wp_version_disable_fcts()
{
    ?>
    <input class="cad_switch_button" type="checkbox" name="cad_wp_version_disable"
           value="1" <?php checked(1, get_option('cad_wp_version_disable'), true); ?> />
    <?php
}

/***************************************************************/

/*Footer settings functions end*/

function cad_settings_fields()
{

    add_settings_section("cad-section-login", "Login Page (wp-login.php) Options", null, "cad-options-login");

    add_settings_field("cad_login_logo", "Change WordPress login page logo", "cad_login_logo_fcts", "cad-options-login", "cad-section-login");
    add_settings_field("cad_login_bg", "Change WordPress login page background image", "cad_login_bg_fcts", "cad-options-login", "cad-section-login");
    add_settings_field("cad_login_bg_color", "Change WordPress page login background color", "cad_login_bg_color_fcts", "cad-options-login", "cad-section-login");
    add_settings_field("cad_login_btn_color", "Change login/register buttons background color", "cad_login_btn_color_fcts", "cad-options-login", "cad-section-login");
    add_settings_field("cad_login_message_color", "Change all texts (<i>your custom message</i> if any,<br><i>Lost your password</i> text,<br><i>Back to blog</i>) colors here", "cad_login_message_color_fcts", "cad-options-login", "cad-section-login");
    add_settings_field("cad_login_logo_url", "Change login logo URL <i>http://WordPress.org</i> to: ", "cad_login_logo_url_fcts", "cad-options-login", "cad-section-login");
    add_settings_field("cad_login_logo_title", "Change login logo URL title <i>Powered by WordPress</i> to: ", "cad_login_logo_title_fcts", "cad-options-login", "cad-section-login");
    add_settings_field("cad_login_message", "Add custom message to the login form:", "cad_login_message_fcts", "cad-options-login", "cad-section-login");

    register_setting("cad-section-login", "cad_login_logo");
    register_setting("cad-section-login", "cad_login_bg");
    register_setting("cad-section-login", "cad_login_bg_color");
    register_setting("cad-section-login", "cad_login_btn_color");
    register_setting("cad-section-login", "cad_login_logo_url");
    register_setting("cad-section-login", "cad_login_logo_title");
    register_setting("cad-section-login", "cad_login_message");
    register_setting("cad-section-login", "cad_login_message_color");

    add_settings_section("cad-section-general", "General Options", null, "cad-options-general");

    add_settings_field("cad_remove_help", "Remove help options tab?", "cad_remove_help_fcts", "cad-options-general", "cad-section-general");
    add_settings_field("cad_remove_screen_options", "Remove screen options tab?", "cad_remove_screen_options_fcts", "cad-options-general", "cad-section-general");

    register_setting("cad-section-general", "cad_remove_help");
    register_setting("cad-section-general", "cad_remove_screen_options");


    add_settings_section("cad-section-widgets", "Widgets Options (Dashboard)", null, "cad-options-widgets");

    add_settings_field("cad_widgets_welcome", "Remove <i>Welcome to WordPress!</i> widget?", "cad_widgets_welcome_fcts", "cad-options-widgets", "cad-section-widgets");
    add_settings_field("cad_widgets_glance", "Remove <i>At a glance</i> widget?", "cad_widgets_glance_fcts", "cad-options-widgets", "cad-section-widgets");
    add_settings_field("cad_widgets_activity", "Remove <i>Recent Activity</i> widget?", "cad_widgets_activity_fcts", "cad-options-widgets", "cad-section-widgets");
    add_settings_field("cad_widgets_draft", "Remove <i>Recent Drafts</i> widget?", "cad_widgets_draft_fcts", "cad-options-widgets", "cad-section-widgets");
    add_settings_field("cad_widgets_quick_draft", "Remove <i>Quick Draft</i> widget?", "cad_widgets_quick_draft_fcts", "cad-options-widgets", "cad-section-widgets");
    add_settings_field("cad_widgets_wp_news", "Remove <i>WordPress Events and News</i> widget?", "cad_widgets_wp_news_fcts", "cad-options-widgets", "cad-section-widgets");
    add_settings_field("cad_widgets_plugins", "Remove <i>Plugins Activity</i> widget?", "cad_widgets_plugins_fcts", "cad-options-widgets", "cad-section-widgets");
    register_setting("cad-section-widgets", "cad_widgets_welcome");
    register_setting("cad-section-widgets", "cad_widgets_glance");
    register_setting("cad-section-widgets", "cad_widgets_activity");
    register_setting("cad-section-widgets", "cad_widgets_draft");
    register_setting("cad-section-widgets", "cad_widgets_quick_draft");
    register_setting("cad-section-widgets", "cad_widgets_wp_news");
    register_setting("cad-section-widgets", "cad_widgets_plugins");

    add_settings_section("cad-section-header", "Header (Top Bar) Options", null, "cad-options-header");

    add_settings_field("cad_remove_wp_topbar", "Remove wp logo from top bar?", "cad_remove_wp_topbar_fcts", "cad-options-header", "cad-section-header");
    add_settings_field("cad_remove_wp_edit_topbar", "Remove comments and edit buttons from top bar? ", "cad_remove_wp_edit_topbar_fcts", "cad-options-header", "cad-section-header");
    add_settings_field("cad_remove_new_topbar", "Remove + New button from top bar? ", "cad_remove_new_topbar_fcts", "cad-options-header", "cad-section-header");
    add_settings_field("cad_change_howdy_topbar", "Change <i>howdy</i> text to: ", "cad_change_howdy_topbar_fcts", "cad-options-header", "cad-section-header");

    register_setting("cad-section-header", "cad_remove_wp_topbar");
    register_setting("cad-section-header", "cad_remove_wp_edit_topbar");
    register_setting("cad-section-header", "cad_remove_new_topbar");
    register_setting("cad-section-header", "cad_change_howdy_topbar");

    add_settings_section("cad-section-footer", "Footer (Bottom Bar) Options", null, "cad-options-footer");

    add_settings_field("cad_wp_thankyou_footer_disable", "Disable <i>Thank you for creating with WordPress</i> text?", "cad_wp_thankyou_footer_disable_fcts", "cad-options-footer", "cad-section-footer");
    add_settings_field("cad_wp_thankyou_footer", "Change <i>Thank you for creating with WordPress</i> text to: ", "cad_wp_thankyou_footer_fcts", "cad-options-footer", "cad-section-footer");
    add_settings_field("cad_wp_version_disable", "Disable WordPress version text?", "cad_wp_version_disable_fcts", "cad-options-footer", "cad-section-footer");

    register_setting("cad-section-footer", "cad_wp_thankyou_footer_disable");
    register_setting("cad-section-footer", "cad_wp_thankyou_footer");
    register_setting("cad-section-footer", "cad_wp_version_disable");
}

add_action("admin_init", "cad_settings_fields");
/*Register settings page end*/

/***************************************************************/
/***************************************************************/

/*Plugin page start*/
function dashboard_customizer_settings()
{
    ?>
    <div class="wrap cad_plugin_options">
        <h3 class="title">WP Custom Admin Dashboard</h3>

        <p class="desc">A basic All-in-one plugin that allows users to customize the Wordpress Admininstration dashboard.  Change most options including: Dashboard widgets, Login page, Top Bar Header, Bottom Bar Footer, general options...
</p>

        <div class="credits">
            <p>Developed by
                <<a href="https://www.inceva.co.th/web-design/" target="_blank">Inceva Web Development</a>>
            </p>
            <p>
                Report a <a href="https://wordpress.org/support/plugin/wp-custom-admin-dashboard/" target="_blank">bug or any other issues here</a>. 
            </p>
            <p>
                If you enjoy using the plugin, please add a <a href="https://wordpress.org/support/plugin/wp-custom-admin-dashboard/reviews/?rate=5#new-post" target="_blank">
                    <span class="dashicons dashicons-star-filled"></span>
                    <span class="dashicons dashicons-star-filled"></span>
                    <span class="dashicons dashicons-star-filled"></span>
                    <span class="dashicons dashicons-star-filled"></span>
                    <span class="dashicons dashicons-star-filled"></span>
                    review
                </a>
            </p>
        </div>
        <h2></h2>
        <?php settings_errors(); ?>

        <?php
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'login';
        ?>

        <h3 class="nav-tab-wrapper">
            <a href="<?php echo admin_url('admin.php?page=customize-admin-dashboard&tab=login'); ?>"
               class="nav-tab <?php echo $active_tab == 'login' ? 'nav-tab-active' : ''; ?>">
                Login Page (wp-login.php) Options
            </a>
            <a href="<?php echo admin_url('admin.php?page=customize-admin-dashboard&tab=general'); ?>"
               class="nav-tab <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?>">
                General Options
            </a>
            <a href="<?php echo admin_url('admin.php?page=customize-admin-dashboard&tab=widgets'); ?>"
               class="nav-tab <?php echo $active_tab == 'widgets' ? 'nav-tab-active' : ''; ?>">
                Widgets Options (Dashboard)
            </a>
            <a href="<?php echo admin_url('admin.php?page=customize-admin-dashboard&tab=header'); ?>"
               class="nav-tab <?php echo $active_tab == 'header' ? 'nav-tab-active' : ''; ?>">
                Header (Top Bar)
            </a>
            <a href="<?php echo admin_url('admin.php?page=customize-admin-dashboard&tab=footer'); ?>"
               class="nav-tab <?php echo $active_tab == 'footer' ? 'nav-tab-active' : ''; ?>">
                Footer (Bottom Bar)
            </a>
            <a href="<?php echo admin_url('admin.php?page=customize-admin-dashboard&tab=reset'); ?>"
               class="nav-tab <?php echo $active_tab == 'reset' ? 'nav-tab-active' : ''; ?>">
                Reset Plugin Settings
            </a>
        </h3>

        <form method="POST" action="options.php" class="settings_form">
            <?php
            if ($active_tab == 'login') {
                settings_fields("cad-section-login");
                do_settings_sections("cad-options-login");
                submit_button();
            } elseif ($active_tab == 'general') {
                settings_fields("cad-section-general");
                do_settings_sections("cad-options-general");
                submit_button();
            } elseif ($active_tab == 'widgets') {
                settings_fields("cad-section-widgets");
                do_settings_sections("cad-options-widgets");
                submit_button();
            } elseif ($active_tab == 'header') {
                settings_fields("cad-section-header");
                do_settings_sections("cad-options-header");
                submit_button();
            } elseif ($active_tab == 'footer') {
                settings_fields("cad-section-footer");
                do_settings_sections("cad-options-footer");
                submit_button();
            }
            ?>
        </form>
        <?php
        if ($active_tab == 'reset') {
            $dc_nonce = wp_create_nonce("cad_reset_settings");
            $dc_link = admin_url('admin-ajax.php?action=cad_reset_settings&cad_reset_nonce=' . $dc_nonce);
            ?>
            <div class="cad_reset_holder">
                <h2>Reset all plugin settings?</h2>
                <i class="cad_reset_warning">This cannot be undone!</i>
                <button data-url="<?php echo $dc_link; ?>" class="cad_reset button">RESET</button>
            </div>
            <div class="cad_loader_cont">
                <img src="<?php echo cad_get_plugin_base_url().'includes/src/images/loader.gif'; ?>"
                     class="cad_loader" alt="Loader"/>
            </div>
            <div class="cad_reset_return">
                <h3></h3>
                <h4>Redirecting in <b>3</b> seconds... (If you were not redirected in 3 seconds, <a
                            href="<?php echo admin_url('admin.php?page=customize-admin-dashboard&tab=login'); ?>">click here</a>)</h4>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
/*Plugin Main page end*/

/***************************************************************/
/***************************************************************/

