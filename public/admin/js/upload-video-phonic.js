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
        html += '<div class="option"></div>';
        html += '<input class="fid" name="videoid[]" type="hidden" readonly="" value="" />';
        html += '</li>';
        listFile.push(this.files[i]);
        $('ul.preview').append(html);        
        if(upload_index > 100) {
            alert('Vui lòng chọn lại, mỗi lần chỉ upload không quá 30 video');
            $('#submit-upload').attr('disabled', true);
            return;
        }
    }
});
var count = 0;
var leng = 0;
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
    
    upload_video(uploaded);
});

function upload_video(uploaded) {
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
    var image_only = $('#image_only').val();
    xhr.open('POST', '/wordmachine/video/uploadvideo?image_only=' + image_only, true);

    xhr.onload = function() {
        if (this.status == 200) {            
            count++;
            json = $.parseJSON(this.response);
            if (json.status == 1) {
                console.log(json.index);
                $('li#file_' + json.index).find('.thumb img').remove();
                $('li#file_' + json.index).find('.thumb').append(json.append);
                $('li#file_' + json.index).find('.option').append(json.option);
                $('li#file_' + json.index).append(json.remove);
                $('li#file_' + json.index).find('.fid').val(json.id);                                
            } else {
                leng--;
                $('li#file_' + json.index).find('.thumb').html(json.message);
            }
            if (count == leng) {
                $('#next-step').show();
            }
            upload_video(uploaded);
        }
    };
    uploaded++;
    xhr.send(fd);
}

function add_card(index) {
    $('li#file_' + index + ' .autocomplete_card').tagsInput({
        defaultText: 'Nhập tên card vào để assign',
        width: 'auto',
        autocomplete_url: $('#base_url').val() + '/backend/ajax/searchcard'
    });
}

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
    if (listId.length <= 0) {
        alert('Bạn chưa upload video nào');
        return false;
    }
    $('#form-upload').submit();
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