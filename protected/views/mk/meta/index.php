<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>quản lý meta tag cho site</h1>
            </div>


            <ul>
                <?php
                foreach ($data['listItem'] as $item) {
                    echo '<li>';
                    echo $item['controller'];
                    echo '<ul>';
                    foreach ($item['actions'] as $ac) {
                        $url = $this->createUrl('add', array('ctl' => $item['controller'], 'act' => $ac));
                        echo '<li><a target="_blank" href="' . $url . '">' . $item['controller'] . '/' . $ac . '</a></li>';
                    }
                    echo '</ul>';
                    echo '</li>';
                }
                ?>
            </ul>


        </div>
    </div>
</div>