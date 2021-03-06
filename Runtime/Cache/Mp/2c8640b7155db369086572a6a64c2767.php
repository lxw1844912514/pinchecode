<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
    <title>用户中心 - <?php $settings = get_addon_settings();echo $settings['title'];?></title>
    <link href="/Addons/pinche/View/Public/css/base.css" rel="stylesheet" />
    <link href="/Addons/pinche/View/Public/css/animate.min.css" rel="stylesheet" />
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

         .list .over { width: 80px; height: 50px; position: absolute; bottom: 50px; right: 80px; background: url(/Addons/pinche/View/Public/images/over.png) no-repeat; background-size: 100% auto; }

     </style>
    <script type="text/javascript">
        $(function () {
            $("#info .list").defaultsEmpty({ linkTxt: "去发布拼车信息~~", link: "<?php echo create_addon_url('add');?>/mpid/<?php echo get_mpid()?>" });
        })
        function del(id) {
            $.confirm('确定删除？', "", function () {
                $.getJSON("<?php echo create_addon_url('del');?>/id/" + id, function (data) {
                    if (data.status) {
                        window.location.reload();
                    }
                    else
                        $.toast("删除失败");
                });
            })
        }

    </script>

</head>
<body>
<div class="header">
    <a class="back iconfont" href="javascript:;history.back(-1)">&#xe60b;</a>
    <div class="tit">
        拼车信息
    </div>
</div>

    <div class="wrap" id="main">
        
<div class="wrap" id="info">
    <ul class="list">
        <?php
 foreach($info as $k=>$v){ ?>
            <li>
                <div class="h">
                    <a href="<?php echo create_addon_url('detail');?>/id/<?php echo $info[$k]['id'];?>"><em>
            <?php
 if($info[$k]['types']==1){ echo '车找人'; }else{ echo '人找车'; } ?></em>  <?php echo date('Y-m-d H:i:s',$info[$k]['pubtime'])?> &nbsp;&nbsp; 从<?php echo $info[$k]['from'];?>至<?php echo $info[$k]['to'];?></a>
                </div>
                <div class="b">
                    <span class="status"><span class='greenFont'>正常</span></span>
                    <a href="<?php echo create_addon_url('update');?>/id/<?php echo $info[$k]['id'];?>">编辑</a>
                    <a onclick="del(<?php echo $info[$k]['id'];?>)"  href="javascript:;">删除</a>
                </div>
            </li>
        <?php
 } ?>
    </ul>


<div class="pager"><span class='current'>1</span></div>

</div>
    </div>

</body>
</html>