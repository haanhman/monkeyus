jQuery(document).ready(function ($) {    
    if($(".video-link").length > 0) {
        $(".video-link").jqueryVideoLightning({
            autoplay: 1,
            backdrop_color: "#000000",
            backdrop_opacity: 0.85,
            glow: 20,
            glow_color: "#000"
        });
    }

    if($('.tooltip').length > 0) {
        $('.tooltip').tooltipster({
            trigger: 'hover'
        });
    }

    if($('.review_slider').length > 0) {
        $('.review_slider').bxSlider({
            slideWidth: 1100,
            slideMargin: 10,
            auto: true,
        });
    }

    if($('.phanthuong_slider').length > 0) {
        $('.phanthuong_slider').bxSlider({
            slideMargin: 10,
            auto: true
        });
    }
    if($('.baochi-list').length > 0) {
        $('.baochi-list').bxSlider({
            mode: 'fade',
            slideMargin: 10,
            auto: true
        });
    }



    //clock
    if($('#clock').length > 0) {
        var $clock = $('#clock')
            .on('update.countdown', function (event) {
//            var format = '%H:%M:%S';
                var format = '%M:%S';
                if (event.offset.days > 0) {
                    format = '%-d day%!d ' + format;
                }
                if (event.offset.weeks > 0) {
                    format = '%-w week%!w ' + format;
                }
                $(this).html(event.strftime(format));
            })
            .on('finish.countdown', function (event) {
                $(this).html('Hoàn thành');
            });
        selectedDate = new Date().valueOf() + (300 * 1000);
        $clock.countdown(selectedDate.toString());
    }


    $('a.bx-pager-link').each(function(){
        $(this).html('&nbsp;');
    });

});

$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});

function OpenInNewTab(url) {
    window.open(url, '_blank');
}