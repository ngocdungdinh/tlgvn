<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <meta name="description" content="<?php bloginfo('description'); ?>" />
        <title><?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;

            wp_title( '|', true, 'right' );

            // Add the blog name.
            bloginfo( 'name' );

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) )
                echo " | $site_description";

            // Add a page number if necessary:
            if ( $paged >= 2 || $page >= 2 )
                echo ' | ' . sprintf( __( 'Page %s', TEXT_DOMAIN ), max( $paged, $page ) );

            ?>
        </title>
        <?php wp_head(); ?>
    </head>
    <body id="bd" <?php body_class(); ?>>
        <div>
            <div id="tlgi_SharePoint_outerContainer">
                <div id="tlgi_SharePoint_userToolbar">
                    <div id="wrapper">
                        <!-- Console -->
                        <span id="ctl00_ctl25_publishingContext1"></span>
                        <!-- Console -->
                    </div>
                </div>
                <div id="tlgi_SharePoint_backgroundContainer">
                    <div id="tlgi_SharePoint_backgroundContainerGradient">
                        <div id="tlgi_SharePoint_backGroundContainerGradientLeft" />
                            <div id="tlgi_SharePoint_headerContainer">
                                <div id="tlgi_SharePoint_headerLogo">
                                    <a href="<?php echo get_home_url(); ?>" title="<?php bloginfo('name'); ?>">
                                        <?php 
                                            if(function_exists('get_logo_site')){
                                                echo get_logo_site();
                                            }
                                        ?>
                                    </a>
                                </div>
                                <div id="tlgi_SharePoint_headerAddress"></div>
                                <div id="ctl00_srchHeaderContainer">
                                    <div id="tlgi_SharePoint_searchHeader">
                                        <div id="tlgi_SharePoint_searchHeaderNavigation" class="searchHdrNavGradient searchHdrNavRounded" >
                                            <table class="tlgi_SharePoint_searchHeaderTable">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div id="searchHdrNavLinks">
                                                                <a href="/en" title="English">
                                                                    <img src="<?php echo THEME_PATH; ?>/images/EN.gif" alt="English" border="0" />
                                                                </a>
                                                                <a href="/en" title="English">English</a>
                                                                <a href="/" title="Vietnamese">
                                                                    <img src="<?php echo THEME_PATH; ?>/images/vn.gif" alt="Vietnamese" border="0" />
                                                                </a>
                                                                <a href="/" title="Vietnamese">Vietnamese</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div id="searchHdrSearch">
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                        <td valign="top">
                                                                            <div id="WebPartWPQ1" width="100%" >
                                                                                <div id="SRSB">
                                                                                    <div id="ctl00_SearchBox" style="border-style:None;">
                                                                                        <form role="search" method="get" id="search-form" class="search-form" action="<?php echo home_url( '/' ); ?>">
                                                                                            <table class="ms-sbtable ms-sbtable-ex" border="0">
                                                                                                <tr class="ms-sbrow">
                                                                                                    <td class="ms-sbcell">
                                                                                                        <input name="q" id="q" type="hidden" />
                                                                                                        <input name="s" id="s" type="text" maxlength="200" accesskey="S" title="Enter search words" class="ms-sbplain" alt="Enter search words" placeholder="Tìm kiếm" style="width:170px;" />
                                                                                                    </td>
                                                                                                    <td class="ms-sbgo ms-sbcell">
                                                                                                        <a title="Go Search">
                                                                                                            <img title="Go Search" alt="Go Search" src="<?php echo THEME_PATH; ?>/images/btn_go_green.gif" style="border-width:0px;" />
                                                                                                        </a>
                                                                                                    </td>
                                                                                                    <td class="ms-sbLastcell"></td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="tlgi_SharePoint_navHeader" style="min-height:36px;">
                                    <div id="ctl00_mainNavigation_GlobalNav" class="RadMenu RadMenu_TLGI">
                                        <?php
                                            wp_nav_menu(array(
                                                'menu' => 'Main Menus',
                                                'container' => false,
                                                'menu_id' => '',
                                                'menu_class' => 'rmRootGroup rmHorizontal',
                                                'depth' => 0,
                                            ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div id="tlgi_SharePoint_ContentWrap">