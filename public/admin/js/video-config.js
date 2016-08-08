var audio_index = 1;
$(function() {
    var lang_id = $('#lang_id').val();
    $('i.remove_audio').click(function() {
        $parent = $(this).parent();
        $parent.fadeOut('slow', function() {
            $(this).remove();
        });
    });

    $('#add_audio').click(function() {
        audio_index++;
        $.ajax({
            type: 'GET',
            url: $('#base_url').val() + '/backend/ajax/addvideoaudio',
            data: {index: audio_index, lang_id: lang_id},
            success: function(data) {
                $('ul.list_audio').append(data);
                search_sentence_autocomplete();
            }
        });
    });

    $('.page-content').delegate('.popup_audio', 'click', function() {
        popup_close = 0;
        var href = $(this).attr('href');
        window.open(href, 'Upload Media', 'width=550,height=700,left=150,top=200,toolbar=0,status=1');
        return false;
    });


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
    function search_sentence_autocomplete() {
        $('.txt_sentence').autocomplete({
            source: $('#base_url').val() + "/backend/ajax/searchsentence?lang_id=" + lang_id,
            minLength: 2
        });
    }
});