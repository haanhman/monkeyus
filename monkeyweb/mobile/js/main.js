$(function () {
    if ($('.review_slider').length > 0) {
        $('.review_slider').bxSlider({
            slideMargin: 10,
            auto: true
        });
    }
    if ($('.phanthuong_slider').length > 0) {
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
});

function OpenInNewTab(url) {
    window.open(url, '_blank');
}