<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="/Public/Common/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Plugins/qrcode/qrcode.js"></script>
    <script type="text/javascript" src="/Public/Plugins/qrcode/jquery.qrcode.js"></script>
    <style type="text/css">
    #phone{ margin:0 auto; width:510px; height:814px; background:url(/Public/Plugins/qrcode/preview_phone.jpg) no-repeat;}
    #frame{ margin:100px 0 0 97px; width:320px; border:2px solid #333;}
    #qrcode{ position:absolute; top:200px; left:50%; margin-left:230px; width:200px; height:300px; text-align:center; line-height:30px;}
    </style>
</head>

<body style="background:#fff">
	<div id="phone">
	<iframe id="frame" src="<?php echo ($url); ?>" height="565" width="320" frameborder="0"></iframe>
    </div>
    <div id="qrcode">
    	<div id="canvas" style="height:200px; width:200px;"></div>
    	用微信扫一扫预览
    </div>
    <script type="text/javascript">
    	var url = "<?php echo ($url); ?>";
        $('#canvas').qrcode({width:200,height:200,text:url}); 
    </script>
</body>
</html>