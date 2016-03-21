if(typeof lightbox_html === 'undenfined'){
    var lightbox_transition = 'elastic';
    var lightbox_speed = 800;
    var lightbox_fadeOut = 300;
    var lightbox_title = false;
    var lightbox_scalePhotos = true;
    var lightbox_scrolling = false;
    var lightbox_opacity = 0.201;
    var lightbox_open = false;
    var lightbox_returnFocus = true;
    var lightbox_trapFocus = true;
    var lightbox_fastIframe = true;
    var lightbox_preloading = true;
    var lightbox_overlayClose = true;
    var lightbox_escKey = false;
    var lightbox_arrowKey = false;
    var lightbox_loop = true;
    var lightbox_closeButton = false;
    var lightbox_previous = "previous";
    var lightbox_next = "next";
    var lightbox_close = "close";
    var lightbox_html = false;
    var lightbox_photo = false;
    var lightbox_width = '';
    var lightbox_height = '';
    var lightbox_innerWidth = 'false';
    var lightbox_innerHeight = 'false';
    var lightbox_initialWidth = '300';
    var lightbox_initialHeight = '100';
    var maxwidth=jQuery(window).width();
    if(maxwidth>768){maxwidth=768;}
    var lightbox_maxWidth = maxwidth;
    var lightbox_maxHeight = 500;
    var lightbox_slideshow = false;
    var lightbox_slideshowSpeed = 2500;
    var lightbox_slideshowAuto = true;
    var lightbox_slideshowStart = "start slideshow";
    var lightbox_slideshowStop = "stop slideshow";
    var lightbox_fixed = true;
    var lightbox_top = false;
    var lightbox_bottom = false;
    var lightbox_left = false;
    var lightbox_right = false;
    var lightbox_reposition = false;
    var lightbox_retinaImage = true;
    var lightbox_retinaUrl = false;
    var lightbox_retinaSuffix = "@2x.$1";
}
jQuery(document).ready(function(){
    jQuery('#search-form').submit(function(){
        jQuery('#q').val(jQuery('#s').val());
    });
});