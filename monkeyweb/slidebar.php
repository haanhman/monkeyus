<div class="slidebar">
    <div class="download">
        <p class="hd">
            <strong><?php echo $this->t(2, 'download_text', 'blog') ?></strong>
            <?php echo $this->t(2, 'download_desc', 'blog') ?>
        </p>
        <ul>
            <li><a href=""><i class="blog blog-icon-apple"></i></a></li>
            <li><a href=""><i class="blog blog-icon-google"></i></a></li>
            <li><a href=""><i class="blog blog-icon-amazon"></i></a></li>
        </ul>
        <div class="clearfix"></div>
        <div class="total-download">
            <em><?php echo $this->t(2, 'total_download', 'blog') ?></em>
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>6</span>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="slidebar-line"></div>

    <div class="popular-post">
        <h3><?php echo $this->t(2, 'popular_title', 'blog') ?></h3>
        <ul>
            <li><a href="#">How to arrange, delete Apple TV apps</a></li>
            <li><a href="#">How to pair a game controller to the new Apple TV</a></li>
            <li><a href="#">Apple TV will tap Siri to find your favorite music</a></li>
            <li><a href="#">Eric Schmidt: Potential Android and Chrome OS merger rooted in software advancement</a></li>
            <li><a href="#">Look for fireballs in the night sky as Taurid meteor swarm peaks</a></li>
        </ul>
    </div>

    <div class="slidebar-line"></div>

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
        <div class="fb-page" data-width="300" data-href="<?php echo FACEPAGE ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"></div></div>
    </div>

</div>