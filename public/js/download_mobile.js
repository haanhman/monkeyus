var arrTimer = [3, 5, 7];
$(window).load(function () {

    filmView = parseInt($.cookie('edu_total_download_new'));
    if (filmView == 0 || isNaN(filmView)) {
        filmView = 253704;
        $.ajax({
            type: 'GET',
            url: '/index/countdown',
            success: function (data) {
                var json = $.parseJSON(data);
                filmView = json.count;
                countdown(filmView);
            }
        });
    } else {
        countdown(filmView);
    }
});

function countdown(filmView) {
    var startPlus = filmView;
    if (startPlus > 0) {
        var startPlay = filmView + 1;
        if (startPlay < 0) {
            startPlay = 0;
        }
        $(".countdown").html(numberWithCommas(startPlus));
        setInterval(function () {
            startPlus += Math.floor(Math.random() * 5) + 1;
            $.cookie('edu_total_download_new', startPlus, {expires: 1, path: '/'});
            $(".countdown").html(numberWithCommas(startPlus));
        }, arrTimer[Math.floor(Math.random() * arrTimer.length)] * 1000);
    } else {
        $(".countdown").html(numberWithCommas(filmView));
    }
}

function numberWithCommas(x) {
    var html = '';
    var parts = x + "";
    var arr = parts.split('');
    for (i = 0; i < arr.length; i++) {
        html += '<li>' + arr[i] + '</li>';
    }
    return html;
    //parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    //return parts.join(".");
}