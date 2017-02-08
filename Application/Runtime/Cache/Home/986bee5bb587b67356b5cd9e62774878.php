<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />-->
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>萌昕的小图书馆</title>
    <script src="/Library_of_lovely_xin/Public/js/jquery-1.10.2.min.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/Library_of_lovely_xin/Public/js/html5.js"></script>
    <script type="text/javascript" src="/Library_of_lovely_xin/Public/js/respond.min.js"></script>
    <script type="text/javascript" src="/Library_of_lovely_xin/Public/js/PIE_IE678.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/Library_of_lovely_xin/Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="/Library_of_lovely_xin/Public/css/index.css">
    <script src="/Library_of_lovely_xin/Public/js/custom.modernizr.js"></script>
    <script src="/Library_of_lovely_xin/Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="/Library_of_lovely_xin/Public/Validform/js/Validform_v5.3.2.js"></script>
    <script src="/Library_of_lovely_xin/Public/js/public.js"></script>
</head>
<body>
<header>
    <div id="YOUDAO_SELECTOR_WRAPPER" style="display:none; margin:0; border:0; padding:0; width:320px; height:240px;"></div>
    <script type="text/javascript" src="http://fanyi.youdao.com/openapi.do?keyfrom=mengxinfanyi&key=915357641&type=selector&version=1.2&translate=on" charset="utf-8"></script>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-sm-offset-2">
            <a href="#"><img src="/Library_of_lovely_xin/Public/image/9dcea6dd93e0a82e5b2167e790172353.png" width="20px" class="tag"> 将图书馆快捷发送到桌面</a>
            <span>&nbsp;</span>
            <a href="#"><img src="/Library_of_lovely_xin/Public/image/shoucang.jpg" alt="无法加载" width="20px" class="tag">收藏图书馆</a>
        </div>
        <?php if($loginArray['isLogin'] == 1): ?><div class="col-sm-3 col-sm-offset-3" id="loginInfo"><em class="text-right"><?php echo ($loginArray['user_name']); ?></em>|<a href="/Library_of_lovely_xin/index.php/Home/exit/exitLogin" user_id="<?php echo ($loginArray['user_id']); ?>">退出</a></div>
        <?php else: ?>
            <div class="col-xs-6 col-sm-6" id="userInfo">
            <form action="#" method="post" class="form-inline" id="headerForm">
                <div class="form-group">
                    <label for="user_name">账号：</label>
                    <input type="text" id="user_name" class="form-control" name="user_name" style="height: 22px;width:100px">
                </div>
                <div class="form-group">
                    <label for="user_password">密码：</label>
                    <input type="text" id="user_password" class="form-control" name="user_password" style="height: 22px;width: 100px">
                </div>
                <div class="form-group">
                    <input type="button" value="登录" id="login" style="height: 20px;font-size: 10px;margin-bottom: 3px">
                </div>
                <div class="form-control-static" id="user-help">
                    <a href="#">忘记密码</a>
                    <a href="#" data-toggle="modal" data-target="#newsUser">用户注册</a>
                </div>
            </form>

            <!--注册模态框-->
            <div class="modal fade" id="newsUser" aria-hidden="true">
                <div class="backdrop">
                    <div class="modal-content modal-dialog" id="registerUser">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal" id="userClose">&times;</button>
                            <h4>用户注册</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" id="register" action="/Library_of_lovely_xin/index.php/Home/register/register">
                                <div class="form-group">
                                    <label for="username1" class="col-sm-2 control-label ">账号</label>
                                    <div class="col-xs-6 col-sm-6">
                                        <input type="text" id="username1" class="form-control" placeholder="请输入你的昵称" name="user_name" datatype="*6-12" errormsg="请输入6-12字账号">
                                        <div class="col-sm-1"></div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3"></div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label">手机</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="phone" class="form-control" placeholder="请输入手机号码" name="user_phone" datatype="m">
                                    </div>
                                    <div class="col-xs-3 col-sm-3"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3 col-sm-offset-2">
                                        <input type="button"  class="btn btn-default check" value="获取验证码">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="checkInfo form-control-static"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="check" class="col-sm-2 control-label">验证码</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="user_check" id="check" class="form-control" placeholder="请输入验证码">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password1" class="col-sm-2 control-label">设置密码</label>
                                    <div class="col-xs-6 col-sm-6">
                                        <input type="password" class="form-control" id="password1" placeholder="请输入密码" name="user_password" datatype="/^[a-zA-Z]\w{5,11}$/i" errormsg="请输入以字母开头的6-12位密码">
                                    </div>
                                    <div class="col-xs-3 col-sm-3"></div>
                                </div>
                                <div class="form-group">
                                <label for="password2" class="col-sm-2 control-label">确认密码</label>
                                <div class="col-xs-6 col-sm-6">
                                    <input type="password" id="password2" datatype="*" recheck="user_password" class="form-control" placeholder="请确认密码" >
                                </div>
                                <div class="col-xs-3 col-sm-3"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-2 col-sm-2 col-sm-offset-2">
                                    <input type="submit" value="确认注册" class="form-control btn-primary">
                                    </div>
                                    <div class="col-xs-2 col-sm-2">
                                    <input type="reset" value="重置信息" class="form-control">
                                    </div>
                                    <div class="col-xs-2 col-sm-2 form-control-static" id="ajaxInfo"></div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
        </div><?php endif; ?>


    </div>
</header>

    <!--<div class="col-xs-10 col-sm-10 col-xs-offset-1 col-sm-offset-1">-->
<div class="book-body">
    <!--禁止翻页-->
    <div>
        <button class="forbid" style="margin-top:10px;">禁止点击翻页</button>
        <button class="allow" style="margin-top:10px;">开启点击翻页</button>
        <input class="forbid-value" type="hidden" value="true">
    </div>
    <!--禁止翻页end-->
    <div class="book-page-float">
    <!--书页-->
    <div class="book-page" page="<?php echo ($page); ?>" book_id="<?php echo ($book_id); ?>">
        <div class="book-pageleft book-pageclick">
            <pre><?php echo ($bookContent[0]); ?></pre>
        </div>
        <div class="book-pageright">
            <pre><?php echo ($bookContent[1]); ?></pre>
        </div>
        <div class="clear"></div>
        <div class="pageNum">
            <div class="pageNum1"><?php echo ($page*2-1); ?></div>
            <div class="pageNum2"><?php echo ($page*2); ?></div>
        </div>
    </div>
    </div>
    <div class="bookmark-div">
        <div>
            <div class="bookmark" id="save-bookmark">
                <div class="bookmark-text">
                    保存书签
                </div>
            </div>
        </div>
        <div>
            <div class="bookmark">
                <div class="bookmark-text" id="bookmark-list">
                    打开书签
                </div>
            </div>
        </div>
        <?php if(is_array($bookmark)): $i = 0; $__LIST__ = $bookmark;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mark): $mod = ($i % 2 );++$i;?><div class="bookmark-hide">
                <div class="bookmark">
                    <div class="bookmark-text" page="<?php echo ($mark["bookmark_page"]); ?>">
                        <?php echo ($mark['bookmark_page']*2-1); ?>页
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--<div class="col-xs-1 col-sm-1 bookmark-div">-->
    <div class="clear"></div>
</div>


    <!--滑块翻页-->
    <div class="range">
        <strong>1</strong>
        <input type="range" min="1" max="<?php echo ($bookContent['pageCount']); ?>" style="display: inline;width: 600px" id="range" value="<?php echo ($page); ?>">
        <strong><?php echo ($bookContent['pageCount']*2); ?></strong>
    </div>
    <div>
        <input type="hidden" value="1" id="key">
    </div>

    <!--翻页-->
    <script>
        var pageCount = <?php echo ($bookContent['pageCount']); ?>;
    </script>


</body>
</html>