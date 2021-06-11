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
<title><?php echo ($meta_title); ?>-<?php echo ($system_settings['site_name']); ?></title>
<meta name="keywords" content="<?php echo ($settings['site_keywords']); ?>" />
<meta name="description" content="<?php echo ($settings['site_intro']); ?>" />
<script type="text/javascript">
    var upload_path = "<?php echo U('Mp/Material/upload');?>";
    var get_image_list_url = "<?php echo U('Mp/Material/get_image_list');?>";
    var delete_attach_url = "<?php echo U('Mp/Material/delete_attach');?>";
    var _this_ele_name = '';
</script>
<link type="text/css" rel="stylesheet" href="/Public/Common/css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="/Public/Common/css/icon.css" />
<link rel="stylesheet" type="text/css" href="/Public/Common/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="/Public/Admin/css/common.css" />
<script type="text/javascript" src="/Public/Common/js/jquery.js" ></script>
<script type="text/javascript" src="/Public/Common/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/framework.js" ></script>
<script type="text/javascript" src="/Public/Admin/js/global.js" ></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="/Public/Common/js/respond.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/Plugins/webuploader/css/webuploader.css" />
<link rel="stylesheet" type="text/css" href="/Public/Plugins/webuploader/css/style.css" />
<script type="text/javascript" src="/Public/Plugins/webuploader/js/webuploader.js"></script>
<script type="text/javascript" src="/Public/Plugins/webuploader/js/upload.js"></script>
<!-- <script type="text/javascript" src="/Public/Plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/Plugins/ueditor/ueditor.all.min.js"></script> -->
<!-- <script type="text/javascript" src="/Public/Plugins/editormd/js/editormd.min.js"></script>
<link rel="stylesheet" href="/Public/Plugins/editormd/css/editormd.css" /> -->

</head>

<body>
    <div id="modal-wechat-webuploader" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; padding-right: 17px;">
        <div class="modal-dialog" style="width:700px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <ul class="nav nav-pills" role="tablist">
                        <li id="li_upload_perm" data-mode="perm" class="active" role="presentation">
                            <a href="#wechat_upload" aria-controls="wechat_upload" role="tab" data-toggle="tab">上传图片</a>
                        </li>
                        <!-- <li id="li_upload_temp" data-mode="temp" role="presentation">
                            <a href="#wechat_upload" aria-controls="wechat_upload" role="tab" data-toggle="tab">上传临时图片(保留3天)</a>
                        </li> -->
                        <li id="li_history_image" class="" role="presentation">
                            <a href="#wechat_history_image" aria-controls="wechat_history_image" role="tab" data-toggle="tab">浏览图片</a>
                        </li>
                        <!-- <li id="li_history_audio" class="hide" role="presentation">
                            <a href="#wechat_history_audio" aria-controls="wechat_history_audio" role="tab" data-toggle="tab">浏览音频</a>
                        </li>
                        <li id="li_history_video" class="hide" role="presentation"><a href="#wechat_history_video" aria-controls="wechat_history_video" role="tab" data-toggle="tab">浏览视频</a></li> -->
                    </ul>
                </div>
                <div class="modal-body tab-content">
                    <div role="tabpanel" class="tab-pane history" id="wechat_history_image">
                        <div class="history-content" style="height:330px">
                            <ul class="img-list clearfix">
                            </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <div style="float: left;" class="pagination">
                            </div>
                            <div style="float: right;">
                                <button style="display:none;" type="button" class="btn btn-primary">确认</button>
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane upload active" id="wechat_upload">
                        <div id="uploader">
                            <div class="queueList">
                                <div id="dndArea" class="placeholder">
                                    <div id="filePicker"></div>
                                    <p>或将照片拖到这里，单次最多可选300张</p>
                                </div>
                            </div>
                            <div class="statusBar" style="display:none;">
                                <div class="progress">
                                    <span class="text">0%</span>
                                    <span class="percentage"></span>
                                </div><div class="info"></div>
                                <div class="btns">
                                    <div id="filePicker2"></div><div class="uploadBtn">确定使用</div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>

<div  class="aw-header">
    <button class="btn btn-sm mod-head-btn pull-left">
        <i class="icon icon-bar"></i>
    </button>

    <div class="mod-header-user">
        <ul class="pull-left">
            <li class="dropdown mp">
                <?php if($mp_info['origin_id']): ?><a href="#" class="dropdown-toggle mod-bell" data-toggle="dropdown">
                    <img src="<?php if($mp_info['headimg']): echo ($mp_info['headimg']); else: ?>/Public/Admin/img/noname.jpg<?php endif; ?>" class="img-circle" width="30" height="30" style="position:relative;top:8px;">
                    <?php echo ($mp_info['name']); ?>
                    <span class="caret"></span>
                </a>
                <?php else: ?>
                <a href="#" class="dropdown-toggle mod-bell" data-toggle="">
                    <img src="/Public/Admin/img/noname.jpg" class="img-circle" width="30" height="30" style="position:relative;top:8px;">
                    <?php if($_G['module_name'] == 'admin'): ?>系统管理后台
                    <?php else: ?>
                    请先选择公众号<?php endif; ?>
                </a><?php endif; ?>
                <ul class="dropdown-menu mod-user">
                    <li>
                        <a href="<?php echo U('Mp/Index/index');?>"><i class="icon icon-home"></i>公众号首页</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Mp/Mp/edit', array('id'=>$mp_info['id']));?>"><i class="icon icon-edit"></i>编辑当前账号</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Mp/Mp/lists');?>"><i class="icon icon-ul"></i>管理其他账号</a>
                    </li>
                </ul>
            </li>
            <?php if(is_array($topmenu)): $i = 0; $__LIST__ = $topmenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="top-menu"> 
                <a href="<?php echo ($vo["url"]); ?>" class="<?php echo ($vo["class"]); ?>"><?php echo ($vo["title"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
       <!--  <?php if($mp_info): ?><a href="<?php echo U('Mp/Index/index', array('mpid'=>$mp_info['id']));?>"><?php echo ($mp_info['name']); ?></a><?php endif; ?> -->
        <ul class="pull-right">
            
            <!--<li class="dropdown">-->
                <!--<a href="#" class="dropdown-toggle mod-bell" data-toggle="dropdown">-->
                    <!--<i class="icon icon-bell"></i>-->
                    <!--<span class="label label-danger">1</span>-->
                <!--</a>-->
                <!--<ul class="dropdown-menu mod-chat">-->
                    <!--<div class="mod-list-head">-->
                        <!--您有 1 条消息-->
                    <!--</div>-->
                    <!--<li class="mod-media">-->
                        <!--<a href="http://bbs.douchat.cc" target="_blank">-->
                            <!--豆信3.0体验反馈-->
                        <!--</a>-->
                    <!--</li>-->
                <!--</ul>-->
            <!--</li>-->

            <li class="dropdown username">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php if($user_info['headimg']): echo ($user_info['headimg']); else: ?>/Public/Admin/img/noname.jpg<?php endif; ?>" class="img-circle" width="30" height="30" style="position:relative;top:8px;">
                    <?php if($user_info['nickname'] != ''): echo ($user_info['nickname']); else: echo ($user_info['username']); endif; ?>
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu pull-right mod-user">
                    <li>
                        <a href="<?php echo U('Home/Index/index');?>" target="_blank"><i class="icon icon-home"></i>首页</a>
                    </li>

                    <li>
                        <a href="<?php echo U('Mp/User/profile');?>"><i class="icon icon-ul"></i>个人资料</a>
                    </li>

                    <li>
                        <a href="<?php echo U('User/Public/login_out');?>"><i class="icon icon-logout"></i>退出</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div id="aw-ajax-box" class="aw-ajax-box">
    <div id="aw-loading" class="hide" style="display: none;">
        <div id="aw-loading-box"></div>
    </div>
    <div class="modal fade alert-box aw-tips-box in" aria-hidden="false" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">提示信息</h3>
                </div>
                <div class="modal-body">
                    <p>提示内容</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade in" style="display:none"></div>
<div class="aw-side" id="aw-side">
    <div class="mod">
        <div class="mod-logo">
            <img class="pull-left" src="/Public/Admin/img/logo.png" alt="" />
            <h1>迅达拼车平台</h1>
        </div>

        <div class="mod-message">
            <div class="message">
                <a class="btn btn-sm" href="<?php echo U('Home/Index/index');?>" target="_blank" title="网站首页">
                    <i class="icon icon-home"></i>
                </a>

                <a class="btn btn-sm" href="<?php echo U('Mp/Index/index');?>" title="公众号首页">
                    <i class="icon icon-ul"></i>
                </a>

                <a class="btn btn-sm" href="<?php echo U('User/Public/login_out');?>" title="退出登录">
                    <i class="icon icon-logout"></i>
                </a>
            </div>
        </div>

        
        <?php if(is_array($sidenav)): $i = 0; $__LIST__ = $sidenav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="mod-bar" >
            <li>
                <a href="<?php echo ($vo["url"]); ?>" class="<?php echo ($vo["class"]); ?>" <?php echo ($vo["attr"]); ?>>
                    <span><?php echo ($vo["title"]); ?></span>
                </a>
                <!-- <ul <?php if(CONTROLLER_NAME != 'Addons'): ?>class="hide"<?php endif; ?>> -->
                <ul>
                    <?php if(is_array($vo["children"])): $i = 0; $__LIST__ = $vo["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo ($vv["url"]); ?>">
                            <span><?php echo ($vv["title"]); ?></span>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </li>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
        
    </div>
</div>

<script type="text/javascript">
var path_info = "<?php echo $_SERVER['PATH_INFO']; ?>";
var controller = "<?php echo CONTROLLER_NAME; ?>";        // 获取当前控制器
var addon = "<?php echo get_addon();?>";
if (controller == 'Web') {
    if (addon) {
        var active_a = $("#aw-side a[href*='"+addon+"']"); 
    } else {
        var active_a = $("#aw-side a[href*='"+path_info+"']"); 
    }
} else {
    var active_a = $("#aw-side a[href*='"+controller+"']");              // 获取链接中包含当前控制器的a标签
}

var active_ul = active_a.parent("li").parent("ul");         // 获取需要显示的ul标签
var active_wrap = active_ul.siblings("a");                  

active_a.addClass("active");
active_ul.removeClass("hide");
active_wrap.addClass("active");

</script>



<div class="aw-content-wrap">

<?php if($crumb): ?><ol class="breadcrumb">
	<?php if(is_array($crumb)): $i = 0; $__LIST__ = $crumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><?php if(!empty($vo["url"])): ?><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a><?php else: echo ($vo["title"]); endif; ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ol><?php endif; ?>

<div class="mod">
    <div class="mod-head">
        <h3>
            <ul class="nav nav-tabs">
	<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><a <?php if(!empty($vo["url"])): ?>href="<?php echo ($vo["url"]); ?>"<?php endif; ?>><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
        </h3>
    </div>
    <div class="mod-body tab-content">
        <?php if($tip): ?><div class="alert alert-info tip" role="alert"><?php echo ($tip); ?></div><?php endif; ?>
        <?php if(!empty($list_search)): ?><nav class="navbar navbar-default" role="navigation" style="width: 100%;float: left;text-align: right;">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" role="search" method="post" action="<?php echo U('lists');?>">
        <div class="form-group">
        <select name="target" id="" style="height: 34px;border: 1px solid #ccc;border-radius: 5px;">
    		<option value="">全部</option>
        	<?php if(is_array($list_search)): $i = 0; $__LIST__ = $list_search;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if(($key) == $target): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
          <input type="text" class="form-control" placeholder="请输入要搜索的内容" style="width: 400px;" name="keyword" value="<?php echo ($keyword); ?>">
        </div>
        <button type="submit" class="btn btn-default" style="width: 100px;">搜索</button>
        <span style="padding-left: 100px;color: #1ba358;">&nbsp;<?php echo ($search_tip); ?></span>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div style="clear: both;"></div><?php endif; ?>
        <div class="tab-pane active" id="list">
            <?php if($subnav): ?><ul class="nav nav-tabs">
                <?php if(is_array($subnav)): $i = 0; $__LIST__ = $subnav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li role="presentation" class="<?php echo ($vo["class"]); ?>"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul> 
            <br><?php endif; ?>
            <div class="mod-table-head">
                <?php if($add_button): ?><a class="btn btn-primary" href="<?php echo U('add');?>">添加<?php echo ($model['title']); ?></a><?php endif; ?>
                <?php if($del_button): ?><a class="btn btn-danger del-btn" href="javascript:;">删除<?php echo ($model['title']); ?></a><?php endif; ?>
                <?php if(is_array($btn)): $i = 0; $__LIST__ = $btn;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="<?php echo ($vo["class"]); ?>" href="<?php echo ($vo["url"]); ?>" <?php echo ($vo["attr"]); ?>><?php echo ($vo["title"]); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <br>
            <form action="<?php echo U('delete', array('addon'=>get_addon()));?>" method="post">
            <input type="hidden" name="model" value="<?php echo ($model["name"]); ?>" />
            <input type="hidden" id="action" name="action" value="mass_delete">
            <input type="hidden" name="mass_delete_key" value="<?php echo ($lists['fields'][0]['name']); ?>" />
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <?php if($lists['fields']): ?><tr>
                            <th><input type="checkbox" value="" class="checkall" onclick="alert(123);"></th>
                            <?php if(is_array($lists["fields"])): $k = 0; $__LIST__ = $lists["fields"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><th <?php if(($vo["format"]) == "hidden"): ?>style="display:none"<?php endif; ?>><?php echo ($vo['title']); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr><?php endif; ?>
                    </thead>
                    <tbody>
                        <?php if($lists['data']): if(is_array($lists["data"])): $i = 0; $__LIST__ = $lists["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><input type="checkbox" name="<?php echo ($lists['fields'][0]['name']); ?>[]" class="single_checkbox" value="<?php echo ($vo[0]); ?>"></td>
                            <?php if(is_array($vo)): $k = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($k % 2 );++$k;?><td <?php if($lists['fields'][$k-1]['format'] == 'hidden'): ?>style="display:none"<?php endif; ?>><?php echo ($vv); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>                                                     
                    </tbody>
                </table>
            </div>
            </form>
            <div class="mod-table-foot">
                <?php if($count != 0): ?><span class="pull-left">记录总数：<?php echo ($count); ?></span><?php endif; ?>
                <?php echo ($pagination); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on('click', '.iCheck-helper,checkall', function() {
        alert(123);
    }).on('click', '.del-btn', function() {
        var checkedboxs = $('.single_checkbox:checked');
        var count = checkedboxs.length;
        if (count == 0) {
            alert('请选择要删除的数据');
            return false;
        }
        if (confirm('是否确认删除')) {
            $('form').submit();
        }
    });
</script>

</div>
<div class="aw-footer">
    <p><?php echo ($system_settings['site_copyright']); ?> </p>
</div>

<!-- DO NOT REMOVE -->
<div id="aw-ajax-box" class="aw-ajax-box"></div>


<div style="display:none;" id="__crond">
	<script type="text/javascript">
		$(document).ready(function () {
			//$('#__crond').html(unescape('%3Cimg%20src%3D%22' + G_BASE_URL + '/crond/run/1459163416%22%20width%3D%221%22%20height%3D%221%22%20/%3E'));
		});
	</script>
</div>

<script type="text/javascript" src="/Public/Admin/js/common.js"></script>

<!-- ueditor 编辑器 -->
<script type="text/javascript">
    // var ue = UE.getEditor('ueditor');
</script>

<!-- markdown 编辑器 -->
<script type="text/javascript">
var testEditor;
$(function() {
    // testEditor = editormd("test-editormd", {
    //     width   : "99%",
    //     height  : 640,
    //     syncScrolling : "single",
    //     path    : "/Public/Plugins/editormd/lib/",
    //     imageUpload : true,
    //     imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
    //     imageUploadURL : "<?php echo U('Material/markdown_picupload',array('test'=>123456));?>",
    // });
});
</script>

</body>
</html>