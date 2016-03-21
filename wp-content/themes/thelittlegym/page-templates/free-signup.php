<?php
/* 
 * Template Name: Free Signup
 */
?>

<!DOCTYPE html>
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <title>
        <?php
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
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/signup_style.css"/>
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/Menu.css"/>
	<script type='text/javascript' src='http://www.thelittlegym.com.vn/wp-includes/js/jquery/jquery.js'></script>
    <script src="<?php bloginfo('template_directory');?>/js/modernizr.custom.js"></script>
	<!-- Facebook Conversion Code for Reg - LGym -->
	<script>(function() {
	var _fbq = window._fbq || (window._fbq = []);
	if (!_fbq.loaded) {
	varfbds = document.createElement('script');
	fbds.async = true;
	fbds.src = '//connect.facebook.net/en_US/fbds.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(fbds, s);
		_fbq.loaded = true;
	  }
	})();
	window._fbq = window._fbq || [];
	window._fbq.push(['track', '6039845506466', {'value':'0.00','currency':'VND'}]);
	fbq('track', 'CompleteRegistration');
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6039845506466&amp;cd[value]=0.00&amp;cd[currency]=VND&amp;noscript=1" /></noscript>
</head>
<body>
<div class="page">
    <div class="container">

        <header id="header-page">
            <nav class="main-nav box-nr effect2">
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/gioi-thieu/">Giới thiệu</a></li>
                    <li><a href="/schedules/">Lịch học</a></li>
                    <li><a href="/chuong-trinh-hoc/">Chương trình</a></li>
                </ul>
            </nav> <!-- .main-nav -->
<!--            <div id="tlgi_SharePoint_navHeader" style="min-height:36px;">
                <div id="ctl00_mainNavigation_GlobalNav" class="RadMenu RadMenu_TLGI">
                    <?php
//                        wp_nav_menu(array(
//                            'menu' => 'Main Menus',
//                            'container' => false,
//                            'menu_id' => '',
//                            'menu_class' => 'rmRootGroup rmHorizontal',
//                            'depth' => 0,
//                        ));
                    ?>
                </div>
            </div>-->
        </header> <!-- #header-page -->

        <?php if(have_posts()): the_post(); ?>
        <div id="main-page">
            <div class="section-top clearfix">
                <a href="#" class="brand effect2">
                    <img src="<?php bloginfo('template_directory');?>/images/brand.png" alt=""/>
                </a>
                <p><?php the_content(); ?></p>
                <a href="javascript:void(0);" id="signupClick" class="btn btn-lg btn-block btn-cta btn-primary box-nr effect2 text-uppercase">
                    <?php 
                    $key_name = get_post_custom_values($key = 'line_title');
                    echo $key_name[0];
                    ?>
                </a>
            </div> <!-- .section-top -->

            <div class="section-bottom">
                <div class="row">

                    <div class="col-sm-7">
                        <div class="content-k">
                            <p>
                                <?php 
                                $key_name = get_post_custom_values($key = 'promotion');
                                echo $key_name[0];
                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-5" id="signup">
                        
                        <?php the_excerpt(); ?>
                        
                        
                        
<!--                        <form class="form-k">
                            <div class="checkbox checkbox-wrap">
                                <label class="checkbox-k">
                                    <input type="radio" name="radio-102" checked/>
                                    <span>Royal city</span>
                                </label>
                                <label class="checkbox-k">
                                    <input type="radio" name="radio-102"/>
                                    <span>Vincom Long Biên</span>
                                </label>
                            </div>
                            <div class="clearfix">
                                <div class="form-group">
                                    <input class="form-control input-1" placeholder="Tên bé">
                                    <i class="icon icon-smile"></i>
                                    <p class="error-label">Thông báo</p>
                                </div>

                                <div class="form-group">
                                    <input class="form-control input-2" placeholder="Ngày sinh">
                                    <i class="icon icon-birth"></i>
                                </div>

                                <div class="form-group">
                                    <input class="form-control input-3" placeholder="Tên phụ huynh">
                                    <i class="icon icon-person"></i>
                                </div>

                                <div class="form-group">
                                    <input class="form-control input-4" placeholder="Email">
                                    <i class="icon icon-email"></i>
                                </div>

                                <div class="form-group">
                                    <input class="form-control input-5" placeholder="Phone">
                                    <i class="icon icon-phone"></i>
                                </div>

                                <div class="form-group">
                                    <input class="form-control input-6" placeholder="Địa chỉ">
                                    <i class="icon icon-address"></i>
                                </div>

                                <div class="form-group btn-reg-wrap">
                                    <button type="button" class="btn btn-lg btn-block btn-primary box-nr effect2">Đăng ký</button>
                                    <i class="icon icon-like"></i>
                                </div>
                            </div>

                        </form>-->
                    </div>

                </div>
            </div> <!-- .section-bottom -->

        </div> <!-- #main-page -->
        <?php endif;?>
        <footer id="footer-page">
            <div class="row">

                <div class="col-sm-4">
                    <p>The Little Gym Vincom Long Biên
                    402A, Tầng 4, Vincom Plaza Long Biên,
                    KĐT Sinh Thái Vinhomes Riverside, Việt Hưng, Hà Nội</p>
                    <p><a href="mailto:info@thelittlegym.com.vn">info@thelittlegym.com.vn</a></p>
                    <p>+84 473 048 886 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +84 935 158 555</p>
                </div>

                <div class="col-sm-4">
                    <p>The Little Gym Royal 
                    B1 floor-R3-08, R3 Building, Royal City,
                    72 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
                    <p><a href="mailto:info_rc@thelittlegym.com.vn">info@thelittlegym.com.vn</a></p>
                    <p>+84 473 048 886 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +84 934 999 663</p>
                </div>

                <div class="col-sm-4">
                    <a class="icon brand-bottom pull-right" href="http://www.thelittlegym.com.vn/">Brand</a>
                    <span class="social-box pull-right">
                        <a class="icon icon-fb" href="https://www.facebook.com/TheLittleGymofHanoi"></a>
                        <a class="icon icon-tw" href="#"></a>
                        <a class="icon icon-yt" href="https://www.youtube.com/user/TLGHanoi"></a>
                    </span>
                </div>

            </div>
        </footer> <!-- #footer-page -->

    </div> <!-- .container -->
</div> <!-- .page -->

<!-- <script src="js/jquery-1.11.1.js"></script>
<script src="js/respond.min.js"></script> -->
<script type="text/javascript">
jQuery('#signupClick').click(function() {
	jQuery('html,body').animate({
        scrollTop: jQuery("#signup").offset().top
    }, 800);
	
	jQuery('#children-name').focus();
});
</script>
</body>
</html>

