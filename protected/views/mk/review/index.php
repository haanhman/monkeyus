<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="icon-plus green home-icon"></i>
            <a href="<?php echo $this->createUrl('add') ?>">Thêm mới</a>
        </li>
    </ul>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Danh sách reviews</h1>                
            </div>

            <?php echo showMessage(); ?>
            <form action="" method="POST">
                <table class="table table-striped table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th style="width: 3%;">STT</th>
                            <th>Tên</th>                            
                            <th>Nội dung</th>
                            <th>Giới tính</th>
                            <th style="width: 100px">Trạng thái </th>                            
                            <th style="width: 100px">Xoá</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $listId = array();
                        if (!empty($data['listItem'])) {
                            $i = 1;
                            foreach ($data['listItem'] as $item) {
                                $listId[] = $item['id'];
                                ?>
                                <tr id="<?php echo $item['id'] ?>">
                                    <td class="text-center"><?php echo $i++; ?></td>                                
                                    <td>
                                        <a href="<?php echo $this->createUrl('edit', array('id' => $item['id'])) ?>"><?php echo $item['name'] ?></a>
                                    </td>  
                                    <td>
                                        <?php echo nl2br($item['content']) ?>
                                    </td>
                                    <td><?php echo $item['gender'] == 1 ? 'Nam' : 'Nữ'; ?></td>
                                    <td>
                                        <?php
                                        if ($item['status'] == 1) {
                                            echo 'Hiển thị';
                                        } else {
                                            echo 'Ẩn';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a onclick="return confirm('Are you sure?');" href="<?php echo $this->createUrl('delete', array('id' => $item['id'])) ?>"><i class="icon-trash icon-2x red"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <input type="hidden" id="listId" name="sort_faq" value="<?php echo implode(',', $listId) ?>" readonly="readonly" />
                <button type="submit" class="btn btn-info" style="margin-top: 10px; padding: 0px 3px;">
                    <i class="icon-ok bigger-110"></i>Cập nhật
                </button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>/public/admin/js/jquery.tablednd.js"></script>
<script type="text/javascript">
    $(function () {
        var listId = new Array;
        $('.dataTable').tableDnD({
            onDrop: function (table, row) {
                listId = new Array;
                var rows = table.tBodies[0].rows;
                for (var i = 1; i <= rows.length; i++) {
                    listId.push($(rows[i - 1]).attr('id'));
                }
                $('#listId').val(listId.join(','));
            }
        });
    });
</script>