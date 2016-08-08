<?php
global $base_url;
$base_url = Yii::app()->baseUrl;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login - Admin</title>
        <meta name="description" content="User login page"   />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"   />
        <link href="<?php echo $base_url ?>/public/admin/css/bootstrap.min.css" rel="stylesheet"   />
        <link href="<?php echo $base_url ?>/public/admin/css/style.css" rel="stylesheet"   />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/admin/css/font-awesome.min.css"   />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/admin/css/ace-fonts.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/admin/css/ace.min.css"   />
        <link rel="stylesheet" href="<?php echo $base_url ?>/public/admin/css/ace-rtl.min.css"   />       
        <script src="<?php echo $base_url ?>/public/admin/js/jquery.js"></script>
    </head>

    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">

                            <div class="center">
                                <h1>
                                    <i class="icon-archive green"></i>
                                    <span class="red">Login</span>
                                    <span class="white"><?php echo Yii::app()->name ?></span>
                                </h1>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger"><i class="icon-lock"></i>Admin Login</h4>                                            
                                            <?php
                                            if (!empty($data['error'])) {
                                                echo '<div class="message error">' . $data['error'] . '</div>';
                                            }
                                            ?>
                                            <form action="" method="post">

                                                <fieldset>                                                    
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">                                                            
                                                            <input type="text" name="email" value="" id="email" placeholder="Email đăng nhập" class="form-control"  />                                                            <i class="icon-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" name="password" value="" id="password" placeholder="Mật khẩu" class="form-control"  />                                                            <i class="icon-lock"></i>
                                                        </span>
                                                    </label>

<!--                                                    <label class="block clearfix text-center">
                                                        <select name="system">
                                                            <option value="card">Card system</option>
                                                            <option value="global">Global system</option>
                                                        </select>
                                                    </label>-->

                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <label class="inline">                                                            
                                                            <input type="checkbox" name="remember" value="1" id="remember" class="ace"  />                                                            <span class="lbl"> Remember Me</span>
                                                        </label>

                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                            <i class="icon-key"></i>
                                                            Login
                                                        </button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>


                                        </div><!-- /widget-main -->

                                        <div class="toolbar clearfix">
                                            <div>
                                                <a href="#" onclick="show_box('forgot-box');
                                                        return false;" class="forgot-password-link">
                                                    <i class="icon-arrow-left"></i>
                                                    I forgot my password
                                                </a>
                                            </div>

                                        </div>
                                    </div><!-- /widget-body -->
                                </div><!-- /login-box -->

                                <div id="forgot-box" class="forgot-box widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header red lighter bigger">
                                                <i class="icon-key"></i>
                                                Retrieve Password
                                            </h4>

                                            <div class="space-6"></div>
                                            <p>
                                                Enter your email and to receive instructions
                                            </p>

                                            <form action="functions/recover_password.php" method="post" parsley-validate>
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="email" class="form-control" placeholder="Email" name="email" parsley-type="email" required  />
                                                            <i class="icon-envelope"></i>
                                                        </span>
                                                    </label>

                                                    <div class="clearfix">
                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
                                                            <i class="icon-lightbulb"></i>
                                                            Send Me!
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div><!-- /widget-main -->

                                        <div class="toolbar center">
                                            <a href="#" onclick="show_box('login-box');
                                                    return false;" class="back-to-login-link">
                                                Back to login
                                                <i class="icon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div><!-- /widget-body -->
                                </div><!-- /forgot-box -->

                                <div id="signup-box" class="signup-box widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header green lighter bigger">
                                                <i class="icon-group blue"></i>
                                                New User Registration
                                            </h4>

                                            <div class="space-6"></div>
                                            <p> Enter your details to begin: </p>

                                            <form>
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="email" class="form-control" placeholder="Email"   />
                                                            <i class="icon-envelope"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" placeholder="Username"   />
                                                            <i class="icon-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" placeholder="Password"   />
                                                            <i class="fa-lock"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" placeholder="Repeat password"   />
                                                            <i class="icon-retweet"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block">
                                                        <input type="checkbox" class="ace"   />
                                                        <span class="lbl">
                                                            I accept the
                                                            <a href="#">User Agreement</a>
                                                        </span>
                                                    </label>

                                                    <div class="space-24"></div>

                                                    <div class="clearfix">
                                                        <button type="reset" class="width-30 pull-left btn btn-sm">
                                                            <i class="icon-refresh"></i>
                                                            Reset
                                                        </button>

                                                        <button type="button" class="width-65 pull-right btn btn-sm btn-success">
                                                            Register
                                                            <i class="icon-arrow-right icon-on-right"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>

                                        <div class="toolbar center">
                                            <a href="#" onclick="show_box('login-box');
                                                    return false;" class="back-to-login-link">
                                                <i class="icon-arrow-left"></i>
                                                Back to login
                                            </a>
                                        </div>
                                    </div><!-- /widget-body -->
                                </div><!-- /signup-box -->
                            </div><!-- /position-relative -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <script type="text/javascript">
            function show_box(id) {
                jQuery('.widget-box.visible').removeClass('visible');
                jQuery('#' + id).addClass('visible');
            }
        </script>
    </body>
</html>