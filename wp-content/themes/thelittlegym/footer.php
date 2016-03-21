                        </div>
                        <div id="tlgi_SharePoint_Footer">
                            <div class="footer-links-social">
                                <div class="tlgi_SharePoint_FooterLinks">
                                    <div class="footer_nav">
                                        <?php
                                            wp_nav_menu(array(
                                                'menu' => 'Footer Menus',
                                                'container' => false,
                                                'menu_id' => '',
                                                'depth' => 0,
                                            ));
                                        ?>  
                                    </div>
                                </div>
                                <div class="tlgi_SharePoint_FooterIcons">
                                    <?php if(($social_network_googleplus = ot_get_option(THEME_PREFIX . '_social_network_googleplus'))): ?>
                                        <a href="<?php echo $social_network_facebook; ?>" target="_blank" rel="nofollow">
                                            <img src="<?php echo THEME_PATH; ?>/images/btn_googleplus.png" width="27" height="25" border="0"  />
                                        </a>
                                    <?php endif; ?>
                                    <?php if(($social_network_facebook = ot_get_option(THEME_PREFIX . '_social_network_facebook'))): ?>
                                        <a href="<?php echo $social_network_facebook; ?>" target="_blank" rel="nofollow">
                                            <img src="<?php echo THEME_PATH; ?>/images/btn_Facebook.png" width="27" height="25" border="0"  />
                                        </a>
                                    <?php endif; ?>
                                    <?php if(($social_network_twitter = ot_get_option(THEME_PREFIX . '_social_network_twitter'))): ?>
                                        <a href="<?php echo $social_network_twitter; ?>" target="_blank" rel="nofollow">
                                            <img src="<?php echo THEME_PATH; ?>/images/btn_twitter.png" width="27" height="25" border="0"  />
                                        </a>
                                    <?php endif; ?>
                                    <?php if(($social_network_youtube = ot_get_option(THEME_PREFIX . '_social_network_youtube'))): ?>
                                        <a href="<?php echo $social_network_youtube; ?>" target="_blank" rel="nofollow">
                                            <img src="<?php echo THEME_PATH; ?>/images/btn_Youtube.png" width="27" height="25" border="0"  />
                                        </a>
                                    <?php endif; ?>
                                    <?php if(($social_network_childrens_success = ot_get_option(THEME_PREFIX . '_social_network_childrens_success'))): ?>
                                        <a href="<?php echo $social_network_childrens_success; ?>" target="_blank" rel="nofollow">
                                            <img src="<?php echo THEME_PATH; ?>/images/footer_btn_success.gif" border="0"  />
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="locations-fanpage">
                                <?php if(($locations = ot_get_option(THEME_PREFIX . '_TZLocations_locations'))): ?>
                                    <div class="tlgi_SharePoint_Locations">
                                        <h4>The Little Gym of Vietnam</h4>
                                        <?php foreach($locations as $idx => $location): ?>
                                            <ul>
                                                <li>Location <?php echo ($idx + 1); ?>: <?php echo $location['title']; ?></li>
                                                <?php if($location['address']): ?>
                                                    <li><?php echo $location['address']; ?></li>
                                                <?php endif; ?>
                                                <?php if($location['phone']): ?>
                                                    <li>Tel: <?php echo $location['phone']; ?></li>
                                                <?php endif; ?>
                                                <?php if($location['fax']): ?>
                                                    <li>Fax: <?php echo $location['fax']; ?></li>
                                                <?php endif; ?>
                                                <?php if($location['email']): ?>
                                                    <li>Email: <a href="mailto:<?php echo $location['email']; ?>"><?php echo $location['email']; ?></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(($social_network_facebook = ot_get_option(THEME_PREFIX . '_social_network_facebook'))): ?>
                                    <div class="tlgi_SharePoint_Fanpage">
                                        <div class="fb-like-box" data-href="<?php echo $social_network_facebook; ?>" data-width="340px" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                                        <div id="fb-root"></div>
                                        <script>
                                            (function(d, s, id) {
                                              var js, fjs = d.getElementsByTagName(s)[0];
                                              if (d.getElementById(id)) return;
                                              js = d.createElement(s); js.id = id;
                                              js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=894755507223507&version=v2.0";
                                              fjs.parentNode.insertBefore(js, fjs);
                                            }(document, 'script', 'facebook-jssdk'));
                                        </script>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>