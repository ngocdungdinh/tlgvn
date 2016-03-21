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
        <div id="maincontent">
            <div id="copy">
                <h2><?php the_title(); ?></h2>
                <?php if($meta_ages = get_post_meta(get_the_ID(), THEME_PREFIX . '_meta_ages', true)): ?>
                    <h5><?php echo $meta_ages; ?></h5>
                <?php endif; ?>
                <?php the_content(); ?>
                <?php if(get_post_meta(get_the_ID(), THEME_PREFIX . '_course_show_schedules', true) && ($classes = get_post_meta(get_the_ID(), THEME_PREFIX . '_course_classes', true))): ?>
                    <?php $categories = get_the_category_custompost(get_the_ID(), 'course-category'); ?>
                    <input type="hidden" id="course-category" value="<?php echo $categories ? $categories[0]->name : ''; ?>" />
                    <div id="tooltip-try" style="display: none;">
                        <div id="enroll-text" class="" style="display: block;"></div>
                        <div class="btn" id="enroll-link" style="display: block;"><a href="#enroll-booking" class="inline cboxElement" data-booking-type="enroll">Enroll</a></div>
                        <div id="divider" style="display: block;"></div>
                        <div id="intro-text" class="" style="display: block;"></div>
                        <div id="KMintro-text" class="" style="display: none;"></div>
                        <div class="btn" id="intro-class-link" style="display: block;"><a href="#form-booking" class="inline cboxElement" data-booking-type="intro">Intro Class</a></div>
                        <input type="hidden" id="course-booking-name" />
                        <input type="hidden" id="course-booking-link" />
                        <input type="hidden" id="course-booking-ages" />
                        <input type="hidden" id="course-booking-time" />
                        <input type="hidden" id="course-booking-day" />
                    </div>

                    <table class="scheduleTable" cellspacing="0" rules="all" border="1" id="course-classes" style="width:100%;border-collapse:collapse;">
                        <tbody>
                            <tr class="cellHeader">
                                <th scope="col">&nbsp;</th>
                                <th scope="col">Sun</th>
                                <th scope="col">Mon</th>
                                <th scope="col">Tue</th>
                                <th scope="col">Wed</th>
                                <th scope="col">Thu</th>
                                <th scope="col">Fri</th>
                                <th scope="col">Sat</th>
                            </tr>
                            <?php foreach($classes as $idx => $class): ?>
                                <tr>
                                    <td class="classNames" style="width:124px;">
                                        <strong><span><?php echo $class['title']; ?></span></strong>
                                        <br />
                                        <span class="ages">( <?php echo $class['ages']; ?> )</span>
                                    </td>
                                    <td class="scheduleTimes" align="center" style="width:60px;">
                                        <?php if(($sun_hours = get_hours_class($class['sunday']))): ?>
                                            <?php foreach($sun_hours as $idx => &$hour): ?>
                                                <?php if($hour['is_booking']): ?>
                                                    <span><a href="javascript:void(0)" class="booking" onmouseover="showTip(this, '<?php echo get_the_ID() . '-sun-' . $idx; ?>', true, true, false, '<?php echo $class['title'] . ' >> ' . get_the_title(); ?>', '<?php echo get_the_permalink(); ?>', '<?php echo $class['ages']; ?>', 'sun', '<?php echo $hour['time']; ?>')" onmouseout="hideTipSoon()"><?php echo $hour['time']; ?></a><br /></span>
                                                <?php else: ?>
                                                    <span><?php echo $hour['time']; ?><br /></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="scheduleTimes" align="center" style="width:60px;">
                                        <?php if(($mon_hours = get_hours_class($class['monday']))): ?>
                                            <?php foreach($mon_hours as $idx => &$hour): ?>
                                                <?php if($hour['is_booking']): ?>
                                                    <span><a href="javascript:void(0)" class="booking" onmouseover="showTip(this, '<?php echo get_the_ID() . '-mon-' . $idx; ?>', true, true, false, '<?php echo $class['title'] . ' >> ' . get_the_title(); ?>', '<?php echo get_the_permalink(); ?>', '<?php echo $class['ages']; ?>', 'mon', '<?php echo $hour['time']; ?>')" onmouseout="hideTipSoon()"><?php echo $hour['time']; ?></a><br /></span>
                                                <?php else: ?>
                                                    <span><?php echo $hour['time']; ?><br /></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="scheduleTimes" align="center" style="width:60px;">
                                        <?php if(($tues_hours = get_hours_class($class['tuesday']))): ?>
                                            <?php foreach($tues_hours as $idx => &$hour): ?>
                                                <?php if($hour['is_booking']): ?>
                                                    <span><a href="javascript:void(0)" class="booking" onmouseover="showTip(this, '<?php echo get_the_ID() . '-tue-' . $idx; ?>', true, true, false, '<?php echo $class['title'] . ' >> ' . get_the_title(); ?>', '<?php echo get_the_permalink(); ?>', '<?php echo $class['ages']; ?>', 'tue', '<?php echo $hour['time']; ?>')" onmouseout="hideTipSoon()"><?php echo $hour['time']; ?></a><br /></span>
                                                <?php else: ?>
                                                    <span><?php echo $hour['time']; ?><br /></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="scheduleTimes" align="center" style="width:60px;">
                                        <?php if(($wed_hours = get_hours_class($class['wednesday']))): ?>
                                            <?php foreach($wed_hours as $idx => &$hour): ?>
                                                <?php if($hour['is_booking']): ?>
                                                    <span><a href="javascript:void(0)" class="booking" onmouseover="showTip(this, '<?php echo get_the_ID() . '-wed-' . $idx; ?>', true, true, false, '<?php echo $class['title'] . ' >> ' . get_the_title(); ?>', '<?php echo get_the_permalink(); ?>', '<?php echo $class['ages']; ?>', 'wed', '<?php echo $hour['time']; ?>')" onmouseout="hideTipSoon()"><?php echo $hour['time']; ?></a><br /></span>
                                                <?php else: ?>
                                                    <span><?php echo $hour['time']; ?><br /></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="scheduleTimes" align="center" style="width:60px;">
                                        <?php if(($thur_hours = get_hours_class($class['thursday']))): ?>
                                            <?php foreach($thur_hours as $idx => &$hour): ?>
                                                <?php if($hour['is_booking']): ?>
                                                    <span><a href="javascript:void(0)" class="booking" onmouseover="showTip(this, '<?php echo get_the_ID() . '-thu-' . $idx; ?>', true, true, false, '<?php echo $class['title'] . ' >> ' . get_the_title(); ?>', '<?php echo get_the_permalink(); ?>', '<?php echo $class['ages']; ?>', 'thu', '<?php echo $hour['time']; ?>')" onmouseout="hideTipSoon()"><?php echo $hour['time']; ?></a><br /></span>
                                                <?php else: ?>
                                                    <span><?php echo $hour['time']; ?><br /></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="scheduleTimes" align="center" style="width:60px;">
                                        <?php if(($fri_hours = get_hours_class($class['friday']))): ?>
                                            <?php foreach($fri_hours as $idx => &$hour): ?>
                                                <?php if($hour['is_booking']): ?>
                                                    <span><a href="javascript:void(0)" class="booking" onmouseover="showTip(this, '<?php echo get_the_ID() . '-fri-' . $idx; ?>', true, true, false, '<?php echo $class['title'] . ' >> ' . get_the_title(); ?>', '<?php echo get_the_permalink(); ?>', '<?php echo $class['ages']; ?>', 'fri', '<?php echo $hour['time']; ?>')" onmouseout="hideTipSoon()"><?php echo $hour['time']; ?></a><br /></span>
                                                <?php else: ?>
                                                    <span><?php echo $hour['time']; ?><br /></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="scheduleTimes" align="center" style="width:60px;">
                                        <?php if(($sat_hours = get_hours_class($class['saturday']))): ?>
                                            <?php foreach($sat_hours as $idx => &$hour): ?>
                                                <?php if($hour['is_booking']): ?>
                                                    <span><a href="javascript:void(0)" class="booking" onmouseover="showTip(this, '<?php echo get_the_ID() . '-sat-' . $idx; ?>', true, true, false, '<?php echo $class['title'] . ' >> ' . get_the_title(); ?>', '<?php echo get_the_permalink(); ?>', '<?php echo $class['ages']; ?>', 'sat', '<?php echo $hour['time']; ?>')" onmouseout="hideTipSoon()"><?php echo $hour['time']; ?></a><br /></span>
                                                <?php else: ?>
                                                    <span><?php echo $hour['time']; ?><br /></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div id="form-booking-template" style="display: none;">
                        <?php if(($booking_form = ot_get_option(THEME_PREFIX . '_TZCoursePage_booking_form'))): ?>
                            <div id="form-booking" class="form-booking">
                                <?php echo do_shortcode($booking_form); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(($enroll_form = ot_get_option(THEME_PREFIX . '_TZCoursePage_enroll_form'))): ?>
                            <div id="enroll-booking" class="form-booking">
                                <?php echo do_shortcode($enroll_form); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- Callouts -->
        <div id="tlgi_SharePoint_SubSiteSideBar">
            <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar')): endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php get_footer();?>