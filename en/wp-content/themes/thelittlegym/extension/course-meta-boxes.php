<?php
/**
 * Initialize the meta boxes.
 */

add_action( 'admin_init', 'course_custom_meta_boxes' );

/*
 * Methor add meta boxes for custom post type
 */
function course_custom_meta_boxes(){

    /**
     * Create a custom meta boxes array that we pass to
     * the OptionTree Meta Box API Class.
     */

    $course_meta_box =   array(
      'id'          =>  'course_meta_box',
      'title'       =>  'Course Options',
      'desc'        =>  '',
        'pages'       => array( 'course'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'     => 'Short name',
                'id'        => THEME_PREFIX . '_course_short_name',
                'type'      => 'text'
            ),
            array(
                'label'     => 'Ages (text)',
                'id'        => THEME_PREFIX . '_course_ages',
                'type'      => 'text'
            ),
            array(
                'label'     => 'Age start (months)',
                'id'        => THEME_PREFIX . '_course_age_start',
                'type'      => 'text'
            ),
            array(
                'label'     => 'Age end (months)',
                'id'        => THEME_PREFIX . '_course_age_end',
                'type'      => 'text'
            ),
            array(
                'label'     => 'Classes',
                'id'        => THEME_PREFIX . '_course_classes',
                'type'      => 'list-item',
                'desc'      => '',
                'settings'  => array(
                    array(
                        'id'        => 'ages',
                        'label'     => 'Ages',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'age_start',
                        'label'     => 'Age start (months)',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'age_end',
                        'label'     => 'Age end (months)',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'monday',
                        'label'     => 'Monday',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'tuesday',
                        'label'     => 'Tuesday',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'wednesday',
                        'label'     => 'Wednesday',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'thursday',
                        'label'     => 'Thursday',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'friday',
                        'label'     => 'Friday',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'saturday',
                        'label'     => 'Saturday',
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'sunday',
                        'label'     => 'Suanday',
                        'type'      => 'text'
                    ),
                )
            ),
            array(
                'label'     => 'Show Schedules',
                'id'        => THEME_PREFIX . '_course_show_schedules',
                'type'      => 'select',
                'choices'   => array(
                    array(
                        'value' => '0',
                        'label' => 'No',
                    ),
                    array(
                        'value' => '1',
                        'label' => 'Yes',
                    ),
                )
            ),
        )
    );
    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    ot_register_meta_box( $course_meta_box );
}
?>