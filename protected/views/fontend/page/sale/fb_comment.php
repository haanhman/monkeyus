<div class="clearfix"></div>
<div class="fb_content grid-container-1100">
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

    <div class="fb-like" data-href="<?php echo FACEPAGE ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>

    <div class="fb-comments" data-href="<?php echo $this->createAbsoluteUrl('page/sale') ?>" data-width="100%"
         data-numposts="5"></div>
</div>