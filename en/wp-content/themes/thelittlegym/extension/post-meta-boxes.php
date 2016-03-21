<?php
/**
 * Initialize the meta boxes.
 */

add_action( 'admin_init', '_custom_meta_boxes' );

/*
 * Methor add meta boxes for custom post type
 */
function _custom_meta_boxes(){
    $post_meta_box =   array(
        'id'          =>  'post_meta_box',
        'title'       =>  'Post Options',
        'desc'        =>  '',
        'pages'       => array( 'post'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'     => 'Ages',
                'id'        => THEME_PREFIX . '_meta_ages',
                'type'      => 'text'
            ),
        )
    );

    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    ot_register_meta_box( $post_meta_box );
}
?>