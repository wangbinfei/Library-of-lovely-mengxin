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
    <div id="myCarousel" data-interval="3000" class="carousel slide <?php if($p > 1): ?>index-hidden<?php endif; ?>">
        <ol class="carousel-indicators">
            <?php if(is_array($cycle)): $i = 0; $__LIST__ = $cycle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cyc): $mod = ($i % 2 );++$i;?><li data-target="#myCarousel" data-slide-to="<?php echo ($cyc['cycle_id'] - 1); ?>" <?php if($i == 1): ?>class="active"<?php endif; ?>></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ol>
        <div class="carousel-inner">
            <?php if(is_array($cycle)): $i = 0; $__LIST__ = $cycle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cyc): $mod = ($i % 2 );++$i;?><div class="item <?php if($i == 1): ?>active<?php endif; ?>" style="background-image: url(/Library_of_lovely_xin/Public/<?php echo ($cyc["cycle_address"]); ?>);
                background-size: cover;
                filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(
                src='/Library_of_lovely_xin/Public/<?php echo ($cyc["cycle_address"]); ?>',
                sizingMethod='scale');">
                    <div class="caption"><?php echo ($cyc["cycle_title"]); ?></div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lt;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&gt;</a>
    </div>
    <script>
        $('#myCarousel').carousel('cycle');
    </script>


    <!--书架-->
    <div class="bookshelf">
        <div class="shelf-top"></div>
        <div class="shelf-frame ">
            <?php if(is_array($book)): $i = 0; $__LIST__ = $book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bookInfo): $mod = ($i % 2 );++$i; if($i == 12): ?><div class="shuji-clear"></div></div><div class="shelf-frame2"><?php endif; ?>
                <?php if($i == 18): ?></div><div class="shelf-frame3"><?php endif; ?>
                <div class="shuji" data-toggle="modal" data-target="#shuji<?php echo ($key); ?>"><?php echo ($bookInfo["book_name"]); ?></div>
                <div class="modal fade" id="shuji<?php echo ($key); ?>" aria-hidden="true">
                    <div class="modal-content modal-dialog" id="shujimodal">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h3><?php echo ($bookInfo["book_name"]); ?></h3>
                        </div>
                        <div class="modal-body">
                            <p>作者：<?php echo ($bookInfo["book_author"]); ?></p>
                            <p>内容简介：<?php echo ($bookInfo["book_abstract"]); ?></p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary btn-close" href="/Library_of_lovely_xin/index.php/Home/Index/indexBook?book_id=<?php echo ($bookInfo["book_id"]); ?>&page=1" target="_blank" >阅读此书</a>
                            <button class="btn btn-default" data-dismiss="modal">取消阅读</button>
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

        <!--上传图书-->
        <div class="add-bookshelf">
            <div id="upload-book" data-toggle="modal" data-target="#shelfModal">
                添加图书
            </div>
            <div class="modal fade" id="shelfModal" tabindex="-1" role="dialog" aria-labelledby="shelfModalLabel" aria-hidden="true">
                <div class="backdrop">
                    <div class="modal-content modal-dialog">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal" id="close">&times;</button>
                            <h4>新书上架</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="up-book" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="book_name" class="col-sm-2 col-sm-offset-1 form-label">书名</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="book_name" id="book_name" class="form-control" placeholder="请输入书名" datatype="*" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_author" class="col-sm-2 col-sm-offset-1 form-label">作者</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="book_author" id="book_author" placeholder="请输入作者" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_cover" class="col-sm-2 col-sm-offset-1 form-label">图书封面</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="book_cover" id="book_cover" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_abstract" class="col-sm-2 col-sm-offset-1 form-label">图书简介</label>
                                    <div class="col-sm-6">
                                        <textarea name="book_abstract" id="book_abstract" class="form-control" placeholder="请输入图书简介"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_content" class="form-label col-sm-2 col-sm-offset-1">图书文件</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="book_content" id="book_content" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-static col-sm-8 col-sm-offset-1" id="isBook"></div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal">取消</button>

                            <button class="btn btn-primary" id="sub">提交</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--异步提交图书-->
        <script>
            $(function () {

            })
        </script>

        </div>
        <div class="<?php if($p > 1): ?>page-lf<?php endif; ?>">
            <a href="/Library_of_lovely_xin/index.php/Home/index/index/p/<?php echo ($p-1); ?>" class="<?php if($p < 2): ?>index-hidden<?php endif; ?>"><<</a>
            <a class="span-right <?php if($p == $pages): ?>index-hidden<?php endif; ?>" href="/Library_of_lovely_xin/index.php/Home/index/index/p/<?php if($p+1 == 1): ?>2<?php else: echo ($p+1); endif; ?>">>></a>
        </div>
    </div>

    <!--分页列表-->
    <div class="page-content"><?php echo ($show); ?></div>



</body>
</html>