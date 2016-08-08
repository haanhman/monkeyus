<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div>
        <?php
        $first = $this->t(6, 'desktop_tab', 'page');
        $this->is_iOS = true;
        if ($this->is_iOS) {
            $first = $this->t(6, 'ios_tab', 'page');
        }
        if ($this->is_Android) {
            $first = $this->t(6, 'android_tab', 'page');
        }

        $platform = isset($_GET['platform']) ? $_GET['platform'] : '';
        if ($platform == 'ios') {
            $first = $this->t(6, 'ios_tab', 'page');
        } elseif ($platform == 'android') {
            $first = $this->t(6, 'android_tab', 'page');
        } elseif ($platform == 'amazon') {
            $first = $this->t(6, 'amazon_tab', 'page');
        } elseif ($platform == 'desktop') {
            $first = $this->t(6, 'desktop_tab', 'page');
        }

        ?>
        <div class="page-thank" style="padding-bottom: 50px; position: relative">
            <div class="list-group platform platform-show">
                <a href="#" class="list-group-item disabled selected">
                    <span class="p-selected"><?php echo $first ?></span> <img src="/monkeyweb/images/mobile/arow.png"
                                                                              alt=""/>
                </a>
            </div>


            <div class="list-group platform platform-hide">
                <a href="#" class="list-group-item disabled">
                    <span class="p-selected"><?php echo $first ?></span> <img src="/monkeyweb/images/mobile/arow.png"
                                                                              alt=""/>
                </a>
                <a href="#" class="list-group-item"><span><?php echo $this->t(6, 'desktop_tab', 'page'); ?></span></a>
                <a href="#" class="list-group-item"><span><?php echo $this->t(6, 'ios_tab', 'page'); ?></span></a>
                <a href="#" class="list-group-item"><span><?php echo $this->t(6, 'android_tab', 'page'); ?></span></a>
                <a href="#" class="list-group-item"><span><?php echo $this->t(6, 'amazon_tab', 'page'); ?></span></a>
                <a href="#" class="list-group-item"><span><?php echo $this->t(6, 'mac_tab', 'page'); ?></span></a>
            </div>


            <div class="col-lg-12 desktop-laptop platform-info">
                <h2 class="text-center"><?php echo $this->t(6, 'desktop_title', 'page'); ?></h2>
                <div class="image">
                    <img class="img-responsive" src="/monkeyweb/images/mobile/desktop.png"/>
                </div>
                <p class="lead"><?php echo $this->t(6, 'desktop_desc', 'page'); ?></p>

                <?php
                $ignore_os = array(
                    'Windows Vista',
                    'Windows XP',
                    'Windows 2000',
                    'Windows 98',
                    'Windows 95',
                    'Windows Server 2003/XP x64',
                    'Mac OS X'
                );
                if (!in_array($data['os'], $ignore_os)) {
                    ?>
                    <p>
                    <div class="download_here"><?php echo $this->t(6, 'download_here', 'page'); ?></div>
                    <a target="_blank" href="<?php echo $this->url_download['laptop']['url'] ?>">
                        <img style="width: 300px" class="img-responsive" src="/monkeyweb/images/mobile/dl.png"/>
                    </a>
                    </p>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Download and install Monkey Junior for Windows Desktop or Laptop that runs on Windows 07 or
                        later.
                    </div>

                    <?php
                }
                ?>


            </div>

            <div class="col-lg-12 mac platform-info">
                <h2 class="text-center"><?php echo $this->t(6, 'mac_title', 'page'); ?></h2>
                <div class="image">
                    <img class="img-responsive" src="/monkeyweb/images/mobile/desktop.png"/>
                </div>
                <p class="lead"><?php echo $this->t(6, 'mac_desc', 'page'); ?></p>

                <?php
                $ignore_os = array(
                    'Mac OS X',
                    'Mac OS 9'
                );
                if (in_array($data['os'], $ignore_os)) {
                    ?>
                    <p>
                    <div class="download_here"><?php echo $this->t(6, 'download_here', 'page'); ?></div>
                    <a target="_blank" href="<?php echo $this->url_download['mac']['url'] ?>">
                        <img style="width: 300px" class="img-responsive" src="/monkeyweb/images/mobile/dl.png"/>
                    </a>
                    </p>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Download and install Monkey Junior for Mac Desktop or Laptop that runs on Mac
                    </div>

                    <?php
                }
                ?>


            </div>

            <div class="col-lg-12 iOS platform-info">
                <h2 class="text-center"><?php echo $this->t(6, 'ios_title', 'page'); ?></h2>
                <div class="image">
                    <img class="img-responsive" src="/monkeyweb/images/mobile/iphone-ipad.png"/>
                </div>
                <p class="lead"><?php echo $this->t(6, 'ios_desc', 'page'); ?></p>
                <p>
                <div class="download_here"><?php echo $this->t(6, 'download_here', 'page'); ?></div>
                <a target="_blank" href="<?php echo $this->url_download['ios']['url'] ?>">
                    <img style="width: 300px" class="img-responsive" src="/monkeyweb/images/mobile/dl.png"/>
                </a>
                </p>
            </div>

            <div class="col-lg-12 Android platform-info">
                <h2 class="text-center"><?php echo $this->t(6, 'android_title', 'page'); ?></h2>
                <div class="image">
                    <img class="img-responsive" src="/monkeyweb/images/mobile/android-amazon.png"/>
                </div>
                <p class="lead"><?php echo $this->t(6, 'android_desc', 'page'); ?></p>
                <p>
                <div class="download_here"><?php echo $this->t(6, 'download_here', 'page'); ?></div>
                <a target="_blank" href="<?php echo $this->url_download['android']['url'] ?>">
                    <img style="width: 300px" class="img-responsive" src="/monkeyweb/images/mobile/dl.png"/>
                </a>
                </p>
            </div>

            <div class="col-lg-12 Amazon platform-info">
                <h2 class="text-center"><?php echo $this->t(6, 'amazon_title', 'page'); ?></h2>
                <div class="image">
                    <img class="img-responsive" src="/monkeyweb/images/mobile/android-amazon.png"/>
                </div>
                <p class="lead"><?php echo $this->t(6, 'amazon_desc', 'page'); ?></p>
                <p>
                <div class="download_here"><?php echo $this->t(6, 'download_here', 'page'); ?></div>
                <a target="_blank" href="<?php echo $this->url_download['amazon']['url'] ?>">
                    <img style="width: 300px" class="img-responsive" src="/monkeyweb/images/mobile/dl.png"/>
                </a>
                </p>
            </div>


        </div>


    </div>
</div>
<style type="text/css">
    .platform-info .download_here {
        padding-bottom: 10px;
    }

    .platform-info p.lead {
        padding-top: 10px;
    }

    div.platform a {
        text-align: center;
        background: #cfcfcf;
        font-weight: bold;
        font-size: 24px;
    }

    .platform-show {
        margin-bottom: 0px;
    }

    .platform-hide {
        display: none;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        z-index: 9999;
    }

    div.platform a.disabled {
        background: #e5e5e5 !important;
    }

    .platform-info {
        display: none;
    }

</style>
<script type="text/javascript">
    $(function () {
        var item_select;
        detectPlatForm();
        $('a.selected').click(function () {
            currentPlatform = $('.p-selected:first').html();
            $('.platform-hide a').each(function (index) {
                if (index > 0) {
                    if ($(this).find('span').html() == currentPlatform) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                }
            });
            $('.platform-hide').slideToggle();
        });
        $('.platform-hide a').click(function () {
            item_select = $(this);
            $('.platform-hide').slideToggle();
            $('#platform_html').html(item_select.find('span').html());
            $('.p-selected').html(item_select.find('span').html());
            $('.platform-info').hide();
            detectPlatForm();
        });
    });
    function detectPlatForm() {
        var currentPlatform = $('.p-selected:first').html();
        if (currentPlatform == '<?php echo $this->t(6, 'desktop_tab', 'page') ?>') {
            currentPlatform = 'desktop-laptop';
        }
        if (currentPlatform == '<?php echo $this->t(6, 'amazon_tab', 'page') ?>') {
            currentPlatform = 'Amazon';
        }
        if (currentPlatform == '<?php echo $this->t(6, 'mac_tab', 'page') ?>') {
            currentPlatform = 'mac';
        }
        $('div.' + currentPlatform).show();
    }
</script>