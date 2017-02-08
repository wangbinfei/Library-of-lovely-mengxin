<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
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
</head>
<body>
<header>
    <div class="row">
        <div class="col-sm-4 col-sm-4 col-sm-offset-2">
            <a href="#"><img src="/Library_of_lovely_xin/Public/image/9dcea6dd93e0a82e5b2167e790172353.png" width="20px" class="tag"> 将图书馆快捷发送到桌面</a>
            <span>&nbsp;</span>
            <a href="#"><img src="/Library_of_lovely_xin/Public/image/shoucang.jpg" alt="无法加载" width="20px" class="tag">收藏图书馆</a>
        </div>
        <?php if($loginArray['isLogin'] == 1): ?><div class="col-sm-3 col-sm-offset-3" id="loginInfo"><em class="text-right"><?php echo ($loginArray['user_name']); ?></em>|<a href="/Library_of_lovely_xin/Home/exit/exitLogin" user_id="<?php echo ($loginArray['user_id']); ?>">退出</a></div>
        <?php else: ?>
            <div class="col-sm-6 col-sm-6" id="userInfo">
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
                            <form class="form-horizontal" id="register" action="/Library_of_lovely_xin/Home/register/register">
                                <div class="form-group">
                                    <label for="username1" class="col-sm-2 control-label ">账号</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="username1" class="form-control" placeholder="请输入你的昵称" name="user_name" datatype="*6-12" errormsg="请输入6-12字账号">
                                        <div class="col-sm-1"></div>
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>
                                <div class="form-group">
                                    <label for="password1" class="col-sm-2 control-label">设置密码</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="password1" placeholder="请输入密码" name="user_password" datatype="/^[a-zA-Z]\w{5,11}$/i" errormsg="请输入以字母开头的6-12位密码">
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>
                                <div class="form-group">
                                <label for="password2" class="col-sm-2 control-label">确认密码</label>
                                <div class="col-sm-6">
                                    <input type="password" id="password2" datatype="*" recheck="user_password" class="form-control" placeholder="请确认密码" >
                                </div>
                                <div class="col-sm-3"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 col-sm-offset-2">
                                    <input type="submit" value="确认注册" class="form-control btn-primary">
                                    </div>
                                    <div class="col-sm-2">
                                    <input type="reset" value="重置信息" class="form-control">
                                    </div>
                                    <div class="col-sm-2 form-control-static" id="ajaxInfo"></div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
        </div><?php endif; ?>

        <!--异步登录-->
        <script>
            $(function () {
                $('#login').click(function () {
                    $.ajax({
                        url: '/Library_of_lovely_xin/Home/login/ajaxLogin',
                        type: 'post',
                        data: $('#headerForm').serialize(),
                        success: function (data) {
                            if(data == 0)
                            {
                                alert('用户名或密码错误');
                            }else
                            {
                                alert('登录成功');
                                data = $.parseJSON(data);
                                $('<div class="col-sm-3 col-sm-offset-3" id="loginInfo"><em class="text-right">'+ data['user_name'] + '</em>|<a href="/Library_of_lovely_xin/Home/exit/exitLogin" user_id="'+ data['user_id'] +'">退出</a></div>').replaceAll('#userInfo');
                            }
                        }
                    })
                })
            })
        </script>

        <!--异步注册-->
        <script>
            $('#register').Validform({
                tiptype: 2,
                ajaxPost: true,
                postonce: true,

                callback: function (data) {
                    if(data == 0){
                        alert('用户已存在');
                    }else
                    {
                        document.getElementById('register').reset();
                        $('#ajaxInfo').text('注册成功');
                        setTimeout(function () {
                            $('#userClose').trigger('click');
                        },2000)
                        setTimeout(function () {
                            $('<div class="col-sm-3 col-sm-offset-3" id="loginInfo"><em class="text-right">'+ data['user_name'] + '</em>|<a href="/Library_of_lovely_xin/Home/exit/exitLogin" user_id="'+ data['user_id'] +'">退出</a></div>').replaceAll('#userInfo');
                        },2500);
                    }

                }
            });
        </script>
    </div>
</header>

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
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
    <div class="col-sm-1 bookmark-div">
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
    $(function () {
        var book_page = $('.book-page');
        var book_pageright = $('.book-pageright');
        var book_pageleft = $('.book-pageleft');
        var range = $('#range');
        var book_id = book_page.attr('book_id');
        var pageNum1 = $('.pageNum1');
        var pageNum2 = $('.pageNum2');
        var pageCount = <?php echo ($bookContent['pageCount']); ?>;
        var key = $('#key');
        //右翻页
        book_pageright.click(function () {

            if(key.val() == 1)
            {
                key.val(0);
            }else
            {
                return;
            }
            var page = book_page.attr('page') - 0 + 1 ;
            if(pageCount < page)return key.val(1);
            range.val(page);
            range.trigger('change');

        });
        //左翻页
        book_pageleft.click(function () {
            var key = $('#key');
            if(key.val() == 1)
            {
                key.val(0);
            }else
            {
                return;
            }
            var page = book_page.attr('page') - 1 ;
            if(page == 0)return key.val(1);
            range.val(page);
            range.trigger('change');
        });

        //滑块翻页
        range.change(function () {
            var rangePage = range.val();
            $.ajax({
                url: '/Library_of_lovely_xin/Home/index/ajaxIndexBook?book_id='+book_id+'&page='+rangePage+'&turn=turn',
                success: function (data) {
                    data = $.parseJSON(data);
                    console.log(data);
                    book_page.attr('page', data['page']);
                    book_pageright.children().empty().prepend(data['bookContent'][1]);
                    book_pageleft.children().empty().prepend(data['bookContent'][0]);
                    pageNum1.empty().text(data['page']*2-1);
                    pageNum2.empty().text(data['page']*2);
                    key.val(1);
                }
            })
        })

        //手动保存书签
        var click_mark = $('#save-bookmark');
        click_mark.click(function () {
            var page = book_page.attr('page');
            $.ajax({
                url: '/Library_of_lovely_xin/Home/index/saveBookmarkByClick',
                type: 'post',
                data: {'book_id': book_id, 'page': page},
                success: function (data) {
                    console.log(data);
                    var tooltip = '<div class="tool-tip" data-toggle="tooltip" title="'+data+'"></div>';
                    click_mark.prepend(tooltip);
                    $("[data-toggle='tooltip']").tooltip();
                    $('.tool-tip').tooltip('show');
                    setTimeout(function () {
                        $('.tool-tip').remove();
                        $('.tooltip').remove();
                    }, 2000);
                }
            })
        })

        //打开或关闭书签列表
        $('#bookmark-list').click(function () {
            $('.bookmark-hide').toggle(300);
        });

    })
</script>


</body>
</html>