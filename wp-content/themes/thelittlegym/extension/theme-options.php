<?php
/*
 * Initialize the options before anything else.
 */
add_action('admin_init','plazat_theme_options',1);

/*
 * Build the custom settings & update OptionTree.
*/
function plazat_theme_options()
{
    /**
     * Get a copy of the saved settings array.
     */
    $saved_settings = get_option('option_tree_settings', array());

    // Pattern
    $patterns = array();
    if ($dir = opendir(SERVER_PATH . '/images/patterns/')) {
        while (false !== ($file = readdir($dir))) {
            if ($file != '..' && $file != '.') {
                $patterns[] = array(
                    'value' => trim($file),
                    'label' => 'Click on pattern to preview',
                    'src'   => THEME_PATH . '/images/patterns/' . $file, 40, 40, true
                );
            }
        }
        // Close directory handle
        closedir($dir);
    }

    /**
     * Custom settings array that will eventually be
     * passes to the OptionTree Settings API Class.
     */
    $custom_settings = array(
        'contextual_help' => array(
            'content' => array(
                array(
                    'id'      => 'general_help',
                    'title'   => 'General',
                    'content' => '<p>Help content goes here!</p>'
                ),
            ),
            'sidebar' => '<p>Sidebar content goes here!</p>'
        ),
        'sections'        => array(
            array(
                'id'    => 'logo',
                'title' => 'Logo & Favicon',
            ),
            array(
                'id'    =>  'google_analytics',
                'title' =>  'Google Analytics',
            ),
            array(
                'id'    => 'social_network',
                'title' => 'Social Network',
            ),
            array(
                'id'    =>  'TzGlobalOption',
                'title' =>  'Global option',
            ),
            array(
                'id'    =>  'TZLocations',
                'title' =>  'Locations'
            ),
            array(
                'id'    =>  'TZHomePage',
                'title' =>  'Home page'
            ),
            array(
                'id'    =>  'TZCoursePage',
                'title' =>  'Course page'
            ),
        ),

        'settings'        => array(

            array(
                'id'        => THEME_PREFIX . '_logotype',
                'label'     => 'Logo Type',
                'desc'      => '',
                'std'       => '1',
                'type'      => 'select',
                'section'   => 'logo',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => '1',
                        'label' => 'Logo image',
                    ),
                    array(
                        'value' => '0',
                        'label' => 'Logo text',
                    ),
                ),
            ),
            array(
                'id'        => THEME_PREFIX . '_logoText',
                'label'     => 'Logo Text',
                'desc'      => '',
                'std'       => 'logo',
                'type'      => 'text',
                'section'   => 'logo',
            ),
            array(
                'id'        => THEME_PREFIX . '_logoText',
                'label'     => 'Logo Text',
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'logo',
            ),
            array(
                'id'        =>  THEME_PREFIX. '_logoTextcolor',
                'label'     => 'Color logo',
                'desc'      => '',
                'std'       => '',
                'type'      => 'colorpicker',
                'section'   => 'logo',
            ),
            array(
                'id'        => THEME_PREFIX . '_logo',
                'label'     => 'Upload Logo',
                'desc'      => '',
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'logo',
            ),
            array(
                'id'        => THEME_PREFIX . '_favicon_onoff',
                'label'     => 'Enable Favicon',
                'desc'      => '',
                'std'       => 'no',
                'type'      => 'radio',
                'section'   => 'logo',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => 'Yes',
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => 'No',
                        'src'   => ''
                    )
                ),
            ),
            array(
                'id'        => THEME_PREFIX . '_favicon',
                'label'     => 'Upload Favicon Icon',
                'desc'      => '',
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'logo',
            ),
            // Google Analytics
            array(
                'id'        => THEME_PREFIX . '_google_analytics',
                'label'     => 'Google Analytics',
                'desc'      => 'Place the code you get from google here. This should be something like:<br /><br /><code>   // Google analytics <br /> var _gaq = _gaq || []; <br />_gaq.push(["_setAccount", "UA-XXXXXXX-XX"]); <br /> ...</code>',
                'std'       => '',
                'type'      => 'textarea-simple',
                'section'   => 'google_analytics',
                'rows'      => '4',
            ),
            // Social Network Settings
            array(
                'id'        => THEME_PREFIX . '_social_network_googleplus',
                'label'     => 'Google plus',
                'desc'      => 'Place the link you want and Google plus icon will appear. To remove it, just leave it blank.',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'social_network',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => THEME_PREFIX . '_social_network_facebook',
                'label'     => 'Facebook',
                'desc'      => 'Place the link you want and Facebook icon will appear. To remove it, just leave it blank.',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'social_network',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => THEME_PREFIX . '_social_network_twitter',
                'label'     => 'Twitter',
                'desc'      => 'Place the link you want and Twitter icon will appear. To remove it, just leave it blank.',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'social_network',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => THEME_PREFIX . '_social_network_youtube',
                'label'     => 'Youtube',
                'desc'      => 'Place the link you want and Youtube icon will appear. To remove it, just leave it blank.',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'social_network',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => THEME_PREFIX . '_social_network_childrens_success',
                'label'     => 'Childrens Success',
                'desc'      => 'Place the link you want and Childrens Success icon will appear. To remove it, just leave it blank.',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'social_network',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            // OptionAdmin
            array(
                'id'        =>  THEME_PREFIX.'_TzThemeStyleOptionAdmin',
                'label'     =>  'Show toolbar admin',
                'desc'      =>  '',
                'std'       =>  '0',
                'type'      =>  'select',
                'section'   =>  'TzGlobalOption',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  'Show',
                    ),
                    array(
                        'value' =>  '0',
                        'label' =>  'Hide',
                    ),

                ),
            ),
            // OptionAdmin
            array(
                'id'        =>  THEME_PREFIX.'_TzThemeStyle',
                'label'     =>  'Right to left',
                'desc'      =>  'Display theme by right to left',
                'std'       =>  'left',
                'type'      =>  'select',
                'section'   =>  'TzGlobalOption',
                'choices'   =>  array(
                    array(
                        'value' =>  'left',
                        'label' =>  'Left',
                    ),
                    array(
                        'value' =>  'right',
                        'label' =>  'Right',
                    ),

                ),
            ),
            // limit excerpt
            array(
                'label'     => 'Limit excerpt',
                'id'        => THEME_PREFIX . '_porlimitexcerpt',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TzGlobalOption',
            ),
            array(
                'label'     => 'Locations',
                'id'        => THEME_PREFIX . '_TZLocations_locations',
                'type'      => 'list-item',
                'desc'      => '',
                'section'  =>   'TZLocations',
                'settings'  => array(
                    array(
                        'id'        => 'address',
                        'label'     => 'Address',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'phone',
                        'label'     => 'Phone',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'fax',
                        'label'     => 'Fax',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'email',
                        'label'     => 'Email',
                        'type'      => 'text'
                    )
                )
            ),
            /*------------------TZHomePage--------------------*/
            array(
                'label'     => 'Image Boxs',
                'id'        => THEME_PREFIX . 'TZHomePage_images_boxs',
                'type'      => 'list-item',
                'desc'      => '',
                'section'  =>   'TZHomePage',
                'settings'  => array(
                    array(
                        'id'        => 'url',
                        'label'     => 'Url',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'image',
                        'label'     => 'Image',
                        'type'      => 'upload'
                    )
                )
            ),
            array(
                'id'        =>  THEME_PREFIX.'_TZHomePage_category',
                'label'     =>  'Select Category (Latest news)',
                'desc'      =>  '',
                'std'       =>  '',
                'type'      =>  'category-select',
                'section'   =>  'TZHomePage',
            ),
            array(
                'label'     => 'Blogs numbers',
                'id'        => THEME_PREFIX . '_TZHomePage_blog_numers',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZHomePage',
            ),
            array(
                'label'     => 'Videos Box',
                'id'        => THEME_PREFIX . 'TZHomePage_videos_box',
                'type'      => 'list-item',
                'desc'      => '',
                'section'  =>   'TZHomePage',
                'settings'  => array(
                    array(
                        'id'        => 'url',
                        'label'     => 'Url',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'image',
                        'label'     => 'Image',
                        'type'      => 'upload'
                    )
                )
            ),
            array(
                'label'     => 'Video more Url',
                'id'        => THEME_PREFIX . '_TZHomePage_videos_more_url',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZHomePage',
            ),
            array(
                'label'     => 'Gallery Box',
                'id'        => THEME_PREFIX . 'TZHomePage_gallery_box',
                'type'      => 'list-item',
                'desc'      => '',
                'section'  =>   'TZHomePage',
                'settings'  => array(
                    array(
                        'id'        => 'url',
                        'label'     => 'Url',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'image',
                        'label'     => 'Image',
                        'type'      => 'upload'
                    )
                )
            ),
            array(
                'label'     => 'Gallery more url',
                'id'        => THEME_PREFIX . '_TZHomePage_gallery_more_url',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZHomePage',
            ),
            array(
                'label'     => 'Booking form',
                'id'        => THEME_PREFIX . '_TZCoursePage_booking_form',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZCoursePage',
            ),
            array(
                'label'     => 'Enroll form',
                'id'        => THEME_PREFIX . '_TZCoursePage_enroll_form',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZCoursePage',
            ),
        ),
    );

    /* allow settings to be filtered before saving */

    $custom_settings = apply_filters('option_tree_settings_args', $custom_settings);

    /* settings are not the same update the DB */
    if ($saved_settings !== $custom_settings) {
        update_option('option_tree_settings', $custom_settings);
    }
}
?>
