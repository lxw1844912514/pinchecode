<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="blank" />
<meta name="format-detection" content="telephone=no" />
<title><?php echo ($system_settings["site_name"]); ?></title>
<link type="text/css" rel="stylesheet" href="/Public/Common/css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="/Public/Common/css/icon.css?v=20141226" />
<link rel="stylesheet" type="text/css" href="/Public/Common/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" />
<link href="/Public/Admin/css/login.css?v=20141226" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
    <div class="aw-login-box">
        <div class="mod-body clearfix">
            <div class="content pull-left">
                <h1 class="logo"><a href=""></a></h1>
                <h3 style="font-size: 30px;margin-bottom: revert;"><strong><?php echo ($system_settings["site_intro"]); ?></strong></h3>
                <form method="post" action="">
                    <ul>
                        <li>
                            <input type="text" id="username" class="form-control" placeholder="邮箱 / 用户名" name="username">
                        </li>
                        <li>
                            <input type="password" id="password" class="form-control" placeholder="密码" name="password">
                        </li>
                        <li>
                            <div id="float-captcha"></div>
                        </li>
                        <li class="alert alert-danger error_message" style="display:none">
                            <i class="icon icon-delete"></i> <em></em>
                        </li>
                        <li class="last">
                            <button type="submit" class="pull-right btn btn-large btn-primary ajax-post" id="login">登录</button>
                            <!-- <label>
                                <input type="checkbox" value="1" name="net_auto_login">
                                记住我                         </label>
                            <a href="">&nbsp;&nbsp;忘记密码</a> -->
                        </li>
                    </ul>
                </form>
            </div>
            <div class="side-bar pull-left">
                <!-- <h3>第三方账号登录</h3>         
                <a href="" class="btn btn-block btn-qq">
                    <i class="icon icon-qq"></i> QQ 登录
                </a> -->
            </div>
        </div>
        <div class="mod-footer">
            <span>还没有账号?</span>&nbsp;&nbsp;
            <?php if($system_settings['register_on'] == '1'): ?><a href="<?php echo U('register');?>">立即注册</a>&nbsp;&nbsp;•&nbsp;&nbsp;<?php endif; ?>
            <a href="http://bbs.douchat.cc/" target="_blank">寻求帮助</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="/Public/Common/js/jquery.js" ></script>
<script src="http://static.geetest.com/static/tools/gt.js"></script>
<script type="text/javascript">
    var handlerPopup = function(captchaObj) {
        $('#login').click(function() {
            var data = $('form').serialize();
            var url = $('form').attr('action');
            var validate = captchaObj.getValidate();
            if (!validate) {
                $('.error_message em').html('请先拖动滑块完成验证码校验');
                $('.error_message').show().find('.icon-delete').click(function() {
                    $('.error_message').hide();
                });
                return false;
            }
            $.ajax({
                'url' : url,
                'type' : 'post',
                'dataType' : 'json',
                'data' : data,
                success : function(data) {
                    console.log(data);
                    if (data.status == 1) {
                        $('.error_message').html(data.info+'，页面即将自动跳转...').show();
                        setTimeout(function() {
                            window.location.href = data.url;
                        }, 1500);
                    } else {
                        $('.error_message em').html(data.info);
                        $('.error_message').show().find('.icon-delete').click(function() {
                            $('.error_message').hide();
                        });
                    }
                },
                error : function() {
                    console.log('error');
                }
            });
            return false;
        });
        captchaObj.bindOn('#login');
        captchaObj.appendTo('#float-captcha');
    }
    $.ajax({
        url : "<?php echo U('geetest_verify');?>/t/"+(new Date()).getTime(),
        type : 'get',
        dataType : 'json',
        success : function(result) {
            console.log(result);
            initGeetest({
                gt : result.gt,
                challenge : result.challenge,
                product : 'float',
                offline : !result.success
            }, handlerPopup);
        },
        error : function() {
            console.log('error');
        }
    });
</script>
</body>
</html>