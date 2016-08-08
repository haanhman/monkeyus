<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <a href="<?php echo $this->createUrl('index', array('page' => 'index', 'max' => 10)) ?>">Trang chủ</a>
        </li>
        <li>
            <a href="<?php echo $this->createUrl('index', array('page' => 'about', 'max' => 5)) ?>">About</a>
        </li>
        <li>
            <a href="<?php echo $this->createUrl('index', array('page' => 'faq', 'max' => 1)) ?>">FAQs</a>
        </li>
        <li>
            <a href="<?php echo $this->createUrl('index', array('page' => 'blog', 'max' => 2)) ?>">Blog</a>
        </li>
        <li>
            <a href="<?php echo $this->createUrl('index', array('page' => 'pricing', 'max' => 3)) ?>">Pricing</a>
        </li>
        <li>
            <a href="<?php echo $this->createUrl('index', array('page' => 'page', 'max' => 6)) ?>">Single page</a>
        </li>
        <li>
            <a href="<?php echo $this->createUrl('index', array('page' => 'global', 'max' => 4)) ?>">Khối dùng chung</a>
        </li>
    </ul>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Quản lý nội dung cho site monkeyjunior.com</h1>
            </div>



            <table class="table table-striped table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th>Khối</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>                        
                        <td>
                            <?php
                            $page = isset($_GET['page']) ? trim($_GET['page']) : 'index';
                            $max = isset($_GET['max']) ? intval($_GET['max']) : 1;
                            for ($i = 1; $i <= $max; $i++) {
                                ?>
                                <a class="s" target="_blank" href="<?php echo $this->createUrl('translate', array('action' => $page, 'block' => $i)) ?>">
                                    <img class="scene" src="/monkeyweb/scene/<?php echo $page . '_' . $i ?>.png" />
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
<style type="text/css">
    a.s {
        width: 310px;
        height: 260px;
        border: 1px solid gray;
        border-radius: 5px;
        display: table-cell;
        float: left;
        margin: 10px;
        padding: 5px;
        vertical-align: middle;
    }
    img.scene {
        max-width: 300px;
        max-height: 250px;
        vertical-align: middle;
    }
</style>