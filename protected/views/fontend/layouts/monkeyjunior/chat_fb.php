<?php
    if($this->is_vn) {
        ?>
<!--        <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",36082]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>-->

        <style type="text/css">
            .hidebox {display: none !important;}
            .closebox {background: #44619D;color: #fff;cursor: pointer;}
            #charbar {
                width: 300px;
                background: green;
                font-weight: bold;
                color: white;
                text-align: center;
                height: 30px;
                line-height: 30px;
                margin-top: 20px;
            }
            #fbchatbox {
                width: 300px;
                height: 300px;
                display: block !important;
            }
            #closefbchat{
                cursor: pointer  !important;
            }
        </style>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=170707936617831";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                var expires = "expires="+ d.toUTCString();
                document.cookie = cname + "=" + cvalue + "; " + expires;
            }

            function getCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for(var i = 0; i <ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length,c.length);
                    }
                }
                return "";
            }

        </script>

        <div class="fbchatbox" style="position:fixed;right:5px;bottom:10px;z-index:9999; display: none;">
            <span id="closefbchat" class="closebox" style="white-space: nowrap;position:absolute;right:2px;bottom:299px;padding: 3px 15px;">
                Tắt Chat
            </span>
            <div class="fb-page" data-href="<?php echo FACEPAGE ?>" data-small-header="true" data-adapt-container-width="false" data-height="300" data-width="300" data-hide-cover="true" data-show-facepile="true" data-show-posts="false" data-tabs="messages"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo FACEPAGE ?>"><a href="<?php echo FACEPAGE ?>">http://www.monkeyjunior.com</a></blockquote></div></div>
        </div>

        <div class="monkey_img" style="position:fixed;right:5px;bottom:10px;z-index:9999">
            <img src="/images/monkey.png" />
        </div>
        <script>
            $(function(){
                htr = getCookie("localStorage");
                console.log("localStorage: " + htr);
                if(htr == '0') {
                    setCookie("localStorage", "0", 1);
                    $('.fbchatbox').hide();
                    $('.monkey_img').show();
                } else {
                    setCookie("localStorage", "1", 1);
                    $('.fbchatbox').show();
                    $('.monkey_img').hide();
                }
                $('.monkey_img').click(function(){
                    setCookie("localStorage", "1", 1);
                    $('.fbchatbox').show();
                    $('.monkey_img').hide();
                });
                $('#closefbchat').click(function(){
                    setCookie("localStorage", "0", 1);
                    $('.fbchatbox').hide();
                    $('.monkey_img').show();
                });

//                if(htr == "0"){
//                    jQuery('.fb-page').toggleClass('hidebox');
//                    jQuery('#closefbchat').removeClass('closebox').html('<img src="/images/monkey.png" />').css({'bottom':0});
//                }



//                $('#closefbchat').click(function(){
//                    setCookie("localStorage", "0", 1);
//                    $('.fb-page').toggleClass('hidebox').removeClass('closebox');
//                    if($('.fb-page').hasClass('hidebox')){
//                        $('#closefbchat').removeClass('closebox').html('<img src="/images/monkey.png" />').css({'bottom':0});
//                    }
//                    else{
//                        setCookie("localStorage", "1", 1);
//                        $('#closefbchat').text('Tắt Chat').css({'bottom':299}).addClass('closebox');
//                    }
//                });
            });

        </script>

        <?php
    } else {
        ?>
        <script type="text/javascript">
            window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
                d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
                $.src="//v2.zopim.com/?3SDQYGcwcIaUEJNkKTNK2qHtXubfbIY9";z.t=+new Date;$.
                    type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
        </script>
        <?php
    }
?>