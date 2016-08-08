<?php
$arr = explode(DIRECTORY_SEPARATOR, __FILE__);
$arr2 = explode('.', array_pop($arr));
$block = intval($arr2[0]);
?>
<a name="ykienkhachhang"></a>
<div class="lightbox over" style="padding-top: 0px">
    <div class="light-left">&nbsp;</div>
    <div class="light-right">&nbsp;</div>
    <div class="global">
        <div class="content grid-container-1100">
            <div class="heading">
                <p class="title"><?php echo $this->t($block, 'heading') ?></p>

                <p class="desc"><?php echo $this->t($block, 'desc') ?></p>
            </div>
            <img class="img" src="/monkeyweb/images/new/global.png">

            <ul class="review_slider">
                <?php
                $i = 1;
                $arrAvatar = array(1, 2, 4, 3);
                $index_avatar = 0;
                foreach ($data['review'] as $rows) {
                    echo '<li>';
                    foreach ($rows as $item) {
                        if ($i > 6) {
                            $i = 1;
                        }

                        $gender_icon = '/monkeyweb/images/new/review' . $arrAvatar[$index_avatar] . '.png';
                        if ($index_avatar >= count($arrAvatar)) {
                            $gender_icon = '/monkeyweb/images/new/u' . $i . '.png';
                        }
                        ?>
                        <div class="comment">
                            <div class="ava">
                                <img src="<?php echo $gender_icon ?>" alt="">
                            </div>

                            <p class="ct">
                                "<?php echo nl2br($item['content']) ?>"
                                <br/>
                                <strong><?php echo trim($item['name']) ?></strong>                                
                                <?php                                
                                if (!empty($item['country'])) {
                                    echo '<em> - ' . $item['country'] . '</em>';
                                }
                                if (!empty($item['child_age'])) {
                                    echo '<br /><em>' . $item['child_age'] . '</em>';
                                }
                                ?>
                            </p>

                        </div>
                        <?php
                        $i++;
                        $index_avatar++;
                    }
                    echo '</li>';
                }
                ?>

            </ul>


            <div class="clearfix"></div>

        </div>
    </div>
</div>