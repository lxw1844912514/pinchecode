<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
    <title><?php if($info['action']=='update'){echo '修改';}else{echo '发布';}?>拼车信息</title>
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

            var tel = $("#Tel").val();
            err = "";

            if ($("#Contact").val().length == 0)
                err = '请填写用户名';
            else if ($("#password").val().length == 0)
                err = '请填写密码';
            else if (tel.length < 8 || tel.length > 12)
                err = '联系电话必须为8-12字符';
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
                    // result = $.parseJSON(result);

                    // alert(result);

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

</head>

<body id="pub">

<div class="header">
    <a class="back iconfont" href="javascript:;history.back(-1)">&#xe60b;</a>
    <div class="tit">
        用户注册
    </div>
</div>

<div class="wrap" id="main">
    <form action="<?php echo create_addon_url('register');?>" id="form1">
        <div class="form">
            <div class="row rs">
                <div class="label">
                    类型
                </div>
                <div class="con">
                    <ul>
                        <li>
                            <?php
 if(isset($info['types'])){ ?>
                            <input type="radio" class="radio" name="Type" value="2"
                                   data-labelauty="我是车主" <?php if($info['types']==2){echo 'checked';}?>>
                        </li>
                        <li>
                            <input type="radio" class="radio" name="Type" value="1"
                                   data-labelauty="我是乘客" <?php if($info['types']==1){echo 'checked';}?>>
                        </li>
                        <?php
 }else{ ?>
                        <input type="radio" class="radio" name="Type" value="2" data-labelauty="我是车主" checked></li>
                        <li>
                            <input type="radio" class="radio" name="Type" value="1" data-labelauty="我是乘客"></li>
                        <?php
 } ?>

                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="label">
                    用户名
                </div>
                <div class="con">
                    <input name="name" type="text" id="Contact" class="inp"
                           value="<?php if(isset($info['contact'])){echo $info['contact'];}else{ echo $_COOKIE['user_contact']; }?>" autocomplete="off">
                </div>
            </div>

            <div class="row">
                <div class="label"> 密码</div>
                <div class="con">
                    <input name="password" type="password" id="password" class="inp"
                           value="<?php if(isset($info['contact'])){echo $info['contact'];}else{ echo $_COOKIE['user_contact']; }?>" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="label">电话</div>
                <div class="con">
                    <input name="phonenum" type="text" id="Tel" class="inp" value="" autocomplete="off">
                </div>
            </div>

            <div class="row ru">
                <div class="label">
                </div>
                <div class="con">
                    <div class="sw"><input type="checkbox" class="cus_checkbox_1 small" name="IsRule"
                                           checked='checked' id="IsRule"/><label for="IsRule"></label></div>
                    <em>我已阅读并同意 <a href="javascript:;" onclick="rule()">《拼车平台声明》</a></em>
                </div>
            </div>

            <div class="b-row">
                <a href="javascript:;" onclick="sub()" class="red-btn">注册</a>
                <input data-val="true" data-val-number="字段 Id 必须是一个数字。" data-val-required="Id 字段是必需的。" id="Id"
                       name="Id" type="hidden" value=""/>
            </div>
        </div>
    </form>
    <div id="datePlugin"></div>

    <div class="rule">
        <div class="mask"></div>
        <div class="d"><p>
            本拼车平台是一家非经营性网站和公益性信息平台，本身不进行商业运作。旨在为开车人、想拼车上下班，拼车上下学或出门旅游的人提供信息发布和配对平台。我们的宗旨是：减少交通拥堵，提高汽车的利用效率，减少环境污染；让您上下班更加方便省心，出门旅游更加便捷愉快。任何使用本平台的用户将被视为对本声明全部内容的认可；任何使用本平台的用户均应遵守中国的法律，不得侵犯他人的合法权益。在拼车的过程中，无论是开车人还是搭车人，都要注意自身的人身安全。在同意拼车前，各自需要对另一方的情况进行调查，判断。本网站不能对任何人提供任何形式的安全担保，一旦发生侵犯人身安全的事件，本平台不能承担任何责任。</p>
            <p>本平台保留下述权利：随时修改、删除在本平台发布的任何信息；随时停止本网站提供的服务；公安司法部门在对本平台上出现的不良信息进行调查时，向相关部门提供信息发布者的IP地址以及其他信息。</p>
            <p>
                再次提醒您：为保障车主和乘客双方权益，可以要求对方出示相关身份证明，并在启程前双方协商好各项事宜。平台内各项拼车信息均为网友自行发布，网上信息有风险，在实际拼车过程中，请您务必保持警惕！本平台概不负任何责任。</p>

        </div>
        <a href="javascript:;" onclick="rule()"><i class="iconfont">&#xe60a;</i></a>
    </div>

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