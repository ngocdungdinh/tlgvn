
/************ Tool Tip Scripts **************/
var IE = document.all?true:false;

// If NS -- that is, !IE -- then set up for mouse capture
if (!IE) document.captureEvents(Event.MOUSEMOVE);

// Set-up to use getMouseXY function onMouseMove
document.onmousemove = getMouseXY;

// Temporary variables to hold mouse x-y pos.s
var tempX = 0;
var tempY = 0;
var selectedClass;

function getSiteName() {
    var s1 = document.location.href.indexOf("/", 8) + 1;
    var s2 = document.location.href.indexOf("/", s1 + 1);
    return document.location.href.substring(s1, s2);
}

// Main function to retrieve mouse x-y pos.s
function getMouseXY(e) {
    if (IE) { // grab the x-y pos.s if browser is IE
        tempX = event.clientX + document.body.scrollLeft
        tempY = event.clientY + document.body.scrollTop
    } else {  // grab the x-y pos.s if browser is NS
        tempX = e.pageX
        tempY = e.pageY
    }  
    // catch possible negative values in NS4
    if (tempX < 0){tempX = 0}
    if (tempY < 0){tempY = 0}
}
var overLink;
var timeoutID;

function findPos(obj) {
    var curleft = curtop = 0;
    if (obj.offsetParent) {
        do {
            curleft += obj.offsetLeft;
            curtop += obj.offsetTop;
        } while (obj = obj.offsetParent);

    } else {
        curleft += obj.offsetLeft;
        curtop += obj.offsetTop;
    }
    return [curleft,curtop];
}

showTip = function(srcElement, srcClassID, enrollEnabled, trialEnabled, isKindermusik, title, link, ages, day, time) {
    selectedClass = srcClassID;

    //Display the available links
    var tt = document.getElementById('tooltip-try');
    var enrollText = document.getElementById("enroll-text");
    var enrollButton = document.getElementById('enroll-link');
    var divider = document.getElementById("divider");
    var trialText = document.getElementById("intro-text");
    var KMtrialText = document.getElementById("KMintro-text");
    var trialButton = document.getElementById('intro-class-link');

    //Reset the default layout
    enrollText.style.display = 'block';
    enrollText.className = '';              //Apply default style only (laid out for both buttons)
    enrollButton.style.display = 'block';
    divider.style.display = 'block';
    trialText.style.display = 'block'; 
    trialText.className = '';
    KMtrialText.style.display = 'block'; 
    KMtrialText.className = '';               //Apply default style only (laid out for both buttons)
    trialButton.style.display = 'block';

    if(!enrollEnabled)
    {
        enrollText.style.display = 'none';
        enrollButton.style.display = 'none';
        divider.style.display = 'none';

        //Update the trialText div to apply its single button layout style
        trialText.className = 'single';
        KMtrialText.className = 'single';
    }

    if(!trialEnabled)
    {
        //Uncomment to hide trial button when trials are not enabled
        trialText.style.display = 'none';
        trialButton.style.display = 'none';
        divider.style.display = 'none';

        //Update the enrollText div to apply its single button layout style
        enrollText.className = 'single';
    }

    if(isKindermusik)
    {            
        trialText.style.display = 'none';
    }
    else
    {
        KMtrialText.style.display = 'none';
    }

    overLink = true;

    var hW = srcElement.offsetWidth;
    var loginOffset = 0;  //For extra Y pixels when welcome/logout control is visible

    if (document.body.clientWidth > 1000) hW = hW - ((document.body.clientWidth - 1000) / 2)
    //if (!IE) hW = hW + 20;
    if (!IE) hW = hW + 0;
    //var hY = srcElement.offsetHeight / 2;
    var mousePos = findPos(srcElement)

    if(IE && false)
      //loginOffset = 22;  In IE, divCopy's offsetTop is 22 greater when the logout control is visible which for some reason makes the popup display too low
    loginOffset = 0;

    //tt.style.left = mousePos[0] - 193 + hW;
    tt.style.left = (mousePos[0] - 220 + hW)+"px";
    //tt.style.top = mousePos[1] - (580) - loginOffset;// - hY;
    tt.style.top = (mousePos[1] - (490) - loginOffset)+"px";// - hY;
    tt.style.display = "block";
    
    document.getElementById('course-booking-name').value = title;
    document.getElementById('course-booking-link').value = link;
    document.getElementById('course-booking-ages').value = ages;
    document.getElementById('course-booking-day').value = day;
    document.getElementById('course-booking-time').value = time;

    //	attach events to tooltip div
    // onmouseover="overLink=true;" onmouseout="overLink=false; hideTip();"
    if (document.attachEvent && !document.addEventListener) {
        tt.attachEvent("onmouseover", function() { overLink = true; });
        tt.attachEvent("onmouseout", function(e) { overLink = false; hideTip(e, tt); });
    } else {
        tt.addEventListener("mouseover", function() { overLink = true; }, false);
        tt.addEventListener("mouseout", function(e) { overLink = false; hideTip(e, tt); }, false);
    }
};

hideTipSoon = function() {
    overLink = false;
    timeoutID = setTimeout(hideTip, 1800);
};

hideTip = function(e, tt) {
    if (timeoutID) {
        clearTimeout(timeoutID);
        timeoutID = null;
    }

    if (!overLink && !withinToolTipBounds(e, tt)) {
        document.getElementById('tooltip-try').style.display = "none";
    }
};

withinToolTipBounds = function(e, tt) {
    //	when closing tooltip automatically, there is no event
    if (!e || !tt) return false;
    var mouseX, mouseY;
    var scrollX, scrollY;
    if (typeof window.scrollY != "undefined") {
        mouseX = e.clientX + window.scrollX;
        mouseY = e.clientY + window.scrollY;
    } else {
        //	left
        if (!document.documentElement.scrollLeft) {
            scrollX = document.body.scrollLeft;
        } else {
            scrollX = document.documentElement.scrollLeft;
        }
        //	top
        if (!document.documentElement.scrollTop) {
            scrollY = document.body.scrollTop;
        } else {
            scrollY = document.documentElement.scrollTop;
        }
        mouseX = e.clientX + scrollX;
        mouseY = e.clientY + scrollY;
    }
    //to accomidate the control being within sharepoint
    if (document.body.clientWidth > 1000) mouseX = mouseX - ((document.body.clientWidth - 1000) / 2)

    if (IE) {
        //mouseX = mouseX - 57;
        mouseX = mouseX - 57; 
    }
    else {
        //mouseX = mouseX - 60;
        mouseX = mouseX - 60;
    }

    //mouseY = mouseY - 414;
    mouseY = mouseY - 318;

    if ( (mouseX > tt.offsetLeft && mouseX < tt.offsetLeft + 180) && (mouseY > tt.offsetTop && mouseY < tt.offsetTop + 162) ) {
        return true;
    }
    return false;
};

initClassGroupButton = function(){
    var singleCourseShortList = jQuery('.single-course-short:not([data-short-name=""]');
    if(singleCourseShortList.length > 0){
        var html = '';
        singleCourseShortList.each(function(idx, obj){
            var classFirstOrLast = '';
            obj = jQuery(obj);
            if(idx == 0){
                classFirstOrLast = 'ui-corner-left';
            } else if(idx == singleCourseShortList.length - 1){
                classFirstOrLast = 'ui-corner-right';
            }
            html += '<label for="'+ obj.attr('id') +'" class="ui-button button-course ui-widget ui-state-default ui-button-text-only ' + classFirstOrLast + '" role="button" aria-disabled="false"><span class="ui-button-text">' + obj.attr('data-short-name') + '</span></label>';
        });
        jQuery('#ClassGroupButtons').html(html);
        initEventClickButton();
    }
}

initEventClickButton = function(){
    jQuery('.button-course').unbind('click').bind('click', function(){
        var self = jQuery(this);
        jQuery('.button-course').removeClass('ui-state-active');
        self.addClass('ui-state-active');
        jQuery('.single-course-short').hide();
        var course = jQuery('#' + self.attr('for'));
        course.show().find('tr').show();
        jQuery('#slider').slider('option', 'values', [Math.floor(parseInt(course.attr('data-age-start')) / 12), Math.ceil(parseInt(course.attr('data-age-end')) / 12)]);
    });
}

initClassesSlider = function(){
    var singleCourseShortList = jQuery('.single-course-short:not([data-short-name=""]');
    if(singleCourseShortList.length > 0){
        var ageMin = -1, ageMax = 0;
        singleCourseShortList.each(function(idx, obj){
            var obj = jQuery(obj);
            var ageStart = parseInt(obj.attr('data-age-start'));
            var ageEnd = parseInt(obj.attr('data-age-end'));
            if(ageStart > ageEnd){
                ageMin = ((ageEnd > ageMin && ageMin == -1) || (ageEnd < ageMin)) ? ageEnd : ageMin;
                ageMax = (ageStart > ageMax) ? ageStart : ageMax;
            }else{
                ageMin = ((ageStart > ageMin && ageMin == -1) || (ageStart < ageMin)) ? ageStart : ageMin;
                ageMax = (ageEnd > ageMax) ? ageEnd : ageMax;
            }
        });
        jQuery('#slider').slider({
            min: Math.floor(ageMin / 12),
            max: Math.ceil(ageMax / 12),
            values: [Math.floor(ageMin / 12), Math.ceil(ageMax / 12)],
            range: true,
            slide: function(event, ui){
                jQuery('.button-course').removeClass('ui-state-active');
                jQuery('.course-class').each(function(idx, obj){
                    var obj = jQuery(obj);
                    var course = obj.closest('div.single-course-short');
                    var ageStart = parseInt(obj.attr('data-age-start')) / 12;
                    var ageEnd = parseInt(obj.attr('data-age-end')) / 12;
                    if(ui.values[0] <= ageStart && ageEnd <= ui.values[1]){
                        course.show();
                        obj.show();
                    }else{
                        obj.hide();
                        if(course.find('tr.course-class').length == course.find('tr.course-class:hidden').length){
                            course.hide(); 
                        }
                    }
                });
            }
        }).each(function() {
            // Add labels to slider whose values 
            // are specified by min, max
            // Get the options for this slider (specified above)
            var opt = jQuery(this).data().uiSlider.options;
            // Get the number of possible values
            var vals = opt.max - opt.min;
            // Position the labels
            for (var i = 0; i <= vals; i++) {
                // Create a new element and position it with percentages
                var el = jQuery('<label>' + (i + opt.min) + '</label>').css('left', (i/vals*100) + '%');
                // Add the element inside #slider
                jQuery("#slider").append(el);
            }
        });
    }
}

jQuery(document).ready(function(){
    jQuery(".inline").colorbox({
        inline: true,
        width: "50%",
        onOpen: function(){
            var self = jQuery(this);

            if(self.attr('data-booking-type') == 'enroll'){
                jQuery('#enroll-course-name').val(jQuery('#course-booking-name').val());
                jQuery('#enroll-course-url').val(jQuery('#course-booking-link').val());
                jQuery('#enroll-course-ages').val(jQuery('#course-booking-ages').val());
                jQuery('#enroll-course-day').val(jQuery('#course-booking-day').val());
                jQuery('#enroll-course-time').val(jQuery('#course-booking-time').val());
                jQuery('#enroll-course-category').val(jQuery('#course-category').val());
                jQuery('#enroll-subject').val('[THELITTEGYM - Enroll] :: ' + jQuery('#enroll-course-name').val());
            }else{
                jQuery('#intro-course-name').val(jQuery('#course-booking-name').val());
                jQuery('#intro-course-url').val(jQuery('#course-booking-link').val());
                jQuery('#intro-course-ages').val(jQuery('#course-booking-ages').val());
                jQuery('#intro-course-day').val(jQuery('#course-booking-day').val());
                jQuery('#intro-course-time').val(jQuery('#course-booking-time').val());
                jQuery('#intro-course-category').val(jQuery('#course-category').val());
                jQuery('#intro-subject').val('[THELITTEGYM - Intro Class] :: ' + jQuery('#intro-course-name').val());
            }
        },
        onComplete: function(){
            var self = jQuery(this);
            var form = null;
            if(self.attr('data-booking-type') == 'enroll'){
                form = jQuery('#enroll-booking .wpcf7-form');
            }else{
                form = jQuery('#form-booking .wpcf7-form');
            }
            if(form !== null){
                var wpcf7StyleHide = form.find(jQuery('div[style="display: none;"]'));
                form.find(jQuery('div')).removeClass('hide');
                wpcf7StyleHide.css('display', 'none');
                form.find(jQuery('.wpcf7-mail-sent-ok')).hide();
                jQuery.colorbox.resize();
            }
        },
        onClosed: function(){
            jQuery('#course-booking-name').val('');
            jQuery('#course-booking-link').val('');
            jQuery('#course-booking-ages').val('');
            jQuery('#course-booking-day').val('');
            jQuery('#course-booking-time').val('');
        }
    });
    jQuery('.wpcf7-form .wpcf7-response-output').unbind('DOMSubtreeModified').bind("DOMSubtreeModified", function(){
        var self = jQuery(this);
        var form = self.closest('.wpcf7-form')
        var wpcf7StyleHide = form.find('div[style="display: none;"]');

        if (self.hasClass('wpcf7-mail-sent-ok')) {
            form.find('div').addClass('hide');
            self.removeClass('hide').css('margin', '0px');
            wpcf7StyleHide.removeClass('hide').css('display', 'none');
        } else {
            form.find('div').removeClass('hide');
            wpcf7StyleHide.css('display', 'none');
            self.hide();
        }

        setTimeout(function(){ jQuery.colorbox.resize(); }, 100);
    });
    /*jQuery('.wpcf7-form').unbind('DOMSubtreeModified').bind("DOMSubtreeModified",function(){
        var self = jQuery(this);
        var sendMailOk = self.find(jQuery('.wpcf7-mail-sent-ok'));
        if(sendMailOk.length > 0 && self.find(jQuery('.wpcf7-validation-errors')).length == 0){
            var wpcf7StyleHide = self.find(jQuery('div[style="display: none;"]'));

            self.find('div').addClass('hide');
            sendMailOk.removeClass('hide').css('position', 'absolute').css('margin', '0px');
            wpcf7StyleHide.removeClass('hide').css('display', 'none');
        }else{
            var wpcf7StyleHide = self.find(jQuery('div[style="display: none;"]'));
            self.find('div').removeClass('hide');
            wpcf7StyleHide.css('display', 'none');
            self.find('.wpcf7-mail-sent-ok').hide();
        }
        jQuery.colorbox.resize();
    });*/
    initClassGroupButton();
    initClassesSlider();
});