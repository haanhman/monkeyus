<div class="top-nav">
    <div class="col-xs-8 text-left">
        <a href="<?php echo $this->createUrl('index/index') ?>"><img src="/monkeyweb/mobile/images/logo.png"
                                                                     alt=""/></a>
    </div>
    <div class="col-xs-4 ngonngu text-right">
        <div id="clock" class="time">05:00</div>
    </div>
    <div class="clearfix"></div>
</div>
<script type="text/javascript">
    $(function(){
        var $clock = $('#clock')
            .on('update.countdown', function (event) {
//            var format = '%H:%M:%S';
                var format = '%M:%S';
                if (event.offset.days > 0) {
                    format = '%-d day%!d ' + format;
                }
                if (event.offset.weeks > 0) {
                    format = '%-w week%!w ' + format;
                }
                $(this).html(event.strftime(format));
            })
            .on('finish.countdown', function (event) {
                $(this).html('Hoàn thành');
            });
        selectedDate = new Date().valueOf() + (300 * 1000);
        $clock.countdown(selectedDate.toString());
    });
</script>