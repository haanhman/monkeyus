<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Danh sách liên hệ</h1>
                <p>Total orders: <strong><?php echo $item_count ?></strong></p>
            </div>
            <?php echo showMessage() ?>

            <form action="" method="POST">
                <table
                    class="table table-striped table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th style="width: 2%;">STT</th>
                            <th>Người gửi</th>
                            <th>Thông tin</th>
                            <th>Ngày gửi</th>
                            <th>IP</th>
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
                                        <strong><?php echo $item['name'] ?></strong><br />
                                        <?php echo $item['email'] ?>
                                    </td>
                                    <td>
                                        <strong><?php echo $item['subject'] ?></strong>
                                        <div>
                                            <?php echo nl2br($item['message']) ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y H:i:s', $item['created']) ?>
                                    </td>
                                    <td>
                                        <a target="_blank" href="http://whois.domaintools.com/<?php echo $item['ip'] ?>"><?php echo $item['ip'] ?></a>
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