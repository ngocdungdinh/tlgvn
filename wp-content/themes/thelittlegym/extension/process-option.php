<?php

    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */

    if(!is_admin()):


        add_action('wp_head','portoflio_config_theme');



        function portoflio_config_theme(){

            /*===========================
             * method body font
            ============================*/
            $TZFontType     =   ot_get_option(THEME_PREFIX. '_TZFontType','TzFontSquirrel');       // type font google or defaul
            $TzFontFamiUrl  =   ot_get_option(THEME_PREFIX. '_TzFontFami');                        //  url google font
            $TZUrlFamily    =   ot_get_option(THEME_PREFIX. '_TzFontFaminy');                      //  font family google
            $TzFontSqui     =   ot_get_option(THEME_PREFIX.'_TzFontSquirrel','OpenSansLight');     //  font squireel
            $bodySelecter   =   ot_get_option(THEME_PREFIX. '_TzBodySelecter');                     //  body selecter
            $TzFontDefault  =   ot_get_option(THEME_PREFIX. '_TzFontDefault','Arial');             //  font standard
            $TzbodyFontColor    = ot_get_option(THEME_PREFIX. '_TzBodyColor');                      //*color*
            switch($TZFontType){
                case'Tzgoogle':
                    $Tzfont = $TZUrlFamily;
                    break;
                case'TzFontDefault':
                    $Tzfont = "'".$TzFontDefault."'";
                    break;
                default:
                    $Tzfont = "'".$TzFontSqui."'";
                    break;
            }


            // end method

            /*========================
            * Method header font
            ==========================*/
            $TZFHeadType     =   ot_get_option(THEME_PREFIX. '_TZFontTypeHead','TzFontDefault');                // type font google or defaul
            $TzFHeadUrl      =   ot_get_option(THEME_PREFIX. '_TzFontHeadGoodurl');                             //  url google font
            $TZFheadFamily   =   ot_get_option(THEME_PREFIX. '_TzFontFaminyHead');                              //  font family google
            $TzFHeadSqui     =   ot_get_option(THEME_PREFIX.'_TzFontHeadSquirrel','LaconicBold');               //  font squireel
            $FHeadSelecter   =   ot_get_option(THEME_PREFIX. '_TzHeadSelecter');                                //  body selecter
            $TzFHeadDefault  =   ot_get_option(THEME_PREFIX. '_TzFontHeadDefault','Arial');                     //  font standard
            $TzHeaderFontColor   = ot_get_option(THEME_PREFIX. '_TzHeaderFontColor');                           // color

            switch($TZFHeadType){
                case'Tzgoogle':
                    $TzHeadfont = $TZFheadFamily;
                    break;
                case'TzFontDefault':
                    $TzHeadfont = "'".$TzFHeadDefault."'";
                    break;
                default:
                    $TzHeadfont = "'".$TzFHeadSqui."'";
                    break;

            }


            // end method header font


            /*
            * Method Menu font
           */

            $TZFMenuType     =   ot_get_option(THEME_PREFIX. '_TZFontTypeMenu','TzFontDefault');               // type font google or defaul
            $TzFMenuUrl      =   ot_get_option(THEME_PREFIX. '_TzFontMenuGoodurl');                            //  url google font
            $TZFMenuFamily   =   ot_get_option(THEME_PREFIX. '_TzFontFaminyMenu');                             //  font family google
            $TzFMenuSqui     =   ot_get_option(THEME_PREFIX.'_TzFontMenuSquirrel','LaconicLight');            //  font squireel
            $FMenuSelecter   =   ot_get_option(THEME_PREFIX. '_TzMenuSelecter');                               //  body selecter
            $TzFMenuDefault  =   ot_get_option(THEME_PREFIX. '_TzFontMenuDefault','Arial');                     //  font standard
            $TzMenuFontColor    = ot_get_option(THEME_PREFIX. '_TzMenuFontColor');                              // color
            switch($TZFMenuType){
                case'Tzgoogle':
                    $TzMenufont = $TZFMenuFamily;
                    break;
                case'TzFontDefault':
                    $TzMenufont = "'".$TzFMenuDefault."'";
                    break;
                default:
                    $TzMenufont = "'".$TzFMenuSqui."'";
                    break;

            }
            // end method menu font


            /*
              * Method Custom font
             */
            $TZFCustomType     =   ot_get_option(THEME_PREFIX. '_TZFontTypeCustom','TzFontDefault');               // type font google or defaul
            $TzFCustomUrl      =   ot_get_option(THEME_PREFIX. '_TzFontCustomGoodurl');                            //  url google font
            $TZFCustomFamily   =   ot_get_option(THEME_PREFIX. '_TzFontFaminyCustom');                             //  font family google
            $TzFCustomSqui     =   ot_get_option(THEME_PREFIX.'_TzFontCustomSquirrel','LaconicBold');            //  font squireel
            $FCustomSelecter   =   ot_get_option(THEME_PREFIX. '_TzCustomSelecter');                               //  body selecter
            $TzFCustomDefault  =   ot_get_option(THEME_PREFIX. '_TzFontCustomDefault','Arial');                     //  font standard
            $TzCustomFontColor     = ot_get_option(THEME_PREFIX. '_TzCustomFontColor');                             // color

            switch($TZFCustomType){
                case'Tzgoogle':
                    $TzCustomfont = $TZFCustomFamily;
                    break;
                case'TzFontDefault':
                    $TzCustomfont = "'".$TzFCustomDefault."'";
                    break;
                default:
                    $TzCustomfont = "'".$TzFCustomSqui."'";
                    break;

            }

            // end custom font

            if(isset($TzFontFamiUrl) && $TzFontFamiUrl!=""){ wp_enqueue_style('google-font', $TzFontFamiUrl, false); }

            if(isset($TzFHeadUrl) && $TzFHeadUrl!=""){ wp_enqueue_style('header-font', $TzFHeadUrl, false); }

            if(isset($TzFMenuUrl) && $TzFMenuUrl!=""){ wp_enqueue_style('menu-font', $TzFMenuUrl, false); }

            if(isset($TzFCustomUrl) && $TzFCustomUrl!=""){ wp_enqueue_style('custom-font', $TzFCustomUrl, false); }

            /*====================================
             *  Background
            =====================================*/

            $default_background_type = ot_get_option(THEME_PREFIX . '_background_type');
            $default_color           = ot_get_option(THEME_PREFIX . '_TZBackgroundColor','#ffffff');
            $default_pattern         = ot_get_option(THEME_PREFIX . '_background_pattern');
            $default_single_image    = ot_get_option(THEME_PREFIX . '_background_single_image');
            $background = '';
            switch($default_background_type){
                case 'pattern':
                    $background = 'body#bd {background: url("' . THEME_PATH .'/images/patterns/' . $default_pattern . '") repeat scroll 0 0 transparent !important;}';
                    break;
                case 'single_image':
                    $background = 'body#bd {background: url("' . $default_single_image . '") no-repeat fixed center center / cover transparent !important;}';
                    break;
                case 'none':
                    $background = 'body#bd {background: '.$default_color.' !important;}';
                    break;
                default:
                    $background = 'body#bd {background: '.$default_color.' !important;}';
                    break;
            }


            // logo
            $colorlogo  =   ot_get_option(THEME_PREFIX. '_logoTextcolor');

            ?>
                <style type="text/css">


                        /* body  font style  */
                        <?php if(!empty($bodySelecter) && !empty($bodySelecter)){  echo $bodySelecter ; ?> { font-family:<?php echo $Tzfont; ?> !important; color: <?php echo $TzbodyFontColor; ?> !important ;  }
                        <?php }   ?>

                        /* Head font style  */
                        <?php if(!empty($FHeadSelecter) && !empty($FHeadSelecter)){  echo $FHeadSelecter ; ?> { font-family:<?php echo $TzHeadfont; ?> !important; color: <?php echo $TzHeaderFontColor; ?> !important ;  }
                        <?php }   ?>

                        /* Menu font style*/
                        <?php if(!empty($FMenuSelecter) && !empty($FMenuSelecter)){  echo $FMenuSelecter ; ?> { font-family:<?php echo $TzMenufont; ?> !important ; color: <?php echo $TzMenuFontColor; ?> !important ; }
                        <?php } ?>

                        /* Custom font style */

                        <?php if(!empty($TZFCustomType) && !empty($FCustomSelecter)):  echo $FCustomSelecter ; ?> { font-family:<?php echo $TzCustomfont; ?> !important ; color: <?php echo $TzCustomFontColor; ?> !important ;  }
                        <?php endif; ?>

                        /* color logo */

                        <?php if(isset($colorlogo) && !empty($colorlogo)): echo'.logo h3 a{ color: '.$colorlogo.' }';  endif; ?>

                        /*social color*/
                        .tzsocialfont{
                            color: <?php echo ot_get_option(THEME_PREFIX . '_social_network_color','#a6a6a6'); ?> !important;
                        }

                        /*background*/
                        <?php if($background){ echo $background; } ?>

                </style>

            <?php

            if(ot_get_option( THEME_PREFIX . '_favicon_onoff','no') == 'yes'){

                $plazart_favicon = ot_get_option(THEME_PREFIX . '_favicon');

                if( $plazart_favicon ){

                    echo '<link rel="shortcut icon" href="' . $plazart_favicon . '" type="image/x-icon" />';

                }

            }

        } // end function config theme

    endif // endif check admin

?>