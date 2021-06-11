<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0">
    <title>用户中心</title>
    <link href="/Addons/pinche/View/Public/css/base.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/Addons/pinche/View/Public/css/ptm.min.css">
    <link rel="stylesheet" type="text/css" href="/Addons/pinche/View/Public/css/skin.min.css">
    <link rel="stylesheet" type="text/css" href="/Addons/pinche/View/Public/css/font-awesome.min.css?v22">
    <!--<meta name="__hash__" content="e3244431f94f484182ee8bdfdbe289f2_96ba9170b2b2f5d50841bdebe2c7e21a" /></head>-->

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

        #yue {
            position: relative;
            float: right;
            margin: -24px 0px;
            font-size: 14px;
            color: #7D7979;
        }
    </style>

    <link href="/Addons/pinche/View/Public/css/pinche/index.css?v=9" rel="stylesheet"/>
    <script src="/Addons/pinche/View/Public/js/swipe.js"></script>
    <!--<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>-->


<body>
<header class="ptm-bar ptm-bar-nav  ptm-fix">
    <a class="ptm-pull-left a back" href="<?php echo create_addon_url('index');?>">
        <!--<span class="ptm-iconfont fa fa-home" style="font-size:22px;"></span>-->
        <!--<a href="#" class="a back">-->
        <i class="iconfont" style="font-size:22px;"></i>
        <!--</a>-->

    </a>


    <div class="ptm-title">用户中心</div>

    <!--<a class="ptm-pull-right a" href="#">-->
    <!--<i class="iconfont icon-cog" style="font-size:22px;">-</i>-->
    <!--<span class="ptm-iconfont  fa fa-user"></span>-->
    <!--</a>-->

</header>
<div class="ptm-content my-header" style="margin-top:40px;">
    <div class="my-info">
        <?php
 if(!empty($user)){?>
        <img src="{$user.headimgurl}">
        <?php
 }else{?>
        <img src="/Addons/pinche/View/Public/images/default_user.jpeg">
        <?php
 } ?>

        <p class="nickname">
        <a href="" style="color:#fff"><?php echo ($user["nickname"]); echo '用户名 : '. session('username_client');?></a>
        </p>
    </div>
</div>

<?php
if(empty(session('user_info_client'))){ ?>
<div class="b-row ptm-content ptm-card" style="margin-top:15px;">
    <a href="<?php echo create_addon_url('login');?>" class="red-btn">去登录</a>
</div>

<div class="b-row ptm-content ptm-card" style="margin-top:15px;">
    <a href="<?php echo create_addon_url('register');?>" class="red-btn">去注册</a>
</div>

<?php
}else{ ?>


<div class="ptm-content ptm-card" style="margin-top:15px;">
    <ul class="ptm-list-view">
        <li class="ptm-list-view-cell">
            <a class="" href="<?php echo create_addon_url('user_push');?>">我发布的</a>
        </li>
        <!--<li class="ptm-list-view-cell">-->
        <!--<a class="ptm-arrow-right" href="javascript:void(0)/about/about.html">我的包车</a>-->
        <!--</li>-->
        <!--<li class="ptm-list-view-cell">-->
        <!--<a class="ptm-arrow-right" href="javascript:void(0)/about/about.html">我的租车</a>-->
        <!--</li>-->
    </ul>
</div>


<!---->

<div class="ptm-content ptm-card">
    <ul class="ptm-list-view" style="">
        <!--<li class="ptm-list-view-cell">-->
        <!--<a class="" href="#">我的资料</a>-->
        <!--</li>-->
        <!--<li class="ptm-list-view-cell">
            <a class="" href="<?php echo create_addon_url('recharge');?>">我的余额</a>
            <span id="yue"><?=$user['money']/100?> 元</span>
        </li>-->
        <li class="ptm-list-view-cell">
            <a class="" href="<?php echo create_addon_url('opinion');?>">投诉与建议</a>
        </li>

    </ul>
</div>

<div class="b-row ptm-content ptm-card" style="margin-top:15px;">
    <a href="<?php echo create_addon_url('login_out');?>" class="red-btn">退出登录</a>
</div>

<?php
 } ?>


<!--<br>-->
</body>
</html>