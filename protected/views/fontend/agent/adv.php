<div class="grid-container-1100">

    <h1 class="text-center">Danh sách banner</h1>
    <ul class="list-unstyled">
        <?php
        for ($i = 8; $i > 0; $i--) {
            ?>
            <li style="padding-bottom: 20px;">
                <img style="display: block; margin: 0px auto" src="/images/banner/<?php echo $i ?>.png" alt="" class="img-responsive"/>
                Copy link:<br/>
                <input class="form-control"
                       value="http://<?php echo $_SERVER['SERVER_NAME'] ?>/images/banner/<?php echo $i ?>.png"/>
            </li>
            <?php
        }
        ?>
    </ul>
</div>