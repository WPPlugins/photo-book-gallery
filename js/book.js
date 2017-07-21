jQuery(document).ready(function($) {
    jQuery('.wcp-loader').hide();
    // console.log(wcpbook);
    $('.flipbook').each(function(index, el) {
        var bid = $(this).attr('id');
        $(this).booklet(window['wcpbook' + bid]);
    });
});
jQuery(window).on("resize", function() {
    jQuery('.flipbook').each(function(index, el) {
        var tbid = jQuery(this).attr('id');
        if (window['wcpbooksettings' + tbid].responsive) {
            jQuery(this).closest('.pb-wrap').find('.wcp-size-image').css({
                'display': 'block',
                'width': '100%'
            });
            var b_width = jQuery(this).closest('.pb-wrap').find('.wcp-size-image').innerWidth();
            var b_height = jQuery(this).closest('.pb-wrap').find('.wcp-size-image').innerHeight();
            var curr_book = jQuery(this);
            setTimeout(function() {
                curr_book.booklet("option", "width", b_width);
                curr_book.booklet("option", "height", b_height / 2);
            }, 1500);
            jQuery(this).closest('.pb-wrap').find('.wcp-size-image').hide();
        };
    });
});
jQuery(window).load(function($) {
    jQuery(window).trigger('resize');
    jQuery('.flipbook').each(function(index, el) {
        var zbid = jQuery(this).attr('id');
        if (window['wcpbooksettings' + zbid].zoomonhover) {
            setTimeout(function() {
                jQuery('#' + zbid).find('img').each(function(index, el) {
                    jQuery(this).closest('div').zoom({
                        magnify: window['wcpbooksettings' + zbid].zoomdepth
                    });
                });
            }, 100);
        };
    });
});