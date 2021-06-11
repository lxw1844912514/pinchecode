<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html> 
	<head>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
		<title>请稍候...</title>
		<meta http-equiv="refresh" content="5; url=./" />
		<link rel="stylesheet" type="text/css" href="/Public/Install/css/icon.css" />
		<style type="text/css">
			*{margin:0;padding:0;}
			h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:400;}
			body{background:#f1f1f1;color:#1c2837;font:normal 15px arial, verdana, tahoma, sans-serif;position:relative;}
			a{color:#284b72;}
			a:hover{color:#528f6c;text-decoration:underline;}
			.aw-error-box{max-width: 400px;margin:80px auto 0;}
			.aw-error-box .mod-head{position: relative;margin-bottom: 15px;padding-left: 10px;}
			.aw-error-box .mod-head .icon-bubble{font-size: 60px;color: #66b7ff;}
			.aw-error-box .mod-head .icon-i{position:absolute;left:15px;top:4px;font-size: 50px;color: #fff;}
			.aw-error-box .mod-body{padding:40px;background-color: #ebebeb;border-radius: 10px;}
			
			@media (max-width:640px) {
	   			.aw-error-box{padding:0 20px;}
			}
		</style>
		
		<script type='text/javascript'>
			//<![CDATA[
			// Fix Mozilla bug: 209020
			if ( navigator.product == 'Gecko' )
			{
				navstring = navigator.userAgent.toLowerCase();
				geckonum  = navstring.replace( /.*gecko\/(\d+)/, "$1" );
				
				setTimeout("moz_redirect()", 5000);
			}
			
			function moz_redirect()
			{
				var url_bit     = "<?php echo ($jumpUrl); ?>";
				
				window.location = url_bit.replace( new RegExp( "&amp;", "g" ) , '&' );
			}
			//>
		</script>
	</head>

	<body>
		<div class="aw-error-box">
			<div class="mod-head">
				<i class="icon icon-bubble"></i>
				<i class="icon icon-i"></i>
			</div>
			<div class="mod-body">
				<strong><?php echo ($message); ?></strong>
				<br />
				<br />
				<span class='desc'>(<a href="<?php echo ($jumpUrl); ?>">如果不想等待, 请点击这里</a>)</span>
			</div>
		</div>
	</body>
</html>