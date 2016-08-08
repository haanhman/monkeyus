var fileInput = document.getElementById('select-file');
var form = document.getElementById('form-upload');

var listFile = new Array();
var upload_index = 0;
var uploaded = 0;
fileInput.addEventListener('change', function(e) {
    var leng = this.files.length;
    for (i = 0; i < leng; i++) {
        html = '';
        html += '<li id="file_' + (upload_index++) + '">';
        html += '<div class="thumb"><img src="/public/img/loading.gif" /></div>';
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

form.addEventListener('submit', function(evt) {
    // Chan khong cho form tao submit
    evt.preventDefault();
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
    fd.append('file', file);
    fd.append('index', i);
    // xhr dung de goi data bang ajax
    var xhr = new XMLHttpRequest();
    xhr.open('POST', $('#base_url').val() + '/backend/ajax/uploadimage', true);

    xhr.onload = function() {
        if (this.status == 200) {
            json = $.parseJSON(this.response);
            if (json.status == 1) {
                count++;
                $('li#file_' + json.index).find('img').attr('src', json.thumbnail).show();
                $('li#file_' + json.index).find('.option').append(json.option);
                $('li#file_' + json.index).append(json.remove);
                $('li#file_' + json.index).find('.fid').val(json.id);
                $('li#file_' + json.index).find('div.title').html(json.shutterstock_id);
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
        console.log('ok');
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
function next_step() {
    var listId = new Array();
    $('.fid').each(function() {
        if ($(this).val() != '') {
            listId.push($(this).val());
        }
    });

    var lang_id = new Array();
    $('.lang_id').each(function() {
        lang_id.push($(this).val());
    });

    if (listId.length <= 0) {
        alert('Bạn chưa upload ảnh nào');
        return false;
    }
    if ($('#upload_action').val() == 'upload_image_card') {
        window.location = $('#base_url').val() + '/backend/assign/image?img=' + listId.join(',') + '&lang_id=' + lang_id.join(',') + '&card_id=' + $('#card_id').val();
    } else {
        window.location = $('#base_url').val() + '/backend/assign/image?img=' + listId.join(',') + '&lang_id=' + lang_id.join(',');
    }
}

$(".page-content").delegate(".image_type", "click", function() {
    var ck = $(this).attr('checked') == 'checked' ? 1 : 0;
    $.ajax({
        url: $('#base_url').val() + '/backend/ajax/uploadimageinfo?id=' + $(this).attr('img_id') + '&ck=' + ck,
        type: 'GET',
        success: function() {
        }
    });
});