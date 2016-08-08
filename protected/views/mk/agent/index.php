<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Danh sách đối tác</h1>
                <p>Total đối tác: <strong><?php echo $item_count ?></strong></p>
            </div>
            <?php echo showMessage() ?>

            <table
                class="table table-striped table-bordered table-hover dataTable">
                <thead>
                <tr>
                    <th style="width: 2%;">STT</th>
                    <th>Thông tin</th>
                    <th>Thông tin thêm</th>
                    <th>Ngày đăng ký</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($data ['listItem'])) {
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
                    if ($page <= 0) {
                        $page = 1;
                    }

                    $i = ($page - 1) * $page_size + 1;
                    foreach ($data ['listItem'] as $item) {
                        $payment_method = explode(',', $item['payment_method']);
                        $payment_method = array_reverse($payment_method);
                        ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>
                                <?php
                                if (!empty($item['name'])) {
                                    echo '<strong>Họ tên: </strong>' . $item['name'] . '<br />';
                                }
                                if (!empty($item['phone'])) {
                                    echo '<strong>Điện thoại: </strong>' . $item['phone'] . '<br />';
                                }
                                if (!empty($item['email'])) {
                                    echo '<strong>Email: </strong>' . $item['email'] . '<br />';
                                }
                                if (!empty($item['address'])) {
                                    echo '<strong>Địa chỉ: </strong>' . $item['address'];
                                }
                                ?>
                                <br/><a onclick="return confirm('Bạn có chắc muốn xoá?');"
                                        href="<?php echo $this->createUrl('delete', array('id' => $item['id'])) ?>"><i
                                        class="icon-trash red bigger-140"></i></a>
                            </td>
                            <td>
                                <?php
                                if (!empty($item['website'])) {
                                    echo '<strong>Website: </strong><a target="_blank" href="' . $item['website'] . '">' . $item['website'] . '</a><br />';
                                }
                                if (!empty($item['facebook'])) {
                                    echo '<strong>Website: </strong><a target="_blank"href="' . $item['facebook'] . '">' . $item['facebook'] . '</a><br />';
                                }
                                if (!empty($item['more_info'])) {
                                    echo '<strong>Thông tin thêm: </strong><br />' . nl2br($item['more_info']) . '<br />';
                                }
                                ?>
                            </td>


                            <td>
                                <?php
                                echo date('d/m/Y H:i', $item['created']);
                                ?>
                            </td>

                        </tr>
                        <?php
                    }
                }
                ?>

                </tbody>
            </table>
            <?php
            if (!empty($data['listItem'])) {
                echo '<div class="dataTables_paginate paging_bootstrap">';
                $this->widget('CLinkPager', array(
                    'header' => '',
                    'pages' => $pages,
                ));
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.fancybox').fancybox();
    });
</script>