/**
 * WP Custom Admin Dashboard Plugin JS
 *
 * @package  customize-admin-dashboard
 * @developer  Inceva <https://www.inceva.co.th>
 * @version 1.1
 *
 */
jQuery(document).ready(function ($) {
    /*Get plugin URL from DOM*/
    var plugin_link=plugin_obj.plugin_link;

    /*Switchery init*/
    var elems = Array.prototype.slice.call(document.querySelectorAll('.cad_switch_button'));
    if (elems) {
        elems.forEach(function (html) {
            var switchery = new Switchery(html, {
                color: '#C92432'
            });
        });
    }

    jQuery('.cad_plugin_options .settings_form tr').each(function () {
        if ($(this).find('input').hasClass('cad_to_hide')) {
            $(this).hide();
        }
    });

    jQuery('.cad_plugin_options input[name="cad_wp_thankyou_footer_disable"]').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('.cad_plugin_options input[name="cad_wp_thankyou_footer"]').closest('tr').slideUp();
        } else {
            jQuery('.cad_plugin_options input[name="cad_wp_thankyou_footer"]').closest('tr').slideDown();
        }
    });

    /*spectrum init start*/
    jQuery(".cad_plugin_options input[name='cad_login_bg_color']").spectrum({
        preferredFormat: "rgb",
        showAlpha: true,
        allowEmpty: true
    });

    jQuery(".cad_plugin_options input[name='cad_login_message_color']").spectrum({
        preferredFormat: "rgb",
        allowEmpty: true
    });

    jQuery(".cad_plugin_options input[name='cad_login_btn_color']").spectrum({
        preferredFormat: "rgb",
        showAlpha: true,
        allowEmpty: true
    });
    /*spectrum init end*/


    /*Media library init start*/
    if (jQuery('.cad_plugin_options .cad_login_logo_setter').length > 0) {
        if (typeof wp !== 'undefined' && wp.media && wp.media.editor) {
            jQuery('.cad_plugin_options').on('click', '.cad_login_logo_setter', function (e) {
                e.preventDefault();
                var button = jQuery(this);
                var id = button.prev();
                wp.media.editor.send.attachment = function (props, attachment) {
                    var cad_img_url = attachment.url;
                    id.val(cad_img_url);
                    button.parent().find('.cad_login_logo_set img').attr('src', cad_img_url);
                    button.parent().find('.cad_login_logo_set').removeClass('cad_hidden');
                    button.parent().find('.cad_login_logo_set').slideDown();
                    button.html('Change');
                    button.parent().find('.cad_login_logo_remover').removeClass('cad_hidden');
                    button.parent().find('.cad_login_logo_remover').slideDown();
                };
                wp.media.editor.open(button);
                return false;
            });
        }
    }

    jQuery(document).on('click', '.cad_plugin_options .cad_login_logo_remover', function (e) {
        e.preventDefault();
        jQuery(this).parent().find('.cad_login_logo_set').slideUp();
        jQuery(this).parent().find('.cad_login_logo').val(null);
        jQuery(this).parent().find('.cad_login_logo_setter').html('Set Logo Here');
        jQuery(this).fadeOut();
    });
    /*Media library init end*/

    /*Reset all plugin settings start*/

    jQuery(document).on('click', '.cad_plugin_options .cad_reset', function (e) {
        e.preventDefault();
        if (confirm("You are absolutely sure?")) {
            var cad_reset_url = jQuery(this).attr('data-url');
            var cad_loader = jQuery('.cad_plugin_options .cad_loader');
            var cad_return = jQuery('.cad_plugin_options .cad_reset_return');
            var cad_return_html = jQuery('.cad_plugin_options .cad_reset_return h3');
            var cad_holder = jQuery('.cad_plugin_options .cad_reset_holder');

            cad_loader.slideDown();
            jQuery.ajax({
                type: "post",
                dataType: "json",
                url: cad_reset_url,
                data: {
                    action: "cad_reset_settings",
                },
                success: function (response) {
                    if (response.type == "success") {
                        cad_holder.slideUp();
                        cad_loader.slideUp();
                        cad_return_html.html('Settings successfully reset!');
                        cad_return.slideDown();
                        setTimeout(function () {
                            window.location.href=plugin_link;
                        }, 3000);
                    }
                },
                error: function () {
                    cad_loader.slideUp();
                    cad_return_html.html('An error occured!');
                    cad_return.slideDown();
                    setTimeout(function () {
                        window.location.href=plugin_link;
                    }, 3000);
                }
            });
        }
    });
    /*Reset all plugin settings start*/
});