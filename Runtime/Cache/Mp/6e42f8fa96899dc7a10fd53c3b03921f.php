<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>登录 - <?php $settings = get_addon_settings();echo $settings['title'];?></title>
    <link href="/Addons/pinche/View/Public/css/base.css" rel="stylesheet"/>
    <link href="/Addons/pinche/View/Public/css/pinche/base.css?v=3" rel="stylesheet"/>
    <link href="/Addons/pinche/View/Public/css/animate.min.css" rel="stylesheet"/>
    <link href="/Addons/pinche/View/Public/css/pub.css?v=2" rel="stylesheet" type="text/css"/>
    <link href="/Addons/pinche/View/Public/css/pinche/base.css?v=2" rel="stylesheet"/>
    <link href="/Addons/pinche/View/Public/css/date.css?v=1" rel="stylesheet"/>
    <link href="/Addons/pinche/View/Public/css/jquery-labelauty.css" rel="stylesheet"/>

    <script src="/Addons/pinche/View/Public/js/jquery.js"></script>
    <script src="/Addons/pinche/View/Public/js/base.js"></script>
    <script src="/Addons/pinche/View/Public/js/date.js?v=<?=time()?>"></script>
    <script src="/Addons/pinche/View/Public/js/iscroll.js"></script>
    <script src="/Addons/pinche/View/Public/js/jquery-labelauty.js"></script>
    <script type="text/javascript">
        var lock = false;
        $(function () {
            $("#TopIndex").select();
            $("#CarType").select();
            $('#DepTime').date({theme: "datetime"});
            $(".radio").labelauty();
            $("input[name='Type']").change(function () {

                $(".rSeat,.rPeople").hide();
                if ($(this).val() == "1")
                    $(".rSeat").show();
                else
                    $(".rPeople").show();
            })
            $("input[name='Type'][checked]").change();
        })


        function rule() {
            $(".rule").toggle();
        }

        function sub() {
            if (lock)
                return;

            // var tel = $("#Tel").val();
            err = "";

            if ($("#Contact").val().length == 0)
                err = '请填写用户名';
            else if ($("#password").val().length == 0)
                err = '请填写密码';

            if (err != "") {
                $.toast(err, "ok");
                return false;
            }
            lock = true;

            $(".red-btn").attr("onclick", "");

            $.ajax({
                url: $("#form1").attr("action"),
                type: "post",
                data: $("#form1").serialize(),
                success: function (result) {
                    if (result.status) {
                        if (result.error !== '') {
                            $.toast(result.error);
                        }
                        window.location = result.data;
                        // alert(result.data);
                    } else
                        $.toast(result.error);
                    lock = false;
                },
                error: function (result) {
                    $.toast(result);
                    lock = false;
                }
            })
            return false;

        }
    </script>
    <style>
        /*base.css*/
        @font-face {
            font-family: 'iconfont';
            src: url('/Addons/pinche/View/Public/font/iconfont.eot'); /* IE9*/
            src: url('/Addons/pinche/View/Public/font/iconfont.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('/Addons/pinche/View/Public/font/iconfont.woff?v=5') format('woff'), /* chrome、firefox */ url('/Addons/pinche/View/Public/font/iconfont.ttf?v=5') format('truetype'), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/ url('/Addons/pinche/View/Public/font/iconfont.svg#iconfont') format('svg'); /* iOS 4.1- */
        }

        .iconfont {
            font-family: "iconfont" !important;
            font-size: 16px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
        }

        @font-face {
            font-family: 'sysiconfont';
            src: url('/images/sysiconfont/iconfont.eot?v=6'); /* IE9*/
            src: url('/images/sysiconfont/iconfont.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('/images/sysiconfont/iconfont.woff?v=6') format('woff'), /* chrome、firefox */ url('/images/sysiconfont/iconfont.ttf?v=6') format('truetype'), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/ url('/images/sysiconfont/iconfont.svg#sysiconfont') format('svg'); /* iOS 4.1- */
        }

        .sysiconfont {
            font-family: "sysiconfont" !important;
            font-size: 16px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
        }

        .list .over {
            width: 80px;
            height: 50px;
            position: absolute;
            bottom: 50px;
            right: 80px;
            background: url(/Addons/pinche/View/Public/images/over.png) no-repeat;
            background-size: 100% auto;
        }

    </style>
    <style>
        body {
            background: #f8f8f8;
        }

        .list li {
            background: #fff;
            font-size: 14px;
            margin-bottom: 8px;
            border: 1px solid #f1f1f1;
            border: 1px 0 1px 0;
            color: #666
        }

        .list .h {
            padding: 5px 10px;
            border-bottom: 1px solid #f5f5f5;
            line-height: 26px;
        }

        .list .h a {
            color: #666
        }

        /*.list .h em { background: #fe696b; color: #fff; font-size: 12px; padding: 1px 5px; border-radius:3px;display:inline-block;margin-right:5px}*/
        .list .h em {
            background: #fe696b;
            color: #fff;
            font-size: 12px;
            padding: 1px 5px;
            border-radius: 3px;
            display: inline-block;
            margin-right: 5px
        }

        .list li .b {
            height: 30px;
            padding: 6px 10px
        }

        .list li .b a {
            height: 26px;
            line-height: 26px;
            float: right;
            margin: 1px 0 0 10px;
            color: #fff;
            color: #f15353;
            border: 1px solid #f15353;
            padding: 0 10px;
            border-radius: 2px;
            font-size: 12px
        }

        .list .status span {
            font-size: 12px;
            border-radius: 3px;
            background: #f6f6f6;
            line-height: 26px;
            height: 26px;
            display: inline-block;
            width: 60px;
            text-align: center
        }
    </style>
</head>

<body id="pub">

<div class="header">
    <a class="back iconfont" href="javascript:;history.back(-1)">&#xe60b;</a>
    <div class="tit">
        登录
    </div>
</div>

<div class="wrap" id="main">
    <form action="<?php echo create_addon_url('login');?>" id="form1">

        <div class="form">
            <div class="row" style="margin-top: 20px;">
                <div class="label">
                    用户名
                </div>
                <div class="con">
                    <input name="name" type="text" id="Contact" class="inp"
                           value="<?php if(isset($info['to'])){echo $info['to'];}?>" autocomplete="off">
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="label">
                    密码
                </div>
                <div class="con">
                    <input name="password" type="password" id="password" class="inp"
                           value="<?php if(isset($info['to'])){echo $info['to'];}?>" autocomplete="off">
                </div>
            </div>

            <div class="b-row">
                <a href="javascript:;" onclick="sub()" class="red-btn">登录</a>
                <input data-val="true" data-val-number="字段 Id 必须是一个数字。" data-val-required="Id 字段是必需的。" id="Id"
                       name="Id" type="hidden" value=""/>
            </div>
        </div>
    </form>

</div>

<div class="footer">
    @本服务由 迅达拼车平台 提供技术支持
</div>

<div id="b-menu" class="animated fadeInUp">
    <a href="<?php echo create_addon_url('index');?>/mpid/<?php echo get_mpid()?>" style="width: 25%"><i class="iconfont">
        &#xe61b;</i>首页</a>
    <a href="<?php echo create_addon_url('index');?>/type/2/mpid/<?php echo get_mpid()?>" style="width: 25%"><i class="iconfont">
        &#xe615;</i>乘客</a>
    <a href="<?php echo create_addon_url('index');?>/type/1/mpid/<?php echo get_mpid()?>" style="width:25%"><i class="iconfont">
        &#xe618;</i>车主</a>
    <a href="<?php echo create_addon_url('user');?>/mpid/<?php echo get_mpid()?>" style="width: 25%"><i class="iconfont">
        &#xe61d;</i>我的</a>
</div>

</body>
</html>