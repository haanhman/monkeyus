Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};
var $group = new Array();
var group_index = 0;
var group_added = new Array();
var $gallery;
$(function() {
    $gallery = $("#gallery");

    $("li", $gallery).draggable({
        cancel: "a.ui-icon", // clicking an icon won't initiate dragging
        revert: "invalid", // when not dropped, the item will revert back to its initial position
        containment: "document",
        helper: "clone",
        cursor: "move"
    });

    // let the trash be droppable, accepting the gallery items

    $gallery.droppable({
        accept: ".group li",
        activeClass: "custom-state-active",
        drop: function(event, ui) {
            recycleImage(ui.draggable);
        }
    });


    // image recycle function
    var trash_icon = "";
    function recycleImage($item) {
        $item.fadeOut(function() {
            $item.find("a.ui-icon-refresh").remove()
                    .end()
                    .css("width", "96px")
                    .append(trash_icon)
                    .find("img")
                    .css("height", "72px")
                    .end()
                    .appendTo($gallery)
                    .fadeIn();
        });
    }

    // image deletion function
    var recycle_icon = "<a href='#' title='Xóa khỏi card' class='ui-icon ui-icon-refresh'>Recycle image</a>";
    function deleteImage($item, index) {
        $item.fadeOut(function() {
            var $list = $("ul", $group[index]).length ?
                    $("ul", $group[index]) :
                    $("<ul class='gallery ui-helper-reset'/>").appendTo($group[index]);

            $item.find("a.ui-icon-trash").remove();
            $item.append(recycle_icon).appendTo($list).fadeIn(function() {
                $item.animate({width: "96px"}).find("img").animate({height: "72px"});
            });
        });
    }

    // resolve the icons behavior with event delegation
    $("ul.gallery > li").click(function(event) {
        var $item = $(this),
                $target = $(event.target);

        if ($target.is("a.ui-icon-refresh")) {
            recycleImage($item);
            return false;
        }
    });


    $("#list_group").on("click", "span.remove", function() {
        gid = $(this).attr('gid');
        var $delete_group = $('#group_' + gid);
        $delete_group.find('.list_image').val('');
        $delete_group.hide();
        //group_added.remove(gid);
        $delete_group.find('li').each(function() {
            recycleImage($(this));
        });
    });


    $('#add_group').click(function() {
        var card_id = $('#card_id').val();
        if (!card_id) {
            alert('Vui lòng chọn card');
            return false;
        }

        if (group_added.indexOf(card_id) != -1) {
            if ($('#group_' + card_id).length > 0) {
                $('#group_' + card_id).show();
                return false;
            }
            alert('Nhóm đã tồn tại rồi');
            return false;
        }
        var g;
        $.ajax({
            type: 'GET',
            url: $('#base_url').val() + '/backend/ajax/addgroup?type=card&index=' + group_index + '&id=' + card_id,
            success: function(data) {
                $('#list_group').append(data);
                group_added.push(card_id);
                g = $('#group_' + card_id);
                $group.push(g);
                g.droppable({
                    accept: "#gallery > li",
                    activeClass: "ui-state-highlight",
                    drop: function(event, ui) {
                        deleteImage(ui.draggable, g.attr('index'));
                    }
                });
                group_index++;
            }
        });
    });

});

function submit_form() {
    var count = 0;
    $('.group').each(function() {
        if ($(this).is(':visible') == true) {
            var listId = new Array();
            $(this).find('.img_value').each(function() {
                listId.push($(this).val());
            });
            if (listId.length > 0) {
                $(this).find('.list_image').val(listId.join(':'));
                if ($(this).find('.ck:checked').length > 0) {
                    var thumb = $(this).find('.ck:checked:first').val();
                    $(this).find('.thumbnail').val(thumb);
                }
                count++;
            }
        }
    });
    if (count <= 0) {
        alert("Chưa có Card nào, vui lòng nhập card\nHoặc Card chưa được assign ảnh nào");
        return false;
    }
    return true;
}