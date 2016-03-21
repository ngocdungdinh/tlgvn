<?php get_header();?>
<div id="tlgi_SharePoint_SubSiteHeader">
    <div id="ctl00_PlaceHolderMain_ctl00__ControlWrapper_RichImageField" style="display:inline">
        <span>
            <img alt="<?php echo single_cat_title( '', false ); ?>" border="0" src="<?php echo THEME_PATH; ?>/images/blog.jpg" style="border:0px solid" />
        </span>
    </div>
</div>
<div id="tlgi_SubSiteContentContainer">
    <div id="maincontent">
        <div id="copy">
            <?php while(have_posts()): the_post(); ?>
                <div class="tlgi_SharePoint_BlogContainer">
                    <div class="tlgi_SharePoint_BlogTitleContainer">
                        <div class="tlgi_SharePoint_BlogTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <div class="tlgi_SharePoint_BlogDate"><span>&nbsp;</span><span class="tlgi_SharePoint_BlogDate"><?php the_time('M jS, Y'); ?></span></div>
                    </div>
                    <div class="tlgi_SharePoint_BlogPost">
                        <div><?php the_excerpt(); ?></div>
                    </div>
                </div>
            <?php endwhile; wp_reset_query(); ?>
            <div class="wp_pagenavi">
                <?php if(function_exists('wp_pagenavi')): ?>
                    <?php wp_pagenavi(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div id="tlgi_SharePoint_SubSiteSideBar">
        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar')): endif; ?>
    </div>
</div>
<?php get_footer();?>