<?php
/**
 * Template Name: Full Content Template
 */
?>
<?php get_header();?>
<?php if(have_posts()): the_post(); ?>
    <?php if(($featured_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())))): ?>
        <div id="tlgi_SharePoint_SubSiteHeader">
            <div id="ctl00_PlaceHolderMain_ctl00__ControlWrapper_RichImageField" style="display:inline">
                <span>
                    <img alt="<?php the_title(); ?>" border="0" src="<?php echo aq_resize($featured_url, 875, 200, true); ?>" style="border:0px solid" />
                </span>
            </div>
        </div>
    <?php else: ?>
        <div id="tlgi_SharePoint_SubSiteHeader">
            <div id="ctl00_PlaceHolderMain_ctl00__ControlWrapper_RichImageField" style="display:inline">
                <span>
                    <img alt="<?php the_title(); ?>" border="0" src="<?php echo THEME_PATH; ?>/images/programs.jpg" style="border:0px solid" />
                </span>
            </div>
        </div>
    <?php endif; ?>
    <div id="tlgi_SubSiteContentContainer">
        <div id="maincontent full-content">
            <div id="copy">
                <h2><?php the_title(); ?></h2>
                <?php if($meta_ages = get_post_meta(get_the_ID(),THEME_PREFIX . '_meta_ages',true)): ?>
                    <h5><?php echo $meta_ages; ?></h5>
                <?php endif; ?>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php get_footer();?>