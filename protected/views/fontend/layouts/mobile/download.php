<div class="download-app">
    <div class="inner">
        <?php
        $url = $this->url_download['android']['url'];
        $at = 'Google Play';
        if ($this->is_iOS) {
            $at = 'Apple Store';
            $url = $this->url_download['ios']['url'];
        }
        ?>

        <a href="#" class="close-download-app"><img src="/monkeyweb/images/mobile/close.png?t=1" alt=""/></a>

        <div class="app-icon">
        <a target="_blank" href="<?php echo $url ?>"><img
                src="/monkeyweb/images/mobile/icon-app.png?t=1"
                alt="Monkey Junior"/></a>
        </div>

        <p class="lead">
            <strong>Monkey Junior</strong>
            Learn to read for kids
            <br/>
            <img src="/monkeyweb/images/mobile/star.png?t=1" alt="" />
        </p>

        <div class="freedownload">
            <a target="_blank" href="<?php echo $url ?>">
                <img src="/monkeyweb/images/mobile/freedownload.png?t=1" alt="">
            </a>
        </div>


    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
    $(function () {
        $('.close-download-app').click(function () {
            $('.download-app').fadeOut();
        });
//        var max = $('.download-app table').width();
//        $('.download-app .inner').css('width', max);
//        $(window).resize(function () {
//            var max = $('.download-app table').width();
//            $('.download-app .inner').css('width', max);
//        });
    });
</script>
<style type="text/css">
    .close-download-app {
        position: absolute;
        top: 26px;
        left: 6px;
    }
    .app-icon {
        position: absolute;
        top: 8px;
        left: 33px;
    }
    .download-app p {
        color: white;
        position: absolute;
        top: 0px;
        left: 100px;
        font-size: 15px;
    }
    .freedownload {
        position: absolute;
        top: 23px;
        right: 0px;
    }
    .download-app .inner {
        /*margin: 0px auto;*/
        position: relative;
    }
    .download-app td {
        vertical-align: middle;
    }
    .download-app {
        background: #333333;
        color: white;
        padding-top: 5px;
        height: 80px;
        padding: 3px 0px;
    }

    .download-app td {
        padding: 0px 4px;
    }




    .download-app p strong {
        display: block;
        padding-bottom: 5px;
    }
</style>