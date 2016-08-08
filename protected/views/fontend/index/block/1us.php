<a href="<?php echo $this->createUrl('page/download') ?>">
    <img class="img-dl" src="/monkeyweb/images/freedownload.png" alt=""/>
</a>
<ul class="list-dl">
    <li>
        <a href="<?php echo $this->createUrl('page/download') ?>#desktop">
            <i class="dlsprite dlsprite-download-desktop"></i>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('page/download') ?>#ios">
            <i class="dlsprite dlsprite-download-ios"></i>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('page/download') ?>#android">
            <i class="dlsprite dlsprite-download-android"></i>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('page/download') ?>#amazon">
            <i class="dlsprite dlsprite-download-amazon"></i>
        </a>
    </li>
</ul>
<style type="text/css">
    .img-dl {
        display: inline-block !important;
        /*vertical-align: middle;*/
    }

    ul.list-dl {
        display: inline-block !important;
        padding: 30px 25px !important;
    }

    ul.list-dl li {
        display: inline-block !important;
        padding: 0px 6px;
    }
</style>