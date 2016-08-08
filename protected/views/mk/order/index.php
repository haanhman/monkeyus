<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Danh sách order</h1>
                <p>Total orders: <strong><?php echo $item_count ?></strong></p>
            </div>
            <?php echo showMessage() ?>

            <form action="" method="POST">
                <table
                    class="table table-striped table-bordered table-hover dataTable">
                    <thead>
                    <tr>
                        <th style="width: 2%;">STT</th>
                        <th>Product ID</th>
                        <th>Hình thức thanh toán</th>
                        <th>Thông tin liên hệ</th>
                        <th>IP</th>
                        <th>Thông tin thêm</th>
                        <th>Sync</th>
                        <th>Sync active</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $method = array(
                        1 => 'Thu tiền tại nhà',
                        2 => 'Chuyển khoản ngân hàng',
                        3 => 'Internet banking',
                        4 => 'Visa, Master',
                    );
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
                                    <?php echo $item['product_id'] ?><br/>
                                    <strong>Số lượng: </strong><?php echo $item['total'] ?>
                                    <br/>
                                    <strong>Thành
                                        tiền: </strong><?php echo number_format($item['total_price'], 0, '', ',') ?>
                                    <br/><strong>Tham khảo: </strong><?php echo $item['total_price_2'] ?>
                                    <?php
                                    if (!empty($item['coupon_code'])) {
                                        echo '<br />';
                                        echo '<strong>Coupon: </strong> <span style="color: red">' . $item['coupon_code'] . '</span>';
                                    }
                                    ?>
                                    <br/><a onclick="return confirm('Bạn có chắc muốn xoá?');"
                                            href="<?php echo $this->createUrl('delete', array('id' => $item['id'])) ?>"><i
                                            class="icon-trash red bigger-140"></i></a>
                                </td>
                                <td>
                                    <?php
                                    foreach ($payment_method as $type) {
                                        echo $method[$type] . '<br />';
                                    }
                                    ?>
                                </td>
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
                                </td>
                                <td>
                                    <a target="_blank"
                                       href="http://whois.domaintools.com/<?php echo $item['ip'] ?>"><?php echo $item['ip'] ?></a>
                                    <?php
                                    if ($item['created'] > 0) {
                                        echo '<br />Ngày tạo<br />';
                                        echo date('d/m/Y H:i', $item['created']);
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($item['transaction_done'] == 1) {
                                        echo '<strong>Order OnePay ID: </strong><br />';
                                        echo $item['vpc_MerchTxnRef'] . '<br />';
                                        echo '<strong>Licence code:</strong><br />';
                                        $licence_code = json_decode($item['licence_code'], true);
                                        foreach($licence_code as $ls) {
                                            echo $ls['licence'] . ' - ' . $ls['serial'] . '<br />';
                                        }
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    echo $item['is_import'] == 1 ? 'sync' : 'N/A';
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $item['sync_active'] == 1 ? 'sync' : 'N/A';
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
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="icon-ok bigger-110"></i> Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.fancybox').fancybox();
    });
</script>