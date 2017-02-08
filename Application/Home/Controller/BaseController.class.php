<?php
namespace Home\Controller;
use Think\Controller;
/**
* 用户类，指定用户
*/
class BaseController extends Controller
{
    
    function _initialize()
    {
        if(session('boyfriend') != '王斌飞'){
            $this->error('先去回答一个问题哦', U('login/login'));
        }

    }

}