<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
    <title><?php $settings = get_addon_settings();echo $settings['title'];?></title>
    <link href="/Addons/pinche/View/Public/css/base.css" rel="stylesheet"/>
    <link href="/Addons/pinche/View/Public/css/pinche/base.css" rel="stylesheet"/>
    <link href="/Addons/pinche/View/Public/css/animate.min.css" rel="stylesheet"/>
    <script src="/Addons/pinche/View/Public/js/jquery.js"></script>
    <script src="/Addons/pinche/View/Public/js/base.js"></script>
    <!-- <link href="/Addons/pinche/View/Public/css/my/pinche.css?v=1"rel="stylesheet"type="text/css"/> -->
    <style>
        body{ background: #f8f8f8; }
        .list li { background: #fff; font-size:14px;margin-bottom:8px;border:1px solid #f1f1f1;border:1px 0 1px 0;color:#666}
        .list .h { padding: 5px 10px; border-bottom: 1px solid #f5f5f5;line-height:26px; }
        .list .h a { color:#666}
        /*.list .h em { background: #fe696b; color: #fff; font-size: 12px; padding: 1px 5px; border-radius:3px;display:inline-block;margin-right:5px}*/
        .list .h em { background: #fe696b; color: #fff; font-size: 12px; padding: 1px 5px; border-radius:3px;display:inline-block;margin-right:5px}
        .list li .b { height:30px;padding:6px 10px}
        .list li .b a { height: 26px; line-height: 26px; float: right; margin:1px 0 0 10px; color: #fff;color:#f15353; border:1px solid #f15353;padding:0 10px;border-radius:2px;font-size:12px }
        .list .status span{font-size:12px;border-radius:3px;background:#f6f6f6;line-height:26px;height:26px;display:inline-block;width:60px;text-align:center }
    </style>
    <style>
        /*base.css*/
        @font-face {
            font-family: 'iconfont';
            src: url('/Addons/pinche/View/Public/font/iconfont.eot'); /* IE9*/
            src: url('/Addons/pinche/View/Public/font/iconfont.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('/Addons/pinche/View/Public/font/iconfont.woff?v=5') format('woff'), /* chrome???firefox */ url('/Addons/pinche/View/Public/font/iconfont.ttf?v=5') format('truetype'), /* chrome???firefox???opera???Safari, Android, iOS 4.2+*/ url('/Addons/pinche/View/Public/font/iconfont.svg#iconfont') format('svg'); /* iOS 4.1- */
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
            src: url('/images/sysiconfont/iconfont.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('/images/sysiconfont/iconfont.woff?v=6') format('woff'), /* chrome???firefox */ url('/images/sysiconfont/iconfont.ttf?v=6') format('truetype'), /* chrome???firefox???opera???Safari, Android, iOS 4.2+*/ url('/images/sysiconfont/iconfont.svg#sysiconfont') format('svg'); /* iOS 4.1- */
        }

        .sysiconfont {
            font-family: "sysiconfont" !important;
            font-size: 16px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
        }

        .list .over { width: 80px; height: 50px; position: absolute; bottom: 50px; right: 80px; background: url(/Addons/pinche/View/Public/images/over.png) no-repeat; background-size: 100% auto; }

    </style>
    <style>
        /*base.css*/
        @font-face {
            font-family: 'iconfont';
            src: url('/Addons/pinche/View/Public/font/iconfont.eot'); /* IE9*/
            src: url('/Addons/pinche/View/Public/font/iconfont.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('/Addons/pinche/View/Public/font/iconfont.woff?v=5') format('woff'), /* chrome???firefox */ url('/Addons/pinche/View/Public/font/iconfont.ttf?v=5') format('truetype'), /* chrome???firefox???opera???Safari, Android, iOS 4.2+*/ url('/Addons/pinche/View/Public/font/iconfont.svg#iconfont') format('svg'); /* iOS 4.1- */
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
            src: url('/images/sysiconfont/iconfont.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('/images/sysiconfont/iconfont.woff?v=6') format('woff'), /* chrome???firefox */ url('/images/sysiconfont/iconfont.ttf?v=6') format('truetype'), /* chrome???firefox???opera???Safari, Android, iOS 4.2+*/ url('/images/sysiconfont/iconfont.svg#sysiconfont') format('svg'); /* iOS 4.1- */
        }

        .sysiconfont {
            font-family: "sysiconfont" !important;
            font-size: 16px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
        }

        .list .over { width: 80px; height: 50px; position: absolute; bottom: 50px; right: 80px; background: url(/Addons/pinche/View/Public/images/over.png) no-repeat; background-size: 100% auto; }

    </style>

    <link href="/Addons/pinche/View/Public/css/pinche/index.css?v=9" rel="stylesheet"/>
    <script src="/Addons/pinche/View/Public/js/swipe.js"></script>
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
    </script>

    <script type="text/javascript">
        $(function () {

            $("#focus").css("height", document.body.clientWidth / (3 / 1));
            var focus = new Swipe(document.getElementById('focus'), {
                speed: 400,
                auto: 4000,
                stopPropagation: true,
                continuous: true,
                callback: function (pos) {
                    if (pos > 0)
                        pos = pos % 2;
                    $("#focus-btn li").removeClass('on');
                    $("#focus-btn li").eq(pos).addClass('on');
                }
            });

            wx.ready(function () {
                wx.onMenuShareTimeline({
                    title: '<?=$addon_config['share_title']?>', // ????????????
                    link: '<?=$config['url']?>', // ????????????
                    imgUrl: '<?=$addon_config['share_pic']?>'
                });

                wx.onMenuShareAppMessage({
                            title: '<?=$addon_config['share_title']?>', // ????????????
                            desc: '<?=$addon_config['share_desc']?>', // ????????????
                        imgUrl: '<?=$addon_config['share_pic']?>', // ????????????
                        type: '', // ????????????,music???video???link??????????????????link
                        dataUrl: '', // ??????type???music???video??????????????????????????????????????????
                        success: function () {
                    // ??????????????????????????????????????????
                },
                cancel: function () {
                    // ??????????????????????????????????????????
                }
            });

            })

            $("#list").waterFallList({
                // /pinche/ListData?sid=113&type=0&order=3&from=&to=
                url: "<?php echo create_addon_url('lists');?>/type/<?php echo ($type); ?>/go/<?php echo ($go); ?>/ffrom/<?php echo ($ffrom); ?>/tto/<?php echo ($tto); ?>",
                id: 1,
                pageSize: 8,
                loaded: load_more_html
            });
        })
        function search100() {
            window.location.href = "<?php echo create_addon_url('index');?>/ffrom/" + $("#txtFrom").val() + "/tto/" + $("#txtTo").val();
        }
        function load_more_html(data) {
            // alert(data);
            var s = "";
            if (data.CarType != "")
                s += data.CarType + "&nbsp; ";
            if (data.SeatCount > 0)
                s += data.SeatCount + "?????????";
            if (data.PeopleCount > 0)
                s += data.PeopleCount + "??????";

            if (data.Through != undefined && data.Through != "")
                s += " &nbsp; ?????????" + data.Through;

            $("#list ul").append($("#more_temp1").html().replace("{from}", data.From).replace("{deptime}", data.DepTime).replace("{to}", data.To).replace("{nickname}", data.NickName).replace("{url}", data.Url)
                    .replace("{face}", data.UserFace).replace("{isTop}", data.IsTop).replace("{s}", s).replace("{tel}", data.Tel).replace("{money}", (data.Money > 0 ? data.Money + "???" : "??????")).replace("{remark}", (data.Remark != "" ? '<div class="remark">' + data.Remark + '</div>' : ''))
                    .replace("{type}", (data.Type == 1 ? '<div class="type">??????</div>' : '<div class="type type2">??????</div>'))
                    .replace("{sex}", (data.Sex != 3 ? (data.Sex == 1 ? '<i class="iconfont">&#xe617;</i>' : '<i class="iconfont girl">&#xe616;</i>') : ""))
                    .replace("{istop}", (data.TopIndex > 0 ? "istop" : "")).replace("{isoverdue}", (data.IsOverdue ? "<div class='over'></div>" : ""))
            );
        }

    </script>
    <script type="text/javascript">
        $(function () {
            $("#info .list").defaultsEmpty({ linkTxt: "?????????????????????~~", link: "<?php echo create_addon_url('add');?>/mpid/<?php echo get_mpid()?>" });
        })
        function del(id) {
            $.confirm('???????????????', "", function () {
                $.getJSON("<?php echo create_addon_url('del');?>/id/" + id, function (data) {
                    if (data.status) {
                        window.location.reload();
                    }
                    else
                        $.toast("????????????");
                });
            })
        }

    </script>
</head>
<body id="index">

<div class="header100">
    <a href="#" class="a back"><i class="iconfont">&#xe61b;</i></a>
    <div class="tab">
        <a href="<?php echo create_addon_url('index');?>/type/1" class="<?php echo ($car); ?>"><i class="iconfont">&#xe618;</i>?????????</a>
        <a href="<?php echo create_addon_url('index');?>/type/2" class="<?php echo ($man); ?>"><i class="iconfont">&#xe615;</i>?????????</a>
    </div>

    <a href="<?php echo create_addon_url('add');?>" class="a pub"><i class="iconfont">&#xe61a;</i></a>

</div>

<div class="wrap" id="main">
<?php
$settings = get_addon_settings(); for ($i=1; $i <= 3; $i++) { $key = 'ad'.$i; $key2 = 'ad'.$i.'url'; if(!empty($settings[$key])){ $arr[] = $settings[$key]; $arr2[] = $settings[$key2]; } } if(!empty($settings['ad1'])||!empty($settings['ad2'])||!empty($settings['ad3'])){ ?>

    <div class="swipe focus" id="focus">
        <div class="swipe-wrap">

        <?php
 foreach($arr as $k => $v){ ?>
        <div class="p">
            <a href="<?php echo $arr2[$k];?>">
                <img src="<?php echo $arr[$k];?>">
            </a>
        </div>
        <?php
 } ?>

        </div>
        <div class="swipe-btn swipe-btn3" id="focus-btn">
            <ul>
            <?php
 foreach($arr as $k => $v){ ?>
            <li class="<?php if($k==0){echo 'on';}?>"></li>
            <?php
 } ?>
            </ul>
        </div>
    </div>

<?php
} ?>


    <div class="tools">
        <div class="se">
           <input type="text" id="txtFrom" placeholder="??????" value="" />-<input type="text" id="txtTo" value=""  placeholder="??????" /> <a href="javascript:;" onclick="search100()">??????</a>
        </div>

        <div class="sort">
            <a href="<?php echo create_addon_url('index');?>/go/0" class="<?php echo ($go1); ?>">????????????</a>
            <a href="<?php echo create_addon_url('index');?>/go/2" class="<?php echo ($go2); ?>">????????????</a>
        </div>
    </div>

<!--    <div class="list" id="list">-->
    <div class="wrap" id="main">
    <div class="wrap" id="info">
        <ul class="list">
            <?php
 foreach($lists as $k=>$v){ ?>
            <li>
                <div class="h">
                    <a href="<?php echo create_addon_url('detail');?>/id/<?php echo $v['id'];?>"><em>
                        <?php
 if($v['types']==1){ echo '?????????'; }else{ echo '?????????'; } ?></em>  <?php echo date('Y-m-d H:i:s',$v['gotime'])?> &nbsp;&nbsp; ???<?php echo $v['from'];?>???<?php echo $v['to'];?></a>
                </div>
                <div class="b">
                    <span class="status"><span class='greenFont'><?php echo ($v['gotime']>time())?'??????':'?????????'; ?></span></span>
                    <a href="<?php echo create_addon_url('update');?>/id/<?php echo $v['id'];?>">??????</a>
                    <a onclick="del(<?php echo $v['id'];?>)"  href="javascript:;">??????</a>
                </div>
            </li>
            <?php
 } ?>
        </ul>
    </div>
    </div>

    <!--<a href="<?php echo create_addon_url('config');?>/mpid/<?php echo get_mpid();?>" class="mlink">??????</a>-->

    <input type="hidden" id="page1" value="0"/>
    <input type="hidden" id="pageTop1" value="0"/>
    <script type="text/template" id="more_temp1">
        <li class="a {istop}">
            <a href="{url}">
                <div class="user">
                    <img src="{face}"/>{nickname} {sex}
                    {type}
                </div>
                <div class="y time">?????????{deptime}</div>
                <div class="y from">?????????<em>{from}</em> <i></i><em>{to}</em></div>
                <div class="y re">?????????{s} <em>{money}</em></div>
                {remark}
                <a href="tel:{tel}" class="iconfont tel">&#xe609;</a>
            </a>{isoverdue}
        </li>
    </script>

</div>
<div class="footer">
    &copy;???????????? ??????????????????  ??????
</div>

<div id="b-menu" class="animated fadeInUp">
    <a href="<?php echo create_addon_url('index');?>/mpid/<?php echo get_mpid()?>" style="width: 33%"><i class="iconfont">&#xe61b;</i>??????</a>
    <a href="<?php echo create_addon_url('add');?>/mpid/<?php echo get_mpid()?>" style="width: 34%" class="sel"><i class="iconfont">&#xe61a;</i>??????</a>
    <a href="<?php echo create_addon_url('user');?>/mpid/<?php echo get_mpid()?>" style="width: 33%"><i class="iconfont">&#xe61d;</i>??????</a>
</div>

</body>
</html>