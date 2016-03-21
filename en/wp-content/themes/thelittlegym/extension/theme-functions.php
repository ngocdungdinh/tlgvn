<?php

// Remove theme generator meta tag
remove_action('wp_head', 'wp_generator');

if (function_exists('add_theme_support')) {
// enable featured image
add_theme_support('post-thumbnails');

add_theme_support( 'automatic-feed-links' );
register_nav_menu('primary','Primary Menu');
}
    
/*
 * get logo site
 */
function get_logo_site(){
	$sHtmlLogo = '';
	$logotype = ot_get_option(THEME_PREFIX . '_logotype', 1);
	if(isset($logotype) && $logotype == 1){
		$logo = ot_get_option(THEME_PREFIX . '_logo');
		if($logo){
			$sHtmlLogo = '<img src="' . $logo . '" alt="logo" />';
		}else{
			$sHtmlLogo = '<img src="' . THEME_PATH . '/images/logo_tlg.gif" alt="logo" />';
		}
	}else{
		$sHtmlLogo = ot_get_option(THEME_PREFIX . '_logoText', 'logo');
	}
	return $sHtmlLogo;
}

/*
 * get latest posts
 */
function get_latest_posts(){
	$iNumposts = ot_get_option(THEME_PREFIX . '_TZHomePage_blog_numers');
	if(!$iNumposts || !is_numeric($iNumposts) || floor($iNumposts) != $iNumposts){
		$iNumposts = 5;
	}
	$iCategory = ot_get_option(THEME_PREFIX . '_TZHomePage_category', '');
	$args = array(
		'numberposts' => $iNumposts,
		'offset' => 0,
		'category' => $iCategory,
		'orderby' => 'menu_order date',
		'include' => '',
		'exclude' => '',
		'meta_key' => '',
		'meta_value' => '',
		'post_type' => 'post',
		'post_status' => 'publish',
		'suppress_filters' => true 
	);
	return wp_get_recent_posts( $args, ARRAY_A );
}

/*
 * get images array
 */
function get_images_array($field_value){
    $images = array();
    preg_match( '/ids=\'(.*?)\'/', $field_value, $matches );
    if(isset($matches[1])){
      // Found the IDs in the shortcode
      $ids = explode( ',', $matches[1] );
    }else{
      // The string is only IDs
      $ids = ! empty( $field_value ) && $field_value != '' ? explode( ',', $field_value ) : array();
    }
    // Has attachment IDs
    if(!empty($ids)){
        foreach($ids as $id){
            $thumbnail = wp_get_attachment_image_src( $id, 'thumbnail' );
            $images[] = $thumbnail[0];
        }
    }
    return $images;
}

function get_hours_class($field_value){
    $hours = array();
    $items = explode('|', str_replace(array('[', ']'), '', $field_value));
    foreach($items as $item){
        if($item){
            list($time, $is_booking) = explode('-', $item);
            $hours[] = array('time' => $time, 'is_booking' => $is_booking);
        }
    }
    return $hours;
}

function add_query_vars_filter( $vars ){
  $vars[] = "course-cat";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

function get_the_category_custompost( $id = false, $tcat = 'category' ) {
    $categories = get_the_terms( $id, $tcat );
    if ( ! $categories )
        $categories = array();

    $categories = array_values( $categories );

    foreach ( array_keys( $categories ) as $key ) {
        _make_cat_compat( $categories[$key] );
    }

    return apply_filters( 'get_the_categories', $categories );
}