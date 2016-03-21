<?php

/*
 *constants
 */

define('THEME_PREFIX', 'plazart');
define('THEME_NAME', 'theme');
define('TEXT_DOMAIN', 'theme');
define('THEME_VERSION', '1.0');
define('THEME_PATH', get_template_directory_uri());
define('SERVER_PATH', get_template_directory());

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );


/**
 * Required: include OptionTree.
 */

load_template( trailingslashit( SERVER_PATH ) . 'option-tree/ot-loader.php' );

/**
 * Required: include Theme Options
 */
load_template( trailingslashit( SERVER_PATH ) . 'extension/theme-options.php' );


/**
 * Required: include custom post type
 * load_template( trailingslashit( SERVER_PATH ) . 'extension/portfolio-post-type.php' );
 */
 load_template( trailingslashit( SERVER_PATH ) . 'extension/course-post-type.php' );

/**
 * Required: include meta box for portfolio and post
 * load_template( trailingslashit( get_template_directory()  ) . 'extension/portfolio-meta-boxes.php' );
 */
load_template( trailingslashit( get_template_directory()  ) . 'extension/course-meta-boxes.php' );
load_template( trailingslashit( get_template_directory()  ) . 'extension/post-meta-boxes.php' );


/**
 * Required: include theme-functions
 */
load_template( trailingslashit( SERVER_PATH ) . 'extension/theme-functions.php' );

/**
 * Required: include plugin Aqua Resizer
 */
load_template( trailingslashit( get_template_directory()  ) . 'extension/aq_resizer.php' );

/**
 * Required: include plugin theme scripts
 */
load_template( trailingslashit( get_template_directory()  ) . 'extension/theme-scripts.php' );

/**
 * Required: include plugin theme sidebars
 */
load_template( trailingslashit( get_template_directory()  ) . 'extension/theme-sidebars.php' );

/*
 * Required: include Shorcode
 */
load_template( trailingslashit( get_template_directory()  ) . 'extension/shortcode.php' );


/*
 * Required: include plugin theme scripts
 */
load_template( trailingslashit( get_template_directory()  ) . 'extension/process-option.php' );

/*
 * Required: include widgets
 */
load_template( trailingslashit( get_template_directory()  ) . 'extension/widgets/view-post.php' );

load_template( trailingslashit( get_template_directory()  ) . 'extension/widgets/tz-social.php' );

/*
 * method load  portfolio-meta-boxes Scripts
 */
add_action('admin_head', 'portfolio_scripts');
function portfolio_scripts()
{
        if(is_admin()):

        wp_enqueue_style('theme-option', THEME_PATH . '/extension/assets/css/theme-options.css');

        wp_enqueue_script('portfolio_meta_boxes', THEME_PATH . '/extension/assets/js/portfolio_meta_boxes.js', false, '1.0', $in_footer=true);

        wp_enqueue_script('portfolio_theme_option', THEME_PATH . '/extension/assets/js/portfolio_theme_option.js', false, '1.0', $in_footer=true);

    ?>

    <style type="text/css">
        #portfolio_meta_box .format-setting-label {
            border: none;
            margin: 0;
        }
        #portfolio_meta_box .ot-metabox-wrapper .format-settings {
            margin-bottom: 15px;
        }
    </style>

        <?php
        endif;

}
/*
 *  method add global javascript variable THEME_PREFIX to admin_head
 */
function theme_prefix_addto_header() {
    ?>
<script type="text/javascript">
    var themeprefix = '<?php echo THEME_PREFIX ?>';
</script>
<?php
}
add_action('admin_head', 'theme_prefix_addto_header');
add_action('wp_head', 'theme_prefix_addto_header');

/*
 * Method add ot_get_option
 */

if(!is_admin()):

    if ( ! function_exists( 'ot_get_option' ) ) {
        function ot_get_option( $option_id, $default = '' ) {
            /* get the saved options */
            $options = get_option( 'option_tree' );
            /* look for the saved value */
            if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {
                return $options[$option_id];
            }
            return $default;
        }
    }
    if(function_exists('ot_get_option')){

        /*===================================
         * Home settings
         ==================================*/
        $AboutPosition      =   ot_get_option(THEME_PREFIX.'_TZAboutPosition',1);
        $ServicesPosition   =   ot_get_option(THEME_PREFIX.'_TZServicesPosition',2);
        $CompanyPostion     =   ot_get_option(THEME_PREFIX.'_TZCompanyPosition',3);
        $EventPostion       =   ot_get_option(THEME_PREFIX.'_TZEventPosition',4);
        $PortfolioPostion   =   ot_get_option(THEME_PREFIX.'_TZPortfolioPosition',5);
        $BlogPostion        =   ot_get_option(THEME_PREFIX.'_TZPositionBlog',6);
        $tz_Quote           =   ot_get_option(THEME_PREFIX. '_TZQuote');
        $tz_Page            =   ot_get_option(THEME_PREFIX. '_TZPage');
        $Slide_status       =   ot_get_option(THEME_PREFIX. '_TZSlideStatus');
        $About_status       =   ot_get_option(THEME_PREFIX. '_TZAboutStatus');
        $services_status    =   ot_get_option(THEME_PREFIX . '_TZServicesStatus');
        $Company_status     =   ot_get_option(THEME_PREFIX . '_TZCompanyStatus');
        $Event_status       =   ot_get_option(THEME_PREFIX.'_TZEventStatus');
        $portfolio_status   =   ot_get_option(THEME_PREFIX . '_TZPortoflioStatus');
        $blog_status        =   ot_get_option(THEME_PREFIX . '_TZBlogStatus');
        $ClientsStatus      =   ot_get_option(THEME_PREFIX.'_TZClientsStatus',1);

        /*================================
         * portfolio page
         ===============================*/
        $idcatpor           =   ot_get_option(THEME_PREFIX. '_TZPagePortfolioCat',"");
        $typeFilter         =   ot_get_option(THEME_PREFIX.'_TZPorFilter','tags');
        $ShowFilter         =   ot_get_option(THEME_PREFIX.'_TZPorShowFilter','show');
        $TZPorlimit         =   ot_get_option(THEME_PREFIX . '_TZPorlimit',10);
        $TZPorOrderBy       =   ot_get_option(THEME_PREFIX . '_TZPortOrderby','date');
        $TZPorOrder         =   ot_get_option(THEME_PREFIX . '_TZPorOrder','desc');
        $TZPorShowTitle     =   ot_get_option(THEME_PREFIX . '_TZPorShowTitle','show');
        $TZPorShowTags      =   ot_get_option(THEME_PREFIX . '_TZPorShowTags','show');
        $TZPorShowIcon      =   ot_get_option(THEME_PREFIX . '_TZPorShowIcon','show');

        /*================================
         * Timeline page
         ===============================*/
        $idcatTime           =   ot_get_option(THEME_PREFIX. '_TZTimeCat',"");
        $FilterTimeline      =   ot_get_option(THEME_PREFIX.'_TZTimeFilter','tags');
        $StatusFilter        =   ot_get_option(THEME_PREFIX.'_TZTimeShowFilter','show');
        $TZTimelimit         =   ot_get_option(THEME_PREFIX . '_TZTimelimit',10);
        $TZTimeOrder         =   ot_get_option(THEME_PREFIX . '_TZTimeOrder','desc');
        $TZTimeShowTitle     =   ot_get_option(THEME_PREFIX . '_TZTimeShowTitle','show');
        $TZTimeShowTags      =   ot_get_option(THEME_PREFIX . '_TZTimeShowTags','show');
        $TZTimeShowIcon      =   ot_get_option(THEME_PREFIX . '_TZTimeShowIcon','show');

        /*=================================
        * Blog page
        ===================================*/
        $heading               =   ot_get_option(THEME_PREFIX . '_TZBlogHeading',2);
        $Blog_images           =   ot_get_option(THEME_PREFIX . '_TZBlogImage','show');
        $Blog_Info             =   ot_get_option(THEME_PREFIX . '_TZBlogInfo','show');
        $Blog_Excerpt          =   ot_get_option(THEME_PREFIX . '_TZBlogExcerpt','show');
        $Blog_Tags             =   ot_get_option(THEME_PREFIX . '_TZBlogTags','show');

        /*Archive template*/
        $Ar_type             =   ot_get_option(THEME_PREFIX . '_TZArchiveType',1);
        $Ar_limit            =   ot_get_option(THEME_PREFIX . '_TZArchiveLimit',10);
        $Ar_Order            =   ot_get_option(THEME_PREFIX . '_TZArchiveOrder','DESC');
        $Ar_images           =   ot_get_option(THEME_PREFIX . '_TZArchiveImage','show');
        $Ar_Info             =   ot_get_option(THEME_PREFIX . '_TZArchiveInfo','show');
        $Ar_Excerpt          =   ot_get_option(THEME_PREFIX . '_TZArchiveExcerpt','show');
        $Ar_Tags             =   ot_get_option(THEME_PREFIX . '_TZArchiveTags','show');


        /*===================================
         * Global Option
         ===================================*/
        $showtootbaradmin     =   ot_get_option(THEME_PREFIX.'_TzThemeStyleOptionAdmin');
        $googAnlytice         =   ot_get_option(THEME_PREFIX . '_google_analytics');



}


endif;

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 900;


/*
 * Adds JavaScript to pages with the comment form to support
 * sites with threaded comments (when in use).
 */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );


if (isset($googAnlytice) && $googAnlytice != '') {
    add_action('wp_footer', 'add_google_analytics_code');
}
function add_google_analytics_code() {
    echo '<script type="text/javascript">';
    echo ot_get_option(THEME_PREFIX . '_google_analytics');
    echo '</script>';
}
/*
 * This function is used to get people to check out the article
*/
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){ // If such views are not
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0"; // return value of 0
    }
    return $count; // Returns views
}
/*
 * This function is used to set and update the article views.
*/
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++; // Incremental view
        update_post_meta($postID, $count_key, $count); // update count
    }
}
/*
 * Method limit excerpt
 */
function limitexcerpt($lenght){
    $limitexcerpt = ot_get_option(THEME_PREFIX.'_porlimitexcerpt',50);;
    return $limitexcerpt ;
}
add_filter('excerpt_length','limitexcerpt');

/*
 * Methor support author for portoflio
 */
add_filter('posts_where', 'include_for_author');
function include_for_author($where){
    if(is_author())
        $where = str_replace(".post_type = 'post'", ".post_type in ('post', 'portfolio')", $where);

    return $where;
}

/*
 *  Method show or hide toolbar admin
 */

if(isset($showtootbaradmin) && $showtootbaradmin=='0'){
    add_filter('show_admin_bar', '__return_false');
}

//add excerpt to page
add_post_type_support( 'page', 'excerpt' );


?>