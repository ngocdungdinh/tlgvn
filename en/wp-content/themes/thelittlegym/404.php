<?php
/**
 * This is 404 page
 */
?>
<?php get_header();?>
<div id="tlgi_SharePoint_SubSiteHeader">
    <div id="ctl00_PlaceHolderMain_ctl00__ControlWrapper_RichImageField" style="display:inline">
        <span>
            <img border="0" src="<?php echo THEME_PATH; ?>/images/gymLocations.jpg" style="border:0px solid" />
        </span>
    </div>
</div>
<div id="tlgi_SubSiteContentContainer">
    <div id="maincontent" class="full-content">
        <div id="copy">
            <div class="error">
                <div class="bug-content">
                    <div id="errorboxheader">
                        <h2>We're sorry..</h2><p>The page or journal you are looking for cannot be found</p>
                    </div>
                    <div id="errorboxbody">
                        <ul class="back-to-homepage">
                            <li><a href="<?php echo home_url(); ?>" title="<?php echo __('Go to the Home Page', TEXT_DOMAIN); ?>"><?php echo __('Go to the Home Page', TEXT_DOMAIN); ?></a></li>
                        </ul>
                        <div id="techinfo">
                            <p></p>
                        </div>
                    </div>
                </div><!--end class bug-content-->
            </div><!--end class error-->
        </div>
    </div>
</div>
<?php get_footer();?>