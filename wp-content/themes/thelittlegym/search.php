<?php get_header();?>
<div id="tlgi_SharePoint_SubSiteHeader">
    <div id="ctl00_PlaceHolderMain_ctl00__ControlWrapper_RichImageField" style="display:inline">
        <span>
            <img alt="<?php the_title(); ?>" border="0" src="<?php echo THEME_PATH; ?>/images/SearchResults.jpg" style="border:0px solid" />
        </span>
    </div>
</div>

<div id="tlgi_SubSiteContentContainer">
    <div id="maincontent">
        <div id="copy">
            <h1>Search Results</h1>
            <script>
              (function() {
                var cx = '005961566323659862564:honyt1pyid0';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                    '//www.google.com/cse/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
              })();
            </script>
            <gcse:searchresults-only></gcse:searchresults-only>
        </div>
    </div>
    <!-- Callouts -->
    <div id="tlgi_SharePoint_SubSiteSideBar">
        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar')): endif; ?>
    </div>
</div>
<?php get_footer();?>