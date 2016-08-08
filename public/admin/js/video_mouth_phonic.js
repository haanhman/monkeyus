$(function() {
    $("#jquery_jplayer_1").jPlayer({
        ready: function() {
            $(this).jPlayer("setMedia", {
                title: title,
                mp3: audio
            });
        },
        timeupdate: function(video) {
            //var time = video.jPlayer.status.currentTime.toFixed(1);
            var time = video.jPlayer.status.currentTime.toFixed(3);
            $('#jplayer_inspector span').html(time);
        },
        swfPath: "/public/jPlayer",
        solution: "flash, html",
        supplied: "mp3",
        wmode: "window",
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        toggleDuration: true
    });    

   
    $('.phonic_info').delegate('.icon-remove', 'click', function() {
        $(this).parent().fadeOut(800, function() {
            $(this).remove();
        });
    });

    $('.phonic_info .icon-plus').click(function() {
        html = $('#template .add_word').html();
        $('.phonic_info').append(html);
    });
    $('.phonic_info .icon-minus').click(function() {
        html = $('#template .add_space').html();
        $('.phonic_info').append(html);
    });

    $('.phonic_info').delegate('.start, .end', 'keypress', function(e) {
        if (e.which == 8) {
            $(this).val('');
            return false;
        }
        if (e.which == 65 | e.which == 97) {
            var time = parseFloat($('#jplayer_inspector span').html());
            if (time > 0) {
                time = time * 1000;
                $(this).val(time);
            } else {
                return false;
            }
        }
        return false;
    });
});