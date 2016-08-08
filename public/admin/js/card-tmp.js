var index_2 = 1;
var index_1 = 1;
$(function() {
    $('.add_element').click(function() {
        var div = $(this).attr('div');
        if (div == 'real') {
            index = index_1;
            index_1++;
        } else {
            index = index_2;
            index_2++;
        }
        html = '<li index="' + index + '">';
        html += '<div class="red icon-remove-sign bigger-110"></div>';
        html += '<div index="' + index + '" div="' + div + '" class="icon-plus bigger-110"></div>';
        html += '<input placeholder="Copy đường dẫn ảnh vào đây" type="text" value="" name="' + div + '_image[' + index + ']" class="col-sm-12" />';
        html += '<div class="item">';
        html += '<input placeholder="Nhập sentence cho ảnh" type="text" value="" name="' + div + '_sentence[' + index + '][]" class="sentencen col-sm-12" />';
        html += '<span class="icon-remove bigger-110"></span>';
        html += '</div>';
        html += '<div class="item">';
        html += '<label><input type="checkbox" value="" name="' + div + '_download[' + index + ']" /> downloaded</label>';
        html += '<div style="clear: both;"></div>';
        html += '</div>';
        html += '</li>';
        $('#' + div + ' ul').append(html);
        autocomplete_sentence();
    });

    $(".form-horizontal").on("click", "div.icon-plus", function() {
        var div = $(this).attr('div');
        var index = $(this).attr('index');
        html = '<div class="item">';
        html += '<input placeholder="Nhập sentence cho ảnh" type="text" value="" name="' + div + '_sentence[' + index + '][]" class="sentencen col-sm-12" />';
        html += '<span class="icon-remove bigger-110"></span>';
        html += '<div style="clear: both;"></div>';
        html += '</div>';
        $(this).parent().append(html);
        autocomplete_sentence();
    });
    $(".form-horizontal").on("click", "span.icon-remove", function() {
        $(this).parent('div.item').remove();
    });
    $(".form-horizontal").on("click", "div.icon-remove-sign", function() {
        $(this).parent('li').remove();
    });
    autocomplete_sentence();

});
function autocomplete_sentence() {
    $(".sentencen").autocomplete({
        source: $('#base_url').val() + "/backend/ajax/searchsentencetmp",
        minLength: 2,
        select: function(event, ui) {
            //$(this).prev().prev().val(ui.item.id);
        }
    });
}