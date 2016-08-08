var fileInput = document.getElementById('select-file');
var form = document.getElementById('form-upload');

var listFile = new Array();
var upload_index = 0;
var uploaded = 0;
var pattern = /^.*\.(mp3)$/g;
fileInput.addEventListener('change', function(e) {
        
    var leng = this.files.length;
    for (i = 0; i < leng; i++) {
        html = '';
        html += '<li id="file_' + (upload_index++) + '">';
        html += '<div class="thumb"><img src="/public/img/uploading.gif" /></div>';
        html += '<div class="title">' + this.files[i].name + '</div>';
        html += '<input class="fid" type="hidden" readonly="" value="" />';
        html += '<div class="option"></div>';
        html += '</li>';
        listFile.push(this.files[i]);
        $('ul.preview').append(html);
    }
});

var leng = 0;
var count = 0;
var choose_lang = 0;
form.addEventListener('submit', function(evt) {
    // Chan khong cho form tao submit
    evt.preventDefault();
    choose_lang = $('#choose_lang').val();    
    if (choose_lang <= 0) {
        alert('Vui lòng chọn ngôn ngữ');
        return false;
    }
    if (listFile.length <= 0) {
        $('#show_message').show();
        return false;
    } else {
        $('#show_message').hide();
    }

    // Ajax upload
    leng = listFile.length;
    upload_image(uploaded);

});

function upload_image() {
    i = uploaded;
    if (i >= upload_index) {
        console.log('vuot qua mang: ' + uploaded + ' - ' + upload_index);        
        return false;
    }
    $('ul.preview li#file_'+ i +' img').show();
    var file = listFile[i];
    var fd = new FormData();    
    var voice_id = $('#voice_list').val();
    fd.append('file', file);
    fd.append('index', i);
    fd.append('voice_id', voice_id);    
    fd.append('lang_id', choose_lang);
    // xhr dung de goi data bang ajax
    var xhr = new XMLHttpRequest();
    xhr.open('POST', $('#base_url').val() + '/wordmachine/audio/upload', true);

    xhr.onload = function() {
        if (this.status == 200) {
            json = $.parseJSON(this.response);
            if (json.status == 1) {
                count++;
                $('li#file_' + json.index).find('.thumb').html(json.append);
                $('li#file_' + json.index).append(json.remove);
                $('li#file_' + json.index).find('.fid').val(json.id);                
            } else {
                leng--;
                $('li#file_' + json.index).find('.thumb').html(json.message);
                $('li#file_' + json.index).find('div.title').html(json.shutterstock_id);
            }
        }
        upload_image(uploaded);
    };
    xhr.send(fd);
    uploaded++;
}

var next_button_interval = setInterval(function() {
    if (count != 0 && count == leng) {
        $('#next-step').show();
        clearInterval(next_button_interval);
    }
}, 500);

function remove_action(obj) {
    if (!confirm('Bạn chắc chắn muốn xóa?')) {
        return false;
    }
    $remove = $(obj);
    $.ajax({
        type: 'GET',
        url: $remove.attr('href'),
        success: function(data) {
            json = $.parseJSON(data);
            $('li#file_' + json.index).fadeOut(800).remove();
        }
    });
    return false;
}

$(function(){
    $('#choose_lang').change(function(){
        var lid = $(this).val();
        if (lid > 0) {
            $.ajax({
                type: 'GET',
                url: $('#base_url').val() + '/backend/ajax/loadvoice',
                data: {lang_id: lid},
                success: function(data) {
                    $('#voice_list').html(data);
                }
            });
        }
    });
});