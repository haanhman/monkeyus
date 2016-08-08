<div class="slidebar">
    <div class="download">
        <p class="hd">
            <strong><?php echo $this->t(2, 'download_text', 'blog') ?></strong>
            <?php echo $this->t(2, 'download_desc', 'blog') ?>
        </p>
        <ul>
            <li><a target="_blank" title="<?php echo $this->url_download['ios']['title'] ?>"
                   href="<?php echo $this->url_download['ios']['url'] ?>">
                    <img src="/images/icon_ios.png" style="width: 192px" alt=""/>
                </a></li>
            <li><a target="_blank" title="<?php echo $this->url_download['android']['title'] ?>"
                   href="<?php echo $this->url_download['android']['url'] ?>">
                    <img src="/images/icon_android.png" style="width: 192px" alt=""/>
                </a>
            </li>

            <?php
            if ($this->is_vn == 1) {
                ?>
                <li><a target="_blank" title="Hướng dẫn cài đặt Monkey Junior trên PC, laptop"
                       href="<?php echo $this->createUrl('page/laptop') ?>">
                        <img src="/images/desktop.png" style="width: 192px" alt=""/>
                    </a>
                </li>
                <?php
            } else {
                ?>
                <li><a target="_blank" title="<?php echo $this->url_download['amazon']['title'] ?>"
                       href="<?php echo $this->url_download['amazon']['url'] ?>"><i class="blog blog-icon-amazon"></i></a>
                </li>
                <?php
            }
            ?>


        </ul>
        <div class="clearfix"></div>
        <div class="total-download">
            <em><?php echo $this->t(2, 'total_download', 'blog') ?></em>

            <?php
            $start = isset($_COOKIE['edu_total_download_new']) ? $_COOKIE['edu_total_download_new'] : $this->getCountDown();
            ?>
            <div class="count">
                <?php
                for($i = 0; $i < strlen($start); $i++) {
                    echo '<span>'.$start[$i].'</span>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="slidebar-line"></div>
    <?php
    if (!empty($data['popular'])) {
        ?>
        <div class="popular-post">
            <h3><?php echo $this->t(2, 'popular_title', 'blog') ?></h3>
            <ul>
                <?php
                foreach ($data['popular'] as $item) {
                    ?>
                    <li>
                        <a href="<?php echo $this->createUrl('detail', array('alias' => $item['alias'])) ?>"><?php echo $item['title'] ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="slidebar-line"></div>
        <?php
    }
    ?>

    <div class="block_social">
        <div class="title">
            <h3><?php echo $this->t(2, 'social_title', 'blog') ?></h3>

            <p><?php echo $this->t(2, 'social_desc', 'blog') ?></p>
        </div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div id="fb-root"></div>
        <div class="fb-page" data-width="300" data-href="<?php echo FACEPAGE ?>"
             data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
             data-show-facepile="true" data-show-posts="false">
            <div class="fb-xfbml-parse-ignore"></div>
        </div>
    </div>

</div>