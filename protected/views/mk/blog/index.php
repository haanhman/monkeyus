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
                <h1>Danh sách bài viết cho blog</h1>                
            </div>

            <?php echo showMessage(); ?>

            <table class="table table-striped table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th style="width: 3%;">STT</th>
                        <th>Tiêu đề</th>         
                        <th>Popular</th>
                        <th style="width: 100px">Trạng thái </th>                            
                        <th style="width: 100px">Xoá</th>                            
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data['listItem'])) {
                        $i = 1;
                        foreach ($data['listItem'] as $item) {
                            ?>
                            <tr id="<?php echo $item['id'] ?>">
                                <td class="text-center"><?php echo $i++; ?></td>                                
                                <td>
                                    <a href="<?php echo $this->createUrl('edit', array('id' => $item['id'])) ?>"><?php echo $item['title'] ?></a>
                                </td>  
                                <td class="text-center">
                                    <?php
                                    if ($item['is_popular'] == 1) {
                                        echo '<i class="icon-ok bigger-150 green"></i>';
                                    }
                                    ?>
                                </td>
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
        </div>
    </div>
</div>