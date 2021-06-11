<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
    <title><?php if($info['types']==1){echo '车找人';}else{echo '人找车';}?> <?php echo (date('m-d H:i',$info["gotime"])); ?>
        从<?php echo ($info["from"]); ?>到<?php echo ($info["to"]); ?> <?php $settings = get_addon_settings();echo $settings['title'];?></title>
    <link href="/Addons/pinche/View/Public/css/base.css" rel="stylesheet"/>
    <link href="/Addons/pinche/View/Public/css/pinche/base.css" rel="stylesheet"/>
    <link href="/Addons/pinche/View/Public/css/animate.min.css" rel="stylesheet"/>
    <script src="/Addons/pinche/View/Public/js/jquery.js"></script>
    <script src="/Addons/pinche/View/Public/js/base.js"></script>
    <link href="/Addons/pinche/View/Public/css/pinche/detail.css?v=9" rel="stylesheet"/>
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

        body {
            background: url(/Addons/pinche/View/Public/images/bg.jpg) repeat-y;
            background-size: 100% auto;
            padding-bottom: 50px
        }

        .tel {
            padding-top: 10px;
        }

        .tel a {
            background: #e33737;
            color: #fff;
            height: 40px;
            line-height: 40px;
            display: block;
            text-align: center;
            border-radius: 20px
        }

        .over {
            width: 100px;
            height: 70px;
            position: absolute;
            top: 170px;
            right: 50%;
            margin-right: -50px;
            background: url(/Addons/pinche/View/Public/images/over.png) no-repeat;
            background-size: 100% auto;
        }

        .re {
            height: auto;
            overflow: hidden;
            line-height: 1.7em;
            padding: 4px 0
        }

        .admin {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .admin a {
            background: #000;
            color: #fff;
            font-size: 12px;
            padding: 2px 5px;
            margin-left: 5px;
            border-radius: 5px
        }
    </style>

    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
        wx.config({
            debug: false,
            appId: '<?=$config['appId']?>',
            timestamp: <?=$config['timestamp']?>,
                nonceStr: '<?=$config['nonceStr']?>',
                signature: '<?=$config['signature']?>',
                jsApiList: ['checkJsApi', 'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'onMenuShareQZone',
            'getLocation']
        });

        wx.ready(function () {
            wx.onMenuShareTimeline({
                title: '<?php echo ($system_settings['site_name']); ?>-<?php if($info['types']==1){echo '车找人';}else{echo '人找车';}?> <?php echo (date('m-d H:i',$info["gotime"])); ?>(从<?php echo ($info["from"]); ?>到<?php echo ($info["to"]); ?>)', // 分享标题
                link: '<?=$config['url']?>', // 分享链接
                imgUrl: '<?=$addon_config['share_pic']?>'
            });

            wx.onMenuShareAppMessage({
                title: '<?php if($info['types']==1){echo '车找人';}else{echo '人找车';}?> (从<?php echo ($info["from"]); ?>到<?php echo ($info["to"]); ?>)', // 分享标题
                desc: '出发时间<?php echo (date('m-d H:i',$info["gotime"])); ?> <?php if($info['people_count']==0){echo $info['num'].'个人'; }else{ echo $info['people_count'].'个座位'; }?>', // 分享描述
                link: '<?=$config['url']?>', // 分享链接
                imgUrl: '<?=$addon_config['share_pic']?>', // 分享图标
                type: '', // 分享类型,music、video或link，不填默认为link
                dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                success: function () {
                    // 用户确认分享后执行的回调函数
                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                }
            });

        })

        function del() {
            $.confirm('确定删除？', "", function () {
                $.getJSON("/pinche/del?id=520", function (data) {
                    if (data.status) {
                        $.toast("删除成功", "ok");
                        setTimeout(function () {
                            window.location.href = "/pinche/113";
                        }, 1000);
                    }
                    else
                        $.toast("删除失败");
                });
            })
        }
    </script>


</head>
<body id="detail">

<div class="header100">
    <a href="javascript:;" onclick="history.back(-1)" class="a back"><i class="iconfont">&#xe60b;</i></a>
    <div class="txt">详情</div>
</div>

<div class="wrap" id="main">

    <div class="wr">
        <div class="box ">
            <div class="user">
<!--                <img src="<?php echo ($info["UserFace"]); ?>"/>-->
                <img src="/Addons/pinche/View/Public/images/default_user.jpeg">
                <em><?php echo ($info["nickname"]); ?>(<?php echo ($info["contact"]); ?>)
                    <?php
 if($info['Sex']==1){ ?>
                    <i class='iconfont'>&#xe617;</i>
                    <?php
 }else{ ?>
                    <i class="iconfont girl">&#xe616;</i>
                    <?php
 } ?>

                </em>
            </div>
            <div class="row"><span>类型</span>
                <?php
 if($info['types']==1){ echo '车找人'; }else{ echo '人找车'; } ?>
            </div>
            <div class="row"><span>出发</span><?php echo (date('Y-m-d H:i:s',$info["gotime"])); ?></div>
            <div class="row"><span>从</span><?php echo ($info["from"]); ?></div>
            <div class="row"><span>到</span><?php echo ($info["to"]); ?></div>

            <div class="row"><span>费用</span><?php
 if($info['money']==0.00){ echo '面议'; }else{ echo ceil($info['money']); } ?>
            </div>
            <div class="row"><span>
                <?php
 if($info['people_count']==0){ ?>
                座位</span><?php echo $info['num'];?>个
                <?php
 }else{ ?>
                人数</span><?php echo $info['people_count'];?>人
                <?php
 } ?>
            </div>

            <?php
 if(!empty($info['CarType'])){ ?>
            <div class="row"><span>车型</span><?php echo $info['CarType']?></div>
            <?php
 } ?>

            <div class="row"><span>发布</span><?php echo (date('Y-m-d H:i:s',$info["pubtime"])); ?></div>
            <div class="row tel">
                <a href="tel:<?php echo ($info["tel"]); ?>">电话联系(<?php echo ($info["tel"]); ?>)</a>
            </div>

            <div class="<?php
 if($info['gotime'] < time()){ echo 'over'; } ?>"></div>
            <!--    <div class="admin">
                   <a href="javascript:;" onclick="del()">删除</a>
               </div> -->
        </div>
    </div>

</div>
<div class="footer">

</div>

<div id="b-menu" class="animated fadeInUp">
    <a href="<?php echo create_addon_url('index');?>/mpid/<?php echo get_mpid()?>" style="width: 33%"><i class="iconfont">
        &#xe61b;</i>首页</a>
    <!--<a href="<?php echo create_addon_url('index');?>/type/2/mpid/<?php echo get_mpid()?>" style="width: 20%"><i class="iconfont">-->
        <!--&#xe615;</i>乘客</a>-->
    <a href="<?php echo create_addon_url('add');?>/mpid/<?php echo get_mpid()?>" style="width: 34%" class="sel"><i
            class="iconfont">&#xe61a;</i>发布</a>
    <!--<a href="<?php echo create_addon_url('index');?>/type/1/mpid/<?php echo get_mpid()?>" style="width:20%"><i class="iconfont">-->
        <!--&#xe618;</i>车主</a>-->
    <a href="<?php echo create_addon_url('user');?>/mpid/<?php echo get_mpid()?>" style="width: 33%"><i class="iconfont">
        &#xe61d;</i>我的</a>
</div>

</body>
</html>