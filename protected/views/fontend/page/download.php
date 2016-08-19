<div class="lightbox blog-book" style="padding-top: 0px">
    <div class="clearfix"></div>
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div style="padding: 50px 0px;">
        <div class="page-thank grid-container-960" style="min-height: 350px">
            <h1><?php echo $this->t(6, 'heading_text', 'page') ?></h1>


            <div id="jssor_1"
                 style="position: relative; margin: 70px 0px 20px 0px; top: 0px; left: 0px; width: 960px; height: 400px;">
                <!-- Loading Screen -->
                <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div
                        style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                    <div
                        style="position:absolute;display:block;background:url('/monkeyweb/slide/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                </div>
                <div data-u="slides"
                     style="cursor: default; position: relative; top: 27px; left: 0px; width: 960px; height: 310px;">
                    <div data-p="192.0" style="display: none;">
                        <div class="slide-data">
                            <div class="inner">
                                <h2><strong><?php echo $this->t(6, 'ios_title', 'page') ?></strong></h2>
                                <p class="desc"><?php echo $this->t(6, 'ios_desc', 'page') ?></p>
                                <p class="download">
                                    <a target="_blank" href="<?php echo $this->url_download['ios']['url'] ?>">
                                        <i class="dlsprite dlsprite-dl-ios"></i>
                                    </a>
                                </p>
                            </div>
                            <div class="image">
                                <img src="/monkeyweb/images/iPhone-iPad.png"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div u="thumb">
                            <i class="dlsprite dlsprite-icon-ios"></i>
                            <br/>
                            <strong><?php echo $this->t(6, 'ios_tab', 'page') ?></strong>
                        </div>
                    </div>
                    <div data-p="192.0" style="display: none;">
                        <div class="slide-data">
                            <div class="inner">
                                <h2><strong><?php echo $this->t(6, 'android_title', 'page') ?></strong></h2>
                                <p class="desc"><?php echo $this->t(6, 'android_desc', 'page') ?></p>
                                <p class="download">
                                    <a target="_blank" href="<?php echo $this->url_download['android']['url'] ?>">
                                        <i class="dlsprite dlsprite-dl-android"></i>
                                    </a>
                                </p>
                            </div>
                            <div class="image">
                                <img src="/monkeyweb/images/android-amazon.png"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div u="thumb">
                            <i class="dlsprite dlsprite-icon-android"></i>
                            <br/>
                            <strong><?php echo $this->t(6, 'android_tab', 'page') ?></strong>
                        </div>
                    </div>
                    <div data-p="192.0" style="display: none;">
                        <div class="slide-data">
                            <div class="inner">
                                <h2><strong><?php echo $this->t(6, 'amazon_title', 'page') ?></strong></h2>
                                <p class="desc"><?php echo $this->t(6, 'amazon_desc', 'page') ?></p>
                                <p class="download">
                                    <a target="_blank" href="<?php echo $this->url_download['amazon']['url'] ?>">
                                        <i class="dlsprite dlsprite-dl-amazon"></i>
                                    </a>
                                </p>
                            </div>
                            <div class="image">
                                <img src="/monkeyweb/images/android-amazon.png"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div u="thumb">
                            <i class="dlsprite dlsprite-icon-amazon"></i>
                            <br/>
                            <strong><?php echo $this->t(6, 'amazon_tab', 'page') ?></strong>
                        </div>
                    </div>
                    <div data-p="192.0" style="display: none;">
                        <div class="slide-data">
                            <div class="inner">
                                <h2><strong><?php echo $this->t(6, 'desktop_title', 'page') ?></strong></h2>
                                <p class="desc"><?php echo $this->t(6, 'desktop_desc', 'page') ?></p>

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
                                    <p class="download">
                                        <a target="_blank" href="<?php echo $this->url_download['laptop']['url'] ?>">
                                            <img src="/monkeyweb/dl/dl-windown.png" alt="" />
                                        </a>
                                    </p>
                                    <?php
                                } else {
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        Download and install Monkey Junior for Windows Desktop or Laptop that runs on Windows 07 or later.
                                    </div>

                                    <?php
                                }
                                ?>



                            </div>
                            <div class="image">
                                <img src="/monkeyweb/images/desktop.png"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div u="thumb">
                            <i class="dlsprite dlsprite-icon-desktop"></i>
                            <br/>
                            <strong><?php echo $this->t(6, 'desktop_tab', 'page') ?></strong>
                        </div>
                    </div>
                    <div data-p="192.0" style="display: none;">
                        <div class="slide-data">
                            <div class="inner">
                                <h2><strong><?php echo $this->t(6, 'mac_title', 'page') ?></strong></h2>
                                <p class="desc"><?php echo $this->t(6, 'mac_desc', 'page') ?></p>
                                <?php
                                $ignore_os = array(
                                    'Mac OS X',
                                    'Mac OS 9'
                                );
                                if (in_array($data['os'], $ignore_os)) {
                                    ?>
                                    <p class="download">
                                        <a target="_blank" href="<?php echo $this->url_download['mac']['url'] ?>">
                                            <img src="/monkeyweb/dl/dl-mac.png" alt="" />
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
                            <div class="image">
                                <img src="/monkeyweb/images/desktop.png"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div u="thumb">
                            <i class="dlsprite dlsprite-icon-mac"></i>
                            <br/>
                            <strong><?php echo $this->t(6, 'mac_tab', 'page') ?></strong>
                        </div>
                    </div>
                </div>
                <!-- Thumbnail Navigator -->
                <div data-u="thumbnavigator" class="jssort14">
                    <!-- Thumbnail Item Skin Begin -->
                    <div data-u="slides" style="cursor: default;">
                        <div data-u="prototype" class="p">
                            <div class="w">
                                <div data-u="thumbnailtemplate" class="c"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail Item Skin End -->
                </div>
                <!-- Arrow Navigator -->
                <span data-u="arrowleft" class="jssora12l" style="top:0px;left:-60px;width:30px;height:46px;"
                      data-autocenter="2"></span>
                <span data-u="arrowright" class="jssora12r" style="top:0px;right:-60px;width:30px;height:46px;"
                      data-autocenter="2"></span>
            </div>


        </div>
    </div>
</div>
<link rel="stylesheet" href="/monkeyweb/slide/style.css"/>
<script type="text/javascript" src="/monkeyweb/slide/js/jssor.slider.mini.js"></script>
<script>
    var hash = window.location.hash.substr(1);
    var platform_index = 0;
    if (hash == "desktop") {
        platform_index = 3;
    } else if (hash == "ios") {
        platform_index = 0;
    } else if (hash == "android") {
        platform_index = 1;
    } else if (hash == "amazon") {
        platform_index = 2;
    } else if (hash == "mac") {
        platform_index = 4;
    }
    jQuery(document).ready(function ($) {

        var jssor_1_options = {
//            $AutoPlay: true,
            $StartIndex: platform_index,
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 5,
                $SpacingX: 1,
                $SpacingY: 1,
                $Align: 0,
                $NoDrag: true
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 960);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>