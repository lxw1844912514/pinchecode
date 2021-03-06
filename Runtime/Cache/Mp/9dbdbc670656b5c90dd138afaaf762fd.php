<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>充值中心</title>
    <link href="/Addons/pinche/View/Public/css/base.css" rel="stylesheet"/>
    <link href="/Addons/pinche/View/Public/css/animate.min.css" rel="stylesheet"/>
    <script src="/Addons/pinche/View/Public/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="//res.wx.qq.com/open/libs/weui/1.1.1/weui.min.css">
    <script src="/Addons/pinche/View/Public/js/jquery.js"></script>

    <?php echo hook('jssdk', false);?>

    <!--<link href="/Addons/pinche/View/Public/js/mobile-select-area.css" rel="stylesheet" type="text/css">-->
    <!--<script src="/Addons/pinche/View/Public/js/dialog.js"></script>-->
    <!--<script src="/Addons/pinche/View/Public/js/mobile-select-area.js"></script>-->
    <!--<script src="/Addons/pinche/View/Public/js/layer/mobile/layer.js"></script>-->
    <!-- <link href="/Addons/pinche/View/Public/css/my/pinche.css?v=1"rel="stylesheet"type="text/css"/> -->
    <style>
        body {
            background: #f8f8f8;
        }

    </style>
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

        .weui-tab__panel span {
            display: none;
        }

        .show {
            display: block !important;
        }

        .select-sex {
            line-height: 20px;
            height: 20px;
            padding-left: 0px;
            font-family: microsoft yahei, 宋体, verdana, arial, helvetica, sans-serif !important;
        }

        /*.weui-cell{
            //margin-right: 40px;
        }*/
    </style>
    <!--<meta name="__hash__" content="8050387f93013aaaef285173dd81cfc2_351bdf8158ff697d854afbd5230e380f"/>-->
</head>
<body>
<div class="header">
    <a class="back iconfont" href="javascript:;history.back(-1)">&#xe60b;</a>
    <div class="tit">
        充值中心
    </div>
</div>

<div class="wrap" id="main">
    <div class="page">
        <div class="page__bd">
            <div class="weui-cells__title">充值中心</div>
            <div class="weui-cells weui-cells_radio">

                <?php
 if(isset($recharge)&&!empty($recharge)) { ?>


                <?php
 foreach($recharge as $k => $v) { ?>

                        <label class="weui-cell weui-check__label" for="x<?=$k;?>">
                            <div class="weui-cell__bd">
                                <p><?=$v;?>元</p>
                            </div>
                            <div class="weui-cell__ft">
                                <?php
 if($k==0) { ?>
                                <input type="radio" class="weui-check" name="money" id="x<?=$k;?>"  checked="checked" value="<?=$v;?>">
                                <?php
 }else{ ?>
                                <input type="radio" class="weui-check" name="money" id="x<?=$k;?>"  value="<?=$v;?>">
                                <?php
 } ?>

                                <span class="weui-icon-checked"></span>
                            </div>
                        </label>



                    <?php
 } ?>


                    <?php
 } else{ ?>

                <label class="weui-cell weui-check__label" for="x1">
                    <div class="weui-cell__bd">
                        <p>5元</p>
                    </div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="money" id="x1" checked="checked" value="5">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check__label" for="x2">
                    <div class="weui-cell__bd">
                        <p>10元</p>
                    </div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="money" id="x2" value="10">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check__label" for="x3">
                    <div class="weui-cell__bd">
                        <p>30元</p>
                    </div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="money" id="x3" value="30">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check__label" for="x4">
                    <div class="weui-cell__bd">
                        <p>100元</p>
                    </div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="money" id="x4" value="100">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>

                <?php
 } ?>

            </div>
            <div class="weui-btn-area">
                <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips"
                   style="color:#f8f8f8;background-color: #ff6a6e;">点击充值</a>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $(function () {
            var $tooltips = $('.js_tooltips');

            $('#showTooltips').on('click', function () {
                if ($tooltips.css('display') != 'none') return;

                // toptips的fixed, 如果有`animation`, `position: fixed`不生效
                $('.page.cell').removeClass('slideIn');

                $tooltips.css('display', 'block');
                setTimeout(function () {
                    $tooltips.css('display', 'none');
                }, 2000);
            });

            $('#showTooltips').click(function () {
                var price = $('input:radio:checked').val();

                var data = {
                    price: parseFloat(price),
                    is_anonymous: 0,
                    content: ''
                };
                pay_ajax(data);


//                window.location.href="/index.php?s=/addon/pinche/mobile/pay/mpid/6/price/"+parseFloat(price)+"/pays/0";


            });

            // $('.weui-check__label').click(function(){
            //     //$("input[name='money']:checked").attr("checked",false);
            //     console.log();
            //     // console.log();
            //     var id = $(this).attr('for');
            //     $('#'+id).attr('checked','checked');
            //    // $(this).find('span').removeClass().addClass('weui-icon-checked:before');
            // });
        });


        function pay_ajax(data) {
            $.ajax({
                url: "<?php echo create_addon_url('recharge_ajax');?>",
                type: 'post',
                dataType: 'json',
                data: data,
                success: function (res) {
                    if (res.errcode == 1) {
                        var price = res.money;
                        var orderid = res.orderid;
                        var notify = res.notify;
                        pay(price, orderid, notify, res, pay_ok);           // 发起支付
                    } else {
                        alert(res.errmsg);
                    }
                },
                error: function () {
                    alert('支付失败');
                }
            });
        }

        function pay_ok(data) {
            if (data.errcode == 1) {
                window.location.href = data.jump_url;
            }
        }

        //        $(document).ready(function () {
        //
        //            function payss()
        //            {
        //                var price = '$_SESSION['top_money']';
        //                var data = {
        //                    price: price,
        //                    is_anonymous: 0,
        //                    content: ''
        //                };
        //                pay_ajax(data);
        //            }
        //            setTimeout(payss,2000);
        //
        //        });


    </script>

</div>
</body>
</html>