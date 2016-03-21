<?php
add_action('init', 'register_theme_scripts');
function register_theme_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php') {
        if (is_admin()) {
            global $wp_scripts;
            wp_enqueue_style(THEME_PREFIX . '_admin_custom_styles', THEME_PATH . '/extension/assets/css/admin-styles.css');
            wp_register_script(THEME_PREFIX . '_admin_custom_scripts', THEME_PATH . '/extension/assets/js/admin-scripts.js', array(), '1.0', false);
            wp_enqueue_script(THEME_PREFIX . '_admin_custom_scripts');
            // get registered script object for jquery-ui
            $ui = $wp_scripts->query('jquery-ui-core');

            // tell WordPress to load jQuery UI slider
            wp_enqueue_script('jquery-ui-slider');

            // tell WordPress to load jQuery UI sortable
            wp_enqueue_script('jquery-ui-sortable');


        } else {

            add_action('wp_enqueue_scripts', 'register_front_end_styles');
            add_action('wp_enqueue_scripts', 'register_front_end_scripts');

        }
    }
}

//Register Front-End Styles
function register_front_end_styles()
{
    wp_enqueue_style('style', THEME_PATH . '/style.css', false );
    wp_enqueue_style('core', THEME_PATH . '/css/core.css', false );
    wp_enqueue_style('tlg_global', THEME_PATH . '/css/tlg_global.css', false );
    wp_enqueue_style('locations_main', THEME_PATH . '/css/locations_main.css', false );
    wp_enqueue_style('consumer_main', THEME_PATH . '/css/consumer_main.css', false );
    wp_enqueue_style('menu', THEME_PATH . '/css/Menu.css', false );
    wp_enqueue_style('Menu-TLGI', THEME_PATH . '/css/Menu.TLGI.css', false );
    wp_enqueue_style('menu-link-root', THEME_PATH . '/css/Menu.LinkRoot.css', false );
    wp_enqueue_style('tool-tip', THEME_PATH . '/css/ToolTip.css', false );
    if(is_singular('course') || is_page_template('page-schedules.php')){
        wp_enqueue_style('colorbox', THEME_PATH . '/css/colorbox.css', false );
        wp_enqueue_style('jquery-ui', THEME_PATH . '/css/jquery-ui.css', false );
    }
}

//Register Front-End Scripts
function register_front_end_scripts()
{
    wp_enqueue_script('jquery');
    wp_deregister_script('thelittlegym');
    wp_register_script('thelittlegym', THEME_PATH . '/js/thelittlegym.js', false, '4.1', $in_footer = true);
    wp_enqueue_script('thelittlegym');
    if(is_singular('course') || is_page_template('page-schedules.php')){
        wp_deregister_script('course');
        wp_register_script('course', THEME_PATH . '/js/course.js', false, '4.1', $in_footer = true);
        wp_enqueue_script('course');
        wp_deregister_script('jquery-ui');
        wp_register_script('jquery-ui', THEME_PATH . '/js/jquery-ui.min.js', false, '4.1', $in_footer = true);
        wp_enqueue_script('jquery-ui');
    }

    /*wp_deregister_script('bootstrap');
    wp_register_script('bootstrap', THEME_PATH . '/js/bootstrap.js', false, '2.3.1', $in_footer=true);
    wp_enqueue_script('bootstrap');

    wp_deregister_script('shortcode');
    wp_register_script('shortcode', THEME_PATH . '/js/shortcode.js', false, false, $in_footer=true);
    wp_enqueue_script('shortcode');*/
}
?>