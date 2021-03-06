<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title><?php echo ($system_settings["site_name"]); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="keyword" content="<?php echo ($system_settings["site_keywords"]); ?>" />
  <meta name="description" content="<?php echo ($system_settings["site_intro"]); ?>" />
  <link rel="stylesheet" type="text/css" href="/Public/Common/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/Public/Home/default/css/site.min.css">
  <link rel="stylesheet" type="text/css" href="/Public/Home/default/css/style.css">
  
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand hidden-sm" href="./">豆信</a>
      </div>
      <div class="navbar-collapse collapse" role="navigation">
        <ul class="nav navbar-nav">
          <li class="hidden-sm hidden-md">
            <a href="./" target="_self">首页</a>
          </li>
         
        
        </ul>
        <ul class="nav navbar-nav navbar-right hidden-sm">
          <li><a href="<?php echo U('Mp/Index/index');?>" target="_self">后台管理</a></li>
        </ul>
      </div>
    </div>
  </div>

  
<div class="jumbotron masthead">
    <div class="container">
      <h1>Douchat</h1>
      <h2>简洁、高效的微信开发框架，让公众号开发变得简单。</h2>
    </div>
  </div>

  <div class="bc-social">
    <div class="container">
      <ul class="bc-social-buttons">
        <li class="social-qq">
          <i class="fa fa-qq"></i> 加入豆信交流群，感受集体的力量：<span id="qqgroup"></span>
        </li>
      </ul>
    </div>
  </div>

  <div class="container projects">

      <div class="projects-header page-header">
        <h2>豆信3功能概览</h2>
        <p>豆信3是一个全新的版本，自主研发了一套扩展性强的插件机制，对微信接口进行了高度封装。</p>
      </div>

      <div class="row">

        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail" style="height: 336px;">
            <a href=""><img class="lazy" src="/Public/Home/default/img/1.png" width="300" height="150" data-src="/Public/Home/default/img/1.png" alt=""></a>
            <div class="caption">
              <h3>
                <a href="" title="">高度封装<br><small></small></a>
              </h3>
              <p>
              豆信对微信接口、php常用类库、流行前端框架、样式库等都进行了一定程度的封装，让开发者可以快速的实现想要的功能。
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail" style="height: 336px;">
            <a href=""><img class="lazy" src="/Public/Home/default/img/2.png" width="300" height="150" data-src="/Public/Home/default/img/2.png" alt=""></a>
            <div class="caption">
              <h3>
                <a href="" title="">灵活扩展<br><small></small></a>
              </h3>
              <p>
              豆信自主研发了一套插件机制，充分发挥AOP切面的思想，基于插件来扩展功能，降低系统的耦合性，使一切变得非常灵活。
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail" style="height: 336px;">
            <a href=""><img class="lazy" src="/Public/Home/default/img/3.png" width="300" height="150" data-src="/Public/Home/default/img/3.png" alt=""></a>
            <div class="caption">
              <h3>
                <a href="">便捷开发<br><small></small></a>
              </h3>
              <p>
              豆信封装了一套通用的视图构建工具，可以让开发者专注于业务逻辑的实现，在实现插件后台管理时甚至不需要写任何一行HTML代码。
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail" style="height: 336px;">
            <a href=""><img class="lazy" src="/Public/Home/default/img/4.png" width="300" height="150" data-src="/Public/Home/default/img/4.png" alt=""></a>
            <div class="caption">
              <h3>
                <a href="">云服务<br><small></small></a>
              </h3>
              <p>
              豆信集成在线更新与在线安装插件功能，通过豆信云服务，可以方便的对系统、插件进行升级，保证了系统的稳定性和功能的持续可扩展。
              </p>
            </div>
          </div>
        </div>

</div>
</div>


  <footer class="footer ">
      <div class="container">
        <div class="row footer-bottom">
          <ul class="list-inline text-center">
            <li><?php if($system_settings['site_copyright']): echo ($system_settings["site_copyright"]); else: ?>Copyright © 2014-2017<?php endif; ?></li><li><?php echo ($system_settings["site_icp_beian"]); ?></li>
          </ul>
        </div>
      </div>
    </footer>
  <script type="text/javascript" src="/Public/Common/js/jquery-3.1.0.js"></script>
  <script type="text/javascript" src="/Public/Common/js/bootstrap.min.js"></script>
</body>
</html>