<div class="clearfix"></div>
<div class="cp-block2">
    <div class="inner">
        <p class="text-center desc_box">
            <strong class="lead">1. install the app - get 30+ free lessons</strong>
        </p>
        <ul class="store">
            <li class="feature-ios">
                <a target="_blank" title="<?php echo $this->url_download['ios']['title'] ?>" href="<?php echo $this->url_download['ios']['url'] ?>">
                    <img src="/images/coupon/ios.png" alt="<?php echo $this->url_download['ios']['title'] ?>" />
                </a>
            </li>
            <li class="feature-google">
                <a target="_blank" title="<?php echo $this->url_download['android']['title'] ?>" href="<?php echo $this->url_download['android']['url'] ?>">
                    <img src="/images/coupon/android.png" alt="<?php echo $this->url_download['android']['title'] ?>" />
                </a>
            </li>
            <li class="feature-amazon">
                <a target="_blank" title="<?php echo $this->url_download['amazon']['title'] ?>" href="<?php echo $this->url_download['amazon']['url'] ?>">
                    <img src="/images/coupon/amazon.png" alt="<?php echo $this->url_download['amazon']['title'] ?>" />
                </a>
            </li>
        </ul>
        <div class="clearfix"></div>
        <p class="text-center desc_box">
            <strong class="lead">2. purchase our program - sale 40% off</strong>
        </p>
        <div class="clearfix"></div>
        <div class="col-lg-6 text-right">
            <img src="/images/coupon/monkey.png" alt="Monkey Junior" />
        </div>
        <div class="col-lg-4 text-center" style="padding-top: 50px;">
            <p class="lead text-center" style="font-size: 30px;">
                Coupon code:
            </p>
            <p class="coupon-code">
                <strong>
                    <?php echo $data['coupon'] ?>
                    <span>&nbsp;</span>
                </strong>
            </p>
            <p class="lead text-center" style="font-size: 28px;">
                For <strong>40%</strong> off
            </p>
            <?php
            if (!$data['expried']) {
                ?>
                <div class="text-left">
                    <strong>Expire in:</strong>
                    <div class="main-example"> 
                        <div class="countdown-container" id="main-example"></div>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-lg-2"></div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>
<?php
if (!$data['expried']) {
    ?>
    <script src="/images/coupon/lodash.min.js"></script>
    <script type="text/template" id="main-example-template">
        <div class="time <%= label %>">
        <span class="count curr top"><%= curr %></span>
        <span class="count next top"><%= next %></span>
        <span class="count next bottom"><%= next %></span>
        <span class="count curr bottom"><%= curr %></span>
        <span class="label"><%= label.length < 6 ? label : label.substr(0, 3)  %></span>
        </div>
    </script>
    <script type="text/javascript">
        $(window).on('load', function () {
            var labels = ['days', 'hours', 'minutes', 'seconds'],
    //                nextYear = (new Date().getFullYear() + 1) + '/01/01',
                    nextYear = '<?php echo $data['exprie'] ?>',
                    template = _.template($('#main-example-template').html()),
                    currDate = '00:00:00:00:00',
                    nextDate = '00:00:00:00:00',
                    parser = /([0-9]{2})/gi,
                    $example = $('#main-example');
            // Parse countdown string to an object
            function strfobj(str) {
                var parsed = str.match(parser),
                        obj = {};
                labels.forEach(function (label, i) {
                    obj[label] = parsed[i]
                });
                return obj;
            }
            // Return the time components that diffs
            function diff(obj1, obj2) {
                var diff = [];
                labels.forEach(function (key) {
                    if (obj1[key] !== obj2[key]) {
                        diff.push(key);
                    }
                });
                return diff;
            }
            // Build the layout
            var initData = strfobj(currDate);
            labels.forEach(function (label, i) {
                $example.append(template({
                    curr: initData[label],
                    next: initData[label],
                    label: label
                }));
            });
            // Starts the countdown
            $example.countdown(nextYear, function (event) {
                var newDate = event.strftime('%d:%H:%M:%S'),
                        data;
                if (newDate !== nextDate) {
                    currDate = nextDate;
                    nextDate = newDate;
                    // Setup the data
                    data = {
                        'curr': strfobj(currDate),
                        'next': strfobj(nextDate)
                    };
                    // Apply the new values to each node that changed
                    diff(data.curr, data.next).forEach(function (label) {
                        var selector = '.%s'.replace(/%s/, label),
                                $node = $example.find(selector);
                        // Update the node
                        $node.removeClass('flip');
                        $node.find('.curr').text(data.curr[label]);
                        $node.find('.next').text(data.next[label]);
                        // Wait for a repaint to then flip
                        _.delay(function ($node) {
                            $node.addClass('flip');
                        }, 50, $node);
                    });
                }
            });
        });
    </script>
    <?php
}
?>