<div class="col-xs-12 blog_detail">
    <?php
    $item = $data['row'];
    ?>
    <div class="items">
        <h1><?php echo $item['title'] ?></h1>
        <?php echo filterContentImage($item['content']) ?>
    </div>
</div>

<div class="comment">
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-comments" data-href="<?php echo $this->current_url ?>" data-width="100%" data-numposts="5"></div>
    <div class="clearfix"></div>
</div>