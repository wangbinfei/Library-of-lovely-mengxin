/**
 * Created by Administrator on 2017/2/5.
 */
$(function () {
    // 异步登录
    $('#login').click(function () {
        $.ajax({
            url: '/Library_of_lovely_xin/index.php/Home/login/ajaxLogin',
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
                    $('<div class="col-sm-3 col-sm-offset-3" id="loginInfo"><em class="text-right">'+ data['user_name'] + '</em>|<a href="/Library_of_lovely_xin/index.php/Home/exit/exitLogin" user_id="'+ data['user_id'] +'">退出</a></div>').replaceAll('#userInfo');
                }
            }
        })
    })
    // 异步登录

//异步注册
//获取验证码
    $('.check').click(function () {
        var time = 60;
        $('.check').attr('disable', 'disable');
        $.ajax({
            url: '/Library_of_lovely_xin/index.php/Home/check/check',
            type: 'post',
            data: {'user_phone':$('#phone').val()},
            success: function (data) {
                if(data){
                    $('.checkInfo').text('验证码已发送到手机');
                    var timeStart = setInterval(function () {
                        time = time - 1;
                        if(time == 0)
                        {
                            $('.check').val('重新获取验证码')
                            clearInterval(timeStart);
                        }else
                        {
                            $('.check').val('重新获取验证码（' + time + 's）')
                        }
                    }, 1000);
                }else
                {
                    $('.checkInfo').text('验证码发送失败');
                }
            }
        })
    });
//获取验证码end

//表单验证与异步提交
    $('#register').Validform({
        tiptype: 2,
        ajaxPost: true,
        postonce: true,

        callback: function (data) {
            if(data == 0){
                alert('用户已存在');
            }else if(data == 'falseCheck')
            {
                $('.checkInfo').text('验证码错误');
            }
            else
            {
                document.getElementById('register').reset();
                $('#ajaxInfo').text('注册成功');
                setTimeout(function () {
                    $('#userClose').trigger('click');
                },2000)
                setTimeout(function () {
                    $('<div class="col-sm-3 col-sm-offset-3" id="loginInfo"><em class="text-right">'+ data['user_name'] + '</em>|<a href="/Library_of_lovely_xin/index.php/Home/exit/exitLogin" user_id="'+ data['user_id'] +'">退出</a></div>').replaceAll('#userInfo');
                },2500);
            }

        }
    });
//表单验证与异步提交end
// 异步注册end

    // 禁止翻页
    $('.forbid').click(function () {
        $('.forbid-value').val('false');
    });
    $('.allow').click(function () {
        $('.forbid-value').val('true');
    });

    // 翻页
    var book_page = $('.book-page');
    var book_pageright = $('.book-pageright');
    var book_pageleft = $('.book-pageleft');
    var range = $('#range');
    var book_id = book_page.attr('book_id');
    var pageNum1 = $('.pageNum1');
    var pageNum2 = $('.pageNum2');
    var key = $('#key');
    //右翻页
    book_pageright.click(function () {
        if($('.forbid-value').val() == 'false')return;
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
        if($('.forbid-value').val() == 'false')return;
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
            url: '/Library_of_lovely_xin/index.php/Home/index/ajaxIndexBook?book_id='+book_id+'&page='+rangePage+'&turn=turn',
            success: function (data) {
                data = $.parseJSON(data);
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
            url: '/Library_of_lovely_xin/index.php/Home/index/saveBookmarkByClick',
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

    // 点击阅读后关闭模态框
    $('.btn-close').click(function () {
        setTimeout(function () {
            $('.close').trigger('click');
        })
    })

    // 异步上传图书
    $('#sub').click(function () {
        var formData = new FormData(document.getElementById('up-book'));
        console.log(formData);
        $.ajax({
            url: '/Library_of_lovely_xin/index.php/Home/UploadBook/getBook',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                if(data){
                    $('#isBook').text('图书上传成功') ;
                    document.getElementById('up-book').reset();
                    setTimeout(function () {
                        $('#close').trigger('click');
                        $('#isBook').text('');
                    }, 3000);

                }else{
                    $('#isBook').text('图书上传失败,请输入正确完整的图书信息') ;
                }

            }
        })
    })

    // 分页列表
    $('.page-content a').wrap('<li></li>');
    $('.page-content span').wrap('<li></li>');
    $('.page-content li').wrapAll('<ul class="pagination"></ul>');
    $('.page-content span').parent().addClass('active')
});

