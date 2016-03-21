<?php get_header();?>
<div id="tlgi_SharePoint_SubSiteHeader_Home">
    <?php echo do_shortcode('[layerslider id="7"]'); ?>
</div>
<?php if(($images_boxs = ot_get_option(THEME_PREFIX . 'TZHomePage_images_boxs'))): ?>
    <div id="tlgi_SubSiteContentContainer">
        <?php foreach($images_boxs as $idx => &$box): ?>
            <?php if($box['image']): ?>
                <div class="calloutControl <?php if(($idx + 1) % 3 == 0): ?>box-last<?php endif; ?>">
                    <a href="<?php echo $box['url']; ?>" title="<?php echo $box['title']; ?>">
                        <img src="<?php echo $box['image']; ?>" border="0" title="<?php echo $box['title']; ?>" alt="<?php echo $box['title']; ?>" />
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<div class="contentLearning">
    <?php if(($lstLatestPosts = get_latest_posts())): ?>
        <div class="dimensionalLearning">
            <h3 class="titleCoporate" id="titleHome">News</h3>
            <ul class="divBgFindAGun">
                <?php foreach($lstLatestPosts as &$aPost): ?>
                    <li><a href="<?php echo get_permalink($aPost["ID"]); ?>" title="<?php echo $aPost['post_title']; ?>"><?php echo $aPost['post_title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="dimensionalVideo">
        <?php if(($videos_box = ot_get_option(THEME_PREFIX . 'TZHomePage_videos_box'))): ?>
            <h3 class="titleHome">
                <div class="titleNameHome">Videos</div>
                <div class="viewDetailNews"><a href="<?php echo ot_get_option(THEME_PREFIX . '_TZHomePage_videos_more_url'); ?>" class="aDetailNews">View more</a></div>
            </h3>
            <ul class="ulVideoHome">
                <?php foreach($videos_box as $idx => &$image): ?>
                    <li class="liGallery <?php if(($idx + 1) % 4 == 0): ?>new-line<?php endif; ?>">
                        <a href="<?php echo $image['url']; ?>" title="<?php echo $image['title']; ?>">
                            <img src="<?php echo aq_resize($image['image'], 135, 125, true); ?>" width="135" height="125" border="0" />
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <?php if(($gallery_box = ot_get_option(THEME_PREFIX . 'TZHomePage_gallery_box'))): ?>
            <h3 class="titleHome">
                <div class="titleNameHome">Photos</div>
                <div class="viewDetailNews"><a href="<?php echo ot_get_option(THEME_PREFIX . '_TZHomePage_gallery_more_url'); ?>" class="aDetailNews">View more</a></div>
            </h3>
            <ul class="ulVideoHome">
                <?php foreach($gallery_box as $idx => &$image): ?>
                    <li class="liGallery <?php if(($idx + 1) % 4 == 0): ?>new-line<?php endif; ?>">
                        <a href="<?php echo $image['url']; ?>" title="<?php echo $image['title']; ?>">
                            <img src="<?php echo aq_resize($image['image'], 135, 125, true); ?>" width="135" height="125" border="0" />
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();?>