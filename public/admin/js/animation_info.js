var add_load = 0;
var index = 1;
var index_audio = 1;
var lang_id = 0;
$(function() {
    lang_id = $('#lang_id').val();
    $('#add_task').click(function() {
        var task = $('#task').val();
        if (task == 'load') {
            if (add_load == 1) {
                alert('Một animation chỉ add được 1 lần Load!');
                return false;
            }
            add_load = 1;
        }
        $.ajax({
            type: 'GET',
            url: $('#base_url').val() + '/backend/ajax/loadtask',
            data: {task: task, index: index, lang_id: lang_id},
            success: function(data) {
                $('#list_task').append(data);
                search_sentence_autocomplete();
            }
        });
        index++;
    });
    $(".page-content").delegate(".add_audio", "click", function() {
        ix = $(this).attr('index');
        task = $(this).attr('task');
        index_audio++;
        $.ajax({
            type: 'GET',
            url: $('#base_url').val() + '/backend/ajax/loadaudiobox',
            data: {task: task, index: ix, index_audio: index_audio, lang_id: lang_id},
            success: function(data) {
                $('#' + task + '_list_audio_' + ix).append(data);
                search_sentence_autocomplete();
            }
        });
    });
    $(".page-content").delegate(".icon-remove", "click", function() {
        ix = $(this).attr('index');
        task = $(this).attr('task');
        if (task == 'load') {
            add_load = 0;
        }
        $('div#box_' + ix).fadeOut(800, function() {
            $(this).remove();
        });
    });
    if ($('.audio_type').length > 0) {
        $('.audio_type').each(function() {
            var xin = $(this).val();
            var parent = $(this).parents('div.first');
            if (xin == 'file') {
                parent.find('div.file').show();
                parent.find('div.text').hide();
            } else {
                parent.find('div.file').hide();
                parent.find('div.text').show();
            }
        });
    }

    $('.page-content').delegate('.audio_type', 'change', function() {
        var xin = $(this).val();
        var parent = $(this).parents('div.first');
        if (xin == 'file') {
            parent.find('div.file').show();
            parent.find('div.text').hide();
        } else {
            parent.find('div.file').hide();
            parent.find('div.text').show();
        }
    });

    $('.page-content').delegate('.remove-box-audio', 'click', function() {
        $(this).parent().fadeOut(800, function() {
            $(this).remove();
        });
    });
    $('.page-content').delegate('.popup_audio', 'click', function() {
        popup_close = 0;
        var href = $(this).attr('href');
        window.open(href, 'Upload Media', 'width=550,height=700,left=150,top=200,toolbar=0,status=1');
        return false;
    });
    $('.page-content').delegate('.preview_audio', 'click', function() {
        var id = $(this).attr('text_id');
        var task = $(this).attr('task');
        var audio = $('#' + task + 'index_audio_' + id).val();
        if (!audio) {
            alert('Vui lòng chọn audio');
            return;
        }
        //loadhidden_fake_audio_1_1
        //loadindex_audio_1_1
        fake = $('#' + task + 'hidden_fake_audio_' + id).val();
        if (!fake) {
            fake = 0;
        }
        console.log(fake);
        var src = $('#data_url').val() + '/' + (fake == 1 ? 'audio_fake' : 'audio') + '/' + audio;
        $('audio source').attr('src', src);
        document.getElementById('audio').load();
        document.getElementById('audio').play();
        return false;
    });

    search_sentence_autocomplete();

});
function search_sentence_autocomplete() {
    $('.txt_sentence').autocomplete({
        source: $('#base_url').val() + "/backend/ajax/searchsentence?lang_id=" + lang_id,
        minLength: 2
    });
}