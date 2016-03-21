<?php
  /*
  *	---------------------------------------------------------------------
  *	This file create and contains the course post_type meta elements
  *	---------------------------------------------------------------------
  */
  add_action('init', THEME_PREFIX . '_create_course');
  function plazart_create_course()
  {
    $labels = array(
      'name'               => _x('Course', 'Course General Name', TEXT_DOMAIN),
      'singular_name'      => _x('Course Item', 'Course Singular Name', TEXT_DOMAIN),
      'add_new'            => _x('Add New', 'Add New Course Name', TEXT_DOMAIN),
      'add_new_item'       => __('Add New Course', TEXT_DOMAIN),
      'edit_item'          => __('Edit Course', TEXT_DOMAIN),
      'new_item'           => __('New Course', TEXT_DOMAIN),
      'view_item'          => __('View Course', TEXT_DOMAIN),
      'search_items'       => __('Search Course', TEXT_DOMAIN),
      'not_found'          => __('Nothing found', TEXT_DOMAIN),
      'not_found_in_trash' => __('Nothing found in Trash', TEXT_DOMAIN),
      'parent_item_colon'  => ''
    );
    $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'query_var'          => true,
      //'menu_icon' => THEME_PATH . '/plazart/assets/images/course-icon.png',
      'rewrite'            => true,
      'capability_type'    => 'post',
      'hierarchical'       => true,
      'menu_position'      => 5,
      'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'), //'editor', 'excerpt', 'comments',
      'rewrite'            => array('slug' => 'course', 'with_front' => false ),
      'has_archive'        => 'course'
    );
    register_post_type('course', $args);
    flush_rewrite_rules();
    register_taxonomy(
      "course-category", array( "course" ), array(
      "hierarchical"   => true,
      "label"          => "Course Categories",
      "singular_label" => "Course Categories",
      "rewrite"        => true ));
    register_taxonomy_for_object_type('course-category', 'course');

      // function tags
      register_taxonomy(
          "course-tags",array("course"), array(
              "hierarchical"   =>   '',
              "label"          =>   "Course Tags",
              "singular_label" =>   "Course Tags",
              "rewrite"        =>   ''
          )
      );
      register_taxonomy_for_object_type('course-tags','course');
  }

  // filter for course first page
  add_filter("manage_edit-course_columns", THEME_PREFIX . "_show_course_column");
  function plazart_show_course_column($columns)
  {
    $columns = array(
      "cb"                 => "<input type=\"checkbox\" />",
      "title"              => "Title",
      "course-category"     => "Course Categories",
      "course-tags"         => "Course Tags",
      "date"               => "date" );

    return $columns;
  }

  add_action("manage_posts_custom_column", THEME_PREFIX . "_course_custom_columns");
  function plazart_course_custom_columns($column)
  {
    global $post;
    switch ($column) {
      case "course-category":
        echo get_the_term_list($post->ID, 'course-category', '', ', ', '');
        break;
        case "course-tags":
            echo get_the_term_list($post->ID, 'course-tags', '', ', ', '');
            break;
    }
  }

  function get_course_categories(){
    $taxonomy     = 'course-category';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no
    $title        = '';
    $empty        = 0;

    $args = array(
      'taxonomy'     => $taxonomy,
      'orderby'      => $orderby,
      'show_count'   => $show_count,
      'pad_counts'   => $pad_counts,
      'hierarchical' => $hierarchical,
      'title_li'     => $title,
      'hide_empty'   => $empty
    );

    $categories = get_categories( $args );

    return $categories;
  }